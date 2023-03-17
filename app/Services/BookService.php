<?php

namespace App\Services;

use App\Services\BaseService;
use Illuminate\Support\Facades\Http;
use App\Exceptions\CouldNotCreateBook;
use App\Exceptions\CouldNotDeleteBook;

/**
 * The BookService class.
 */
class BookService extends BaseService
{
    /**
     * The create book.
     * 
     * @param integer $authorId The author ID.
     * 
     * @return array
     * @throws CouldNotCreateBook The author not found exception.
     */
    public function createBook(
        int $authorId,
        string $title,
        string $releaseDate,
        string $description,
        string $isbn,
        string $format,
        int $numberOfPages
    ): array
    {
        $this->debug('Creating the specified book.', ['authorId' => $authorId]);

        $response = Http::symfonySkeleton()->withToken( $this->getAccessToken() )->post(
            '/books',
            [
                'author' => [
                    'id' => $authorId,
                ],
                'title' => $title,
                'release_date' => $releaseDate,
                'description' => $description,
                'isbn' => $isbn,
                'format' => $format,
                'number_of_pages' => $numberOfPages,
            ]
        );

        if ( !$response->successful() )
        {
            $this->error('Could not creating the specified book', ['authorId' => $authorId]);

            throw new CouldNotCreateBook;
        }

        return $response->json();
    }

    /**
     * The create book.
     * 
     * @param integer $authorId The author ID.
     * 
     * @return void
     * @throws CouldNotDeleteBook The author not found exception.
     */
    public function deleteBook(int $bookId): void
    {
        $this->debug('Deleting the specified book.', ['bookId' => $bookId]);

        $response = Http::symfonySkeleton()->withToken( $this->getAccessToken() )
                        ->withUrlParameters(
                            [
                                'bookId' => $bookId,
                            ]
                        )
                        ->delete('/books/{bookId}');

        if ( !$response->successful() )
        {
            $this->error('Could not creating the specified book', ['authorId' => $authorId]);

            throw new CouldNotDeleteBook;
        }
    }
}
