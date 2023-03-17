<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\View\View;
use App\Services\AuthorService;
use Illuminate\Http\RedirectResponse;

/**
 * The AuthorController class.
 */
class AuthorController extends BaseController
{
    /**
     * The get author.
     * 
     * @param AuthorService          $authorService The author service.
     * @param integer                $authorId      The author ID.
     * 
     * @return View
     */
    public function getAuthor(AuthorService $authorService, int $authorId): View
    {
        $this->debug('Getting the specified author.', ['authorId' => $authorId]);

        try
        {
            $author = $authorService->findAuthorById($authorId);
        }
        catch(Throwable $e)
        {
            $this->error('Could not get the specified user.', ['authorId' => $authorId, $e]);

            $author = null;
        }

        return view('pages.author', ['author' => $author]);
    }

    /**
     * The store book.
     * 
     * @param AuthorService $authorService The author service.
     * @param integer       $authorId      The book ID.
     * 
     * @return View
     */
    public function delete(AuthorService $authorService, int $authorId): RedirectResponse
    {
        $this->debug('Deleting the specified author', ['authorId' => $authorId]);

        try
        {
            $author = $authorService->findAuthorById($authorId);

            if ( $author['books'] ?? null )
            {
                return redirect()->back()->with('error_message', __('messages.author_has_book'));
            }

            $authorService->deleteAuthor($authorId);

            return redirect()->back();
        }
        catch(Throwable $e)
        {
            $this->error('Could not delete the specified author', ['authorId' => $authorId, $e]);

            return redirect()->back();
        }
    }
}
