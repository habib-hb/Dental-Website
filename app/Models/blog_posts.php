<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class blog_posts extends Model
{
    use HasFactory;

    use Searchable;

    protected $table = 'blog_posts';

    protected $primaryKey = 'blog_id';

    public function searchableAs(): string
    {
        return 'blog_posts';
    }


    public function toSearchableArray(): array
    {

        return [
            'blog_title' => $this->blog_title,
            'blog_excerpt' => $this->blog_excerpt,
            'blog_link' => $this->blog_link
        ];

    }

}
