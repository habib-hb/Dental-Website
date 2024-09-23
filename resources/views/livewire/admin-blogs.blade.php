




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



    <div class="flex flex-col w-[96vw] md:max-w-[800px] mx-auto mt-4">

        <div class="flex flex-col mt-2">

            <label for="author_name" class="opacity-80 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Author Name</label>

            <input wire:model="author_name" type="text" class="w-[96vw] md:max-w-full py-2 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] outline-none px-2" id="author_name">

        </div>

        <div class="flex flex-col mt-2">
            <label for="blog_headline" class="opacity-80 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Blog Headline</label>

            <input wire:model="blog_headline" type="text" class="w-[96vw] md:max-w-full py-2 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] outline-none px-2" id="blog_headline">

        </div>

        <div class="flex flex-col mt-2">

            <label for="blog_slug" class="opacity-80 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Blog Slug (Unique Identifier Link Text. eg: "my-blog") </label>

            <input wire:model="blog_slug" type="text" class="w-[96vw] md:max-w-full py-2 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}}  rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] outline-none px-2" id="blog_slug">

        </div>

        <div class="flex flex-col mt-2">

            <label for="blog_excerpt" class="opacity-80 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Blog Excerpt</label>

            <textarea wire:model="blog_excerpt" type="text" class="w-[96vw] md:max-w-full  py-2 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] outline-none px-2" id="blog_excerpt" rows="4" ></textarea>

        </div>

        <div class="flex flex-col mt-2 mb-6">

            <label for="blog_image" class="opacity-80 {{session('theme_mode') == 'light' ? 'text-black' : 'text-white'}}">Blog Thumbnail Image</label>

            <input wire:model="blog_image" type="file" accept="image/*" class="w-[96vw] md:max-w-full py-2 {{session('theme_mode') == 'light' ? 'bg-[#deeaf8] text-black' : 'bg-[#202329] text-white'}} rounded-lg shadow-[inset_0_4px_4px_rgba(0,0,0,0.25)] outline-none px-2" id="blog_image" />

            @error('blog_image') <span class="text-red-500">{{ $message }}</span> @enderror

        </div>









    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/l55gbz5vnerknywvd7pxpjk7wsgpu3drem4qpol4u13x5327/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

        <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
        <script>


        function tinemce_init(){

        const themeMode = document.getElementById('main_div').getAttribute('data-theme-mode');

        // Destroying the existing TinyMCE instance if it exists
        if (tinymce.get('tinymce')) {
            tinymce.get('tinymce').remove();
        }

        tinymce.init({
            selector: '#tinymce',
            plugins: [
            // Core editing features
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
            // Your account includes a free trial of TinyMCE premium features
            // Try the most popular premium features until Oct 5, 2024:
            'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
            ],
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),

            // Dark mode logic
            skin: themeMode === 'dark' ? 'oxide-dark' : 'oxide',
            content_css: themeMode === 'dark' ? 'dark' : 'default',


            setup: function (editor) {


                editor.on('change', function () {
                    // Update the Livewire property when TinyMCE content changes
                    Livewire.dispatch('updateTextarea', {text: editor.getContent()});
                });



        }
        });

    }

    tinemce_init();

    document.addEventListener('livewire:initialized', function () {


            Livewire.on('alert-manager', () => {

                setTimeout(() => {
                    tinemce_init()
                         }, 10);

            });

            Livewire.on('reinitialize_blog_form', () => {

                setTimeout(() => {
                    let tinymce_div = document.getElementById('tinymce_div');
                    if(!tinymce_div.classList.contains('hidden')){
                            tinymce_div.classList.add('hidden')
                    }

                    if(tinymce_loading.classList.contains('hidden')){
                            tinymce_loading.classList.remove('hidden')
                    }

                         }, 10);

               setTimeout(() => {
                    let tinymce_div = document.getElementById('tinymce_div');
                    if(!tinymce_div.classList.contains('hidden')){
                            tinymce_div.classList.add('hidden')
                    }

                    if(tinymce_loading.classList.contains('hidden')){
                            tinymce_loading.classList.remove('hidden')
                    }

                    }, 100);

                setTimeout(() => {
                    let tinymce_div = document.getElementById('tinymce_div');
                    if(!tinymce_div.classList.contains('hidden')){
                            tinymce_div.classList.add('hidden')
                    }

                    if(tinymce_loading.classList.contains('hidden')){
                            tinymce_loading.classList.remove('hidden')
                    }

                    }, 500);


                setTimeout(() => {
                    let tinymce_div = document.getElementById('tinymce_div');
                    if(!tinymce_div.classList.contains('hidden')){
                            tinymce_div.classList.add('hidden')
                    }

                    if(tinymce_loading.classList.contains('hidden')){
                            tinymce_loading.classList.remove('hidden')
                    }
                    }, 1000);

                setTimeout(() => {
                    tinymce_div.classList.remove('hidden')
                    tinymce_loading.classList.add('hidden')
                    tinemce_init()
                    }, 2000);

            });

    })

        </script>

    <div id="tinymce_div"  class="">

    <textarea id="tinymce">
        Welcome to TinyMCE! <p>Hello World!</p>
        <img  src="https://scontent.fdac110-1.fna.fbcdn.net/v/t39.30808-6/460957556_899028865618519_6012741073131767582_n.jpg?stp=dst-jpg_p526x296&_nc_cat=1&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeFjTKKTYTgnQDBcEY1dnxA1tQz8MNQ7smW1DPww1DuyZbTiNtbdaDMlW6m-HnsN7N7Lfh1fYtYdweGJH3Brnzxx&_nc_ohc=gW0OGw1QfpgQ7kNvgGAEERO&_nc_ht=scontent.fdac110-1.fna&_nc_gid=AFnsHhNo3puSgPj_MHbv9KL&oh=00_AYC-wZPIgGfSirTH4Ug6qAcEroW817fsSTSUp0CzlMFjuw&oe=66F59D9F" class="ml-2 h-[64px] max-w-[45vw]" alt="">
    </textarea>

    </div>

    {{-- Loading Text For Text Area After Image Upload --}}
    <div id="tinymce_loading" class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10 hidden">

       <div class="flex flex-row justify-center items-center px-2 gap-2">

                <img src="{{asset('images/loading.png')}}" class="h-[24px] rounded-full animate-spin" alt="">

                <span class=" text-white py-2 rounded-lg"> Processing Image Upload...</span>

        </div>


    </div>



    <div class="flex flex-row justify-center items-center my-8 {{$loading_image ? 'hidden' : ''}}">

        <button wire:click="save" class="bg-[#1a579f] hover:scale-105 w-[300px] text-white font-bold py-2 px-4 rounded">Save</button>

    </div>


    {{-- From Completion Notification --}}
    @if (session()->has('form_completion_message'))

        <div class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit max-h-[50vh] overflow-auto mx-auto w-[90%] max-w-[400px]  bg-[#1A579F] py-4 rounded-lg z-10">
            <div class="flex flex-row justify-between items-center px-8">


                <p class="text-white text-left">{{ session('form_completion_message') }}</p>

            </div>

            <button wire:click="clear_form_completion_message" class="text-white border-2 border-white px-4 rounded-lg mt-2">Close</button>

        </div>

    @endif





    {{-- Form Error Message --}}
    @if (session()->has('form_error_message'))

            <div class="flex flex-col justify-center items-center text-center fixed top-24 left-1/2 translate-x-[-50%] h-fit mx-auto w-[90%] max-w-[400px]  bg-[#9f1a1a] py-4 rounded-lg z-10">
                <div class="flex flex-row justify-between items-center px-8">

                    <p class="text-white text-center">{{ session('form_error_message') }}</p>

                </div>

                <button wire:click="clear_form_error_message" class="text-white border-2 border-white px-4 rounded-lg mt-2">Close</button>

            </div>

    @endif




                {{-- <button wire:click="test_image" >Image DD Test</button>

                <button wire:click="test_textarea" >Textarea DD Test</button> --}}




    </div>





</div>






