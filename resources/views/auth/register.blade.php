@extends('layout.layout')

@section('content')
<body class="bg-black">
    <video autoplay muted loop id="video-bg" class="fixed inset-0 w-full h-full object-cover z-auto">
        <source src="{{ asset('src/video/lambo.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <section class="bg-transparent-50 dark:bg-transparent">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="" class="flex items-center z-10 mb-6 text-2xl font-semibold text-tra dark:text-white">
                <img class="w-8 h-8 mr-2 z-10" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                Drive    
            </a>
            <div class="w-full md:w-10/12 lg:w-8/12 xl:w-6/12 bg-white z-10 rounded-lg shadow dark:border md:mt-0 sm:w-8/12 xl:p-0 dark:bg-transparent dark:border-t bg-opacity-50 backdrop-filter backdrop-blur-md dark:border-tbg-transparent">
                <div class="p-6 space-y-4 md:space-y-6 z-10 sm:p-8">
                    <h1 class="flex items-center justify-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Get Started Today
                    </h1>
                   

                
                    <form class="space-y-4 md:space-y-6 z-10" action="{{ route('register') }}" method="POST">
                        @csrf
                    
                        <!-- Personal Information Section -->
                        <div class="mt-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                            <input type="text" name="name" id="name" class="w-full bg-blue-400 bg-opacity-25 border border-transparent text-gray-900 sm:text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" required>
                        </div>
                    
                        <div class="mt-2">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" class="w-full bg-blue-400 bg-opacity-25 border border-transparent text-gray-900 sm:text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required>
                        </div>
                    
                        <div class="mt-2">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" class="w-full bg-blue-400 bg-opacity-25 border border-transparent text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="••••••••" required>
                        </div>
                    
                        <!-- Role Selection Section -->
                        <div class="mt-4 flex items-center justify-center">
                            <div class="mb-4 flex items-center">
                                <input type="radio" name="role" id="client" value="client" class="hidden" onchange="updateRole()">
                                <label for="client" class="text-sm px-2 py-1 font-medium rounded-md cursor-pointer border border-gray-300 mr-2 select-none" style="background-color: white; color: black;">Client</label>
                                <input type="radio" name="role" id="operator" value="operator" class="hidden" onchange="updateRole()">
                                <label for="operator" class="text-sm px-2 py-1 font-medium rounded-md cursor-pointer border border-gray-300 select-none" style="background-color: transparent; color: inherit;">Operator</label>
                            </div>
                        </div>
                    
                        <!-- Submit Button -->
                        <div class="flex items-center justify-center mt-4">
                            <button type="submit" class="flex items-center justify-center text-black bg-white hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-white dark:hover:bg-gray-200 dark:focus:ring-blue-800">Register</button>
                        </div>
                    
                        <!-- Login Link -->
                        <p class="flex items-center justify-center text-sm font-light mt-2 text-gray-500 dark:text-gray-400">
                            Already have an account? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login</a>
                        </p>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
    
@endsection
