<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4 mt-3">
        <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('Tinker/Compiled/dist/images/logo.svg')}}">
        <span class="hidden xl:block text-white text-lg ml-3"> Tinker </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{ route('admin') }}" class="side-menu {{ request()->routeIs('admin') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="{{ route('users.index') }}" class="side-menu {{ request()->routeIs('users.index') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                <div class="side-menu__title"> Users </div>
            </a>
        </li>
        <li>
            <a href="{{ route('categories.index') }}" class="side-menu {{ request()->routeIs('categories.index') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                <div class="side-menu__title"> Kategori </div>
            </a>
        </li>
        <li>
            <a href="{{ route('books.index') }}" class="side-menu {{ request()->routeIs('books.index') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="book"></i> </div>
                <div class="side-menu__title"> Buku </div>
            </a>
        </li>
        <li>
            <a href="{{ route('borrow.index') }}" class="side-menu {{ request()->routeIs('borrow.index') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="corner-up-right"></i> </div>
                <div class="side-menu__title"> Peminjaman </div>
            </a>
        </li>
        <li>
            <a href="{{ route('return.index') }}" class="side-menu {{ request()->routeIs('return.index') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="corner-up-left"></i> </div>
                <div class="side-menu__title"> Pengembalian </div>
            </a>
        </li>
    </ul>
</nav>
