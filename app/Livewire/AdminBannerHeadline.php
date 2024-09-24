<?php

namespace App\Livewire;

use Livewire\Component;

class AdminBannerHeadline extends Component
{


    public $banner_headline;


    public function save(){
            if(!$this->banner_headline){
                dd("Please Fill All the fields");
            }
            dd($this->banner_headline);
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
        return view('livewire.admin-banner-headline');
    }
}
