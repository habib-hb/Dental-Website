<?php

namespace App\Livewire;

use App\Models\blog_posts;
use Livewire\Component;

class BlogShowcase extends Component
{


    public $blogs;


    public function mount(){

        $database_query = blog_posts::where('blog_type', 'custom')->get();
        $this->blogs = $database_query;

        // dd($this->blogs);

    }


    public function changeThemeMode(){

        if(session('theme_mode') == 'light'){

            session(['theme_mode' => 'dark']);

        }else{


            session(['theme_mode' => 'light']);

        }

        $this->dispatch('alert-manager');

    }



    public function render()
    {
        return view('livewire.blog-showcase');
    }
}
