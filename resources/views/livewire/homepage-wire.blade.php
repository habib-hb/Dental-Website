

    <div class="flex flex-col w-full m-0 p-0 min-h-[100vh] {{$theme_mode == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#090909]'}} ">

        <nav class="flex justify-between items-center h-[82px] w-[96vw] mx-auto mt-2 rounded-lg {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

            <img  src="{{$theme_mode == 'light' ? asset('images/the_logo_light_mode.png') : asset('images/the_logo_dark_mode.png')}}" class="ml-2 h-[64px] max-w-[45vw]" alt="">

            <div id="input_div" class="relative">

                <img id='search_icon' src="{{$theme_mode == 'light' ? asset('images/search_light_mode.gif') : asset('images/search_dark_mode.gif')}}" class="absolute top-1/2 left-2 -translate-y-1/2 h-[80%] mt-1" alt="">

                <span id='search_text' class="absolute top-1/2 left-10 -translate-y-1/2 h-[80%] mt-1 {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#EFF9FF]'}}">Search</span>

                <input id='search_input' type="text" class="mr-2 h-[36px] w-[50vw] rounded-lg {{$theme_mode == 'light' ? 'bg-[#EFF9FF] text-[#070707]' : 'bg-[#070707] text-[#EFF9FF]' }}  shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] px-4 focus:outline-none">

            </div>

        </nav>

                {{-- <div wire:click="changeThemeMode" class="flex justify-center">

                    <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] mt-4 {{$theme_mode == 'light' ? '' : 'hidden'}}">

                    <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] mt-4 {{$theme_mode == 'light' ? 'hidden' : ''}}">

                </div> --}}

        <div wire:click="changeThemeMode" class="flex justify-center mt-6">

            <img src="{{asset('images/light_mode_toggler.png')}}" class="h-[44px] {{$theme_mode == 'light' ? '' : 'hidden'}}">

            <img src="{{asset('images/dark_mode_toggler.png')}}" class="h-[44px] {{$theme_mode == 'light' ? 'hidden' : ''}}">

        </div>



        <div class="flex justify-center mt-6">

            <button class="h-[55px] w-[209px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Consult Now</button>

        </div>


        <div class="flex flex-col justify-center mt-6">

            <h1 class="text-3xl text-center font-semibold  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Our Dental Services</h1>

            <p class="text-sm   text-center px-4 {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">We use only the best quality materials on the market in order to provide the best products to our patients, So don’t worry about anything and book yourself.</p>

            <p class="text-lg font-medium text-center mt-8 px-4 {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Click On “Select” To Get The Estimated Fee and Appointment. If You Want To Know More About, Click On The “Details” Button.</p>

        </div>



        {{-- Service Cards --}}
        <div class="flex flex-col justify-center items-center my-6 gap-6">


            {{-- Root Canal Treatment --}}
            <div class="flex flex-col w-[96vw] h-full {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}}  rounded-lg  items-center">

                <div class="{{$theme_mode == 'light' ? 'bg-[#358ce2]' : ''}}  mt-6 rounded-lg border-1  bg-[#EFF9FF]">
                <img src="{{asset('images/root_canal_treatment.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{$theme_mode == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
                 </div>

                <h1 class="text-2xl font-semibold mt-1 text-center px-4 {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Root Canal Treatment</h1>

                <p class="text-center mt-2 text-lg font-normal px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Root canal treatment (endodontics) is a dental procedure used to treat infection at the centre of a tooth.</p>

                <div class="mt-4 flex flex-row gap-4 mb-6">
                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Select</button>

                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Details</button>
                </div>

            </div>




            {{-- Cosmetic Dentistry --}}
            <div class="flex flex-col w-[96vw] h-full  {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg  items-center">

                <div class="{{$theme_mode == 'light' ? 'bg-[#358ce2]' : ''}}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{asset('images/cosmetic_dentist.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{$theme_mode == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
                    </div>

                <h1 class="text-2xl font-semibold mt-1 text-center px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Cosmetic Dentist</h1>

                <p class="text-center mt-2 text-lg font-normal px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Cosmetic dentistry is the branch of dentistry that focuses on improving the appearance of your smile.</p>

                <div class="mt-4 flex flex-row gap-4 mb-6">
                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Select</button>

                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Details</button>
                </div>

            </div>




            {{-- Dental Implants--}}
            <div class="flex flex-col w-[96vw] h-full  {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg  items-center">


                <div class="{{$theme_mode == 'light' ? 'bg-[#358ce2]' : ''}}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{asset('images/dental_implant.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{$theme_mode == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
                    </div>

                <h1 class="text-2xl font-semibold mt-1 text-center px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Dental Implants</h1>

                <p class="text-center mt-2 text-lg font-normal px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">A dental implant is an artificial tooth root that’s placed into your jaw to hold a prosthetic tooth or bridge.</p>

                <div class="mt-4 flex flex-row gap-4 mb-6">
                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Select</button>

                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Details</button>
                </div>

            </div>




            {{-- Teeth Whitening--}}
            <div class="flex flex-col w-[96vw] h-full  {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg  items-center">


                <div class="{{$theme_mode == 'light' ? 'bg-[#358ce2]' : ''}}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{asset('images/teeth_whitening.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{$theme_mode == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
                    </div>

                <h1 class="text-2xl font-semibold mt-1 text-center px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Teeth Whitening</h1>

                <p class="text-center mt-2 text-lg font-normal px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">It's never been easier to brighten your smile at home. There are all kinds of products you can try.</p>

                <div class="mt-4 flex flex-row gap-4 mb-6">
                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Select</button>

                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Details</button>
                </div>

            </div>



            {{-- Emergency Dentistry --}}
            <div class="flex flex-col w-[96vw] h-full  {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg  items-center">


                <div class="{{$theme_mode == 'light' ? 'bg-[#358ce2]' : ''}}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{asset('images/emergency_dentistry.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{$theme_mode == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
                    </div>

                <h1 class="text-2xl font-semibold mt-1 text-center px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Emergency Dentistry</h1>

                <p class="text-center mt-2 text-lg font-normal px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">In general, any dental problem that needs immediate treatment to stop bleeding, alleviate severe pain.</p>

                <div class="mt-4 flex flex-row gap-4 mb-6">
                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Select</button>

                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Details</button>
                </div>

            </div>



            {{-- Prevention --}}
            <div class="flex flex-col w-[96vw] h-full  {{$theme_mode == 'light' ? 'bg-[#d6e0ec]' : 'bg-[#1e1d1d]'}} rounded-lg  items-center">


                <div class="{{$theme_mode == 'light' ? 'bg-[#358ce2]' : ''}}  mt-6 rounded-lg  border-1  bg-[#EFF9FF] ">
                <img src="{{asset('images/prevention.gif')}}" class=" h-[70px] w-[70px] rounded-lg    {{$theme_mode == 'light' ? 'opacity-90' : ''}}  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" alt="">
                    </div>

                <h1 class="text-2xl font-semibold mt-1 text-center px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Prevention</h1>

                <p class="text-center mt-2 text-lg font-normal px-4  {{$theme_mode == 'light' ? 'text-[#070707]' : 'text-[#fcfeff]'}}">Preventive dentistry is dental care that helps maintain good oral health. a combination of regular dental.</p>

                <div class="mt-4 flex flex-row gap-4 mb-6">
                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Select</button>

                    <button class="h-[35px] w-[100px] rounded-lg bg-[#1A579F] text-white  shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:scale-110 transition-all">Details</button>
                </div>

            </div>



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


                    if(document.getElementById('search_input').value !== ''){

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





