<?php

namespace App\Livewire;

use App\Models\booked_patient_details;
use Livewire\Attributes\On;
use Livewire\Component;

use Livewire\WithPagination;

class AdminAppointments extends Component
{

    use WithPagination;

    public $all_appointments = [];

    public $database_offset = 0;

    public $database_limit = 10;

    public $selected_services = [];

    public $name_filter;

    public $min_age_filter;

    public $max_age_filter;

    public $gender_filter;

    public $filter_phone;

    public $min_estimated_filter;

    public $max_estimated_filter;


    //System Variables
    public $appointment_unfulfilled_selected_id = [];

    public $appointment_unfulfilled_notification = null;

    public $appointment_fulfilled_selected_id = [];

    public $appointment_fulfilled_notification = null;

    public $dispatching = false;


    // testing
    public $filtered = false;
    // end testing


    // Filter Options
    public $filter_start_date;
    public $filter_end_date;


    //The All Encompassing Variable and Operational Variables
    public $filtered_appointments;

    public $filter_is_on;







    public function mount(){

        $appointments = \App\Models\booked_patient_details::whereNull('appointment_status')->orderBy('appointment_date', 'desc')
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

        $appointments = \App\Models\booked_patient_details::whereNull('appointment_status')->orderBy('appointment_date', 'desc')
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


    public function markAsUnfulfilled($id){


        $update = \App\Models\booked_patient_details::find($id);
        $update->appointment_status = 'Unfulfilled';
        $update->save();

        // session()->flash('appointment_unfulfilled', 'Appointment Has Been Marked Unfulfilled');
        $this->appointment_unfulfilled_selected_id[]=$id;

        $this->appointment_unfulfilled_notification="Appointment Has Been Marked Unfulfilled";

    }

    public function markAsFulfilled($id){

        $update = \App\Models\booked_patient_details::find($id);
        $update->appointment_status = 'Fulfilled';
        $update->save();

        // session()->flash('appointment_fulfilled', 'Appointment Has Been Marked Fulfilled');
        $this->appointment_fulfilled_selected_id[]=$id;

        $this->appointment_fulfilled_notification="Appointment Has Been Marked Fulfilled";
    }

    public function clear_appointment_unfulfilled(){

        // session()->flash('appointment_unfulfilled', "Close");

        $this->appointment_unfulfilled_notification=null;



    }

    public function clear_appointment_fulfilled(){

        // session()->flash('appointment_fulfilled', null);

        $this->appointment_fulfilled_notification=null;



    }




    #[On('save_data')]
    public function save_data($start_date = null , $end_date = null, $selected_services = []){

        $filter_data_on = false;

        $this->filter_start_date = $start_date;

        $this->filter_end_date = $end_date;

        // dd($this->filter_start_date . " " . $this->filter_end_date);

        // $decoded_selected_services = json_decode($selected_services, true);

        $this->selected_services = $selected_services;

        // dd($this->selected_services);
        // dd($this->name_filter);
        // dd($this->min_age_filter . " " . $this->max_age_filter);
        // dd($this->min_estimated_filter . " " . $this->max_estimated_filter);
        // dd($this->gender_filter);
        // dd($this->filter_phone);


        // Query Database
        $this->filtered_appointments = booked_patient_details::query();

        // $this->filtered_appointments->where('appointment_status', null);

        if(!$this->filter_start_date == null && !$this->filter_end_date == null){

            $this->filtered_appointments->whereBetween('appointment_date', [$this->filter_start_date, $this->filter_end_date]);

            $filter_data_on = true;

        }

        if(!$this->selected_services == []){

            $this->filtered_appointments->whereIn('service_name', $this->selected_services);

            $filter_data_on = true;


        }


        if(!$this->name_filter == null){

            $this->filtered_appointments->where('name', 'like', '%' . $this->name_filter . '%');

            $filter_data_on = true;


        }


        if(!$this->min_age_filter == null && !$this->max_age_filter == null){

            $this->filtered_appointments->whereBetween('age', [$this->min_age_filter, $this->max_age_filter]);

            $filter_data_on = true;


        }


        if(!$this->gender_filter == null){

            $this->filtered_appointments->where('gender', $this->gender_filter);

            $filter_data_on = true;


        }


        if(!$this->filter_phone == null){

            $this->filtered_appointments->where('contact_number', 'like', '%' . $this->filter_phone . '%');

            $filter_data_on = true;


        }


        if(!$this->min_estimated_filter == null && !$this->max_estimated_filter == null){

            $this->filtered_appointments->whereBetween('estimated_price', [$this->min_estimated_filter, $this->max_estimated_filter]);

            $filter_data_on = true;


        }

        if($filter_data_on){

        $toArray = $this->filtered_appointments->get()->toArray();

        dd($toArray);

        }else{

            dd('Nothing Has Been Set To Be Filtered');
            
        }



    }


    #[On('clear_data')]
    public function clear_data(){

        $this->filter_start_date = null;
        $this->filter_end_date = null;
        $this->selected_services = [];

        $this->name_filter = null;
        $this->min_age_filter = null;
        $this->max_age_filter = null;
        $this->gender_filter = null;
        $this->filter_phone = null;
        $this->min_estimated_filter = null;
        $this->max_estimated_filter = null;


    }


    public function selectedGender($gender){

        if($this->gender_filter == $gender){

            $this->gender_filter = null;

        }else{

            $this->gender_filter = $gender;

        }


    }





    public function render()
    {
        return view('livewire.admin-appointments');
    }
}
