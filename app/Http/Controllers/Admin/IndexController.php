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

    public function create(Request $request, Categories $categories, News $news)
    {
        if ($request->isMethod('post')) {
            $request->flash();
            $arr = $request->except('_token');
            //пришлось добавить рандомное id, в массив, так как с формы не идет id и получал ошибку на выводе Undefined index: id (View: /var/www/laravel/resources/views/news/index.blade.php)
            $arrId = ['id' => rand(5, 100)] + $arr;
            $news_arr = $news->getNews(); //прочитал файл новостей в массив
            $result  =  array_merge($news_arr, [$arrId]); //добавил в конец массива новостей
            File::put(storage_path() . '/news.json', json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)); //сохранил новость в файл в json

            dd($result);
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
