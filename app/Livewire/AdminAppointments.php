<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\WithPagination;

class AdminAppointments extends Component
{

    use WithPagination;

    public $all_appointments = [];

    public $database_offset = 0;

    public $database_limit = 10;

    public function mount(){

        $appointments = \App\Models\booked_patient_details::orderBy('appointment_date', 'desc')
        ->skip($this->database_offset)
        ->take($this->database_limit)
        ->get();

        //Merging Both Arrays
        $this->all_appointments = array_merge($this->all_appointments, $appointments->toArray());

         // Increase the offset for the next load
         $this->database_offset += $this->database_limit;

    }

    public function loadMore(){

        $appointments = \App\Models\booked_patient_details::orderBy('appointment_date', 'desc')
        ->skip($this->database_offset)
        ->take($this->database_limit)
        ->get();

        if($appointments->count() == 0){
            session()->flash('no_more_appointments', 'No More Appointments Found');
        }

        //Merging Both Arrays
        $this->all_appointments = array_merge($this->all_appointments, $appointments->toArray());

         // Increase the offset for the next load
         $this->database_offset += $this->database_limit;

    }

    public function changeThemeMode(){

        if(session('theme_mode') == 'light'){

            session(['theme_mode' => 'dark']);

        }else{


            session(['theme_mode' => 'light']);

        }

        $this->dispatch('alert-manager');

    }


    public function clear_no_more_appointments(){

        session()->flash('no_more_appointments', null);

    }


    public function render()
    {
        return view('livewire.admin-appointments');
    }
}
