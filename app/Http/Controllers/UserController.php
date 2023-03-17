<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Services\UserService;

/**
 * The UserController class.
 */
class UserController extends BaseController
{
    /**
     * The dashboard page view.
     * 
     * @param UserService $userService The user service.
     * @param integer     $userId      The user ID.
     * 
     * @return View
     */
    public function profile(UserService $userService, int $userId): View
    {
        $this->debug('Loading the user profile view.', ['userId' => $userId]);

        try
        {
            $user = $userService->findUserById($userId);
        }
        catch(Throwable $e)
        {
            $user = null;
        }

        return view('pages.profile', ['user' => $user]);
    }
}
