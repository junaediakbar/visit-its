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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'nik' => 'required|unique:users|digits:16',
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
}