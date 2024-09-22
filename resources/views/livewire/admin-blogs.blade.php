

<div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{$theme_mode == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]'}}">

    <nav class="flex justify-between items-center h-[82px] w-[96vw]  md:max-w-[1280px]  md:px-8 mx-auto mt-2 rounded-lg {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

        <div class=" flex justify-start md:w-[20vw]">

        <img  src="{{$theme_mode == 'light' ? asset('images/the_logo_light_mode.png') : asset('images/the_logo_dark_mode.png')}}" class="ml-2 h-[64px] max-w-[45vw]" alt="">

        </div>

        <div id="input_div" class="relative">

            <img id='search_icon' src="{{$theme_mode == 'light' ? asset('images/search_light_mode.gif') : asset('images/search_dark_mode.gif')}}" class="absolute top-1/2 left-2 -translate-y-1/2 h-[80%] mt-1 {{$search_input_field_is_active ? 'hidden' : ''}}" alt="">

            <span id='search_text' class="absolute top-1/2 left-10 -translate-y-1/2 h-[80%] mt-1 {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#EFF9FF]'}} {{$search_input_field_is_active ? 'hidden' : ''}}">Search</span>

            <input wire:model.live='searchtext' id='search_input' type="text" class="mr-2 h-[36px] w-[50vw] md:w-[30vw] rounded-lg {{$theme_mode == 'light' ? 'bg-[#EFF9FF] text-[#070707]' : 'bg-[#070707] text-[#EFF9FF]' }}  shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] px-4 focus:outline-none">



        </div>

        <div class=" flex justify-end md:w-[20vw]">

        <button class="hidden md:block mr-2 px-8 py-2 rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='/consultation'">Consult Now</button>

        </div>



    </nav>



    <div wire:click="changeThemeMode" class="flex justify-center w-fit mx-auto mt-6 md:hover:scale-105 transition-all">

        <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] {{$theme_mode == 'light' ? '' : 'hidden'}}">

        <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] {{$theme_mode == 'light' ? 'hidden' : ''}}">

    </div>





</div>






