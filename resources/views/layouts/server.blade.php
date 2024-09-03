<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.css','resources/js/app.js'])
        <title>Library | @yield('title')</title>

    </head>
    <body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">
        <style>
            .fl-wrapper{
                z-index: 60;
            }
        </style>
        <!-- BEGIN: Mobile Menu -->
        <x-server.mobile-menu />
        <!-- END: Mobile Menu -->
        <div class="flex mt-[4.7rem] md:mt-0 overflow-hidden">
            <!-- BEGIN: Side Menu -->
            <x-server.side-menu />
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <x-server.top-bar :title="view()->yieldContent('title')"/>
                <div id="modal-container"></div>
                @yield('content')
            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: Dark Mode Switcher-->
        <div class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
            <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
            <div class="dark-mode-switcher__toggle border"></div>
        </div>
    </body>
</html>
