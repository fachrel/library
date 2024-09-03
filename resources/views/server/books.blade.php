@extends('layouts.server')

@section('title', 'Buku')
@section('content')
    <!-- BEGIN: Modal Toggle -->
    <div class="mt-5"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#create-book-modal" class="btn btn-primary">Tambah Buku</a> </div> <!-- END: Modal Toggle -->
    <!-- BEGIN: Modal Content -->
    <div id="create-book-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="post" action="/admin/books" enctype="multipart/form-data">
                    @csrf
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Tambah Buku</h2>
                    </div> <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12">
                            <label for="regular-form-1" class="form-label">Nama Buku</label>
                            <input id="regular-form-1" type="text" name="name" class="form-control" placeholder="Cth: Malioboro at Midnight">
                        </div>
                        <div class="mt-3 col-span-12">
                            <label for="regular-form-1" class="form-label">Nama Penulis</label>
                            <input id="regular-form-1" type="text" name="author" class="form-control" placeholder="Cth: Skysphire">
                        </div>
                        <div class="mt-3 col-span-12">
                            <label for="regular-form-1" class="form-label">Penerbit</label>
                            <input id="regular-form-1" type="text" name="publisher" class="form-control" placeholder="Cth: Bukune">
                        </div>
                        <div class="mt-3 col-span-12 sm:col-span-6">
                            <label for="regular-form-1" class="form-label">Tahun Rilis</label>
                            <input id="regular-form-1" type="text" name="year" class="form-control" placeholder="Cth: 2020">
                        </div>
                        <div class="mt-3 col-span-12 sm:col-span-6">
                            <label for="regular-form-1" class="form-label">Jumlah Buku</label>
                            <input id="regular-form-1" type="number" name="quantity" class="form-control" placeholder="Cth: 3">
                        </div>
                        <div class="mt-3 col-span-12">
                            <label for="regular-form-1" class="form-label">Kategori</label>
                            <select data-placeholder="Select your favorite actors" class="tom-select w-full" multiple name="categories[]">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3 col-span-12">
                            <label for="regular-form-1" class="form-label">Upload Cover</label>
                            <input class="form-control p-2" name="image" type="file" />
                        </div>
                    </div> <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Batal</button>
                        <button type="submit" class="btn btn-primary w-20">Simpan</button>
                    </div> <!-- END: Modal Footer -->
                </form>

            </div>
        </div>
    </div> <!-- END: Modal Content -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Seller Details
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button class="btn btn-primary shadow-md mr-2">Print</button>
            <div class="dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="plus" class="lucide lucide-plus w-4 h-4" data-lucide="plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file" data-lucide="file" class="lucide lucide-file w-4 h-4 mr-2"><path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline></svg> Export Word </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file" data-lucide="file" class="lucide lucide-file w-4 h-4 mr-2"><path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline></svg> Export PDF </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: Seller Details -->
    <div class="intro-y grid grid-cols-11 gap-5 mt-5">
        <div class="col-span-12">
            <div class="grid grid-cols-12 gap-5">
                @foreach ($books as $book)
                    <div class="intro-y col-span-12 sm:col-span-3 2xl:col-span-2">
                        <div class="box">
                            <div class="p-5">
                                <div class="h-64 md:h-96 image-fit rounded-md overflow-hidden relative before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                                    <img alt="Midone - HTML Admin Template" class="rounded-md object-cover h-full w-full" src="{{ asset('storage/'.$book->photo)}}">
                                    <span class="absolute top-0 bg-pending/80 text-white text-xs m-5 px-2 py-1 rounded z-10">Featured</span>
                                    <div class="absolute bottom-0 text-white px-5 pb-6 z-10">
                                        <a href="" class="block font-medium text-base">{{ $book->name }}</a>
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
                            <div class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                                <a class="flex items-center text-primary mr-auto" href="javascript:;"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="eye" data-lucide="eye" class="lucide lucide-eye w-4 h-4 mr-1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> Preview </a>
                                <a class="flex items-center mr-3" href="javascript:;"  data-tw-toggle="modal" data-tw-target="#edit-book-modal-{{ $book->id }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Edit </a>
                                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-modal-{{ $book->id }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>
                            </div>
                        </div>
                        <div id="delete-modal-{{ $book->id }}" class="modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body p-0">
                                        <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                            <div class="text-3xl mt-5">Are you sure?</div>
                                            <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                                        </div>
                                        <div class="px-5 pb-8 text-center justify-center items-center flex">
                                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                            <form action="/admin/books/{{ $book->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger w-24">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- END: Modal Content -->

                        <div id="edit-book-modal-{{ $book->id }}" class="modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form method="post" action="/admin/books/{{ $book->id }}" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <!-- BEGIN: Modal Header -->
                                        <div class="modal-header">
                                            <h2 class="font-medium text-base mr-auto">Edit Buku</h2>
                                        </div> <!-- END: Modal Header -->
                                        <!-- BEGIN: Modal Body -->
                                        <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                            <div class="col-span-12">
                                                <label for="regular-form-1" class="form-label">Nama Buku</label>
                                                <input id="regular-form-1" type="text" name="name" value="{{ $book->name }}" class="form-control" placeholder="Cth: Malioboro at Midnight">
                                            </div>
                                            <div class="mt-3 col-span-12">
                                                <label for="regular-form-1" class="form-label">Nama Penulis</label>
                                                <input id="regular-form-1" type="text" name="author" value="{{ $book->author }}" class="form-control" placeholder="Cth: Skysphire">
                                            </div>
                                            <div class="mt-3 col-span-12">
                                                <label for="regular-form-1" class="form-label">Penerbit</label>
                                                <input id="regular-form-1" type="text" name="publisher" value="{{ $book->publisher }}" class="form-control" placeholder="Cth: Bukune">
                                            </div>
                                            <div class="mt-3 col-span-12 sm:col-span-6">
                                                <label for="regular-form-1" class="form-label">Tahun Rilis</label>
                                                <input id="regular-form-1" type="text" name="year" value="{{ $book->year }}" class="form-control" placeholder="Cth: 2020">
                                            </div>
                                            <div class="mt-3 col-span-12 sm:col-span-6">
                                                <label for="regular-form-1" class="form-label">Jumlah Buku</label>
                                                <input id="regular-form-1" type="number" name="quantity" value="{{ $book->quantity }}" class="form-control" placeholder="Cth: 3">
                                            </div>
                                            <div class="mt-3 col-span-12">
                                                <label for="regular-form-1" class="form-label">Kategori</label>
                                                <select data-placeholder="Select your favorite actors" class="tom-select w-full" multiple name="categories[]">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $book->categories->contains($category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mt-3 col-span-12">
                                                <label for="regular-form-1" class="form-label">Upload Cover</label>
                                                <input class="form-control p-2" name="image" value="{{ $book->image }}" type="file" />
                                            </div>
                                        </div> <!-- END: Modal Body -->
                                        <!-- BEGIN: Modal Footer -->
                                        <div class="modal-footer">
                                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Batal</button>
                                            <button type="submit" class="btn btn-primary w-20">Simpan</button>
                                        </div> <!-- END: Modal Footer -->
                                    </form>

                                </div>
                            </div>
                        </div> <!-- END: Modal Content -->
                    </div>


                @endforeach
            </div>
            <!-- BEGIN: Pagination -->
            <div class="intro-y col-span-11 flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-6">
                <nav class="w-full sm:w-auto sm:mr-auto">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-left" class="lucide lucide-chevrons-left w-4 h-4" data-lucide="chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg> </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-left" class="lucide lucide-chevron-left w-4 h-4" data-lucide="chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg> </a>
                        </li>
                        <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                        <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                        <li class="page-item">
                            <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-right" class="lucide lucide-chevron-right w-4 h-4" data-lucide="chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-right" class="lucide lucide-chevrons-right w-4 h-4" data-lucide="chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> </a>
                        </li>
                    </ul>
                </nav>
                <select class="w-20 form-select box mt-3 sm:mt-0">
                    <option>10</option>
                    <option>25</option>
                    <option>35</option>
                    <option>50</option>
                </select>
            </div>
            <!-- END: Pagination -->
        </div>
    </div>
@endsection
