<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * The HomeController class.
 */
class HomeController extends BaseController
{
    /**
     * The login page view.
     * 
     * @return View
     */
    public function login(): View
    {
        $this->debug('Loading the login view.');

        return view('pages.login');
    }
}
