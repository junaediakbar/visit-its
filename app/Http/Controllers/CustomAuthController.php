<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller{
    public function index()
    {
        return view('auth.login');
    }
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
        return redirect("login")->withSuccess('Login details are not valid');
    }
    public function admin()
    {
        return view('auth.admin-login');
    }
    public function customAdminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
        return redirect("admin-login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }
    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'nik' => 'required|unique:users|digits:16',
            'tanggal_lahir' => 'required',
            'instansi' => 'required',
            'jabatan' => 'required',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'nik' => $data['nik'],
        'tanggal_lahir' => $data['tanggal_lahir'],
        'instansi' => $data['instansi'],
        'jabatan' => $data['jabatan'],

      ]);
    }
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
