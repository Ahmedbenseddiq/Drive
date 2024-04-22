<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css"/>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.3/dist/cdn.min.js"></script>


    </head>
    <body class="bg-black h-full">
    @yield('content')


        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script defer src="{{ asset('src/js/main.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const sidebarToggle = document.getElementById('sidebarToggle');
                const mobileSidebar = document.getElementById('mobileSidebar');
        
                sidebarToggle.addEventListener('click', function () {
                    mobileSidebar.classList.toggle('hidden');
                });
            });
        </script>
        <script>
            window.addEventListener('scroll', function() {
                var navbar = document.getElementById('navbar');
                if (window.scrollY > 0) {
                    navbar.classList.add('backdrop-blur-md');
                    navbar.classList.remove('backdrop-blur-0');
                } else {
                    navbar.classList.remove('backdrop-blur-md');
                    navbar.classList.add('backdrop-blur-0');
                }
            });
        </script>
    </body>
</html>    