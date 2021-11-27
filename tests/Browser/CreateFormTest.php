<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateFormTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->type('title', '')
                ->attach( 'image', storage_path(). '/app/public/img/default.jpeg')
                ->press('Добавить новость')
                    ->assertSee('Поле "Заголовок новости" обязательно для заполнения.');
        });
    }
}
