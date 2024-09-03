@extends('layouts.server')

@section('title', 'Detail pengembalian')
@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Detail Transaksi
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
                <div class="font-medium text-base truncate">Detail Transaksi</div>
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
            <div class="flex items-center">
                <i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i> Payment Method:
                <div class="ml-auto">Direct bank transfer</div>
            </div>
            <div class="flex items-center mt-3">
                <i data-lucide="credit-card" class="w-4 h-4 text-slate-500 mr-2"></i> Total Price (2 items):
                <div class="ml-auto">$12,500.00</div>
            </div>
            <div class="flex items-center mt-3">
                <i data-lucide="credit-card" class="w-4 h-4 text-slate-500 mr-2"></i> Total Shipping Cost (800 gr):
                <div class="ml-auto">$1,500.00</div>
            </div>
            <div class="flex items-center mt-3">
                <i data-lucide="credit-card" class="w-4 h-4 text-slate-500 mr-2"></i> Shipping Insurance:
                <div class="ml-auto">$600.00</div>
            </div>
            <div class="flex items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5 mt-5 font-medium">
                <i data-lucide="credit-card" class="w-4 h-4 text-slate-500 mr-2"></i> Grand Total:
                <div class="ml-auto">$15,000.00</div>
            </div>
        </div>
    </div>
    <div class="col-span-12 lg:col-span-7 2xl:col-span-8">
        <div class="box p-5 rounded-md">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                <div class="font-medium text-base truncate">Order Details</div>
                <a href="" class="flex items-center ml-auto text-primary"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Add Notes </a>
            </div>
            <div class="overflow-auto lg:overflow-visible -mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap !py-5">Product</th>
                            <th class="whitespace-nowrap text-right">Unit Price</th>
                            <th class="whitespace-nowrap text-right">Qty</th>
                            <th class="whitespace-nowrap text-right">Total</th>
                            <th class="whitespace-nowrap text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loan->loandetails as $loan)

                        @endforeach
                        <tr>
                            <td class="!py-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        <img alt="Midone - HTML Admin Template" class="rounded-lg border-2 border-white shadow-md tooltip" src="dist/images/preview-15.jpg" title="Uploaded at 16 May 2022">
                                    </div>
                                    <a href="" class="font-medium whitespace-nowrap ml-4">Sony Master Series A9G</a>
                                </div>
                            </td>
                            <td class="text-right">$75,000.00</td>
                            <td class="text-right">2</td>
                            <td class="text-right">$150,000.00</td>
                            <td class="text-center">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center text-primary whitespace-nowrap" href=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Kembalikan </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END: Transaction Details -->
@endsection
