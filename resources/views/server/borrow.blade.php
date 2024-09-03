@extends('layouts.server')

@section('title', 'Peminjaman Buku')
@section('content')
    <!-- END: Top Bar -->
    <div class="mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">
            Peminjaman
        </h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#select-user"
                class="btn btn-primary mr-2 shadow-md">Pilih Peminjam</a>
        </div>
        <div id="select-user" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="/select-user">
                        @csrf
                        <!-- BEGIN: Modal Header -->
                        <div class="modal-header">
                            <h2 class="font-medium text-base mr-auto">Pilih Peminjam</h2>
                        </div> <!-- END: Modal Header -->
                        <!-- BEGIN: Modal Body -->
                        <div class="modal-body">
                            <label for="regular-form-1" class="form-label">Pilih Peminjam</label>
                            <select class="form-select" name="user">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{$user->name}}</option>
                                @endforeach
                            </select>
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
    <div class="mt-5 grid grid-cols-12 gap-5">
        <!-- BEGIN: Item List -->
        <div class="col-span-12 lg:col-span-8">
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
            <div class="mt-5 grid grid-cols-12 gap-5 border-t pt-5">
                @foreach ($books as $book)
                    <div class="col-span-12 sm:col-span-4 2xl:col-span-3">
                        <div class="box">
                            <div class="p-5">
                                <div class="h-64 md:h-96 image-fit rounded-md overflow-hidden relative before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                                    <img alt="Midone - HTML Admin Template" class="rounded-md object-cover h-full w-full" src="{{ asset('storage/'.$book->photo)}}">
                                    <span class="absolute top-0 bg-pending/80 text-white text-xs m-5 px-2 py-1 rounded z-10">Featured</span>
                                    <div class="absolute bottom-0 text-white px-5 pb-6 z-10">
                                        <a href="{{ route('addbook.to.cart', $book->id) }}" class="block font-medium text-base">{{ $book->name }}</a>
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
        <!-- END: Item List -->
        <!-- BEGIN: Ticket -->
        <div class="col-span-12 lg:col-span-4">
            <div class="pr-1">
                <div class="box p-2">
                    <ul class="nav nav-pills" role="tablist">
                        <li id="ticket-tab" class="nav-item flex-1" role="presentation">
                            <button class="nav-link active w-full py-2" data-tw-toggle="pill" data-tw-target="#ticket"
                                type="button" role="tab" aria-controls="ticket" aria-selected="true"> Buku
                            </button>
                        </li>
                        <li id="details-tab" class="nav-item flex-1" role="presentation">
                            <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#details"
                                type="button" role="tab" aria-controls="details" aria-selected="false"> Detail
                                Peminjam </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="ticket" class="tab-pane active" role="tabpanel" aria-labelledby="ticket-tab">
                    <div class="box mt-5 p-2">
                        <div class="dark:border-darkmode-400 mb-4 flex border-b border-slate-200/60 pt-2 pb-2 ml-3">
                            <div class="mr-auto text-base font-medium">List Buku</div>
                        </div>
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                <div class="dark:bg-darkmode-600 dark:hover:bg-darkmode-400 flex cursor-pointer items-center rounded-md bg-white p-3 transition duration-300 ease-in-out hover:bg-slate-100">
                                    <div class="mr-1 max-w-[50%] truncate">{{ $details['name'] }}</div>
                                    <div class="text-slate-500">- {{ $details['author'] }}</div>
                                    {{-- <form class="font-medium ml-auto text-danger" action="{{ route('deleteBook.from.cart', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-6 h-6 mr-1">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </button>
                                    </form> --}}
                                    <a class="font-medium ml-auto text-danger" href="{{ route('deleteBook.from.cart', $id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-6 h-6 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <div class="dark:bg-darkmode-600 dark:hover:bg-darkmode-400 flex cursor-pointer items-center rounded-md bg-white p-3 transition duration-300 ease-in-out hover:bg-slate-100">
                                <div class="mr-1 max-w-[50%] truncate">Tidak ada buku.</div>
                                <span class="font-medium ml-auto text-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x-circle" data-lucide="x-circle" class="lucide x-circle w-6 h-6 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="box mt-5 p-5">
                        <div class="flex">
                            <div class="mr-auto">Total Buku</div>
                            <div class="font-medium">{{ count((array) session('cart')) }}</div>
                        </div>
                        <div class="mt-4 flex">
                            <div class="mr-auto">Dikembalikan sebelum</div>
                            <div class="text-danger font-medium">{{ now()->addDays(7)->format('Y-m-d') }}</div>
                        </div>
                    </div>
                    <div class="mt-5 flex">
                        <a href="{{ route('deleteAllBooks.from.cart') }}" class="btn dark:border-darkmode-400 w-32 border-slate-300 text-slate-500">
                            Hapus List
                        </a>
                        <a href="{{ route('borrow.books') }}" class="btn btn-primary ml-auto w-32 shadow-md">Pinjam</a>
                    </div>
                </div>
                <div id="details" class="tab-pane" role="tabpanel" aria-labelledby="details-tab">
                    <div class="box mt-5 p-5">
                        <div class="dark:border-darkmode-400 flex items-center border-b border-slate-200 pb-3">
                            <div>
                                <div class="text-slate-500">Waktu</div>
                                <div class="mt-1">{{ now()->format('Y-m-d') }}</div>
                            </div>
                            <i data-lucide="clock" class="ml-auto h-4 w-4 text-slate-500"></i>
                        </div>
                        <div class="flex items-center pt-3">
                            <div>
                                <div class="text-slate-500">Peminjam</div>
                                @if(session('selectedUser'))
                                    @php
                                        $selectedUser = session('selectedUser');
                                    @endphp
                                    <div class="mt-1">{{ $selectedUser['username'] }}</div>
                                @else
                                    <div class="mt-1 text-red-200">Peminjam belum dipilih</div>
                                @endif
                            </div>
                            <i data-lucide="user" class="ml-auto h-4 w-4 text-slate-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Ticket -->
    </div>
@endsection
