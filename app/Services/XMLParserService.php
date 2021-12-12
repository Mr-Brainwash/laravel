<?php

namespace App\Services;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService
{
    public function saveNews($link)
    {
        $xml = XMLParser::load($link);
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate,enclosure::url,category]'],
        ]);
        foreach ($data['news'] as $news) {

            (!$news['category']) ? $categoryName = $data['title'] : $categoryName = $news['category'];

            $category = Category::query()->firstOrCreate([
                'title' => $categoryName,
                'slug' => Str::slug($categoryName)
            ]);

            News::query()->firstOrCreate([
                'title' => $news['title'],
                'text' => $news['description'],
                'isPrivate' => false,
                'image' => $news['enclosure::url'],
                'category_id' => $category->id,
            ]);

        }
    }
}
