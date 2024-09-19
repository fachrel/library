@extends('layouts.client')

@section('title', 'Buku')
@section('content')
    <div class="container">
        <div class="mt-6">
            <div class="box p-8 relative overflow-hidden bg-primary intro-y">
                <div class="leading-[2.15rem] w-full sm:w-72 text-white text-xl -mt-3">Perpustakaan</div>
                <div class="w-full sm:w-72 leading-relaxed text-white/70 dark:text-slate-500 mt-3">Registrasi dan mulai pinjam buku, dengan datang ke perpustakaan!</div>
                <a href="/register" class="btn w-32 bg-white dark:bg-darkmode-800 dark:text-white mt-6 sm:mt-10">Registrasi</a>
                <img class="hidden sm:block absolute top-0 right-0 w-50 -mt-3 mr-2" alt="Midone - HTML Admin Template" src={{asset("Tinker/Compiled/dist/images/phone-illustration.svg")}}>
            </div>
        </div>
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Katalog Buku
            </h2>
        </div>
        <div class="intro-y col-span-12 lg:col-span-8 mt-5">
            <div class="lg:flex">
                <div class="relative">
                    <input type="text" class="form-control box w-full px-4 py-3 pr-10 lg:w-64"
                        placeholder="Search item...">
                    <i class="absolute inset-y-0 right-0 my-auto mr-3 h-4 w-4 text-slate-500" data-lucide="search"></i>
                </div>
                <select class="form-select box ml-auto mt-3 w-full px-4 py-3 lg:mt-0 lg:w-auto">
                    <option>Sort By</option>
                    <option>A to Z</option>
                    <option>Z to A</option>
                    <option>Lowest Price</option>
                    <option>Highest Price</option>
                </select>
            </div>
            <div class="intro-x mt-5 grid grid-cols-12 gap-5 border-t pt-5">
                @foreach ($books as $book)
                    <div class="col-span-12 lg:col-span-4 xl:col-span-2">
                        <div class="box">
                            <div class="p-5">
                                <div class="h-64 md:h-96 image-fit rounded-md overflow-hidden relative before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                                    <img alt="Midone - HTML Admin Template" class="rounded-md object-cover h-full w-full" src="{{ asset('storage/'.$book->photo)}}">
                                    <span class="absolute top-0 bg-pending/80 text-white text-xs m-5 px-2 py-1 rounded z-10">Featured</span>
                                    <div class="absolute bottom-0 text-white px-5 pb-6 z-10">
                                        <h2 class="block font-medium text-base">{{ $book->name }}</h2>
                                        <span class="text-white/90 text-xs mt-3">{{ $book->author }}</span>
                                    </div>
                                </div>
                                <div class="text-slate-600 dark:text-slate-500 mt-3">
                                    @foreach ($book->categories as $category)
                                        <span class="bg-success/20 text-success rounded px-2 ml-1">{{ $category->name }}</span>
                                        {{-- <div class="bg-success/20 text-success rounded px-2 mr-3"></div> --}}
                                    @endforeach
                                    <div class="flex items-center mt-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="link" data-lucide="link" class="lucide lucide-link w-4 h-4 mr-2"><path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"></path></svg> Tahun Terbit: {{ $book->year }}  </div>
                                    <div class="flex items-center mt-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Penerbit: {{ $book->publisher }} </div>
                                    <div class="flex items-center mt-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="layers" data-lucide="layers" class="lucide lucide-layers w-4 h-4 mr-2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg> Stok: {{ $book->quantity - $book->CountBorrowedBook() }}/{{ $book->quantity }} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
