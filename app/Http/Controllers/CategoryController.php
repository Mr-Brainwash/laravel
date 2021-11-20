<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        return view('news.categories', [
            'categories' => Category::all()
        ]);
    }

    public function show($slug)
    {
        $category = Category::query()->where('slug', $slug)->first();

        return view('news.category', [
            'category' => $category->title,
            'news' =>  $category->news
        ]);
    }
}
