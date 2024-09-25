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


    public function markAsUnfulfilled($id){


        $update = \App\Models\booked_patient_details::find($id);
        $update->appointment_status = 'Unfulfilled';
        $update->save();

        session()->flash('appointment_unfulfilled', 'Appointment Has Been Marked Unfulfilled');

    }

    public function markAsFulfilled($id){

        $update = \App\Models\booked_patient_details::find($id);
        $update->appointment_status = 'Fulfilled';
        $update->save();

        session()->flash('appointment_fulfilled', 'Appointment Has Been Marked Fulfilled');
    }

    public function clear_appointment_unfulfilled(){

        session()->flash('appointment_unfulfilled', null);

    }

    public function clear_appointment_fulfilled(){

        session()->flash('appointment_fulfilled', null);

    }


    public function render()
    {
        return view('livewire.admin-appointments');
    }
}
