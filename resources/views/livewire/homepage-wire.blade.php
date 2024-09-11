

    <div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{$theme_mode == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]'}} ">

        <nav class="flex justify-between items-center h-[82px] w-[96vw] mx-auto mt-2 rounded-lg {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

            <img  src="{{$theme_mode == 'light' ? asset('images/the_logo_light_mode.png') : asset('images/the_logo_dark_mode.png')}}" class="ml-2 h-[64px] max-w-[45vw]" alt="">

            <div id="input_div" class="relative">

                <img id='search_icon' src="{{$theme_mode == 'light' ? asset('images/search_light_mode.gif') : asset('images/search_dark_mode.gif')}}" class="absolute top-1/2 left-2 -translate-y-1/2 h-[80%] mt-1" alt="">

                <span id='search_text' class="absolute top-1/2 left-10 -translate-y-1/2 h-[80%] mt-1 {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#EFF9FF]'}}">Search</span>

                <input id='search_input' type="text" class="mr-2 h-[36px] w-[50vw] rounded-lg {{$theme_mode == 'light' ? 'bg-[#EFF9FF] text-[#070707]' : 'bg-[#070707] text-[#EFF9FF]' }}  shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] px-4">

            </div>

        </nav>

                {{-- <div wire:click="changeThemeMode" class="flex justify-center">

                    <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] mt-4 {{$theme_mode == 'light' ? '' : 'hidden'}}">

                    <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] mt-4 {{$theme_mode == 'light' ? 'hidden' : ''}}">

                </div> --}}

        <div wire:click="changeThemeMode" class="flex justify-center">

            <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] mt-4 {{$theme_mode == 'light' ? '' : 'hidden'}}">

            <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] mt-4 {{$theme_mode == 'light' ? 'hidden' : ''}}">

        </div>





        {{-- JavaScript --}}
        <script>

        //    function changeThemeMode(){

        //         Livewire.dispatch('theme-change', { })

        //         window.location.reload();

        //     }


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



            //  Testing

            document.addEventListener('livewire:init', () => {

                Livewire.on('alert-manager', () => {

                    alert('Inside the manager');

                    if(document.getElementById('search_input').value !== ''){
                        alert('Inside the if Statement');


                            console.log(document.getElementById('search_icon'));
                            console.log(document.getElementById('search_text'));

                            document.getElementById('search_icon').style.setProperty('display', 'none', 'important');
                            document.getElementById('search_text').style.setProperty('display', 'none', 'important');


                                // document.getElementById('search_icon').style.display = 'none';

                                // document.getElementById('search_text').style.display = 'none';

                    }



                })


                })


            // End Testing



        </script>


</div>





