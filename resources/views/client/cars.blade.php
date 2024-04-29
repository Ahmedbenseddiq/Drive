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
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="block px-4 py-2 text-white">Logout</button>
                                </form>
                            </li>
                            <li><a href="#" class="block px-4 py-2 text-white">Profil</a></li>
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
                            <li><a href="{{ route('client.home') }}" class="block px-4 py-2 text-white">Home</a></li>
                            <li><a href="{{ route('client.cars') }}" class="block px-4 py-2 text-white">Cars</a></li>
                            <li><a href="#" class="block px-4 py-2 text-white">Categories</a></li>
                            <li><a href="#" class="block px-4 py-2 text-white">Reservation History</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <div class="flex justify-center mx-auto w-3/4 mt-10 relative">
                <div class="bg-transparent py-16">
                    <div class="container mx-auto px-4">
                        <h2 class="text-3xl text-center font-bold text-white mb-8">Discover Our Cars In Stock</h2>
                        <form class="flex flex-col my-10 md:flex-row gap-3">
                            <div class="flex">
                                <input type="text" placeholder="Search for cars by brand or model"
                                    class="w-full md:w-80 px-3 h-10 bg-transparent rounded-l border-2 border-sky-300 focus:outline-none focus:border-sky-500"
                                    >
                                <button type="submit" class="bg-white text-black rounded-r px-2 md:px-3 py-0 md:py-1">Search</button>
                            </div>
                            <select name="category_id" class="w-full bg-transparent md:w-1/5 h-10 border-2 border-sky-300 focus:outline-none focus:border-sky-300 text-bold text-gray-500 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider backdrop-filter backdrop-blur-lg appearance-none">
                                <option value="All" selected>All</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            
                        </form>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            @foreach ($cars as $car)                                
                            <div class="bg-white rounded-lg shadow-lg p-8">
                                <div class="relative overflow-hidden">
                                    <img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">
                                    <div class="absolute inset-0 bg-black opacity-40"></div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <a href="{{ route('client.singleCar', ['carId' => $car->id]) }}" class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300">View Car</a>   
                                    </div>
                                </div>
                                @if ($car->carDetail)
                                    <h3 class="text-xl font-bold text-gray-900 mt-4 text-center">{{ $car->carDetail->brand }},{{ $car->carDetail->model }}</h3>
                                @else
                                    <p>No car details available</p>
                                @endif
                                <div class="flex items-center justify-between me-2 mt-2">
                                    <div class="flex items-center">
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
                                    @if($car->likes->contains('client_id', auth()->user()->clients()->first()->id)) 
                                    <button class="like-btn bg-white rounded-full p-2 hover:bg-gray-200" data-car-id="{{ $car->id }}" data-url="{{ route('client.like', ['car' => $car->id]) }}" style="display: none;">
                                            <!-- Outlined heart icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                            </svg>
                                        </button>
                                        <!-- If the car is liked, display the button to unlike -->
                                        <button class="unlike-btn bg-white rounded-full p-2 hover:bg-gray-200" data-car-id="{{ $car->id }}" data-url="{{ route('client.unlike', ['car' => $car->id]) }}">
                                            <!-- Filled heart icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                                            </svg>
                                        </button>
                                       
                                    @else
                                        <!-- If the car is not liked, display the button to like -->
                                        <button class="like-btn bg-white rounded-full p-2 hover:bg-gray-200" data-car-id="{{ $car->id }}" data-url="{{ route('client.like', ['car' => $car->id]) }}">
                                            <!-- Outlined heart icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                            </svg>
                                        </button>
                                        <button class="unlike-btn bg-white rounded-full p-2 hover:bg-gray-200" data-car-id="{{ $car->id }}" data-url="{{ route('client.unlike', ['car' => $car->id]) }}" style="display: none;">
                                            <!-- Filled heart icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                                            </svg>
                                        </button>
                                    @endif
                                
                                    <!-- Like Count -->
                                    <span class="like-count">{{ $car->likes->count() }}</span>

                                </div>
                                                                
                                <div class="flex items-center justify-between mt-4">
                                    <span class="text-gray-900 font-bold text-lg">{{ $car->price_per_day }} MAD/Day</span>
                                    <button data-modal-target="reservation-modal-{{ $car->id }}" data-modal-toggle="reservation-modal-{{ $car->id }}" class="block bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800" type="button">
                                        Reserve
                                    </button>
                                </div>
                                <div id="reservation-modal-{{ $car->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    Create New Reservation
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="reservation-modal-{{ $car->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form class="p-4 md:p-5" action="{{ route('client.reservation', ['carId' => $car->id]) }}" method="POST">
                                                @csrf
                                                <div class="grid gap-4 mb-4 grid-cols-1 md:grid-cols-2">
                                                    <div>
                                                        <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date</label>
                                                        <input type="date" name="start_date" id="start_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                                    </div>
                                                    <div>
                                                        <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date</label>
                                                        <input type="date" name="end_date" id="end_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                                    </div>
                                                    <input name="client_id" value="{{ $clientId }}" hidden>
                                                </div>
                                                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Add Reservation
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                                
                                
                            </div>                            
                            @endforeach
                        </div>
                
                    </div>
                </div>
            </div>
            
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
