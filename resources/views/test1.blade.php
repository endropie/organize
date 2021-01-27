<x-website-layout>
    <x-slot name="header">
        <header class="py-4 px-6 absolute top-0 left-0 right-0 z-10">
            <div class="container mx-auto">
            <div class="flex items-center">
                <div class="flex-1">
                <img src="https://raw.githubusercontent.com/highscoresl/tw-social-landing-template/master/public/images/logo.svg" class="h-6">
                </div>
                <button class="text-secondary lg:hidden">
                <svg class="current-fill h-6 w-6" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                    <g>
                    <g>
                        <path d="M413,422H1c-13.807,0-25-11.193-25-25s11.193-25,25-25h412c13.807,0,25,11.193,25,25S426.807,422,413,422z"/>
                    </g>
                    <g>
                        <path d="M413,562H1c-13.807,0-25-11.193-25-25s11.193-25,25-25h412c13.807,0,25,11.193,25,25S426.807,562,413,562z"/>
                    </g>
                    <g>
                        <path d="M413,282H1c-13.807,0-25-11.193-25-25s11.193-25,25-25h412c13.807,0,25,11.193,25,25S426.807,282,413,282z"/>
                    </g>
                    </g>
                </svg>

                </button>
                <nav class="hidden lg:flex items-center">
                <a href="#" class="px-6 py-3 font-bold uppercase text-primary border-b-2 border-primary">Home</a>
                <a href="#our-process" class="px-6 py-3 font-bold uppercase text-secondary hover:text-primary">Process</a>
                <a href="#about-us" class="px-6 py-3 font-bold uppercase text-secondary hover:text-primary">About us</a>
                <a href="#services" class="px-6 py-3 font-bold uppercase text-secondary hover:text-primary">Services</a>
                <a href="#testimonials" class="px-6 py-3 font-bold uppercase text-secondary hover:text-primary">Testimonials</a>
                <a href="#contact" class="px-6 py-3 font-bold uppercase bg-primary hover:bg-primary-400 text-secondary rounded">Contact</a>
                </nav>
            </div>
            </div>
        </header>
    </x-slot>

    <div class="relative overflow-hidden px-6 pb-6">
        <img src="https://raw.githubusercontent.com/highscoresl/tw-social-landing-template/master/public/images/wave.svg" class="absolute top-0 left-2/5">
        <div class="container mx-auto relative">
        <div class="flex flex-col md:flex-row items-center pt-32 pb-16 md:pb-0">
            <div class="md:w-1/2 lg:w-1/3 mb-4 sm:mb-16 md:mb-0">
            <h2 class="text-xl font-bold text-secondary-600 uppercase mb-2">Lorem ipsum dolor</h2>
            <h1 class="text-4xl md:text-5xl font-bold text-secondary leading-tight mb-6 md:mb-10">Social Network Management</h1>
            <a href="#" class="bg-primary px-6 md:px-8 py-3 md:py-4 text-lg md:text-xl text-secondary font-bold uppercase rounded hover:bg-primary-400">More info</a>
            </div>
            <div class="mt-16 sm:mt-0 flex-1 flex justify-end">
            <img src="https://raw.githubusercontent.com/highscoresl/tw-social-landing-template/master/public/images/hero.svg">
            </div>
        </div>
        </div>
    </div>
    <div id="our-process" class="relative">
        <img src="https://raw.githubusercontent.com/highscoresl/tw-social-landing-template/master/public/images/circle2.svg" class="hidden sm:block absolute top-0 left-0 -mx-32">
        <div class="container mx-auto px-6 pt-6 pb-12 relative">
        <h3 class="flex flex-col items-center text-4xl text-secondary font-bold mb-12">Our process <span class="bg-primary h-1 w-20 block mt-4"></span></h3>
        <div class="flex flex-col md:flex-row xl:px-32">
            <div class="flex flex-col items-center md:px-6 lg:px-12">
            <span class="text-6xl text-primary">1</span>
            <h4 class="font-semibold text-2xl text-secondary mb-2">Analysis</h4>
            <p class="text-center text-secondary-700 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam imperdiet est</p>
            </div>
            <div class="flex flex-col items-center md:px-6 lg:px-12">
            <span class="text-6xl text-primary">2</span>
            <h4 class="font-semibold text-2xl text-secondary mb-2">Execution</h4>
            <p class="text-center text-secondary-700 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam imperdiet est</p>
            </div>
            <div class="flex flex-col items-center md:px-6 lg:px-12">
            <span class="text-6xl text-primary">3</span>
            <h4 class="font-semibold text-2xl text-secondary mb-2">Success</h4>
            <p class="text-center text-secondary-700 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam imperdiet est</p>
            </div>
        </div>
        </div>
    </div>
    <div id="about-us" class="bg-blue-100 mt-32 py-12">
        <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/2 md:pr-8 lg:pr-16">
            <img src="https://raw.githubusercontent.com/highscoresl/tw-social-landing-template/master/public/images/about-us.svg" class="-mt-24 md:mt-0 lg:-mt-24 mb-16 md:mb-0">
            </div>
            <div class="md:w-1/2">
            <h3 class="flex flex-col text-4xl text-secondary font-bold mb-6">About us <span class="bg-primary h-1 w-20 block mt-4"></span></h3>
            <p class="text-lg text-secondary-700 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam imperdiet est tellus, et consequat sem sodales id. Quisque molestie et mauris efficitur lacinia.</p>
            <p class="text-lg text-secondary-700">Aliquam eget semper mi. Mauris magna risus, viverra in nulla id, placerat fermentum tellus. Aliquam non.</p>
            </div>
        </div>
        </div>
    </div>
    <div id="services" class="relative">
        <img src="https://raw.githubusercontent.com/highscoresl/tw-social-landing-template/master/public/images/circle.svg" class="absolute top-0 right-0 mt-64 hidden md:block">
        <div class="container mx-auto px-6 py-32 relative">
        <h3 class="flex flex-col items-center text-4xl text-secondary font-bold">Services we offer <span class="bg-primary h-1 w-20 block mt-4"></span></h3>
        <div class="flex flex-col md:flex-row items-center mb-24 md:mb-16 xl:mb-8 mt-16 md:mt-0 md:mt-16 lg:mt-0">
            <img src="https://raw.githubusercontent.com/highscoresl/tw-social-landing-template/master/public/images/service1.svg" class="md:w-1/3">
            <div class="md:ml-16 xl:ml-32">
            <h4 class="text-2xl md:text-3xl font-bold text-secondary-800 mb-4">Social Media Marketing</h4>
            <p class="text-secondary-700 text-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam imperdiet est tellus, et consequat sem sodales id. Quisque molestie et mauris efficitur lacinia.</p>
            <p class="text-secondary-700 text-lg">Aliquam eget semper mi. Mauris magna risus, viverra in nulla id, placerat fermentum tellus. Aliquam non felis eu dui fermentum auctor. Aenean sed ante congue, facilisis ipsum eu, gravida lacus.</p>
            </div>
        </div>
        <div class="flex flex-col-reverse md:flex-row items-center mb-24 md:mb-16 xl:mb-8">
            <div class="md:mr-16 xl:mr-32">
            <h4 class="text-2xl md:text-3xl font-bold text-secondary-800 mb-4">Search Engine Optimization</h4>
            <p class="text-secondary-700 text-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam imperdiet est tellus, et consequat sem sodales id. Quisque molestie et mauris efficitur lacinia.</p>
            <p class="text-secondary-700 text-lg">Aliquam eget semper mi. Mauris magna risus, viverra in nulla id, placerat fermentum tellus. Aliquam non felis eu dui fermentum auctor. Aenean sed ante congue, facilisis ipsum eu, gravida lacus.</p>
            </div>
            <img src="https://raw.githubusercontent.com/highscoresl/tw-social-landing-template/master/public/images/service2.svg" class="md:w-1/3">
        </div>
        <div class="flex flex-col md:flex-row items-center">
            <img src="https://raw.githubusercontent.com/highscoresl/tw-social-landing-template/master/public/images/service3.svg" class="md:w-1/3">
            <div class="md:ml-16 xl:ml-32">
            <h4 class="text-2xl md:text-3xl font-bold text-secondary-800 mb-4">Increase your followers</h4>
            <p class="text-secondary-700 text-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam imperdiet est tellus, et consequat sem sodales id. Quisque molestie et mauris efficitur lacinia.</p>
            <p class="text-secondary-700 text-lg">Aliquam eget semper mi. Mauris magna risus, viverra in nulla id, placerat fermentum tellus. Aliquam non felis eu dui fermentum auctor. Aenean sed ante congue, facilisis ipsum eu, gravida lacus.</p>
            </div>
        </div>
        </div>
    </div>
    <div id="testimonials" class="bg-blue-100">
        <div class="mt-16">
        <div class="bg-blue-500 pt-16 pb-16 md:pb-32 relative">
            <img src="https://raw.githubusercontent.com/highscoresl/tw-social-landing-template/master/public/images/wave3.svg" class="w-full absolute bottom-full h-16 lg:h-auto object-cover object-top">
            <div class="container px-6 mx-auto">
                <div class="md:w-2/3 mx-auto relative">
                <img src="https://raw.githubusercontent.com/highscoresl/tw-social-landing-template/master/public/images/quote.svg" class="absolute top-0 left-0 sm:-ml-16 -mt-4">
                <h3 class="text-white italic text-2xl text-center">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam imperdiet est tellus, et consequat sem sodales id. Quisque molestie et mauris efficitur lacinia.
                    <strong class="block not-italic mt-6 text-primary">FRANK</strong>
                </h3>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center -mt-8 md:-mt-16 lg:-mt-24 relative">
            <a href="#">
            <img src="https://raw.githubusercontent.com/highscoresl/tw-social-landing-template/master/public/images/avatar1.jpg" class="w-12 h-12 md:w-24 md:h-24 lg:w-32 lg:h-32 mx-2 lg:mx-4 object-cover rounded-full border-2 md:border-4 border-white">
            </a>
            <a href="#">
            <img src="https://raw.githubusercontent.com/highscoresl/tw-social-landing-template/master/public/images/avatar2.jpg" class="w-12 h-12 md:w-24 md:h-24 lg:w-32 lg:h-32 mx-2 lg:mx-4 object-cover rounded-full border-2 md:border-4 border-white">
            </a>
            <a href="#">
            <img src="https://raw.githubusercontent.com/highscoresl/tw-social-landing-template/master/public/images/avatar3.jpg" class="w-16 h-16 md:w-32 md:h-32 lg:w-48 lg:h-48 mx-2 lg:mx-4 object-cover rounded-full border-2 md:border-4 border-white">
            </a>
            <a href="#">
            <img src="https://raw.githubusercontent.com/highscoresl/tw-social-landing-template/master/public/images/avatar4.jpg" class="w-12 h-12 md:w-24 md:h-24 lg:w-32 lg:h-32 mx-2 lg:mx-4 object-cover rounded-full border-2 md:border-4 border-white">
            </a>
            <a href="#">
            <img src="https://raw.githubusercontent.com/highscoresl/tw-social-landing-template/master/public/images/avatar5.jpg" class="w-12 h-12 md:w-24 md:h-24 lg:w-32 lg:h-32 mx-2 lg:mx-4 object-cover rounded-full border-2 md:border-4 border-white">
            </a>
        </div>
        </div>
        <div id="contact" class="container mx-auto px-6 py-24">
        <h3 class="flex flex-col items-center text-4xl text-secondary font-bold mb-12">I need more info! <span class="bg-primary h-1 w-20 block mt-4"></span></h3>
        <div class="flex shadow-lg md:w-2/3 lg:w-1/2 xl:w-2/5 p-1 rounded-full overflow-hidden mx-auto bg-white">
            <input type="text" name="" placeholder="Insert your mail" class="h-16 text-secondary-700 w-64 flex-1 px-8 text-lg focus:outline-none">
            <button class="bg-primary w-32 uppercase font-bold text-secondary rounded-full">Send</button>
        </div>
        </div>
    </div>
    <footer class="bg-blue-100">
        <div class="container mx-auto px-6 py-12 text-secondary-500 text-center border-t border-gray-300">
        <p>Copyright ©2019 TaildwindComponents. All rights reserved. | Illustrations by <a href="https://freepik.com/" class="text-secondary-900 font-bold underline">Freepik</a> | Avatars by <a href="https://uifaces.co/" class="text-secondary-900 font-bold underline">UI Faces</a></p>
        </div>
    </footer>
</x-website-layout>

