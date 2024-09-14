<div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{$theme_mode == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]'}}">

    {{-- All The Looading Notifications --}}

        <!-- Show a loading spinner while Doing Date Processing -->
        <div wire:loading wire:target="selectedDate" class="text-center fixed top-24 w-[100%]">
            <span class=" bg-[#1A579F] text-white px-8 py-2 rounded-lg">Processing Date...</span>
        </div>

        <!-- Show a loading spinner while Doing Time Processing -->
          <div wire:loading wire:target="selectedTime" class="text-center fixed top-24 w-[100%]">
            <span class=" bg-[#1A579F] text-white px-8 py-2 rounded-lg">Processing Time...</span>
        </div>

        <!-- Show a loading spinner while Doing Gender Selection Processing -->
        <div wire:loading wire:target="selectedGender" class="text-center fixed top-24 w-[100%]">
            <span class=" bg-[#1A579F] text-white px-8 py-2 rounded-lg">Processing Gender Details...</span>
        </div>

    {{--End All The Looading Notifications --}}

   <h2 class="text-2xl text-center mt-2 bg-[#1A579F] text-white w-2/3 mx-auto py-2 px-4 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">New Appointment</h2>

   <div class="flex flex-col justify-center items-center mt-2 p-2">

        <div class="flex flex-row justify-start w-[100%]">
              <p class="text-xl">Select Date : {{$select_date_string}}</p>
        </div>




        {{-- Dates Cards --}}
        <div class="flex flex-row flex-wrap gap-2 justify-center w-[100%] mt-2">


            @foreach ($datesArray as $dates)

                <div wire:click="selectedDate('{{$dates['identifier']}}')" class="flex flex-col justify-center items-center h-[90px] w-[18%] {{$clicked_date == $dates['identifier'] ? 'bg-[#1A579F]' : 'bg-[#deeaf8]'}}  rounded-lg">

                    <p class="text-3xl {{$clicked_date == $dates['identifier'] ? 'text-white' : 'text-[#6B779A]'}}">{{$dates['day']}}</p>
                    <p class="text-sm {{$clicked_date == $dates['identifier'] ? 'text-white' : 'text-[#6B779A]'}}">{{$dates['day_name_abbr']}}</p>

                </div>

            @endforeach



        </div>

        {{-- Times Section --}}

        <div class="mt-8 {{$clicked_date == '' ? 'hidden' : ''}}">


            <h2 class="text-2xl text-center my-2 ">Available Times</h2>
            <div>

                @foreach ($timesArray as $time)
                    <p  wire:click="selectedTime('{{$time}}')" class="text-center p-2 {{$clicked_time == $time ? 'bg-[#1A579F] text-white' : 'bg-[#deeaf8] text-[#484d5f]'}}  mb-2 rounded-lg">{{$time}}</p>
                @endforeach

            </div>

        </div>


        {{-- Patient Details Section --}}
        <div class="flex flex-col w-full  mt-8">

            <div class="flex flex-row justify-start w-[100%]">
                <p class="text-xl">Patient Details</p>
            </div>

            <div class="flex flex-col mt-2">

                <label for="name" class="opacity-80">Full Name</label>

                <input type="text" class="w-[96vw] py-2 bg-[#deeaf8] rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] outline-none px-2" id="name">

             </div>



             <div class="flex flex-col mt-2">

                <label for="age" class="opacity-80">Age</label>

                <input type="number"  class="w-[50vw] py-2 bg-[#deeaf8] rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] outline-none px-2" id="age">

             </div>



             <div class="flex flex-col mt-2">

                <label for="age" class="opacity-80">Gender</label>

                <div class="flex flex-row gap-4 mt-2">

                    <button wire:click="selectedGender('male')" class="h-[35px] w-[100px] rounded-lg {{$clicked_gender == 'male' ? 'bg-[#1A579F] text-white' : 'bg-[#deeaf8] text-[#484d5f]'}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Male</button>

                    <button wire:click="selectedGender('female')" class="h-[35px] w-[100px] rounded-lg {{$clicked_gender == 'female' ? 'bg-[#1A579F] text-white' : 'bg-[#deeaf8] text-[#484d5f]'}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Female</button>

                </div>

             </div>



             <div class="flex flex-col mt-2">

                <label for="age" class="opacity-80">Contact Number</label>

                <input type="number"  class="w-[96vw] py-2 bg-[#deeaf8] rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] outline-none px-2" id="age">

             </div>


             <div class="flex flex-col mt-2">

                <label for="name" class="opacity-80">Write Your Problem</label>

                <textarea type="text" class="w-[96vw] py-2 bg-[#deeaf8] rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] outline-none px-2" id="name" rows="4" ></textarea>

             </div>


             {{-- Book Appointment Button --}}
            <button class="mt-4 px-8 py-2 w-[90vw] md:max-w-[300px] mx-auto rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all ">Book Appointment</button>


         </div>


   </div>

</div>
