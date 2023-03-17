<?php

namespace Tests\Feature;

use Session;
use Tests\BaseTest;

/**
 * The HomeTest class.
 */
class HomeTest extends BaseTest
{
    /**
     * The login success test.
     *
     * @return void
     */
    public function test_login_view_success()
    {
        $view = $this->withViewErrors([])->view('pages.login');
 
        $view->assertSee('Email');
    }

    /**
     * The login load success test.
     *
     * @return void
     */
    public function test_login_load_success()
    {
        $response = $this->get(route('home.login'));
 
        $response->assertStatus(200);
    }
}
