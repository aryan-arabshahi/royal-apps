<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\AuthorService;

/**
 * The DashboardController class.
 */
class DashboardController extends BaseController
{
    /**
     * The dashboard page view.
     * 
     * @param Request       $request       The request.
     * @param AuthorService $authorService The author service.
     * 
     * @return View
     */
    public function index(Request $request, AuthorService $authorService): View
    {
        $this->debug('Loading the dashboard view.');

        $page = is_numeric($request->page) ? (int) $request->page : 1;

        $authors = $authorService->getAuthorsPaginated($page);

        return view('pages.dashboard', ['authors' => $authors]);
    }
}
