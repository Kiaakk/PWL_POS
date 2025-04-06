<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;
use App\Models\LevelModel;
 
class AuthController extends Controller {
    public function login()
    {
        if (Auth::check()) { // jika sudah login, maka redirect ke halaman home
            return redirect('/');
        }
        return view('auth.login');
    }

    public function register()
    {
        $levels = LevelModel::all(); // ambil level dari database
        return view('auth.register', compact('levels'));
    }

    public function postregister(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'username' => 'required|string|max:20|unique:m_user,username',
            'password' => 'required|string|min:6|confirmed',
            'level_id' => 'required|exists:m_level,level_id',
        ]);

        UserModel::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password, // auto-hash
            'level_id' => $request->level_id,
        ]);

        return redirect('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
 
    public function postlogin(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $credentials = $request->only('username', 'password');
 
            if (Auth::attempt($credentials)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => url('/')
                ]);
            }
 
            return response()->json([
                'status' => false,
                'message' => 'Login Gagal'
            ]);
        }
 
        return redirect('login');
    }
 
    public function logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
        }
 }