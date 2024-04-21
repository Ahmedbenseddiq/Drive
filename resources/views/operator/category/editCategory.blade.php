@extends('layout.layout')



@section('content')

<div class="flex items-center justify-center min-h-screen p-6 bg-black">
    <div class="w-full max-w-4xl overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800" style="width: 30%;">
        <div class="flex flex-col overflow-y-auto md:flex-col">
            <div class="flex items-center justify-center p-6 sm:p-12">
                <div class="w-full md:w-full">
                    <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">Create Category</h1>
                    <form action="/operator/category/updateCategory/{{$category->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="title">Name</label>
                            <input id="name" value="{{ $category->name }}" name="name" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Name" />
                        </div>
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="image">Image</label>
                            <input type="file" id="image" value="{{ $category->image }}" name="image" accept="image/*" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                        </div>
                        <div class="flex justify-between mt-6">
                            <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Create Category</button>
                            <a href="home.html" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection