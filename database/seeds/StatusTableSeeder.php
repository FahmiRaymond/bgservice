<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert(array(
            [
                'nama_status' => 'Proses'
            ],
            [
                'nama_status' => 'Berhasil'
            ],
            [
                'nama_status' => 'Gagal'
            ],
            [
                'nama_status' => 'Diambil'
            ]
        ));
    }
}
