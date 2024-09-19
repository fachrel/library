<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('server.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'address' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);

        $validated['password'] = Hash::make($validated['password']);


        // dd($validated);

        // dd($validated);
        User::create($validated);
        flash()->success('User berhasil ditambahkan.');

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'address' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);
        $user = User::findOrFail($id);


        if (!Hash::check($request->old_password, $user->password)) {
            flash()->error('Password lama salah.');
            return redirect('/admin/users');
        }

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        // Update the user record
        $user->update($validated);

        flash()->success('User berhasil diubah.');
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        flash()->success('User berhasil dihapus.');

        return redirect('/admin/users');
    }
}
