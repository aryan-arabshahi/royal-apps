<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\BookService;
use App\Services\AuthorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

/**
 * The BookController class.
 */
class BookController extends BaseController
{
    /**
     * The create book.
     * 
     * @param Request       $request       The request.
     * @param AuthorService $authorService The author service.
     * 
     * @return View
     */
    public function create(Request $request, AuthorService $authorService): View
    {
        $this->debug('Creating the specified book');

        $authors = $authorService->getAuthorsPaginated();

        $authorsList = collect($authors['items'] ?? [])->map(
            function($author)
            {
                $author['full_name'] = "{$author['first_name']} {$author['first_name']}";

                return $author;
            }
        )->pluck('full_name', 'id')->toArray();

        return view('pages.create_book', ['authors' => $authorsList]);
    }

    /**
     * The store book.
     * 
     * @param Request     $request     The request.
     * @param BookService $bookService The book service.
     * 
     * @return View
     */
    public function store(Request $request, BookService $bookService): RedirectResponse
    {
        $this->debug('Storing the specified book');

        $validator = Validator::make(
            $request->all(),
            [
                'author_id'       => 'required|integer',
                'title'           => 'required|string',
                'release_date'    => 'required|date|date_format:Y-m-d',
                'description'     => 'required|string',
                'isbn'            => 'required|string',
                'format'          => 'required|string',
                'number_of_pages' => 'required|integer|gt:0',
            ]
        );

        if ($validator->fails())
        {
            return redirect(route('books.create'))->withErrors($validator)->withInput();
        }

        try
        {
            $inputs = $validator->safe();

            $book = $bookService->createBook(
                authorId: $inputs->author_id,
                title: $inputs->title,
                releaseDate: $inputs->release_date,
                description: $inputs->description,
                isbn: $inputs->isbn,
                format: $inputs->format,
                numberOfPages: $inputs->number_of_pages
            );

            return redirect(route('authors.view', ['authorId' => $request->author_id]));
        }
        catch(Throwable $e)
        {
            return redirect(route('books.create'))->with('error_message', __('messages.failed'));
        }
    }

    /**
     * The store book.
     * 
     * @param BookService $bookService The book service.
     * @param integer     $bookId      The book ID.
     * 
     * @return View
     */
    public function delete(BookService $bookService, int $bookId): RedirectResponse
    {
        $this->debug('Deleting the specified book', ['bookId' => $bookId]);

        try
        {
            $bookService->deleteBook($bookId);

            return redirect()->back();
        }
        catch(Throwable $e)
        {
            return redirect()->back();
        }
    }
}
