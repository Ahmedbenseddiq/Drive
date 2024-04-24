@extends('layout.layout')


@section('content')
<body class="bg-gray-100 dark:bg-gray-800">
    <div class="min-h-screen flex flex-col justify-center items-center mx-10">
      <img src="https://www.svgrepo.com/show/426192/cogs-settings.svg" alt="Logo" class="mb-8 h-40">
      <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-center text-gray-700 dark:text-white mb-4">Access to this website is restricted.</h1>
      <p class="text-center text-gray-500 dark:text-gray-300 text-lg md:text-xl lg:text-2xl mb-8">Your access to this website has been restricted due to a violation of our terms and policies. Please review our guidelines to ensure compliance for future access.</p>
      <div class="flex space-x-4">
        <a href="#" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded dark:bg-gray-700 dark:hover:bg-gray-600">Contact Us</a>
        <a href="#" class="border-2 border-gray-800 text-black font-bold py-3 px-6 rounded dark:text-white dark:border-white">View our terms and policies.</a>
      </div>
    </div>
  </body>

@endsection