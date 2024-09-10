<?php

namespace App\Livewire;

use Livewire\Component;

class HomepageWire extends Component
{

    public $theme_mode = 'light';

    public function mount()
    {
        if(!session('theme_mode')) {

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);

        }else{

            $this->theme_mode = session('theme_mode');

        }
    }



    public function changeThemeMode(){

        if($this->theme_mode == 'light'){

            $this->theme_mode = 'dark';

            session(['theme_mode' => $this->theme_mode]);

        }else{

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);
            
        }
    }

    public function render()
    {
        return view('livewire.homepage-wire');
    }
}
