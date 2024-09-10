

    <div>

        <nav class="flex justify-between items-center h-[82px] w-[96vw] mx-auto my-2 rounded-lg {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

            <img  src="{{$theme_mode == 'light' ? asset('images/the_logo_light_mode.png') : asset('images/the_logo_dark_mode.png')}}" class="ml-2 h-[64px] max-w-[45vw]" alt="">

            <div id="input_div" class="relative">

                <img id='search_icon' src="{{asset('images/search.gif')}}" class="absolute top-1/2 left-2 -translate-y-1/2 h-[80%] mt-1" alt="">

                <span id='search_text' class="absolute top-1/2 left-10 -translate-y-1/2 h-[80%] mt-1 {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#EFF9FF]'}}">Search</span>

                <input id='search_input' type="text" class="mr-2 h-[36px] w-[50vw] rounded-lg {{$theme_mode == 'light' ? 'bg-[#EFF9FF] text-[#070707]' : 'bg-[#070707] text-[#EFF9FF]' }} bg-[#EFF9FF]  shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] px-4">

            </div>

        </nav>

        <div wire:click="changeThemeMode" class="flex justify-center">

            <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] mt-4 {{$theme_mode == 'light' ? '' : 'hidden'}}">

            <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] mt-4 {{$theme_mode == 'light' ? 'hidden' : ''}}">

        </div>





    {{-- JavaScript --}}
    @script
    <script>

        function changeThemeMode(){
        document.body.style.backgroundColor = '{{$theme_mode == 'light' ? '#EFF9FF' : '#070707'}}';
        }

        setInterval(() => {
        $wire.$refresh()
        alert('hello')
        }, 2000)

        changeThemeMode();

        document.getElementById('input_div').addEventListener('click', () => {
            document.getElementById('search_input').focus();
        })

        document.getElementById('search_input').addEventListener('focus', () => {

            document.getElementById('search_icon').style.display = 'none';
            document.getElementById('search_text').style.display = 'none';

         })

         document.getElementById('search_input').addEventListener('blur', () => {

           if(document.getElementById('search_input').value == ''){
            document.getElementById('search_icon').style.display = 'block';
            document.getElementById('search_text').style.display = 'block';
           }

         })




    </script>
    @endscript

</div>






