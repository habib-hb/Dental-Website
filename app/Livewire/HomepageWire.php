<?php

namespace App\Livewire;

use App\Models\blog_posts;
use Livewire\Attributes\On;
use Livewire\Component;

class HomepageWire extends Component
{

    public $theme_mode;

    public $searchtext='';

    public $search_output;


    public function mount()
    {
        if(!session('theme_mode')) {

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);

        }else{

            $this->theme_mode = session('theme_mode');

        }
    }



    public function updated($property)
    {
        // $property: The name of the current property that was updated

        if ($property === 'searchtext' && !empty($this->searchtext)) {

            // $this->search_output = Names::search($this->searchtext)->get();

            $this->search_output = blog_posts::search($this->searchtext)->orderBy('blog_title', 'asc')->take(5)->get()->map(function ($post) {
                // Replace the search text with the highlighted version in a case-insensitive way
                $highlighted = '<b class="text-[#1A579F] ">' . e($this->searchtext) . '</b>';

                $post->blog_title = str_ireplace($this->searchtext, $highlighted, e($post->blog_title));
                $post->blog_excerpt = str_ireplace($this->searchtext, $highlighted, e($post->blog_excerpt));

                return $post;
            });


        }else{

            $this->search_output = null;

        }

        $this->dispatch('alert-manager');
    }



    // #[On('theme-change')]
    public function changeThemeMode(){

        if($this->theme_mode == 'light'){

            $this->theme_mode = 'dark';

            session(['theme_mode' => $this->theme_mode]);

        }else{

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);

        }

        $this->dispatch('alert-manager');

    }

    public function render()
    {
        return view('livewire.homepage-wire');
    }
}
