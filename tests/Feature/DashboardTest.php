<?php

namespace Tests\Feature;

use Session;
use Tests\BaseTest;

/**
 * The DashboardTest class.
 */
class DashboardTest extends BaseTest
{
    /**
     * The index view success test.
     *
     * @return void
     */
    public function test_index_view_success()
    {
        $view = $this->withSession(['user' => $this->generateUser()])->view('pages.dashboard');
 
        $view->assertSee('Welcome');
    }

    /**
     * The index load success test.
     *
     * @return void
     */
    public function test_index_load_success()
    {
        $response = $this->withSession(['user' => $this->generateUser()])->get(route('dashboard'));
 
        $response->assertStatus(200);
    }
}
