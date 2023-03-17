<?php

namespace App\Console\Commands;

use App\Services\AuthorService;
use Illuminate\Console\Command;

class CreateAuthor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'author:create {firstName} {lastName} {birthday} {gender} {placeOfBirth} {biography}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create author.';

    /**
     * Execute the console command.
     * 
     * @param AuthorService $authorService The author service.
     * 
     * @return void
     */
    public function handle(AuthorService $authorService): void
    {
        $author = $authorService->createAuthor(
            firstName: $this->argument('firstName'),
            lastName: $this->argument('lastName'),
            birthday: $this->argument('birthday'),
            gender: $this->argument('gender'),
            placeOfBirth: $this->argument('placeOfBirth'),
            biography: $this->argument('biography'),
        );

        echo "[+] The user has been created.\n\n";
    }
}
