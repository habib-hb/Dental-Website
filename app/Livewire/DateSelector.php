<?php

namespace App\Livewire;

use DateTime;
use Livewire\Component;

class DateSelector extends Component
{

    public $datesArray;

    public $timesArray;

    public $parameter;

    public $theme_mode;

    public $clicked_date;


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


            $timesArray = [];

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

    }


    public function selectedDate($date){

        $this->clicked_date = $date;

    }


    public function render()
    {
        return view('livewire.date-selector');
    }
}
