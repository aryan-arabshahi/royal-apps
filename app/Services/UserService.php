<?php

namespace App\Services;

use App\Services\BaseService;
use App\Exceptions\CouldNotFindUser;
use Illuminate\Support\Facades\Http;

/**
 * The UserService class.
 */
class UserService extends BaseService
{
    /**
     * Find the user by ID.
     * 
     * @param integer $userId The user ID.
     * 
     * @return array
     * @throws CouldNotFindUser The could not find user exception.
     */
    public function findUserById(int $userId): array
    {
        $this->debug('Finding the user by ID.', ['userId' => $userId]);

        $response = Http::symfonySkeleton()->withToken( $this->getAccessToken() )
                        ->withUrlParameters(
                            [
                                'userId' => $userId,
                            ]
                        )
                        ->get('/users/{userId}');

        if ( !$response->successful() )
        {
            $this->error('Could not find the user by id.', ['userId' => $userId]);

            throw new CouldNotFindUser;
        }

        return $response->json();
    }
}
