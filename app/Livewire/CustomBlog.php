<?php

namespace App\Livewire;

use Livewire\Component;

class CustomBlog extends Component
{

    public $blog_image;

    public $blog_title;

    public $blog_excerpt;

    public $blog_text;

    public $blog_author;

    public $blog_date;

    public function mount($blog_image, $blog_title, $blog_excerpt, $blog_text , $blog_author, $blog_date){

        $this->blog_image = $blog_image;
        $this->blog_title = $blog_title;
        $this->blog_excerpt = $blog_excerpt;
        $this->blog_text = $blog_text;
        $this->blog_author = $blog_author;
        $this->blog_date = $blog_date;

    }

    public function render()
    {
        return view('livewire.custom-blog');
    }
}
