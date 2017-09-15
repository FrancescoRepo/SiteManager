<?php

namespace Tests\Feature;

use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClassTest extends BrowserKitTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');
    }
}
