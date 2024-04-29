@extends('layout.layout')


@section('content')

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
    
        <!-- Content -->
        <div class="flex justify-center items-center mx-10 mt-10 z-10 border-t-4 border-b-4 border-white">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-white dark:text-white bg-transparent">
                    <thead class="text-xs text-white uppercase bg-transparent dark:bg-transparent dark:text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">
                                Paid
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Not Paid
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @forelse ($PaidReservations as $PaidReservation)
                                <td class="px-6 py-4 text-center">
                                    <div class="flex flex-col justify-center items-center ml-10">
                                        @if ($loop->first)
                                            <div class="card lg:card-side bg-base-100 shadow-xl">
                                                <figure><img src="https://daisyui.com/images/stock/photo-1494232410401-ad00d5433cfa.jpg" alt="Album"/></figure>
                                                <div class="card-body">
                                                    <h2 class="card-title justify center">{{ $PaidReservation->car->carDetail->brand }}</h2>
                                                    <h2 class="card-title justify center">{{ $PaidReservation->car->carDetail->model }}</h2>                                                        <p>total : 4518 $</p>
                                                    <p>Client: {{ $PaidReservation->client->user->name }}</p>
                                                    <div class="flex mb-5">
                                                        <p>From :  {{ $PaidReservation->start_date }}</p>
                                                        <p>To : {{ $PaidReservation->end_date }}</p>
                                                    </div>
                                                    <div class="flex mb-5">
                                                        <span class="bg-gray-300 text-gray-700 text-xs font-medium me-2 px-2 py-0.5 rounded-full">{{ $PaidReservation->car->category->name }}</span>
                                                        <span class="bg-gray-300 text-gray-700 text-xs font-medium me-2 px-2 py-0.5 rounded-full">{{ $PaidReservation->car->carburant }}</span>
                                                    </div>
                                                    <div class="card-actions justify-end">
                                                        <button class="btn bg-gray-300 text-black">Paid</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            @empty
                                <td class="px-6 py-4 text-center" rowspan="{{ count($NotPaidReservations) }}">No paid reservations found.</td>
                            @endforelse
                        
                        
                
                            @forelse ($NotPaidReservations as $NotPaidReservation)
                                <td class="px-6 py-4 text-center">
                                    <div class="flex flex-col justify-center items-center ml-10">
                                        @if ($loop->first)
                                            <div class="card lg:card-side bg-base-100 shadow-xl">
                                                <figure><img src="https://daisyui.com/images/stock/photo-1494232410401-ad00d5433cfa.jpg" alt="Album"/></figure>
                                                <div class="card-body">
                                                    <h2 class="card-title text-center">{{ $NotPaidReservation->car->carDetail->brand }}</h2>
                                                    <h2 class="card-title text-center">{{ $NotPaidReservation->car->carDetail->model }}</h2>
                                                    <p>Total: 4518 $</p>
                                                    <p>Client: {{ $NotPaidReservation->client->user->name }}</p>
                                                    <div class="flex mb-5">
                                                        <p class="me-2">From: {{ $NotPaidReservation->start_date }}</p>
                                                        <p>To: {{ $NotPaidReservation->end_date }}</p>
                                                    </div>
                                                    <div class="flex mb-5">
                                                        <span class="bg-gray-300 text-gray-700 text-xs font-medium me-2 px-2 py-0.5 rounded-full">{{ $NotPaidReservation->car->category->name }}</span>
                                                        <span class="bg-gray-300 text-gray-700 text-xs font-medium me-2 px-2 py-0.5 rounded-full">{{ $NotPaidReservation->car->carburant }}</span>
                                                    </div>
                                                    <div class="card-actions justify-end">
                                                        <button class="btn btn-primary">Pay</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            @empty
                                <td class="px-6 py-4 text-center">No not paid reservations found.</td>
                            @endforelse
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
    

    <footer class="mt-20  bg-transparent dark:bg-transparent">
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
