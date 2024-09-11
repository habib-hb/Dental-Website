<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class HomepageWire extends Component
{

    public $theme_mode;


    public function mount()
    {
        if(!session('theme_mode')) {

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);

        }else{

            $this->theme_mode = session('theme_mode');

        }
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
