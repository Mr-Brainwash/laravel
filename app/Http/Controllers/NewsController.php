<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = News:: query()->paginate(3);
        return view('news.index')->with('news', $news);
    }

    public function show($id)
    {
        $news = News::query()->find($id);
        return view('news.one')->with('news', $news);
    }
}
