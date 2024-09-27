




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

            <h1 class="text-xl font-semibold text-left md:text-center w-full {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Schedules Input Panel</h1>

            <p class="text-left md:text-center mt-2 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">After Adding The Schedules, Click On The “Save” Button On Set The New Schedule List For Appointments. The New Schedule List Will Replace The Old Schedule List. All The Appointments Enlisted From The Old Schedule List Will Be Moved To "Unsettled Appointments" Panel. From There You Can Resettle The Appointments By Clicking The "Settle Appointment" Button And Selecting A New Schedule.</p>

        </div>





        {{-- Schedule List --}}
        <div class="flex flex-col justify-center items-center mt-8 max-w-[800px] mx-auto">

            <h2 class="text-lg font-normal mb-2 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Schedule List</h2>

            <p class="text-center py-2 px-8 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white'}}  mb-3 rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]  cursor-pointer">11:10 - 12:00 AM</p>

            <p class="text-center py-2 px-8 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white'}}  mb-3 rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]  cursor-pointer">11:10 - 12:00 AM</p>

            <p class="text-center py-2 px-8 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-[#484d5f]' : 'bg-[#202329] text-white'}}  mb-3 rounded-lg   shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]  cursor-pointer">11:10 - 12:00 AM</p>


            <button class="bg-[#1A579F] text-white font-semibold py-2 px-8 mt-2 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110">Save</button>

        </div>








    </main>




 {{-- Footer Element --}}
 <div class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{session('theme_mode') == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


    <img id='search_icon' src="{{session('theme_mode') == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png')}}" class="h-[44px]" alt="">

    <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">All Rights Reserved @2024</p>

    <p class=" text-center {{session('theme_mode') == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">@valueadderhabib</p>

</div>


</div>






