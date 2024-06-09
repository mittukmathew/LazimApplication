<?php
namespace App\Interface;

use App\Models\Article;

interface BlogRepositoryInterface
{
    public function getBlog($data);
}