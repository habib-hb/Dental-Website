<div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{$theme_mode == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]'}}">
    {{-- In work, do what you enjoy. --}}

   <p class="text-2xl text-center mt-2">New Appointment</p>

   <div class="flex flex-col justify-center items-center mt-2 p-2">

        <div class="flex flex-row justify-start w-[100%]">
              <p class="text-xl">July, 2020</p>
        </div>


            <!-- Show a loading spinner while Doing Date Processing -->
            <div wire:loading wire:target="selectedDate" class="text-center absolute top-4 w-[100%]">
                <span class=" bg-[#1A579F] text-white px-8 py-2 rounded-lg">Processing...</span>
            </div>

        {{-- Dates Cards --}}
        <div class="flex flex-row flex-wrap gap-2 justify-center w-[100%] mt-2">


            @foreach ($datesArray as $dates)

                <div wire:click="selectedDate('{{$dates['identifier']}}')" class="flex flex-col justify-center items-center h-[90px] w-[18%] {{$clicked_date == $dates['identifier'] ? 'bg-[#1A579F]' : 'bg-[#deeaf8]'}}  rounded-lg">

                    <p class="text-3xl {{$clicked_date == $dates['identifier'] ? 'text-white' : 'text-[#6B779A]'}}">{{$dates['day']}}</p>
                    <p class="text-sm {{$clicked_date == $dates['identifier'] ? 'text-white' : 'text-[#6B779A]'}}">{{$dates['day_name_abbr']}}</p>

                </div>

            @endforeach

                    {{-- Active Card Style Details --}}
                    {{-- <div class="flex flex-col justify-center items-center h-[90px] w-[18%] bg-[#1A579F] rounded-lg">

                        <p class="text-3xl text-white">13</p>
                        <p class="text-sm text-white">MON</p>

                    </div> --}}


        </div>



   </div>

</div>
