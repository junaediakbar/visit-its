@extends('layouts.app')

@section('content')
    <div class="row pt-4 pb-2">
        <div class="d-flex col-lg-12 margin-tb align-items-center">
            <div class="mr-2 pull-left">
                <h2>List Kunjungan </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('kunjungans.create') }}" title="Create a kunjungan"> <i class="fas fa-plus-circle"></i>
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
                    Belum terkonfirmasi
                    @else
                    Terkonfrimasi
                    @endif
            </td>
                <td>{{date('j F, Y', strtotime( $kunjungan->waktu_tamu )) }}</td>
                <td>
                    <form action="{{ route('kunjungans.destroy', $kunjungan->id) }}" method="POST">

                        <a href="{{ route('kunjungans.show', $kunjungan->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('kunjungans.edit', $kunjungan->id) }}">
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
