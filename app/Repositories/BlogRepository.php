<?php

namespace App\Repositories;

use App\Models\Article;
use App\Interface\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface
{
    public function getBlog($title)
    {
        $query = Article::query();

        if ($title !== null) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        return $query->get();
    }
}
