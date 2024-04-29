@extends('layout.layout')


@section('content')

<div class="relative h-screen">
    <!-- Background video -->
    {{-- <div class="fixed top-0 left-0 w-full h-full overflow-hidden">
        <video autoplay muted loop class="w-full h-full object-cover">
            <source src="{{ asset('src/video/lambo.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="absolute top-0 left-0 w-full h-full backdrop-blur-md"></div>
    </div> --}}

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

    <!-- Content -->
    <div class="bg-gray-100 dark:bg-black py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 px-4">
                    <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                        <img class="w-full h-full object-cover" src="https://cdn.pixabay.com/photo/2020/05/22/17/53/mockup-5206355_960_720.jpg" alt="Product Image">
                    </div>
                    <div class="flex -mx-2 mb-4">
                        <div class="w-1/2 px-2">
                            <button data-modal-target="reservation-modal-{{ $car->id }}" data-modal-toggle="reservation-modal-{{ $car->id }}" class="block w-full bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700" type="button">
                                Reserve Now
                            </button>
                        </div>
                        <div class="w-1/2 px-2">
                            <a href="{{ route('client.cars') }}">
                                <button class="w-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-gray-300 dark:hover:bg-gray-600">Back to Cars</button>
                            </a>    
                        </div>
                    </div>
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
                            <form class="p-4 md:p-5" action="" method="POST">
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
                                    {{-- <input type="hidden" name="car_id" id="car_id" value=""> --}}
                                    <input type="hidden" name="client_id" value="{{ $clientId }}" disabled>
                                </div>
                                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                    Add Reservation
                                </button>
                            </form> 
                        </div>
                    </div>
                </div> 
                <div class="md:flex-1 px-4">
                    @if ($car->carDetail)
                        <h2 class="text-xl font-bold text-gray-900 mt-4">{{ $car->carDetail->brand }}</h2>
                    @else
                        <p>No car details available</p>
                    @endif                    
                    @if ($car->carDetail)
                        <h2 class="text-xl font-bold text-gray-900 mt-4">{{ $car->carDetail->model }}</h2>
                    @else
                        <p>No car details available</p>
                    @endif
                    <div class="flex mb-4">
                        <div class="mr-4 mt-5">
                            <span class="font-bold text-gray-700 dark:text-gray-300">Price:</span>
                            <span class="text-gray-600 dark:text-gray-300">{{ $car->price_per_day }} MAD/Day</span>
                        </div>
                        <div>
                                                   
                        </div>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold text-gray-700 dark:text-gray-300">Availability:</span>
                        <div class="flex items-center mt-2">
                            @if ($car->availability === 'available')
                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Available</span>
                            @elseif ($car->availability === 'reserved')
                                <span class="bg-gray-300 text-gray-700 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Reserved</span>
                            @elseif ($car->availability === 'maintenance')
                                <span class="bg-orange-200 text-orange-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Maintenance</span>
                            @else
                                <span class="bg-red-200 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Unknown</span>
                            @endif 
                        </div>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold text-gray-700 dark:text-gray-300">Carburant:</span>
                        <div class="flex items-center mt-2">
                            <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">{{ $car->carburant }}</span>

                        </div>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700 dark:text-gray-300">Registration NUmber:</span>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                            {{ $car->registration_number }}
                        </p>
                    </div>
                    <div class="mt-5">
                        <span class="font-bold text-gray-700 dark:text-gray-300">Description:</span>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                            {{-- {{ $car->registration_number }} --}}
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection