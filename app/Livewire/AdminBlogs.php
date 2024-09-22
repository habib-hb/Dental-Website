<?php

namespace App\Livewire;

use App\Models\blog_posts;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminBlogs extends Component
{
    use WithFileUploads;

    public $author_name;

    public $blog_headline;

    public $blog_slug;

    public $blog_excerpt;

    public $blog_image;

    public $blog_area;


    // Testing

    public $image_url;

    // End Testing

    public function save()
    {
        $this->validate([
            'blog_image' => 'image|max:1024', // Image validation (1MB max)
        ]);

        // Store the uploaded image and get the file path
        $imagePath = $this->blog_image->store('blog_images', 'public');

        // Generate the full image_URL to the stored image
        $this->image_url = asset('storage/' . $imagePath);


        if($this->author_name && $this->blog_headline && $this->blog_slug && $this->blog_excerpt && $this->blog_image  && $this->blog_area){

            blog_posts::create([
                'blog_author' => $this->author_name,
                'blog_title' => $this->blog_headline,
                'blog_link' => $this->blog_slug,
                'blog_excerpt' => $this->blog_excerpt,
                'blog_image' => $this->image_url,
                'blog_text' => $this->blog_area,
                'blog_type' => 'custom',
            ]);

          


            session()->flash('message', 'Blog Post Created Successfully');
        }

    }

    public function updated($property)
    {
        // $property: The name of the current property that was updated

        if ($property === 'blog_image') {
            $this->dispatch('alert-manager');
        }
    }


    public function test_image(){
        dd($this->image_url);
    }


    #[On('updateTextarea')]
    public function updateTextarea($text){

        $this->blog_area = $text;


    }

    public function test_textarea(){

        dd($this->blog_area);


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
        return view('livewire.admin-blogs');
    }
}
