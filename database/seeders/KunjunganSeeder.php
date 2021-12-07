<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Facades\Hash;
use illuminate\Support\Facades\Str;

use Faker\Factory as Faker;


class KunjunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        //
        for ($i=1; $i <= 60; $i++) {
        DB::table('kunjungan')->insert([
            'user_id'=>$i,
            'admin_id'=>$i,
            'jenis_tamu'=> implode(",", $faker->randomElements(['Event', 'Undangan', 'Personal'], 1)),
            'nama_tamu'=> $faker->name,
            'instansi_tamu'=>implode(",", $faker->randomElements(['Pemerintah','ITS', 'UB', 'UNAIR'], 1)),
            'nama_kegiatan'=>implode(",", $faker->randomElements(['Seminar','Kunjungan', 'Akreditasi'], 1)).' '.implode(",", $faker->randomElements(['Pemerintah','Sosialisasi','Prestasi', 'Olahraga', 'Akademik'], 1)).' '.implode(",", $faker->randomElements(['Pemerintah','ITS', 'UB', 'UNAIR'], 1)).' '.$faker->city ,
            'waktu_tamu'=>$faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now'),
            'durasi_tamu'=>random_int(1,10)*30,
            'konfirmasi_tamu'=>0,
            'file_pendukung'=>''
        ]);
        }
    }
}
