<?php

namespace App\Livewire;

use App\Models\available_schedules;
use App\Models\booked_appointments;
use App\Models\booked_patient_details;
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

    public $date_not_selected_notification;

    public $time_not_selected_notification;


    //System Variables
    public $appointment_settled_selected_id = [];

    public $appointment_settled_notification = null;

    public $appointment_deletable_id;

    public $appointment_deletable_identification_date;

    public $appointment_deletable_identification_time;

    public $appointment_deleted_selected_id = [];

    public $appointment_deleted_notification = null;

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


    // public function markAsUnfulfilled($id){


    //     $update = \App\Models\booked_patient_details::find($id);
    //     $update->appointment_status = 'Unfulfilled';
    //     $update->save();

    //     // session()->flash('appointment_unfulfilled', 'Appointment Has Been Marked Unfulfilled');
    //     $this->appointment_unfulfilled_selected_id[]=$id;

    //     $this->appointment_unfulfilled_notification="Appointment Has Been Marked Unfulfilled";

    // }

    public function currently_activated_panel($id){

                // $update = \App\Models\booked_patient_details::find($id);
                // $update->appointment_status = null;
                // $update->save();

                // // session()->flash('appointment_fulfilled', 'Appointment Has Been Marked Fulfilled');
                // $this->appointment_restored_selected_id[]=$id;

                // $this->appointment_restored_notification="Appointment Has Been Restored";

        //Closing the window if already opened
        if($this->currently_activated_panel_id == $id){
            $this->currently_activated_panel_id=null;
            return;
        }


        $this->currently_activated_panel_id=$id;

        $this->clicked_date = null;

        $this->clicked_time= null;



    }

    public function clear_appointment_settled_notification(){

        // session()->flash('appointment_unfulfilled', "Close");

        $this->appointment_settled_notification=null;



    }

    // public function clear_appointment_restored(){

    //     // session()->flash('appointment_fulfilled', null);

    //     $this->appointment_restored_notification=null;



    // }


    public function clear_date_not_selected_notification(){

        // session()->flash('appointment_fulfilled', null);

        $this->date_not_selected_notification=null;



    }

    public function clear_time_not_selected_notification(){

        // session()->flash('appointment_fulfilled', null);

        $this->time_not_selected_notification=null;



    }


    public function delete_appointment($id , $date , $time){

        // This deletion will be done once the user confirms
        $this->appointment_deletable_id = $id;

        $this->appointment_deletable_identification_date= $date;

        $this->appointment_deletable_identification_time= $time;

        //To close the Settle Panel If it's open
        $this->currently_activated_panel_id= null;


    }


    public function delete_confirmed(){

         // "booked_appointments" Table Management
         $appointments_on_the_specific_date=booked_appointments::where('date' , $this->appointment_deletable_identification_date)->get();

         if(count($appointments_on_the_specific_date) > 0){

             $decoded_appointments = json_decode($appointments_on_the_specific_date[0]->appointments, true);

             // Removing $this->clicked_time from the $decoded_appointments array
             $updated_decoded_appointments = array_filter($decoded_appointments, function($appointment) {
                return $appointment !== $this->appointment_deletable_identification_time;
            });

            // Re-indexing the array to ensure it's sequentially indexed if needed
             $updated_decoded_appointments = array_values($updated_decoded_appointments);

             $updated_encoded_appointments = json_encode($updated_decoded_appointments);

             $appointments_on_the_specific_date[0]->update(['appointments' => $updated_encoded_appointments]);

         }else{

             dd("Error");

         }

        $delete = booked_patient_details::find($this->appointment_deletable_id);
        $delete->delete();

        $this->appointment_deleted_selected_id[] = $this->appointment_deletable_id;

        $this->appointment_deleted_notification="Appointment Has Been Deleted";

        $this->appointment_deletable_id = null;

        $this->appointment_deletable_identification_date = null;

        $this->appointment_deletable_identification_time = null;

        //To close the Settle Panel If it's open
        $this->currently_activated_panel_id= null;

    }


    public function clear_appointment_deletable_id(){

        $this->appointment_deletable_id = null;

    }


    public function clear_appointment_deleted_notification(){

        $this->appointment_deleted_notification=null;

    }



    public function timeBookedAlert($time){

        session()->flash('message', 'Schedule for ' . $time . ' is already booked. Please select another time.');

    }

    public function clear_message(){

        session()->flash('message', null);
        
    }



    public function settleSubmit(){

        if($this->currently_activated_panel_id != null && $this->clicked_date != null && $this->clicked_time != null){

             // "booked_appointments" Table Management
             $appointments_on_the_specific_date=booked_appointments::where('date' , $this->clicked_date)->get();

             if(count($appointments_on_the_specific_date) > 0){

                 $decoded_appointments = json_decode($appointments_on_the_specific_date[0]->appointments, true);

                 $updated_decoded_appointments = array_merge($decoded_appointments, [$this->clicked_time]);
                 $updated_encoded_appointments = json_encode($updated_decoded_appointments);
                 $appointments_on_the_specific_date[0]->update(['appointments' => $updated_encoded_appointments]);

             }else{

                 $appointments_on_the_specific_date = new booked_appointments();
                 $appointments_on_the_specific_date->date = $this->clicked_date;
                 $appointments_on_the_specific_date->appointments = json_encode([$this->clicked_time]);
                 $appointments_on_the_specific_date->save();

             }


            // Updating Patient Details Table
            booked_patient_details::where('booked_patient_id', $this->currently_activated_panel_id)->update(['appointment_date' => $this->clicked_date, 'appointment_time' => $this->clicked_time, 'appointment_status' => null]);

            $this->appointment_settled_selected_id[] = $this->currently_activated_panel_id;

            $this->appointment_settled_notification="Appointment Has Been Settled";



        }elseif($this->currently_activated_panel_id == null){

            dd("ID is null");

        }elseif($this->clicked_date == null){

            $this->date_not_selected_notification="Please Select A Date";

        }elseif($this->clicked_time == null){

            $this->time_not_selected_notification="Please Select A Time";

        }

    }


    public function render()
    {
        return view('livewire.admin-unsettled-appointments');
    }
}
