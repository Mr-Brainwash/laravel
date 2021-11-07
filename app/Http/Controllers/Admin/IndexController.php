<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class IndexController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function create(Request $request, Categories $categories) {
        if ($request->isMethod('post')) {
            $request->flash();
            $arr = $request->except('_token');

            File::put(storage_path() . '/news.json', json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

            dd($arr);

            //TODO прочитать файл новостей в массив
            //TODO добавить в массив
            //TODO сохранить новость в файл в json
            return redirect()->route('admin.create');
        }

        return view('admin.create',[
            'categories' => $categories->getCategories()
        ]);
    }

    public function test1(News $news)
    {

        return response()->json($news->getNews())
            ->header('Content-Disposition', 'attachment; filename = "json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function test2()
    {
        return response()->download('cat.jpg');
    }
}
