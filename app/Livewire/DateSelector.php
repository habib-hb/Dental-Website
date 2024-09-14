<?php

namespace App\Livewire;

use App\Models\available_schedules;
use DateTime;
use Livewire\Component;

class DateSelector extends Component
{

    public $datesArray;

    public $timesArray;

    public $parameter;

    public $select_date_string;

    public $theme_mode;

    public $clicked_date;

    public $clicked_time;

    public $clicked_gender;




    public function mount($parameter = null){


            // Theme Mode Stuff

            if(!session('theme_mode')) {

                $this->theme_mode = 'light';

                session(['theme_mode' => $this->theme_mode]);

            }else{

                $this->theme_mode = session('theme_mode');

            }

            //End Theme Mode Stuff


            $this->parameter = $parameter;




            // Raff
            //
            //Possible JSON -- ['8:10 -> 9:00 AM' , '9:10 -> 10:00 AM' ,  '9:10 -> 10:00 AM', '9:10 -> 10:00 AM', '9:10 -> 10:00 AM', '9:10 -> 10:00 AM', '9:10 -> 10:00 AM', '9:10 -> 10:00 AM']
            //
            //
            //
            //Date Specific Saveable (Active)-- ['8:10 -> 9:00 AM', '9:10 -> 10:00 AM']
            //
            //End Raff


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

    }

    public function selectedTime($time){

        $this->clicked_time = $time;

    }

    public function selectedGender($gender){

        $this->clicked_gender = $gender;
        
    }


    public function render()
    {
        return view('livewire.date-selector');
    }
}
