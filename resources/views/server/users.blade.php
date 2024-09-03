@extends('layouts.server')

@section('title', 'Users')
@section('content')
    <!-- BEGIN: Modal Toggle -->
    <div class="mt-5"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" class="btn btn-primary">Tambah User</a> </div> <!-- END: Modal Toggle -->
    <!-- BEGIN: Modal Content -->
    <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="/admin/users">
                    @csrf
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Tambahkan User</h2>
                    </div> <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <div class="modal-body">
                        <div>
                            <label for="regular-form-1" class="form-label">Nama</label>
                            <input id="regular-form-1" type="text" name="name" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-1" class="form-label">Username</label>
                            <input id="regular-form-1" type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-1" class="form-label">Email</label>
                            <input id="regular-form-1" type="email" name="email" class="form-control" placeholder="abc@email.com">
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-1" class="form-label">Alamat</label>
                            <input id="regular-form-1" type="text" name="address" class="form-control" placeholder="Alamat">
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-1" class="form-label">Level</label>
                            <select id="regular-form-1" name="level" class="form-select">
                                <option value="0">Peminjam</option>
                                <option value="1">Admin</option>
                                <option value="2">Petugas</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-1" class="form-label">Password</label>
                            <input id="regular-form-1" type="password" name="password" class="form-control" placeholder="Password">
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
    <table class="table mt-5">
        <thead class="table-light">
            <tr>
                <th class="whitespace-nowrap">#</th>
                <th class="whitespace-nowrap">Nama User</th>
                <th class="whitespace-nowrap">Username</th>
                <th class="whitespace-nowrap">Email</th>
                <th class="whitespace-nowrap">Alamat</th>
                <th class="whitespace-nowrap">Level</th>
                <th class="whitespace-nowrap text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>
                        @if ($user->level == 0)
                            Peminjam
                        @elseif ($user->level == 1)
                            Admin
                        @elseif ($user->level == 2)
                            Petugas
                        @else
                            Unknown Role
                        @endif
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="javascript:;" data-tw-toggle="modal" data-tw-target="#update-modal-{{ $user->id }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Edit </a>
                            <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-modal-{{ $user->id }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>
                        </div>
                    </td>
                </tr>

                <div id="update-modal-{{ $user->id }}" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="/admin/users/{{ $user->id }}">
                                @method('PUT')
                                @csrf
                                <!-- BEGIN: Modal Header -->
                                <div class="modal-header">
                                    <h2 class="font-medium text-base mr-auto">Update User</h2>
                                </div> <!-- END: Modal Header -->
                                <!-- BEGIN: Modal Body -->
                                <div class="modal-body">
                                    <div>
                                        <label for="regular-form-1" class="form-label">Nama</label>
                                        <input id="regular-form-1" value="{{ $user->name }}" type="text" name="name" class="form-control" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="mt-3">
                                        <label for="regular-form-1" class="form-label">Username</label>
                                        <input id="regular-form-1" value="{{ $user->username }}" type="text" name="username" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="mt-3">
                                        <label for="regular-form-1" class="form-label">Email</label>
                                        <input id="regular-form-1" value="{{ $user->email }}" type="email" name="email" class="form-control" placeholder="abc@email.com">
                                    </div>
                                    <div class="mt-3">
                                        <label for="regular-form-1" class="form-label">Alamat</label>
                                        <input id="regular-form-1" value="{{ $user->address }}" type="text" name="address" class="form-control" placeholder="Alamat">
                                    </div>
                                    <div class="mt-3">
                                        <label for="regular-form-1" class="form-label">Level</label>
                                        <select value="{{ $user->level }}" class="form-select mt-2 sm:mr-2">
                                            <option value="0">Peminjam</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Petugas</option>
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <label for="regular-form-1" class="form-label">Password Sebelumnya</label>
                                        <input id="regular-form-1" type="password" name="old_password" class="form-control" placeholder="Password sebelumnya">
                                    </div>
                                    <div class="mt-3">
                                        <label for="regular-form-1" class="form-label">Password baru</label>
                                        <input id="regular-form-1" type="password" name="password" class="form-control" placeholder="Password baru">
                                    </div>
                                </div> <!-- END: Modal Body -->
                                <!-- BEGIN: Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Batal</button>
                                    <button type="submit" class="btn btn-primary w-20">Update</button>
                                </div> <!-- END: Modal Footer -->
                            </form>

                        </div>
                    </div>
                </div> <!-- END: Modal Content -->

                <div id="delete-modal-{{ $user->id }}" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                    <div class="text-3xl mt-5">Are you sure?</div>
                                    <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                                </div>
                                <div class="px-5 pb-8 text-center justify-center items-center flex">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                    <form action="/admin/users/{{ $user->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger w-24">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- END: Modal Content -->
            @endforeach
        </tbody>
    </table>

@endsection

