

<div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]'}}">

    <nav class="flex justify-center  items-center h-[82px] w-[96vw]  md:max-w-[1280px]  md:px-8 mx-auto mt-2 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <div class=" flex justify-center items-center md:w-[20vw]">

            <img  src="{{asset('images/the_logo_light_mode.png')}}" class="ml-2 h-[64px] max-w-[45vw] {{session('theme_mode') == 'light' ? '' : 'hidden'}} cursor-pointer" onclick="window.location.href='/'" alt="">

            <img  src="{{asset('images/the_logo_dark_mode.png')}}" class="ml-2 h-[64px] max-w-[45vw] {{session('theme_mode') == 'light' ? 'hidden' : ''}} cursor-pointer" onclick="window.location.href='/'"  alt="">

        </div>

        {{-- <div id="input_div" class="relative">

            <img id='search_icon' src="{{session('theme_mode') == 'light' ? asset('images/search_light_mode.gif') : asset('images/search_dark_mode.gif')}}" class="absolute top-1/2 left-2 -translate-y-1/2 h-[80%] mt-1" alt="">

            <span id='search_text' class="absolute top-1/2 left-10 -translate-y-1/2 h-[80%] mt-1 {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#EFF9FF]'}}">Search</span>

            <input id='search_input' type="text" class="mr-2 h-[36px] w-[50vw] md:w-[30vw] rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#EFF9FF] text-[#070707]' : 'bg-[#070707] text-[#EFF9FF]' }}  shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] px-4 focus: outline-none border-none ">



        </div> --}}




    </nav>

            {{-- <div wire:click="changeThemeMode" class="flex justify-center">

                <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] mt-4 {{session('theme_mode') == 'light' ? '' : 'hidden'}}">

                <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] mt-4 {{session('theme_mode') == 'light' ? 'hidden' : ''}}">

            </div> --}}

    <div wire:click="changeThemeMode" class="flex justify-center w-fit mx-auto mt-6 md:hover:scale-105 transition-all cursor-pointer">

        <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] {{session('theme_mode') == 'light' ? '' : 'hidden'}}">

        <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] {{session('theme_mode') == 'light' ? 'hidden' : ''}}">

    </div>


     <!-- Show a loading spinner while Doing Date Processing -->

         <!-- Show a loading spinner while Doing Theme Change Processing -->
         <div wire:loading wire:target="changeThemeMode" class="text-center fixed top-24 w-[90%] max-w-[400px]   bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">

            <div class="flex flex-row justify-center items-center px-2 gap-2">
                <img src="{{asset('images/loading.png')}}" class="h-[24px] rounded-full animate-spin" alt="">

                <span class=" text-white py-2 rounded-lg"> Processing Theme Change...</span>
            </div>


        </div>

        <div wire:loading wire:target="loadMore" class="text-center fixed top-24 w-[90%] max-w-[400px]  bg-[#1A579F] rounded-lg left-1/2 translate-x-[-50%] z-10">
            <div class="flex flex-row justify-center items-center px-2 gap-2">

                <img src="{{asset('images/loading.png')}}" class="h-[24px] rounded-full animate-spin" alt="">

                <span class=" text-white py-2 rounded-lg"> Loading More Date...</span>

            </div>
        </div>



            {{-- Messages --}}
            @if (session()->has('no_more_appointments'))

            <div class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
                <div class="flex flex-row justify-between items-center px-8">


                    <p class="text-white text-left">{{session('no_more_appointments')}}</p>

                </div>

                <button wire:click="clear_no_more_appointments" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110">Close</button>

            </div>

            @endif



            {{-- @if (session()->has('appointment_unfulfilled') && session('appointment_unfulfilled') != 'Close') --}}
            @if ($appointment_unfulfilled_notification)

            <div id="appointment_unfulfilled" class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-red-800 py-4 rounded-lg z-10">
                <div class="flex flex-col justify-between items-center px-8">

                    <p class="text-white text-3xl font-semibold">Unfulfilled</p>

                    {{-- <p class="text-white text-left">{{session('appointment_unfulfilled')}}</p> --}}
                    <p class="text-white text-center">{{$appointment_unfulfilled_notification}}</p>

                </div>

                {{-- <button onclick="document.getElementById('appointment_unfulfilled').remove()" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button> --}}

                <button wire:click="clear_appointment_unfulfilled" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>



            </div>

            @endif



            {{-- @if (session()->has('appointment_fulfilled')) --}}

            @if ($appointment_fulfilled_notification)

            <div id="appointment_fulfilled" class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
                <div class="flex flex-col justify-between items-center px-8">

                    <p class="text-white text-3xl font-semibold">Fulfilled</p>

                    {{-- <p class="text-white text-left">{{session('appointment_fulfilled')}}</p> --}}
                    <p class="text-white text-center">{{$appointment_fulfilled_notification}}</p>

                </div>

                {{-- <button onclick="document.getElementById('appointment_fulfilled').remove()" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button> --}}

                <button wire:click="clear_appointment_fulfilled" class="text-white border-2 border-white px-4 rounded-lg mt-2 hover:scale-110 transition-all">Close</button>

            </div>

            @endif








    <h1 class="text-2xl font-semibold text-center mt-4 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Appointments</h1>

    {{--Appointment Data --}}
    <div class="mt-4 flex flex-col gap-4">

        @foreach ($all_appointments as $appointment)

        <div class="flex flex-col justify-center  items-center w-[96vw] md:max-w-[800px]  md:p-8 px-4 py-8  mx-auto mt-2 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] {{(in_array($appointment['booked_patient_id'], $appointment_unfulfilled_selected_id) || in_array($appointment['booked_patient_id'], $appointment_fulfilled_selected_id)) ? 'hidden' : ''}}">

            <h2 class="flex flex-row text-3xl {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">{{$appointment['appointment_time']}}</h2>
            <p class="  flex flex-row text-lg {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}"> {{ \Carbon\Carbon::parse($appointment['appointment_date'])->format('jS F, Y') }}</p>

            <p class="flex flex-row text-2xl font-semibold py-4 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">{{$appointment['service_name'] ? $appointment['service_name'] : 'Not Entered'}}</p>

            <p class=" flex flex-row text-xl font-semibold mb-2  {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Patient Details</p>

            <p class=" flex flex-row  {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}"><b>Name: </b>{{$appointment['name']}}</p>

            <p class=" flex flex-row  {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}"><b>Age: </b>{{$appointment['age']}}</p>

            <p class=" flex flex-row  {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}"><b>Gender: </b>{{$appointment['gender']}}</p>

            <p class=" flex flex-row  {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}"><b>Phone: </b>{{$appointment['contact_number']}}</p>

            <p class=" flex flex-row  {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}"><b>Problem: </b>{{$appointment['written_problem']}}</p>

            <p class=" flex flex-row  {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}} mt-4 text-lg"><b>Estimated Fee: </b>{{$appointment['estimated_price'] ? $appointment['estimated_price'] : 'Not Available'}}</p>


                <div class="flex flex-col md:flex-row justify-center gap-4 mt-4">
                    <button wire:click="markAsUnfulfilled({{$appointment['booked_patient_id']}})" class="px-4 py-2 w-[200px] bg-red-800 text-white rounded-lg hover:scale-110 transition-all  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Mark As Unfulfilled</button>
                    <button wire:click="markAsFulfilled({{$appointment['booked_patient_id']}})" class="px-4 py-2 w-[200px] bg-[#1A579F] text-white rounded-lg hover:scale-110 transition-all  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Mark As Fulfilled</button>
                </div>






    </div>

        @endforeach




        {{-- If No Appointment Data --}}
        @if(count($all_appointments) == 0)
            <div class="flex flex-col items-center h-[100vh]">

                <p class="mt-16 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">No Appointments Found</p>

            </div>
        @endif


    </div>





    {{-- Bottom Buttons --}}
    <div class="flex justify-center mt-8">
         <button wire:click="loadMore" class="px-8 py-2 bg-[#1A579F] text-white rounded-lg hover:scale-110
 transition-all  {{count($all_appointments) == 0 ? 'hidden' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">Load More...</button>
    </div>



    <div class="flex flex-col md:flex-row justify-center items-center gap-4 md:gap-8 mt-16">
        <button class="px-4 w-[260px] py-2 bg-[#1A579F] text-white rounded-lg hover:scale-110
        transition-all {{count($all_appointments) == 0 ? 'hidden' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" onclick="window.location.href='{{env('BASE_LINK')}}/admin_dashboard/appointments/fulfilled_appointments'">Fulfilled Appointments<img src="{{asset('images/external_link_dark_mode.png')}}" class="inline -mt-1" alt=""/></button>

        <button class="px-4 w-[260px]  py-2 bg-red-800 text-white rounded-lg hover:scale-110 transition-all  {{count($all_appointments) == 0 ? 'hidden' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" onclick="window.location.href='{{env('BASE_LINK')}}/admin_dashboard/appointments/unfulfilled_appointments'">Unfulfilled Appointments<img src="{{asset('images/external_link_dark_mode.png')}}" class="inline -mt-1" alt=""/></button>

        <button class="px-4 w-[260px]  py-2 bg-[#494c50] text-white rounded-lg hover:scale-110
        transition-all {{count($all_appointments) == 0 ? 'hidden' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" onclick="window.location.href='{{env('BASE_LINK')}}/admin_dashboard/appointments/unsettled_appointments'">Unsettled Appointments<img src="{{asset('images/external_link_dark_mode.png')}}" class="inline -mt-1" alt=""/></button>
    </div>







      {{-- Footer Element --}}
      <div class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-16 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


        <img id='search_icon' src="{{session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png')}}" class="h-[44px] cursor-pointer"  onclick="window.location.href='/'"   alt="">

        <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">All Rights Reserved @2024</p>

        <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">@valueadderhabib</p>

    </div>





</div>







