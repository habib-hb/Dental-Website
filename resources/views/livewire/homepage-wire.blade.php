

    <div>

        <nav class="flex justify-between items-center h-[82px] w-[96vw] mx-auto my-2 rounded-lg bg-[#d6e0ec] shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">

            <img  src="{{asset('images/the_logo.png')}}" class="ml-2 h-[64px] max-w-[45vw]" alt="">

            <div id="input_div" class="relative">

                <img id='search_icon' src="{{asset('images/search.gif')}}" class="absolute top-1/2 left-2 -translate-y-1/2 h-[80%] mt-1" alt="">

                <span id='search_text' class="absolute top-1/2 left-10 -translate-y-1/2 h-[80%] mt-1 ">Search</span>

                <input id='search_input' type="text" class="mr-2 h-[36px] w-[50vw] rounded-lg bg-[#EFF9FF]  shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)]">

            </div>

        </nav>





    {{-- JavaScript --}}
    <script>

        document.getElementById('input_div').addEventListener('click', () => {
            document.getElementById('search_input').focus();
        })

        document.getElementById('search_input').addEventListener('focus', () => {

            document.getElementById('search_icon').classList.add('hidden');
            document.getElementById('search_text').classList.add('hidden');

         })

         document.getElementById('search_input').addEventListener('blur', () => {

         })


    </script>

</div>



