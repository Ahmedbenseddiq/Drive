    @extends('layout.layout')


@section('content')
    <body class="bg-black">
        <div class="relative h-screen">
            <!-- Background video -->
            <div class="fixed top-0 left-0 w-full h-full overflow-hidden">
                <video autoplay muted loop class="w-full h-full object-cover">
                    <source src="{{ asset('src/video/lambo.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="absolute top-0 left-0 w-full h-full backdrop-blur-md"></div>
            </div>
            
        
            <!-- Navigation bar -->
            <nav id="navbar" class="top-0 left-0 right-0  bg-transparent dark:bg-transparent relative z-10">
                <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
                    <!-- Profile dropdown button -->
                    <button data-collapse-toggle="profile-dropdown" type="button" class="inline-flex items-center justify-center p-2 w-10 h-10 text-sm text-gray-500 rounded-lg hover:bg-blur focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-blur dark:focus:ring-gray-600" aria-controls="profile-dropdown" aria-expanded="false">
                        <span class="sr-only">Open profile menu</span>
                        <!-- Profile dropdown icon -->
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </button>
                    <!-- Profile dropdown menu -->
                    <div class="hidden  absolute top-full left-0 w-48 ms-20 bg-transparent z-10 rounded-lg dark:bg-transparent dark:border bg-opacity-50 backdrop-filter backdrop-blur-md dark:border-tbg-transparent" id="profile-dropdown">
                        <ul class="py-1">
                            <li><a href="{{ route('loginpage') }}" class="block px-4 py-2 text-white">Login</a></li>
                            <li><a href="{{ route('registerpage') }}" class="block px-4 py-2 text-white">Register</a></li>
                        </ul>
                    </div>
        
                    <!-- Site title -->
                    <a href="">
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                            <span class="block text-gray-900 dark:text-gray-100">DRIVE</span>
                        </h1>
                    </a>
        
                    <!-- Hamburger menu button -->
                    <button data-collapse-toggle="navbar-hamburger" type="button" class="inline-flex items-center justify-center p-2 w-10 h-10 text-sm text-gray-500 rounded-lg hover:bg-blur focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-blur dark:focus:ring-gray-600" aria-controls="navbar-hamburger" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!-- Hamburger menu icon -->
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                        </svg>
                    </button>
                    <!-- Main menu -->
                    <div class="hidden me-20 w-52 absolute top-full right-0 bg-transparent z-10 rounded-lg dark:bg-transparent dark:border bg-opacity-50 backdrop-filter backdrop-blur-md dark:border-tbg-transparent" id="navbar-hamburger">
                        <ul class="py-1">
                            <li><a href="{{ route('welcome') }}" class="block px-4 py-2 text-white">Home</a></li>
                            <li><a href="{{ route('cars') }}" class="block px-4 py-2 text-white">Cars</a></li>
                            <li><a href="#" class="block px-4 py-2 text-white">Pricing</a></li>
                            <li><a href="#" class="block px-4 py-2 text-white">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        
            <!-- Content -->
            <div class="flex flex-col justify-end items-center z-10 h-full ">
                <!-- Content within the background video -->
                <div class="flex flex-col justify-center items-center mb-20 z-10">
                    <h1 class="text-4xl md:text-5xl xl:text-6xl font-extrabold tracking-tight z-10 leading-none text-white text-center">Embrace the road, ignite your passion.</h1>
                    <p class="mt-4 text-lg text-gray-300 max-w-lg text-center z-10">Embark on the journey of a lifetime, where every turn fuels your passion for the road ahead..</p>
                    <div class="mt-8 flex flex-col items-center z-10 space-y-4">
                        <a href="{{ route('client.cars') }}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:focus:ring-gray-900" style="backdrop-filter: none;" onmouseover="this.parentNode.style.backdropFilter='blur(10px)'" onmouseout="this.parentNode.style.backdropFilter='none'">
                            <span>Cars In Stock</span>
                        </a>
                    </div>                    
                </div>
            </div>
        </div>
        


        <div class="flex justify-center relative z-10">
            <div class="text-center">
                <h2 class="text-white mt-10 mb-10 font-bold" style="font-size: 32px;">Categories</h2>
                <div class="mb-20">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($categories as $category)
                            <div class="block max-w-[18rem] rounded-lg bg-black text-center text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white" style="background-image: url('{{ $category->image }}'); background-size: cover;">
                                <div class="p-6">
                                    <h5 class="mb-1 text-xl font-medium leading-tight">
                                        {{ $category->name }}
                                    </h5>
                                    <h6 class="mb-2 text-transparent font-medium leading-tight ">
                                        Card subtitle
                                    </h6>
                                    <p class="mb-4 text-base text-transparent leading-normal">
                                        Some quick example text to build on the card title and make up the bulk of the card's content.
                                    </p>
                                    <a type="button" href="#" class="pointer-events-auto me-5 inline-block cursor-pointer rounded text-base font-normal leading-normal text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:text-primary-700 dark:text-primary-400">
                                        
                                    </a>
                                    <a type="button" href="#" class="pointer-events-auto inline-block cursor-pointer rounded text-base font-normal leading-normal text-white transition duration-150 ease-in-out hover:text-white focus:text-gray-600 focus:outline-none focus:ring-0 active:text-primary-700 dark:text-primary-400">
                                        view more
                                    </a>
                                </div>
                            </div> 
                            @endforeach 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex justify-center">
            <div class="text-center">
                <h2 class="text-white mt-10 mb-10 font-bold" style="font-size: 32px;">Models</h2>
                <div class="max-w-screen-lg mx-auto"> <!-- Add a wrapper with margin -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @foreach($cars as $car)
                        <div class="group relative cursor-pointer overflow-hidden bg-white p-6 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl rounded-lg">
                            <figure >
                                <img class="rounded" src="https://images.pexels.com/photos/3647693/pexels-photo-3647693.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Shoes" />
                            </figure>
                            <div class="card-body">
                                <h2 class="card-title">
                                    @if ($car->carDetail)
                                    <h3 class="text-xl font-bold text-gray-900 mt-4">{{ $car->carDetail->brand }},{{ $car->carDetail->model }}</h3>
                                @else
                                    <p>No car details available</p>
                                @endif
                                </h2>
                                <div class="flex items-center me-2 mt-2">
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">{{ $car->carburant }}</span>
                                    @if ($car->avalability === 'available')
                                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Available</span>
                                    @elseif ($car->avalability === 'reserved')
                                        <span class="bg-gray-300 text-gray-700 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Reserved</span>
                                    @elseif ($car->avalability === 'maintenance')
                                        <span class="bg-orange-200 text-orange-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Maintenance</span>
                                    @else 
                                        <span class="bg-red-200 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Unknown</span>
                                    @endif
                                </div>                                 
                                <div class="flex items-center justify-between mt-4">
                                    @if ($car->category)
                                    <span class="text-gray-900 font-bold text-lg"><a class="">Category : {{ $car->category->name }}</a></span>                                
                                    @else
                                    <p>No category available</p>
                                    @endif
                                    <span class="text-gray-900 font-bold text-lg">{{ $car->price_per_day }} MAD/Day</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container my-24 mx-auto md:px-6 xl:px-24" style="width: 75%; margin-left: auto; margin-right: auto;">
            <section class="mb-32 z-50">
                <h2 class="mb-6 text-center text-3xl font-bold">Frequently asked questions</h2>
                <div class="relative z-10"> <!-- Ensure this div wraps around the FAQ section -->
                    <div id="accordionFlushExample">
                        <div class="rounded-none border border-l-0 border-r-0 border-t-0 border-neutral-200">
                            <h2 class="mb-0" id="flush-headingTwo">
                                <button class="group relative flex w-full items-center rounded-none border-0 py-4 px-5 text-left text-base font-bold transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:text-primary-400"
                                    type="button" data-te-collapse-init data-te-collapse-collapsed data-te-target="#flush-collapseTwo"
                                    aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Non cupidatat skateboard dolor brunch?
                                    <span class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-[#8FAEE0] dark:group-[[data-te-collapse-collapsed]]:fill-[#eee]">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </span>
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="!visible hidden border-0" data-te-collapse-item
                                aria-labelledby="flush-headingTwo" data-te-parent="#accordionFlushExample">
                                <div class="py-4 px-5 text-neutral-500 dark:text-neutral-300">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                    laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                    coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
                                    anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                    occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't
                                    heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="rounded-none border border-l-0 border-r-0 border-t-0 border-neutral-200">
                            <h2 class="mb-0" id="flush-headingThree">
                                <button class="group relative flex w-full items-center rounded-none border-0 py-4 px-5 text-left text-base font-bold transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:text-primary-400"
                                    type="button" data-te-collapse-init data-te-collapse-collapsed data-te-target="#flush-collapseThree"
                                    aria-expanded="false" aria-controls="flush-collapseThree">
                                    Praesentium voluptatibus temporibus consequatur non aspernatur?
                                    <span class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-[#8FAEE0] dark:group-[[data-te-collapse-collapsed]]:fill-[#eee]">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </span>
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="!visible hidden rounded-b-lg" data-te-collapse-item
                                aria-labelledby="flush-headingThree" data-te-parent="#accordionFlushExample">
                                <div class="py-4 px-5 text-neutral-500 dark:text-neutral-300">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit optio vitae inventore autem fugiat
                                    rerum sed laborum. Natus recusandae laboriosam quos pariatur corrupti id dignissimos deserunt,
                                    praesentium voluptatibus temporibus consequatur non aspernatur laborum rerum nemo dolorem
                                    libero inventore provident exercitationem sunt totam aperiam. Facere sunt quos commodi
                                    obcaecati temporibus alias amet! Quam quisquam laboriosam quae repellendus non cum adipisci
                                    odio?
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
            </section>
        </div>
            
        <footer class="mt-20 bg-transparent dark:bg-transparent">
            <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <a href="https://flowbite.com/" class="flex items-center">
                            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" />
                            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">DRIVE</span>
                        </a>
                    </div>
                    <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Resources</h2>
                            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                <li class="mb-4">
                                    <a href="https://flowbite.com/" class="hover:underline">Flowbite</a>
                                </li>
                                <li>
                                    <a href="https://tailwindcss.com/" class="hover:underline">Tailwind CSS</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                <li class="mb-4">
                                    <a href="https://github.com/themesberg/flowbite" class="hover:underline ">Github</a>
                                </li>
                                <li>
                                    <a href="https://discord.gg/4eeurUVvTy" class="hover:underline">Discord</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="" class="hover:underline">Drive™</a>. All Rights Reserved.
                    </span>
                    <div class="flex mt-4 sm:justify-center sm:mt-0">
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                                <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                            </svg>
                            <span class="sr-only">Facebook page</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                                <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"/>
                            </svg>
                            <span class="sr-only">Discord community</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.517 18.916c-1.06.6-2.24 1.084-3.52 1.44-.16.04-.32.04-.48.04-.72 0-1.4-.2-1.96-.56-.16-.08-.32-.12-.48-.2-.8-.4-1.48-.96-2-1.6a1 1 0 1 1 1.6-1.2c.36.48.84.84 1.36 1.12.12.08.24.16.36.24.04.04.08.08.12.12.76.44 1.64.68 2.56.68.6 0 1.2-.12 1.76-.32a8.67 8.67 0 0 1 2.16-.28c.72 0 1.44.12 2.12.32.68.2 1.32.48 1.92.84.12.08.24.16.36.24.52.32 1.04.68 1.48 1.12a1 1 0 1 1-1.36 1.48ZM21 12c0 1.1-.9 2-2 2h-.16c-.32-.48-.72-.92-1.2-1.28-.12-.08-.24-.16-.36-.24-.04-.04-.08-.08-.12-.12-.76-.44-1.64-.68-2.56-.68-.6 0-1.2.12-1.76.32a8.67 8.67 0 0 1-2.16.28c-.72 0-1.44-.12-2.12-.32-.68-.2-1.32-.48-1.92-.84-.12-.08-.24-.16-.36-.24-.52-.32-1.04-.68-1.48-1.12a1 1 0 1 1 1.36-1.48c.36.48.84.84 1.36 1.12.12.08.24.16.36.24.04.04.08.08.12.12.48.36.88.8 1.2 1.28H5c-1.1 0-2-.9-2-2V8c0-1.1.9-2 2-2h16c1.1 0 2 .9 2 2v4Z"/>
                            </svg>
                            <span class="sr-only">Instagram profile</span>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
        
@endsection
