

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


            {{-- Loading The Searched Data --}}
            <div class="mx-auto md:max-w-[1280px]">
                @if ($search_output)
                    @foreach ($search_output as $post)

                    @if ($theme_mode == 'light')
                        <p>{!! '<p style="color: #121212;text-transform: uppercase; font-weight: bold ; cursor:pointer;"
                         onmouseover="this.style.textDecoration=`underline`;"
                         onmouseout="this.style.textDecoration=`none`;"
                         onclick="window.location.href=`' . $post->blog_link . '`" >' . $post->blog_title . '</p>'!!}</p>
                        <p>{!! '<p style="color: #121212; ; cursor:pointer"
                        onclick="window.location.href=`' . $post->blog_link . '`" >' . $post->blog_excerpt . '</p>'!!}</p>
                        <hr>
                    @endif

                    @if ($theme_mode == 'dark')
                        <p>{!! '<p style="color: #e7e7e7;text-transform: uppercase; font-weight: bold ; cursor:pointer"
                        onmouseover="this.style.textDecoration=`underline`;"
                         onmouseout="this.style.textDecoration=`none`;"
                         onclick="window.location.href=`' . $post->blog_link . '`" >' . $post->blog_title . '</p>'!!}</p>
                        <p>{!! '<p style="color: #ededed; ; cursor:pointer"
                        onclick="window.location.href=`' . $post->blog_link . '`" >' . $post->blog_excerpt . '</p>'!!}</p>
                        <hr>
                    @endif



                    @endforeach
                @endif
            </div>




                {{-- <div wire:click="changeThemeMode" class="flex justify-center">

                    <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] mt-4 {{$theme_mode == 'light' ? '' : 'hidden'}}">

                    <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] mt-4 {{$theme_mode == 'light' ? 'hidden' : ''}}">

                </div> --}}

        <div wire:click="changeThemeMode" class="flex justify-center w-fit mx-auto mt-6 md:hover:scale-105 transition-all">

            <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] {{$theme_mode == 'light' ? '' : 'hidden'}}">

            <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] {{$theme_mode == 'light' ? 'hidden' : ''}}">

        </div>



        <div class="flex justify-center mt-6 md:hidden">

            <button class="h-[55px] w-[209px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"  onclick="window.location.href='/consultation'">Consult Now</button>

        </div>


        <div class="flex flex-col justify-center mt-6  md:max-w-[1280px]  mx-auto">

            <h1 class="text-3xl text-center font-semibold  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Our Dental Services</h1>

            <p class="text-sm   text-center px-4 {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">We use only the best quality materials on the market in order to provide the best products to our patients, So don’t worry about anything and book yourself.</p>

            <p class="text-lg font-medium text-center mt-8 px-4 {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Click On “Select” To Get The Estimated Fee and Appointment. If You Want To Know More About, Click On The “Details” Button.</p>

        </div>



        {{-- Service Cards --}}
        <div class="flex flex-col md:flex-row flex-wrap justify-center items-center my-6 gap-6 md:max-w-[1280px] mx-auto">


            {{-- Root Canal Treatment --}}
            <div class="flex flex-col w-[96vw] md:max-w-[30%] h-full md:h-[300px] md:hover:scale-105 transition-all  {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}}  rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

                <div class="{{$theme_mode == 'light' ? 'bg-[#4189d1]' : ''}}  mt-6 rounded-lg border-1  bg-[#EFF9FF]">
                <img src="{{asset('images/root_canal_treatment.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{$theme_mode == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
                 </div>

                <h1 class="text-2xl font-semibold mt-1 text-center px-4 {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Root Canal Treatment</h1>

                <p class="text-center mt-2 text-lg font-normal px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Root canal treatment (endodontics) is a dental procedure used to treat infection at the centre of a tooth.</p>

                <div class="mt-4 flex flex-row gap-4 mb-6">
                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='http://127.0.0.1:8000/services/root_canal_treatment'">Select</button>

                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='http://127.0.0.1:8000/details/root_canal_treatment'">Details</button>
                </div>

            </div>




            {{-- Cosmetic Dentistry --}}
            <div class="flex flex-col w-[96vw] md:max-w-[30%]  h-full md:h-[300px] md:hover:scale-105 transition-all  {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

                <div class="{{$theme_mode == 'light' ? 'bg-[#4189d1]' : ''}}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{asset('images/cosmetic_dentist.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{$theme_mode == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
                    </div>

                <h1 class="text-2xl font-semibold mt-1 text-center px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Cosmetic Dentistry</h1>

                <p class="text-center mt-2 text-lg font-normal px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Cosmetic dentistry is the branch of dentistry that focuses on improving the appearance of your smile.</p>

                <div class="mt-4 flex flex-row gap-4 mb-6">
                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"  onclick="window.location.href='http://127.0.0.1:8000/services/cosmetic_dentist'">Select</button>

                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='http://127.0.0.1:8000/details/cosmetic_dentist'">Details</button>
                </div>

            </div>




            {{-- Dental Implants--}}
            <div class="flex flex-col w-[96vw] md:max-w-[30%]  h-full md:h-[300px] md:hover:scale-105 transition-all  {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">


                <div class="{{$theme_mode == 'light' ? 'bg-[#4189d1]' : ''}}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{asset('images/dental_implant.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{$theme_mode == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
                    </div>

                <h1 class="text-2xl font-semibold mt-1 text-center px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Dental Implants</h1>

                <p class="text-center mt-2 text-lg font-normal px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">A dental implant is an artificial tooth root that’s placed into your jaw to hold a prosthetic tooth or bridge.</p>

                <div class="mt-4 flex flex-row gap-4 mb-6">
                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all"  onclick="window.location.href='http://127.0.0.1:8000/services/dental_implants'">Select</button>

                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='http://127.0.0.1:8000/details/dental_implants'">Details</button>
                </div>

            </div>




            {{-- Teeth Whitening--}}
            <div class="flex flex-col w-[96vw] md:max-w-[30%]  h-full md:h-[300px] md:hover:scale-105 transition-all  {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">


                <div class="{{$theme_mode == 'light' ? 'bg-[#4189d1]' : ''}}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{asset('images/teeth_whitening.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{$theme_mode == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
                    </div>

                <h1 class="text-2xl font-semibold mt-1 text-center px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Teeth Whitening</h1>

                <p class="text-center mt-2 text-lg font-normal px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">It's never been easier to brighten your smile at home. There are all kinds of products you can try.</p>

                <div class="mt-4 flex flex-row gap-4 mb-6">
                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='http://127.0.0.1:8000/services/teeth_whitening'">Select</button>

                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='http://127.0.0.1:8000/details/teeth_whitening'">Details</button>
                </div>

            </div>



            {{-- Emergency Dentistry --}}
            <div class="flex flex-col w-[96vw]  md:max-w-[30%] h-full md:h-[300px] md:hover:scale-105 transition-all  {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">


                <div class="{{$theme_mode == 'light' ? 'bg-[#4189d1]' : ''}}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{asset('images/emergency_dentistry.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{$theme_mode == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
                    </div>

                <h1 class="text-2xl font-semibold mt-1 text-center px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Emergency Dentistry</h1>

                <p class="text-center mt-2 text-lg font-normal px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">In general, any dental problem that needs immediate treatment to stop bleeding, alleviate severe pain.</p>

                <div class="mt-4 flex flex-row gap-4 mb-6">
                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='http://127.0.0.1:8000/services/emergency_dentistry'">Select</button>

                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='http://127.0.0.1:8000/details/emergency_dentistry'">Details</button>
                </div>

            </div>



            {{-- Prevention --}}
            <div class="flex flex-col w-[96vw] md:max-w-[30%]  h-full md:h-[300px] md:hover:scale-105 transition-all  {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg  items-center  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">


                <div class="{{$theme_mode == 'light' ? 'bg-[#4189d1]' : ''}}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{asset('images/prevention.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{$theme_mode == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
                    </div>

                <h1 class="text-2xl font-semibold mt-1 text-center px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Prevention</h1>

                <p class="text-center mt-2 text-lg font-normal px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Preventive dentistry is dental care that helps maintain good oral health. a combination of regular dental.</p>

                <div class="mt-4 flex flex-row gap-4 mb-6">
                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='http://127.0.0.1:8000/services/prevention'">Select</button>

                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all" onclick="window.location.href='http://127.0.0.1:8000/details/prevention'">Details</button>
                </div>

            </div>




        </div>



          {{-- Consult Now Button --}}
          <button class="mt-4 px-8 py-2 w-[90vw] md:max-w-[300px] mx-auto rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all "  onclick="window.location.href='/consultation'">Consult Now</button>



          {{-- Footer Element --}}
          <div class="flex flex-col justify-between items-center py-8 w-[96vw] md:max-w-[1280px]  mx-auto mt-8 rounded-lg {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] mb-2">


              <img id='search_icon' src="{{$theme_mode == 'light' ? asset('images/footer_logo.png') : asset('images/footer_logo.png')}}" class="h-[44px]" alt="">

              <p class=" text-center {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">All Rights Reserved @2024</p>

              <p class=" text-center {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">@valueadderhabib</p>

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





            document.addEventListener('livewire:init', () => {

                Livewire.on('alert-manager', () => {


                    if(document.getElementById('search_input').value !== '' || document.activeElement === document.getElementById('search_input')){

                        // Doing 100ms delay cause the DOM is not loaded yet.
                        setTimeout(() => {
                            document.getElementById('search_icon').style.display = 'none';
                            document.getElementById('search_text').style.display = 'none';
                        }, 10);

                    }



                })


                })




        </script>


</div>





