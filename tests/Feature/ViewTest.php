<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_about()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }

    public function test_news_rendered()
    {
        $view = $this->view('index');

        $view->assertSee('Добро пожаловать!');
    }
}
