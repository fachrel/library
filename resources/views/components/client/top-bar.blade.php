<div class="top-bar-boxed border-b border-white/[0.08] mt-12 md:mt-0 -mx-3 sm:-mx-8 md:mx-0 px-3 sm:px-8 md:px-6 mb-10 md:mb-8">
    <div class="h-full flex items-center">
        <!-- BEGIN: Logo -->
        <a href="" class="-intro-x hidden md:flex">
            <img alt="Midone - HTML Admin Template" class="w-6" src="{{asset('Tinker/Compiled/dist/images/logo.svg')}}">
            <span class="text-white text-lg ml-3"> Tinker </span>
        </a>
        <!-- END: Logo -->
        {{-- <nav class="-intro-x h-full mr-auto justify-content-center items-center">
            <a href="#" class="text-white ml-5">Application</a>
            <a href="#" class="text-white ml-5">Application</a>
            <a href="#" class="text-white ml-5">Application</a>
        </nav> --}}
        <nav class="top-nav mr-auto">
            <ul>
                <li>
                    <a href="javascript:;.html" class="top-menu top-menu--active pt-1">
                        <div class="top-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="home" data-lucide="home" class="lucide lucide-home"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> </div>
                        <div class="top-menu__title"> Home </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="top-menu pt-1">
                        <div class="top-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="book-open" data-lucide="book-open" class="lucide lucide-book-open"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg> </div>
                        <div class="top-menu__title"> Semua Buku </div>
                    </a>
                </li>
                @auth
                    <li>
                        <a href="javascript:;" class="top-menu pt-1">
                            <div class="top-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="book" data-lucide="book" class="lucide lucide-book"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg> </div>
                            <div class="top-menu__title"> Buku Saya </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="top-menu pt-1">
                            <div class="top-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="bookmark" data-lucide="bookmark" class="lucide lucide-bookmark"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg> </div>
                            <div class="top-menu__title"> Koleksi Buku </div>
                        </a>
                    </li>
                @endauth

            </ul>
        </nav>
        {{-- <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
            <ol class="breadcrumb breadcrumb-light">
                <li class="text-white ml-3"><a href="#">Semua Buku</a></li>
                @if (Auth::user())
                    <li class="text-white ml-3"><a href="#">Buku Saya</a></li>
                    <li class="text-white ml-3"><a href="#">Koleksi Buku</a></li>
                @endif
            </ol>
        </nav> --}}

        <!-- BEGIN: Account Menu -->
        @if (Auth::user())
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                    <img alt="Midone - HTML Admin Template" src="{{asset('Tinker/Compiled/dist/images/profile-5.jpg')}}">
                </div>
                <div class="dropdown-menu w-56">
                    <ul class="dropdown-content bg-primary text-white">
                        <li class="p-2">
                            <div class="font-medium">{{ Auth::user()->name }}</div>
                            <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">{{ Auth::user()->level }}</div>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="/logout" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                        </li>
                    </ul>
                </div>
            </div>

        @else
            <a href="/login" class="btn btn-rounded w-32 bg-white dark:bg-darkmode-800 dark:text-white">Login</a>
        @endif
        <!-- END: Account Menu -->
    </div>
</div>
