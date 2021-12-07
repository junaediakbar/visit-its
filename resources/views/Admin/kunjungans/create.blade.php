@extends('layouts.app')

@section('content')
    <div class="row pt-4 pb-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Form Registrasi Tamu</h2>
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
    <form action="{{ route('admin.kunjungans.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
            <!-- 'user_id'=>$i,
            'admin_id'=>$i,
            'jenis_tamu'=> implode(",", $faker->randomElements(['Event', 'Undangan', 'Personal'], 1)),
            'nama_tamu'=> $faker->name,
            'instansi_tamu'=>implode(",", $faker->randomElements(['Pemerintah','ITS', 'UB', 'UNAIR'], 1)),
            'nama_kegiatan'=>implode(",", $faker->randomElements(['Seminar','Kunjungan', 'Akreditasi'], 1)).' '.implode(",", $faker->randomElements(['Pemerintah','Sosialisasi','Prestasi', 'Olahraga', 'Akademik'], 1)).' '.implode(",", $faker->randomElements(['Pemerintah','ITS', 'UB', 'UNAIR'], 1)).' '.$faker->city ,
            'waktu_tamu'=>$faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now'),
            'durasi_tamu'=>random_int(1,10)*30,
            'konfirmasi_tamu'=>0,
            'file_pendukung'=>'' -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User id</strong>
                    <input type="text" name="user_id" class="form-control" placeholder="Id User">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="nama_tamu" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis Kunjungan :</strong>
                    <select class="form-control" name="jenis_tamu" id="exampleFormControlSelect1"> 
                        <option value="Undangan">Undangan</option>
                        <option value="Event">Event</option>
                        <option value="Sosialisasi">Sosialisasi</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Instansi :</strong>
                    <input type="text" name="instansi_tamu" class="form-control" placeholder="Instansi">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Kegiatan : </strong>
                    <input type="text" name="nama_kegiatan" class="form-control" placeholder="Nama Kegiatan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Waktu Pelaksanaan : </strong>
                    <input type="date" name="waktu_tamu" class="form-control" placeholder="Waktu Pelaksanaan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Durasi (Menit)</strong>
                    <input type="number" name="durasi_tamu" class="form-control" placeholder="Durasi">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>File Pendukung</strong>
                    <input type="file" name="file" class="form-control" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip">

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary bg-primary w-100">Submit</button>
            </div>
            
        </div>

    </form>
@endsection