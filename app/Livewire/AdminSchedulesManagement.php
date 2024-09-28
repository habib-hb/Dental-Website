<?php

namespace App\Livewire;

use App\Models\available_schedules;
use App\Models\booked_patient_details;
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

        $this->added_schedules[] = $this->start_time_hour. ":" . $this->start_time_minute . " - " . $this->end_time_hour. ":" . $this->end_time_minute . " " . $this->am_or_pm;



    }



   public function saveScheduleList(){

        // Creating New Schedule
        available_schedules::create([
            'type' => "Testing",
            'schedules' => json_encode($this->added_schedules)
        ]);


        // Formating the Date identifier for database query
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


       // Quering the database with the date keys
       foreach($datesArray as $date){

            // Find if there is an existing schedule
            booked_patient_details::where('appointment_date' , $date['identifier'])->update([
                    'testing' => $date['identifier']
            ]);
       }

       $this->notification = 'Schedules Added Successfully';


    }


    public function render()
    {
        return view('livewire.admin-schedules-management');
    }
}
