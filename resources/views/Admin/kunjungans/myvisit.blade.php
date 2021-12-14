@extends('layouts.app')

@section('content')
    <div class="row pt-4 pb-2">
        <div class="d-flex align-items-center">
            <div class="ml-3">
                <h2>List Kunjungan </h2>
            </div>
             <div class="d-flex justify-content-between">

                    <a class="btn btn-success mx-2" href="{{ route('admin.kunjungans.create') }}" title="Create a kunjungan"> 
                    Add Visit        
                    <i class="fas fa-plus-circle"></i>
                  
                      </a>              
                    <a class="btn btn-primary" href="{{ route('register-admin') }}" title="Create a kunjungan">Add Admin <i class="fas fa-plus-circle"></i>
                    </a>
                
             </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Kegiatan</th>
            <th width="20px">Durasi (Menit)</th>
            <th>Instansi Asal</th>
            <th>Status</th>
            <th>Tanggal Kunjungan</th>
            <th width="150px">Action</th>
        </tr>
        @foreach ($kunjungans as $kunjungan)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $kunjungan->nama_tamu }}</td>
                <td>{{ $kunjungan->nama_kegiatan }}</td>
                <td>{{ $kunjungan->durasi_tamu }}</td>
                <td>{{ $kunjungan->instansi_tamu }}</td>
                <td>
                    @if($kunjungan->konfirmasi_tamu == 0)
                        <span class="badge bg-warning text-black text-center">
                            Belum terkonfirmasi
                        </span>
                    @elseif($kunjungan->konfirmasi_tamu == 1)
                    <span class="badge bg-success text-black text-center">
                            Terkonfirmasi
                    </span>
                    @else
                    <span class="badge bg-danger text-black text-center">
                            Ditolak
                    </span>
                    @endif
            </td>
                <td>{{date('j F, Y', strtotime( $kunjungan->waktu_tamu )) }}</td>
                <td>
                    <form action="{{ route('admin.kunjungans.destroy', $kunjungan->id) }}" method="POST">

                        <a href="{{ route('admin.kunjungans.show', $kunjungan->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('admin.kunjungans.edit', $kunjungan->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $kunjungans->links() }}

@endsection
