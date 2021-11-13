<?php

namespace Tests\Unit;

use App\Models\Categories;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_category()
    {
        $news = new Categories();
        $this->assertIsArray($news->getCategories());
    }
}
