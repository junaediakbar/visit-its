<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Illuminate\Http\Request;
use Illuminate\Http\UploadFile;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class KunjunganUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()==null){
            return redirect('login');
        }
        $user_id = Auth::user()->id;
        $kunjungans = Kunjungan::latest()->where('user_id',$user_id)->paginate(5);
      
        return view('User.kunjungans.index', compact('kunjungans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            if(Auth::user()==null){
                return redirect('login');
            }
            $user_id = Auth::user()->id;
            return view('User.kunjungans.create',compact('user_id'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request;
        $request->validate([
            'jenis_tamu'=> 'required',
            'nama_tamu'=> 'required',
            'instansi_tamu'=>'required',
            'nama_kegiatan'=>'required',
            'waktu_tamu'=>'required',
            'durasi_tamu'=>'required',
        ]);

        if($request->file!=null){
            $fileName = time() . '.'. $request->file->getClientOriginalName();  
            $request->file->move(public_path('uploads'), $fileName);
            $request->request->add(['file_pendukung' => '/uploads/'.$fileName]);
        }
        // return $request;
        Kunjungan::create($request->except(['file']));

        return redirect()->route('user.kunjungans.index')
            ->with('success', 'Permintaan kunjungan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function show(Kunjungan $kunjungan)
    {
        $filename = preg_replace("/^.+\\\\/", '', $kunjungan->file_pendukung);
        return view('User.kunjungans.show', compact('kunjungan','filename'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kunjungan $kunjungan)
    {
        if(Auth::user()==null){
            return redirect('login');
        }
        $user_id = Auth::user()->id;
        if($kunjungan->user_id!=$user_id){
            return redirect()->route('user.kunjungans.index');
        }
        return view('User.kunjungans.edit', compact('kunjungan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kunjungan $kunjungan)
    {
        $request->validate([
            'jenis_tamu'=> 'required',
            'nama_tamu'=> 'required',
            'instansi_tamu'=>'required',
            'nama_kegiatan'=>'required',
            'waktu_tamu'=>'required',
            'durasi_tamu'=>'required',
        ]);
        if($request->file!=null){
            $fileName = time() . '.'. $request->file->getClientOriginalName();  
            $request->file->move(public_path('uploads'), $fileName);
            $request->request->add(['file_pendukung' => '/uploads/'.$fileName]);
        }
        $request->user_id = $kunjungan->user_id; 
        // return $request;
        $kunjungan->update($request->except(['file']));

        return redirect()->route('user.kunjungans.index')
            ->with('success', 'Data kunjungan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kunjungan $kunjungan)
    {
        $kunjungan->delete();

        return redirect()->route('user.kunjungans.index')
            ->with('success', 'Data kunjungan berhasi dihapus'); //
    }
}
