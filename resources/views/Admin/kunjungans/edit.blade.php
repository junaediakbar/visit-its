@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-5">
            <div class="pull-left">
                <h2>Edit kunjungan</h2>
            </div>
    
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.kunjungans.update', $kunjungan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

            <div class="row pt-4 pb-2">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User id</strong>
                    <input type="text" name="user_id" class="form-control" value="{{$kunjungan->user_id}}" placeholder="Id User" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="nama_tamu" class="form-control" value="{{$kunjungan->nama_tamu}}" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis Kunjungan :</strong>
                    <select class="form-control" name="jenis_tamu" value="{{$kunjungan->jenis_tamu}}" id="exampleFormControlSelect1"> 
                        <option value="Undangan" {{ $kunjungan->jenis_tamu == "Undangan" ? 'selected' : '' }}>Undangan</option>
                        <option value="Event" {{ $kunjungan->jenis_tamu == "Event" ? 'selected' : '' }}>Event</option>
                        <option value="Sosialisasi" {{ $kunjungan->jenis_tamu == "Sosialisasi" ? 'selected' : '' }}>Sosialisasi</option>
                        <option value="Lainnya"{{ $kunjungan->jenis_tamu == "Lainnya" ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Instansi :</strong>
                    <input type="text" name="instansi_tamu" class="form-control" value="{{$kunjungan->instansi_tamu}}" placeholder="Instansi">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Kegiatan : </strong>
                    <input type="text" name="nama_kegiatan" class="form-control" value="{{$kunjungan->nama_kegiatan}}" placeholder="Nama Kegiatan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Waktu Pelaksanaan : </strong>
                    <input type="date" name="waktu_tamu" class="form-control" value="{{$kunjungan->waktu_tamu}}" placeholder="Waktu Pelaksanaan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Durasi (Menit)</strong>
                    <input type="number" name="durasi_tamu" class="form-control" value="{{$kunjungan->durasi_tamu}}" placeholder="Durasi">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>File Pendukung</strong>
                    <input type="file" name="file" class="form-control" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip" value={{$kunjungan->file_pendukung}}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Konfirmasi Kunjungan:</strong>
                    <select class="form-control"  name="konfirmasi_tamu" id="exampleFormControlSelect1"> 
                        <option value="0" {{ $kunjungan->konfirmasi_tamu == 0 ? 'selected' : '' }}> Belum terkonfirmasi</option>
                        <option value="1" {{ $kunjungan->konfirmasi_tamu == 1 ? 'selected' : '' }}>Konfirmasi</option>
                        <option value="-1" {{ $kunjungan->konfirmasi_tamu == -1 ? 'selected' : '' }}>Kunjungan ditolak</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary bg-primary w-100">Submit</button>
            </div>
     
            
        </div>

    </form>
@endsection