<?php

namespace App\Livewire;

use DateTime;
use Livewire\Component;

class DateSelector extends Component
{

    public $datesArray;
    public $timesArray;


    public function mount(){


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

            for ($i = 0; $i < 10; $i++) {
                $dateInfo = [
                    'day' => $today->format('d'),
                    'month' => $today->format('m'),
                    'year' => $today->format('Y'),
                    'month_name' => $today->format('F'),
                ];

                $datesArray[] = $dateInfo;

                // Move to the next day
                $today->modify('+1 day');
            }

            $this->datesArray = $datesArray;

    }


    public function render()
    {
        return view('livewire.date-selector');
    }
}
