<?php

namespace App\Services;

use App\Services\BaseService;
use App\Exceptions\CouldNotGetToken;
use Illuminate\Support\Facades\Http;

/**
 * The AuthService class.
 */
class AuthService extends BaseService
{
    /**
     * Get the user credentials.
     * 
     * @param string $email    The email.
     * @param string $password The password.
     * 
     * @return array
     * @throws CouldNotGetToken The could not get token exception.
     */
    public function login(string $email, string $password)
    {
        $this->debug('Getting the token', ['email' => $email]);

        $response = Http::symfonySkeleton()->post('/token', ['email' => $email, 'password' => $password]);

        if ( !$response->successful() )
        {
            $this->error('Could not get the token details', ['email' => $email]);

            throw new CouldNotGetToken;
        }

        $responseData = $response->json();

        if (!isset($responseData['user']))
        {
            $this->error('Bad token details structure', $responseData);

            throw new CouldNotGetToken;
        }

        return $responseData['user'] + [
            'token' => [
                'access_token'       => $responseData['token_key'] ?? null,
                'refresh_token'      => $responseData['refresh_token_key'] ?? null,
                'expires_at'         => $responseData['expires_at'] ?? null,
                'refresh_expires_at' => $responseData['refresh_expires_at'] ?? null,
            ],
        ];
    }
}
