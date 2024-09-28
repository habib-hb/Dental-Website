




<div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]'}}"  data-theme-mode="{{ session('theme_mode') }}" id="main_div">

    <nav class="flex justify-center items-center h-[82px] w-[96vw]  md:max-w-[1280px]  md:px-8 mx-auto mt-2 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <div class=" flex justify-center md:w-[20vw]">

        <img  src="{{session('theme_mode') == 'light' ? asset('images/the_logo_light_mode.png') : asset('images/the_logo_dark_mode.png')}}" class="ml-2 h-[64px] max-w-[45vw]" alt="">

        </div>



    </nav>



    <div wire:click="changeThemeMode" class="flex justify-center w-fit mx-auto mt-6 md:hover:scale-105 transition-all">

        <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] {{session('theme_mode') == 'light' ? '' : 'hidden'}}">

        <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] {{session('theme_mode') == 'light' ? 'hidden' : ''}}">

    </div>




    <main>

        <div class="flex flex-col justify-center items-center mt-8 max-w-[800px] mx-auto px-4 md:px-0">

            <h1 class="text-2xl font-semibold text-left md:text-center w-full {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Schedules Input Panel</h1>

            <p class="text-left md:text-center mt-2 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">After Adding All The Schedules, Click On The “Save” Button To Set The New Schedule List Live For Appointments. The New Schedule List Will Replace The Old Schedule List. All The Appointments Enlisted From The Old Schedule List Will Be Moved To "Unsettled Appointments" Panel. From There You Can Resettle The Appointments By Clicking The "Settle Appointment" Button And Selecting A New Schedule.</p>

        </div>





        {{-- Schedule List --}}
        <div class="flex flex-col justify-center items-center mt-8 max-w-[800px] mx-auto {{count($added_schedules) > 0 ? '' : 'hidden'}}">

            <h2 class="text-xl font-semibold mb-2 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Schedule List</h2>

            @foreach ($added_schedules as $key => $schedule)

            <p class="text-center py-2 px-8 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white'}}  mb-3 rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] ">{{$schedule}}</p>

            @endforeach

            {{-- <p class="text-center py-2 px-8 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white'}}  mb-3 rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]  cursor-pointer">11:10 - 12:00 AM</p>

            <p class="text-center py-2 px-8 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white'}}  mb-3 rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]  cursor-pointer">11:10 - 12:00 AM</p>

            <p class="text-center py-2 px-8 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white'}}  mb-3 rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]  cursor-pointer">11:10 - 12:00 AM</p> --}}

            {{-- <p class="text-sm {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">No new schedule added</p> --}}

            {{-- Save Button --}}
            <button class="bg-[#1A579F] text-white font-semibold py-2 px-8 mt-4 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110" wire:click="saveScheduleList">Save</button>

        </div>

        @if($notification == "Schedules Added Successfully")
            <p>{{$notification}}</p>
        @endif






        {{-- Add Schedules --}}
        <div class="flex flex-col justify-center items-center mt-16 max-w-[300px] mx-auto px-4 md:px-0">

            <h2 class="text-xl font-semibold mb-2 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Add Schedules</h2>

            {{-- Input Field Start Time --}}
            <div class="flex flex-col justify-center items-center w-full">

                <p class="font-medium {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Start Time</p>


                <div class="flex flex-row justify-center items-center gap-4 w-full">

                    <div class="flex flex-col justify-center items-center">

                        <p class="text-sm {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Hour</p>

                        <input wire:model="start_time_hour" type="number" max="12" min="1"  class="w-[50vw] md:max-w-[100px] py-2   {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] outline-none px-2" id="age">

                    </div>

                    <div class="flex flex-col justify-center items-center">

                        <p class="text-sm {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Minute</p>

                        <input wire:model="start_time_minute" type="number" max="59" min="0"  class="w-[50vw] md:max-w-[100px] py-2   {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] outline-none px-2" id="age">

                    </div>


                </div>

            </div>
            {{-- End Input Field Start Time --}}


            {{-- Input Field End Time --}}
            <div class="flex flex-col justify-center items-center w-full mt-4">

                <p class="font-medium {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">End Time</p>


                <div class="flex flex-row justify-center items-center gap-4 w-full">

                    <div class="flex flex-col justify-center items-center">

                        <p class="text-sm {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Hour</p>

                        <input wire:model="end_time_hour" type="number" max="12" min="1"  class="w-[50vw] md:max-w-[100px] py-2   {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] outline-none px-2" id="age">

                    </div>

                    <div class="flex flex-col justify-center items-center">

                        <p class="text-sm {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Minute</p>

                        <input wire:model="end_time_minute" type="number" max="59" min="0"  class="w-[50vw] md:max-w-[100px] py-2   {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] outline-none px-2" id="age">

                    </div>


                </div>

            </div>
            {{-- End Input Field End Time --}}



            {{-- AM/ PM Selection --}}

                <div class="flex flex-col justify-center items-center mt-4">

                    <p class="font-medium {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">AM / PM</p>

                    <div class="flex flex-row gap-4 mt-2">

                        <button wire:click="setAM" class="h-[35px] w-[100px] rounded-lg {{$am_or_pm == 'AM' ? 'bg-[#1A579F] text-white' : (session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white')}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">AM</button>

                        <button wire:click="setPM" class="h-[35px] w-[100px] rounded-lg {{$am_or_pm == 'PM' ? 'bg-[#1A579F] text-white' : (session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white')}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">PM</button>

                    </div>

                </div>

            {{-- End AM/ PM Selection --}}



            <button wire:click="addSchedule" class="bg-[#1A579F] text-white font-semibold py-2 px-8 mt-8 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110">Add Schedule</button>


            <p class="text-sm text-center mt-2 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Added Schedules Will Be Listed Above. Press The "Save" Button From There To Make The New Schedule List Live.</p>



        </div>








    </main>




 {{-- Footer Element --}}
 <div class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


    <img id='search_icon' src="{{session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png')}}" class="h-[44px]" alt="">

    <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">All Rights Reserved @2024</p>

    <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">@valueadderhabib</p>

</div>


</div>






