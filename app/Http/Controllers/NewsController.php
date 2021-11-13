<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(News $news)
    {
        $news = DB::table('news')->get();
        return view('news.index')->with('news', $news);
        //return view('news.index')->with('news', $news->getNews());
    }

    public function show(News $news, $id)
    {
        $news = DB::table('news')->find($id);
        return view('news.one')->with('news', $news);
        //return view('news.one')->with('news', $news->getNewsById($id));
    }
}
