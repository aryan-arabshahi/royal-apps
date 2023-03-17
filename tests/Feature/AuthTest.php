<?php

namespace Tests\Feature;

use Session;
use Tests\BaseTest;

/**
 * The AuthTest class.
 */
class AuthTest extends BaseTest
{
    /**
     * The login success test.
     *
     * @return void
     */
    public function test_login_success()
    {
        $response = $this->post(
            route('auth.login'),
            [
                'email'    => env('SYMFONY_SKELETON_API_EMAIL'),
                'password' => env('SYMFONY_SKELETON_API_PASSWORD'),
            ]
        );

        $response->assertRedirect(route('home.login'))
                 ->assertSessionHasNoErrors()
                 ->assertSessionMissing('error_message')
                 ->assertSessionHas('user');
    }

    /**
     * The login failure test.
     *
     * @return void
     */
    public function test_login_fail_validation_error()
    {
        $response = $this->post(
            route('auth.login'),
            [
                'email'    => '',
                'password' => env('SYMFONY_SKELETON_API_PASSWORD'),
            ]
        );

        $response->assertSessionHasErrors();
    }

    /**
     * The login failure test.
     *
     * @return void
     */
    public function test_login_fail_invalid_credentials()
    {
        $response = $this->post(
            route('auth.login'),
            [
                'email'    => env('SYMFONY_SKELETON_API_EMAIL'),
                'password' => 'WRONG-PASSWORD',
            ]
        );

        $response->assertSessionHas('error_message');
    }
}
