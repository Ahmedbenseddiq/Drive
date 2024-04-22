@extends('layout.layout')



@section('content')

<div class="flex items-center justify-center min-h-screen p-6 bg-black">
    <div class="w-full max-w-4xl overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800" style="width: 30%;">
        <div class="flex flex-col overflow-y-auto md:flex-col">
            <div class="flex items-center justify-center p-6 sm:p-12">
                <div class="w-full md:w-full">
                    <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">Create Category</h1>
                    <form action="" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="registration_number">Registration Number</label>
                                <input id="registration_number" name="registration_number" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Registration Number" />
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="price_per_day">Price Per Day</label>
                                <input id="price_per_day" name="price_per_day" type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Price Per Day" />
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="availability">Availability</label>
                                <select id="availability" name="availability" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-select">
                                    <option value="">Select Availability</option>
                                    <option value="available">Available</option>
                                    <option value="Reserved">Reserved</option>
                                    <option value="Maintenance">Maintenance</option>
                                </select>
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="carburant">Carburant</label>
                                <select id="carburant" name="carburant" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-select">
                                    <option value="">Select Carburant</option>
                                    <option value="fuel">Fuel</option>
                                    <option value="diesel">Diesel</option>
                                    <option value="electric">Electric</option>
                                    <option value="hybrid">Hybrid</option>
                                </select>
                            </div>
                            
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="category_id">Category</label>
                                <select id="category_id" name="category_id" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-select">
                                    <option value="">Select Category</option>
                                    <!-- Add your category options here -->
                                    <option value="1">Sedan</option>
                                    <option value="2">SUV</option>
                                    <option value="3">Truck</option>
                                </select>
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="car_detail_id">Car Details</label>
                                <select id="car_detail_id" name="car_detail_id" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-select">
                                    <option value="">Select Car Details</option>
                                    <!-- Add your car details options here -->
                                    <option value="1">Model A</option>
                                    <option value="2">Model B</option>
                                    <option value="3">Model C</option>
                                </select>
                            </div>
                            
                            <div class="mt-4" hidden>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="operator_id">Operator ID</label>
                                <input id="operator_id" name="operator_id" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Operator ID" />
                            </div>
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