<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Categories $categories)
    {
        $categories = DB::table('categories')->get();
        return view('news.categories', [
            'categories' => $categories
        ]);
    }

    public function show(News $news, Categories $categories, $slug)
    {
        $categories = DB::table('categories')->where('slug', $slug);
        dd($categories);
        //по слагу выбирает, но не понял как вывести  дальше правльно
        return view('news.category', [
            'category' => $categories->getCategoryNameBySlug($slug),
            'news' => $news->getNewsByCategorySlug($slug)
        ]);
    }
}
