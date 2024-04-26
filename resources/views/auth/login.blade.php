@extends('layout.layout')

@section('content')
<body class="bg-black">
    <!-- Video background -->
    <video autoplay muted loop id="video-bg" class="fixed inset-0 w-full h-full object-cover z-auto">
        <source src="{{ asset('src/video/lambo.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <section class="bg-transparent-50 dark:bg-transparent">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="{{ route('welcome') }}" class="flex items-center z-10 mb-6 text-2xl font-semibold text-tra dark:text-white">
                <img class="w-56 mr-2 z-10" src="./src/images/logo.png" alt="logo">
                    
            </a>
            <div class="w-full bg-white z-10 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-transparent dark:border-t bg-opacity-50 backdrop-filter backdrop-blur-md">
                <div class="p-6 space-y-4 md:space-y-6 z-10 sm:p-8">
                    <h1 class="flex items-center justify-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Welcome back 
                    </h1>
                    <form class="space-y-4 md:space-y-6 z-10" action="{{ route('login') }}" method="post">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" class="bg-blue-400 bg-opacity-25 border border-transparent text-gray-900 sm:text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" class="bg-blue-400 bg-opacity-25 border border-transparent text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="••••••••" required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-transparent focus:ring-3 focus:ring-primary-300 dark:bg-transparent dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                                </div>
                                <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-400 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign in</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Dont have an account yet? <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

