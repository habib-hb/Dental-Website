<?php

namespace App\Livewire;

use Livewire\Component;

class AdminSchedulesManagement extends Component
{

    public $start_time_hour;

    public $start_time_minute;

    public $end_time_hour;

    public $end_time_minute;

    public $am_or_pm;

    public function changeThemeMode(){

        if(session('theme_mode') == 'light'){

            session(['theme_mode' => 'dark']);

        }else{


            session(['theme_mode' => 'light']);

        }

        $this->dispatch('alert-manager');

    }


    public function setAM(){

        $this->am_or_pm = 'AM';

    }

    public function setPM(){

        $this->am_or_pm = 'PM';

    }


    public function addSchedule(){
        dd($this->start_time_hour . $this->start_time_minute . $this->end_time_hour . $this->end_time_minute . $this->am_or_pm);
    }


    public function render()
    {
        return view('livewire.admin-schedules-management');
    }
}
