<?php

namespace App\Livewire;

use Livewire\Component;

class HomepageWire extends Component
{
    public $toggler = true;

    public $current_name = "Habib";

    public function nameChanger(){

        $this->toggler = !$this->toggler;
        
        $this->toggler ? $this->current_name = "Habib" : $this->current_name = "Not Habib";

    }

    public function render()
    {
        return view('livewire.homepage-wire');
    }
}
