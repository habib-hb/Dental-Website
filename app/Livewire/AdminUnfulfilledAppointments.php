<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\WithPagination;

class AdminUnfulfilledAppointments extends Component
{

    use WithPagination;

    public $all_appointments = [];

    public $database_offset = 0;

    public $database_limit = 10;


    //System Variables
    public $appointment_fulfilled_selected_id = [];

    public $appointment_fulfilled_notification = null;

    public $appointment_restored_selected_id = [];

    public $appointment_restored_notification = null;




    public function mount(){

        $appointments = \App\Models\booked_patient_details::where('appointment_status' , 'Unfulfilled')->orderBy('appointment_date', 'desc')
        ->skip($this->database_offset)
        ->take($this->database_limit)
        ->get();


        // Filtered Array
        $appointments = $appointments->toArray();


        //Merging Both Arrays
        $this->all_appointments = array_merge($this->all_appointments, $appointments);



         // Increase the offset for the next load
         $this->database_offset += $this->database_limit;

    }

    public function loadMore(){

        $appointments = \App\Models\booked_patient_details::where('appointment_status' , 'Unfulfilled')->orderBy('appointment_date', 'desc')
        ->skip($this->database_offset)
        ->take($this->database_limit)
        ->get();


        // Filtered Array
        $appointments = $appointments->toArray();

        if(count($appointments) == 0){
            session()->flash('no_more_appointments', 'No More Appointments Found');
        }

        //Merging Both Arrays
        $this->all_appointments = array_merge($this->all_appointments, $appointments);


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


    public function markAsFulfilled($id){


        $update = \App\Models\booked_patient_details::find($id);
        $update->appointment_status = 'Fulfilled';
        $update->save();

        // session()->flash('appointment_unfulfilled', 'Appointment Has Been Marked Unfulfilled');
        $this->appointment_fulfilled_selected_id[]=$id;

        $this->appointment_fulfilled_notification="Appointment Has Been Marked Fulfilled";

    }

    public function restoreAppointment($id){

        $update = \App\Models\booked_patient_details::find($id);
        $update->appointment_status = null;
        $update->save();

        // session()->flash('appointment_fulfilled', 'Appointment Has Been Marked Fulfilled');
        $this->appointment_restored_selected_id[]=$id;

        $this->appointment_restored_notification="Appointment Has Been Restored";
    }

    public function clear_appointment_fulfilled(){

        // session()->flash('appointment_unfulfilled', "Close");

        $this->appointment_fulfilled_notification=null;



    }

    public function clear_appointment_restored(){

        // session()->flash('appointment_fulfilled', null);

        $this->appointment_restored_notification=null;



    }


    public function render()
    {
        return view('livewire.admin-unfulfilled-appointments');
    }
}
