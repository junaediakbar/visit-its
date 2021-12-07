@extends('layouts.app')


@section('content')
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
            <div class=" card border-0 mt-3 d-flex flex-row">     

<div class="row pt-4 pb-2">
   <div class="col-lg-12 margin-tb">
    <div
         class="
           d-flex
           justify-content-center
           align-items-center
           flex-column
           pull-left
         "
       >
         <img
           class="img-thumbnail border-0 w-75"
           src="{{ asset('assets/avatar.svg')}}"
           alt="Avatar"
         />
         <h2 class="text-center py-2">{{$kunjungan->nama_tamu}}</h2>
       </div>
   </div>
</div>

<div class="row p-4">
   <div class="col-xs-12 col-sm-12 col-md-12">
       <div class="form-group">
           <strong>Jenis Tamu:</strong>
           {{ $kunjungan->jenis_tamu }}
       </div>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
       <div class="form-group">
           <strong>Nama Kegiatan:</strong>
           {{ $kunjungan->nama_kegiatan }}
       </div>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
       <div class="form-group">
           <strong>Asal Instansi:</strong>
           {{ $kunjungan->instansi_tamu }}
       </div>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
       <div class="form-group">
           <strong>Durasi:</strong>
           {{ $kunjungan->durasi_tamu }}
       </div>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
       <div class="form-group">
           <strong>Waktu Pelaksanaan : </strong>
           {{date('j F, Y', strtotime( $kunjungan->waktu_tamu )) }}
       </div>
   </div>

   <div class="col-xs-12 col-sm-12 col-md-12">
       <div class="form-group">
           <strong>File pendukung :</strong>
           @if($kunjungan->file_pendukung !=null)
               <a href="{{$kunjungan->file_pendukung}}" class="btn btn-secondary">Download File</a>
           @else
           file tidak tersedia
           @endif
       </div>
   </div>
</div>

</div>   
    
    
    @endsection