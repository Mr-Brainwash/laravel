<?php

namespace App\Models;

class News
{
    private static $news = [
        [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'А у нас новость 1 и она очень хорошая!'
        ],
        [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'А тут плохие новости((('
        ]
    ];

    public static function getNews(): array
    {
        return static::$news;
    }

    public static function getNewsId($id)
    {
        foreach (static::getNews() as $news){
            if($news['id'] == $id) return $news;
        }
        return [];
    }
}
