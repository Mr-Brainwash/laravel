<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\News;
use App\Services\XMLParserService;

class ParserController extends Controller
{
    public function index(XMLParserService $parserService)
    {
        $rssLinks = [
            'https://lenta.ru/rss/news',
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/auto_racing.rss',
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/championsleague.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/nhl.rss',
        ];
        $start = microtime(true);

        foreach ($rssLinks as $link) {
            NewsParsing::dispatch($link);
            //$parserService->saveNews($link);
        }

        $end = microtime(true);
        dump($end - $start);

        return view('admin.index', [
            'news' => News::query()->paginate(10)
        ]);
    }
}
