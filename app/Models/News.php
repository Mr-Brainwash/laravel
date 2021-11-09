<?php

namespace App\Models;
use App\Models\Categories;
use Illuminate\Support\Facades\File;

class News
{
    private Categories $category;
    private array $news = [
        '1' => [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'А у нас новость 1 и она очень хорошая!',
            'category_id' => 1,
            'isPrivate' => true
        ],
        '2' => [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'А тут плохие новости(((',
            'category_id' => 2,
            'isPrivate' => false
        ],
        '3' => [
            'id' => 3,
            'title' => 'Новость 1',
            'text' => 'А у нас новость 1 и она очень хорошая!',
            'category_id' => 1,
            'isPrivate' => true
        ],
        '4' => [
            'id' => 4,
            'title' => 'Новость 2',
            'text' => 'А тут плохие новости(((',
            'category_id' => 2,
            'isPrivate' => false
        ]
    ];


    public function __construct(Categories $category)
    {
        $this->category = $category;
    }


//    public function getNews(): array
//    {
//        return $this->news;
//    }
    public function getNews() //вывод новостей из файла
    {
        $news = File::get(storage_path() . '/news.json');
        return json_decode($news, true);
    }

    public function getNewsByCategorySlug($slug): array
    {
        $id = $this->category->getCategoryIdBySlug($slug);
        return $this->getNewsByCategoryId($id);
    }

    public function getNewsByCategoryId($id): array
    {
        $news = [];
        foreach ($this->getNews() as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }

    public function getNewsById($id)
    {
        return $this->getNews()[$id] ?? [];
    }
//    public function getNewsById($id): array
//    {
//        return $this->getNews()[$id] ?? [];
//        foreach (static::getNews() as $news){
//            if($news['id'] == $id) return $news;
//        }
//        return [];
//    }
}
