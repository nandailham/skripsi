<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string'
        ]);

        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials = [$login_type => $request->input('login'), 'password' => $request->input('password')];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 'admin' || Auth::user()->role == 'guru' || Auth::user()->role == 'kepala_sekolah') {
                return redirect()->route('admin.index');
            } else {
                Auth::logout();
                return redirect()->back()->with(
                    [
                        'error' => 'Anda tidak memiliki akses'
                    ]
                );
            }
        } else {
            return redirect()->back()->with(
                [
                    'error' => 'Email atau Password Salah'
                ]
            );
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->to('/');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.index');
        }
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function post_register(Request $req)
    {
        // Validasi input
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'nomor_telepon' => 'required',
            'password' => 'required',
            'alamat' => 'required',
        ], [
            'email.unique' => 'Email sudah digunakan.',
            'username.unique' => 'Username sudah digunakan.',
        ]);

        // Buat data pengguna
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'username' => $req->username,
            'nomor_telepon' => $req->nomor_telepon,
            'password' => bcrypt($req->password),
            'alamat' => $req->alamat,
        ];

        // Buat pengguna baru
        User::create($data);

        // Redirect dengan pesan sukses
        return redirect()->to('login')->with('success', 'Registrasi berhasil! Silakan masuk.');
    }

    public function admin_password_get()
    {
        return view('admin.ubah_password');
    }

    public function admin_password_post(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'password_lama' => ['required', new MatchOldPassword],
                'password_baru' => ['required'],
                'konfirmasi_password' => ['same:password_baru', 'required'],
            ],
            [
                'password_lama.required' => 'password lama wajib diisi',
                'password_baru.required' => 'password baru wajib diisi',
                'konfirmasi_password.required' => 'konfirmasi password wajib diisi',
                'konfirmasi_password.same' => 'konfirmasi password wajib sama dengan password baru',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        User::find(Auth::user()->id)->update(['password' => Hash::make($request->password_baru)]);

        Auth::logout();
        Session::flush();
        return redirect()->route('getlogin')->with(
            [
                'success' => 'Silahkan login ulang dengan password yang baru.'
            ]
        );
    }
}
