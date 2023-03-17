<?php

namespace App\Http\Controllers;

use Session;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Services\AuthService;
use Illuminate\Support\Facades\Validator;

/**
 * The AuthController class.
 */
class AuthController extends BaseController
{
    /**
     * The login page view.
     * 
     * @param Request                $request                The request.
     * @param AuthService $authService The auth service.
     * 
     * @return RedirectResponse
     */
    public function login(Request $request, AuthService $authService): RedirectResponse
    {
        $this->debug('Login the specified user', ['email' => $request->email]);

        $validator = Validator::make(
            $request->all(),
            [
                'email'    => 'required|email',
                'password' => 'required|string',
            ]
        );

        if ($validator->fails())
        {
            return redirect(route('home.login'))->withErrors($validator)->withInput();
        }

        try
        {
            $user = $authService->login(...$validator->safe()->only(['email', 'password']));

            Session::put('user', $user);

            return redirect(route('home.login'));
        }
        catch(Throwable $e)
        {
            return redirect(route('home.login'))->with('error_message', __('messages.invalid_credentials'));
        }
    }

    /**
     * The logout page.
     * 
     * @param Request $request The request.
     * 
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        $this->debug('logout the specified user');

        Session::forget('user');

        return redirect(route('home.login'));
    }
}
