<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminBlogs extends Component
{
    use WithFileUploads;


    public $blog_image;

    public $url;

    public $textarea_test;

    public function save()
    {
        $this->validate([
            'blog_image' => 'image|max:1024', // Image validation (1MB max)
        ]);

        // Store the uploaded image and get the file path
        $imagePath = $this->blog_image->store('blog_images', 'public');

        // Generate the full URL to the stored image
        $this->url = asset('storage/' . $imagePath);

    }


    public function test_image(){
        dd($this->url);
    }


    #[On('updateTextarea')]
    public function updateTextarea($text){

        $this->textarea_test = $text;


    }

    public function test_textarea(){
       
        dd($this->textarea_test);


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
