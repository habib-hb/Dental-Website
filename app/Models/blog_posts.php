<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog_posts extends Model
{
    use HasFactory;

    protected $table = 'blog_posts';

    protected $primaryKey = 'blog_id';
}
