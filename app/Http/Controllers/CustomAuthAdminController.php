<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use Illuminate\Http\Request;
use App\Models\Admin;

class CustomAuthAdminController extends Controller
{
    public function registration()
    {
        return view('admin.registration');
    }
    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'nik' => 'required|unique:admins|digits:16',
            'tanggal_lahir' => 'required',
            'jabatan' => 'required',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect()->route('admin.kunjungans.index')->withSuccess('Admin berhasil ditambahkan');
    }
    public function create(array $data)
    {
      return Admin::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'nik' => $data['nik'],
        'tanggal_lahir' => $data['tanggal_lahir'],
        'jabatan' => $data['jabatan'],

      ]);
    }
    function login(){
      return view('Admin.login');
    }
    function check(Request $request){
      $request->validate([
        'email' => 'required',
        'password' => 'required',
      ]);
      $adminInfo = Admin::where('email','=', $request->email)->first();
      if(!$adminInfo){
          return back()->with('fail','We do not recognize your email address');
      }
      else{
            if(Hash::check($request->password, $adminInfo->password)){
              $request->session()->put('LoggedAdmin', $adminInfo->id);
              return redirect()->route('admin.kunjungans.index');
            }
            else{
              return back()->with('fail','Incorrect password');
            }
          }
    }
    function logout(){
      if(session()->has('LoggedAdmin')){
          session()->pull('LoggedAdmin');
          return redirect('/admin/login');
      }
    }
}