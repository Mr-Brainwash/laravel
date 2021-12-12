<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index() {
        return view('admin.index', [
            'news' => News::query()->paginate(10)
        ]);
    }

    public function create(News $news)
    {
        return view('admin.create',[
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request, News $news)
    {
        $request->flash();
        $request->validate($news->rules(),[],$news->attributeNames());
        $url = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public/img', $request->file('image'));
            $url = Storage::url($path);
        }

        $news->image = $url;
        $news->fill($request->all())->save();

        return redirect()->route('news.one', $news->id)->with('success', 'Новость добавлена');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.index', $news->id)->with('success', 'Новость удалена');
    }

    public function edit(News $news)
    {
        return view('admin.edit',[
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, News $news)
    {
        //$request->validate($news->rules(),[],$news->attributeNames());
        $url = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public/img', $request->file('image'));
            $url = Storage::url($path);
        }

        $news->image = $url;
        $news->fill($request->all())->save();

        return redirect()->route('news.one', $news->id)->with('success', 'Новость изменена');
    }

}
