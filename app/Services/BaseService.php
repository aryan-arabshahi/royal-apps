<?php

namespace App\Services;

use App\Traits\Logger;

/**
 * The BaseService abstract class.
 */
abstract class BaseService
{
    use Logger;

    /**
     * Get the access token.
     * 
     * @return string|null
     */
    protected function getAccessToken(): string|null
    {
        return session('user')['token']['access_token'] ?? null;
    }
}
