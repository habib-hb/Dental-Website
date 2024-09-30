<?php

namespace App\Livewire;

use App\Models\available_schedules;
use App\Models\booked_appointments;
use App\Models\booked_patient_details;
use App\Models\holidays;
use DateTime;
use Livewire\Component;

class AdminSchedulesManagement extends Component
{

    public $start_time_hour;

    public $start_time_minute;

    public $end_time_hour;

    public $end_time_minute;

    public $am_or_pm;

    public $added_schedules = [];

    public $notification;

    public $added_weekly_holidays = [];



    // Operational
    public $weekly_holidays_option_selected;

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
        // dd($this->start_time_hour . $this->start_time_minute . $this->end_time_hour . $this->end_time_minute . $this->am_or_pm);


        // $this->added_schedules[] = $this->start_time_hour. "" . ;

        if(strlen($this->start_time_hour) == 1) {
            $this->start_time_hour = '0' . $this->start_time_hour;
        }


        if(strlen($this->start_time_minute) == 1) {
            $this->start_time_minute = '0' . $this->start_time_minute;
        }


        if(strlen($this->end_time_hour) == 1) {
            $this->end_time_hour = '0' . $this->end_time_hour;
        }


        if(strlen($this->end_time_minute) == 1) {
            $this->end_time_minute = '0' . $this->end_time_minute;
        }

        if($this->start_time_hour && $this->start_time_minute && $this->end_time_hour && $this->end_time_minute && $this->am_or_pm){

            $this->added_schedules[] = $this->start_time_hour. ":" . $this->start_time_minute . " - " . $this->end_time_hour. ":" . $this->end_time_minute . " " . $this->am_or_pm;

        }else{


            $this->notification = 'Please fill all the fields';

        }




    }



   public function saveScheduleList(){

    if(count($this->added_weekly_holidays) == 7){
        $this->notification = 'Please keep at least one working day';
        return;
    }

        // Creating New Schedule
        available_schedules::truncate();

        available_schedules::create([
            'type' => "general",
            'schedules' => json_encode($this->added_schedules)
        ]);


        // Formating the Date identifier for database query
        $datesArray = [];
        $today = new DateTime();

        $holidays_database_query=holidays::where('holidays_category', 'weekly')->get();

        // Checking if there is at least one result
        if ($holidays_database_query->isNotEmpty()) {

            // Decoding the 'holidays' field from the first row
            $holidays_get_holidays_field = json_decode($holidays_database_query[0]->holidays);

        } else {

            // Handling the case where no results are found
            $holidays_get_holidays_field = [];

        }

            while(true){

                // if(strtoupper($today->format('D')) !== 'FRI' && strtoupper($today->format('D')) !== 'SAT'){
                if(!in_array(strtoupper($today->format('D')), $holidays_get_holidays_field)){

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


       // Quering the database with the date keys
       foreach($datesArray as $date){

            // Find if there is an existing schedule
            booked_patient_details::where('appointment_date' , $date['identifier'])->update([
                    'appointment_status' => 'Unsettled',
                    'testing' => $date['identifier']

            ]);

            // Deleting The Existing Booked_Appointments Database
            $database_check= booked_appointments::where('date' , $date['identifier'])->get();

            if(count($database_check) > 0){
            booked_appointments::where('date' , $date['identifier'])->delete();
            }




       }

        // Updating The Holidays Database
        if($holidays_database_query->isNotEmpty()){

            holidays::where('holidays_category' , 'weekly')->update([
                'holidays' => json_encode($this->added_weekly_holidays)
            ]);

        }else{

            holidays::create([
                'holidays_category' => 'weekly',
                'holidays' => json_encode($this->added_weekly_holidays)
            ]);

        }

       $this->notification = 'Schedules Added Successfully';

       $this->added_schedules= [];


    }


    public function resetScheduleList(){

        $this->added_schedules = [];

        $this->added_weekly_holidays = [];

    }

    public function deleteLastListItem(){

        array_pop($this->added_schedules);

    }



    public function clear_notification(){

        $this->notification = null;

    }




    public function show_weekly_holidays_options(){

        if($this->weekly_holidays_option_selected){

          $this->weekly_holidays_option_selected = null;

        }else{

          $this->weekly_holidays_option_selected = true;

        }

    }

    public function add_weekly_holidays($day){

        if(in_array($day, $this->added_weekly_holidays)){

            // Finding the index of the element
            $key = array_search($day, $this->added_weekly_holidays);

            // Remove the element from the array
            if ($key !== false) {
                unset($this->added_weekly_holidays[$key]);
            }

        }else{

            $this->added_weekly_holidays[] = $day;
        }

    }


    public function render()
    {
        return view('livewire.admin-schedules-management');
    }
}
