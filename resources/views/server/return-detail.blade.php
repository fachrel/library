@extends('layouts.server')

@section('title', 'Detail pengembalian')
@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Detail Pengembalian
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <button class="btn btn-primary shadow-md mr-2">Print</button>

    </div>
</div>
<!-- BEGIN: Transaction Details -->
<div class="intro-y grid grid-cols-11 gap-5 mt-5">
    <div class="col-span-12 lg:col-span-4 2xl:col-span-3">
        <div class="box p-5 rounded-md">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                <div class="font-medium text-base truncate">Detail Peminjaman</div>
                <a href="" class="flex items-center ml-auto text-primary"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Change Status </a>
            </div>
            <div class="flex items-center"> <i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i> Invoice: <a href="" class="underline decoration-dotted ml-1">{{ $loan->invoice }}</a> </div>
            <div class="flex items-center mt-3"> <i data-lucide="calendar" class="w-4 h-4 text-slate-500 mr-2"></i> Tanggal Peminjaman: {{ $loan->borrowed_at }} </div>
            <div class="flex items-center mt-3"> <i data-lucide="calendar" class="w-4 h-4 text-slate-500 mr-2"></i> Tanggal Harus Dikembalikan: <span class="text-danger">{{ $loan->must_returned_at }}</span> </div>
            <div class="flex items-center mt-3"> <i data-lucide="clock" class="w-4 h-4 text-slate-500 mr-2"></i>
                Status Transaksi:
                <span class="bg-success/20 text-success rounded px-2 ml-1">
                    Completed
                </span>
            </div>
        </div>
        <div class="box p-5 rounded-md mt-5">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                <div class="font-medium text-base truncate">Detail Peminjam</div>
                <a href="" class="flex items-center ml-auto text-primary"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> View Details </a>
            </div>
            <div class="flex items-center"> <i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i> Nama: <a href="" class="underline decoration-dotted ml-1">{{ $loan->user->name }}</a> </div>
            <div class="flex items-center mt-3"> <i data-lucide="calendar" class="w-4 h-4 text-slate-500 mr-2"></i> Email: {{ $loan->user->email }} </div>
            <div class="flex items-center mt-3"> <i data-lucide="map-pin" class="w-4 h-4 text-slate-500 mr-2"></i> Alamat: {{ $loan->user->address }} </div>
        </div>
        <div class="box p-5 rounded-md mt-5">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                <div class="font-medium text-base truncate">Detail Denda</div>
            </div>
            <div class="flex items-center mt-3">
                <i data-lucide="book" class="w-4 h-4 text-slate-500 mr-2"></i> Buku jumlah yang didenda :
                <div class="ml-auto">{{ $loan->countWithFine() }}</div>
            </div>
            {{-- <div class="flex items-center mt-3">
                <i data-lucide="credit-card" class="w-4 h-4 text-slate-500 mr-2"></i> Total Shipping Cost (800 gr):
                <div class="ml-auto">$1,500.00</div>
            </div>
            <div class="flex items-center mt-3">
                <i data-lucide="credit-card" class="w-4 h-4 text-slate-500 mr-2"></i> Shipping Insurance:
                <div class="ml-auto">$600.00</div>
            </div> --}}
            <div class="flex items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5 mt-5 font-medium">
                <i data-lucide="credit-card" class="w-4 h-4 text-slate-500 mr-2"></i> Total denda:
                <div class="ml-auto">{{ $loan->calculateTotalFine() }}</div>
            </div>
        </div>
    </div>
    <div class="col-span-12 lg:col-span-7 2xl:col-span-8">
        <div class="box p-5 rounded-md">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                <div class="font-medium text-base truncate">Buku yang dipinjam</div>
                <a href="" class="flex items-center ml-auto text-primary"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Add Notes </a>
            </div>
            <div class="overflow-auto lg:overflow-visible -mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap !py-5">Nama Buku</th>
                            <th class="whitespace-nowrap">Invoice</th>
                            <th class="whitespace-nowrap text-right">Dipinjam</th>
                            <th class="whitespace-nowrap text-right">Dikembalikan</th>
                            <th class="whitespace-nowrap text-right">Denda</th>
                            <th class="whitespace-nowrap text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loan->loandetails as $loan)
                        <tr>
                            <td class="!py-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        <img alt="Midone - HTML Admin Template" class="rounded-lg border-2 border-white shadow-md tooltip" src="{{ asset('storage/'.$loan->book->photo)}}" title="{{ $loan->book->name }}">
                                    </div>
                                    <a href="" class="font-medium whitespace-nowrap ml-4">{{ $loan->book->name }}</a>
                                </div>
                            </td>
                            <td class="">{{ $loan->invoice }}</td>
                            <td class="text-right">{{ $loan->borrowed_at }}</td>
                            <td class="text-right">{{ $loan->returned_at }}</td>
                            <td class="text-right">{{ $loan->calculateFine() }}</td>
                            <td class="text-center">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;" data-tw-toggle="modal" data-tw-target="#confirm-modal-{{ $loan->id }}""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Kembalikan </a>
                                </div>
                            </td>
                        </tr>

                        <div id="confirm-modal-{{ $loan->id }}" class="modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body p-0">
                                        <div class="p-5 text-center"> <i data-lucide="check-circle" class="w-16 h-16 text-success mx-auto mt-3"></i>
                                            <div class="text-3xl mt-5">Apakah anda yakin ingin mengembalikan buku?</div>
                                        </div>
                                        <div class="px-5 pb-8 text-center justify-center items-center flex">
                                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                            <form action="/return-book/{{ $loan->id }}" method="post">
                                                @method('put')
                                                @csrf
                                                <button type="submit" class="btn btn-success text-white w-24">Kembalikan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- END: Modal Content -->
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END: Transaction Details -->
@endsection
