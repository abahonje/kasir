<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Data User',
            'user' => User::where('level','!=', 'admin')->get(),
        ];

        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Data User',
        ];

        return view('users.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required|unique:user,username'
        ],[
            'nama_lengkap.required' => 'Nama lengkap harus diisi',
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username sudah ada di dalam database'
        ]);

        $validatedData['password'] = Hash::make('123456');
        $validatedData['level'] = 'kasir';
        $validatedData['status'] = 'nonaktif';

        User::create($validatedData);
        return redirect('/user')->with('info', 'Data user baru berhasil ditambahkan ke dalam database!');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $data = [
            'title' => 'Data User',
            'user' => $user
        ];

        return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required|unique:user,username,' . $request->id
        ],[
            'nama_lengkap.required' => 'Nama lengkap harus diisi',
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username sudah ada di dalam database'
        ]);


        User::where('id', $request->id)->update($validatedData);
        return redirect('/user')->with('info', 'Data user berhasil diupdate dalam database!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->forceDelete();
        return redirect('/user')->with('info', 'Data user berhasil dihapus dalam database!');
    }

    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('info', 'Username atau password salah!');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect('/')->with('info', 'Terima kasih, sessi anda telah berakhir!');
    }
}
