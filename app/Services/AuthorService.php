<?php

namespace App\Services;

use App\Services\BaseService;
use App\Exceptions\AuthorNotFound;
use Illuminate\Support\Facades\Http;
use App\Exceptions\CouldNotCreateAuthor;

/**
 * The AuthorService class.
 */
class AuthorService extends BaseService
{
    /**
     * Get the authors paginated.
     * 
     * @param integer $page The current page.
     * 
     * @return array
     */
    public function getAuthorsPaginated(int $page = 1): array
    {
        $this->debug('Getting the authors', ['page' => $page]);

        $response = Http::symfonySkeleton()->withToken( $this->getAccessToken() )
                        ->get('/authors', ['page' => $page]);

        if ( !$response->successful() )
        {
            $this->error('Could not get the authors', ['page' => $page]);

            return [];
        }

        return $response->json();
    }

    /**
     * Delete author.
     * 
     * @param integer $authorId The author ID.
     * 
     * @return array
     */
    public function deleteAuthor(int $authorId): array
    {
        $this->debug('Deleting the authors', ['authorId' => $authorId]);

        $response = Http::symfonySkeleton()->withToken( $this->getAccessToken() )
                        ->withUrlParameters(
                            [
                                'authorId' => $authorId,
                            ]
                        )
                        ->delete('/authors/{authorId}');

        if ( !$response->successful() )
        {
            $this->error('Could delete the authors', ['authorId' => $authorId]);

            return [];
        }

        return $response->json();
    }

    /**
     * Find the author by ID.
     * 
     * @param integer $authorId The author ID.
     * 
     * @return array
     * @throws AuthorNotFound The author not found exception.
     */
    public function findAuthorById(int $authorId): array
    {
        $this->debug('Finding the author by ID.', ['authorId' => $authorId]);

        $response = Http::symfonySkeleton()->withToken( $this->getAccessToken() )
                        ->withUrlParameters(
                            [
                                'authorId' => $authorId,
                            ]
                        )
                        ->get('/authors/{authorId}');

        if ( !$response->successful() )
        {
            $this->error('Could not get the author', ['authorId' => $authorId]);

            throw new AuthorNotFound;
        }

        return $response->json();
    }

    /**
     * Create author.
     * 
     * @param string $firstName    The first name.
     * @param string $lastName     The last name.
     * @param string $birthday     The birthday.
     * @param string $gender       The gender.
     * @param string $placeOfBirth The place of birth.
     * @param string $biography    The biography.
     * 
     * @return array
     * @throws CouldNotCreateAuthor The could not create author exception.
     */
    public function createAuthor(
        string $firstName,
        string $lastName,
        string $birthday,
        string $gender,
        string $placeOfBirth,
        string $biography
    ): array
    {
        $this->debug('Create the author.', ['firstName' => $firstName, 'lastName' => $lastName]);

        $user = app(AuthService::class)->login(env('SYMFONY_SKELETON_API_EMAIL'), env('SYMFONY_SKELETON_API_PASSWORD'));

        $accessToken = $user['token']['access_token'] ?? null;

        $response = Http::symfonySkeleton()->withToken( $accessToken )
                        ->post(
                            '/authors',
                            [
                                'first_name'     => $firstName,
                                'last_name'      => $lastName,
                                'birthday'       => $birthday,
                                'biography'      => $biography,
                                'gender'         => $gender,
                                'place_of_birth' => $placeOfBirth,
                            ]
                        );

        if ( !$response->successful() )
        {
            $this->error('Could create the author', ['firstName' => $firstName, 'lastName' => $lastName]);

            throw new CouldNotCreateAuthor;
        }

        return $response->json();
    }
}
