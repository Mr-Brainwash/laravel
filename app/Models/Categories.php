<?php

namespace App\Models;


use Illuminate\Support\Facades\File;

class Categories
{
    private array $categories = [
        1 => [
            'id' => 1,
            'title' => 'Спорт',
            'slug' => 'sports'
        ],
        2 => [
            'id' => 2,
            'title' => 'Политика',
            'slug' => 'politics'
        ]
    ];

//    public function getCategories(): array
//    {
//        return $this->categories;
//    }
    public function getCategories(): array
    {
        return json_decode(File::get(storage_path() . '/categories.json'), true);
    }

    public function getCategoryNameBySlug($slug)
    {
        $id = $this->getCategoryIdBySlug($slug);
        $category = $this->getCategoryById($id);
        return $category['title'] ?? '';
    }

    public function getCategoryIdBySlug($slug)
    {
        $id = null;
        foreach ($this->getCategories() as $category){
            if ($category['slug'] == $slug) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

    public function getCategoryById($id): array
    {
        return $this->getCategories()[$id] ?? [];
    }
}
