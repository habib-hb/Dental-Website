<?php

namespace App\Livewire;

use App\Models\available_schedules;
use App\Models\booked_appointments;
use DateTime;
use Livewire\Component;

use Livewire\WithPagination;

class AdminUnsettledAppointments extends Component
{

    use WithPagination;

    public $all_appointments = [];

    public $database_offset = 0;

    public $database_limit = 10;


    // Processing
    public $datesArray;

    public $timesArray=[];

    public $bookedTimesArray=[];

    public $parameter;

    public $select_date_string;

    public $theme_mode;

    public $clicked_date;

    public $clicked_time;




    //System Variables
    public $appointment_unfulfilled_selected_id = [];

    public $appointment_unfulfilled_notification = null;

    public $appointment_restored_selected_id = [];

    public $appointment_restored_notification = null;

    public $currently_activated_panel_id;




    public function mount(){

        $appointments = \App\Models\booked_patient_details::where('appointment_status' , 'Unsettled')->orderBy('appointment_date', 'desc')
        ->skip($this->database_offset)
        ->take($this->database_limit)
        ->get();


        // Filtered Array
        $appointments = $appointments->toArray();


        //Merging Both Arrays
        $this->all_appointments = array_merge($this->all_appointments, $appointments);



         // Increase the offset for the next load
         $this->database_offset += $this->database_limit;





        //  Dates And Time Processing
        $datesArray = [];
        $today = new DateTime();

        while(true){

            if(strtoupper($today->format('D')) !== 'FRI' && strtoupper($today->format('D')) !== 'SAT'){

            $dateInfo = [
                'day' => $today->format('d'),
                'day_name_abbr' => strtoupper($today->format('D')),
                'month' => $today->format('m'),
                'year' => $today->format('Y'),
                'month_name' => $today->format('F'),
                'identifier' => $today->format('Y-m-d'),
            ];

            $datesArray[] = $dateInfo;

        }

            if(count($datesArray) === 10){

                break;

            }

            // Move to the next day
            $today->modify('+1 day');
        }

        $this->datesArray = $datesArray;


        // Setting the title Month and Year
        $first_date_month_year = $datesArray[0]['month_name'] . " " . $datesArray[0]['year'];
        $last_date_month_year = $datesArray[count($datesArray) - 1]['month_name'] . " " . $datesArray[count($datesArray) - 1]['year'];

        if($first_date_month_year == $last_date_month_year){

            $this->select_date_string = $first_date_month_year;

        }else{

            $this->select_date_string = $first_date_month_year . " - " . $last_date_month_year;
        }



        //Getting the available times from database
        $times_data = available_schedules::where('type' , 'general')->get();
        $times_array = json_decode($times_data[0]->schedules, true);

        $this->timesArray = $times_array;

    }






    public function selectedDate($date){

        $this->clicked_date = $date;

        // Processing the available times
        $the_booked_date= booked_appointments::where('date' , $this->clicked_date)->get();

        if(count($the_booked_date) > 0){

            $decoded_appointments = json_decode($the_booked_date[0]->appointments, true);

            // Booked Time Excludced Array
            $this->bookedTimesArray = $decoded_appointments;

            if(count($this->bookedTimesArray) == count($this->timesArray)){
                session()->flash('message', 'All times are booked. Please select another date.');
            }
        }else{

            $this->bookedTimesArray = [];

        }

    }



    public function selectedTime($time){

        $this->clicked_time = $time;

    }




    public function loadMore(){

        $appointments = \App\Models\booked_patient_details::where('appointment_status' , 'Unsettled')->orderBy('appointment_date', 'desc')
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

    public function currently_activated_panel($id){

                // $update = \App\Models\booked_patient_details::find($id);
                // $update->appointment_status = null;
                // $update->save();

                // // session()->flash('appointment_fulfilled', 'Appointment Has Been Marked Fulfilled');
                // $this->appointment_restored_selected_id[]=$id;

                // $this->appointment_restored_notification="Appointment Has Been Restored";

        $this->currently_activated_panel_id=$id;

        $this->clicked_date = null;

        $this->clicked_time= null;



    }

    public function clear_appointment_unfulfilled(){

        // session()->flash('appointment_unfulfilled', "Close");

        $this->appointment_unfulfilled_notification=null;



    }

    public function clear_appointment_restored(){

        // session()->flash('appointment_fulfilled', null);

        $this->appointment_restored_notification=null;



    }


    public function render()
    {
        return view('livewire.admin-unsettled-appointments');
    }
}
