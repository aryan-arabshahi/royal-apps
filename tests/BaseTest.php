<?php

namespace Tests;

use Tests\TestCase;

abstract class BaseTest extends TestCase
{
    /**
     * The generate user.
     * 
     * @return array
     */
    protected function generateUser(): array
    {
        return [
            'id' => 1,
            'first_name' => 'Aryan',
            'last_name' => 'Arabshahi',
        ];
    }
}
