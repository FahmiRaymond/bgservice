<?php

use Illuminate\Database\Seeder;

class MerkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('merk')->insert(array(
            [
                'nama_merk' => 'Samsung'
            ],
            [
                'nama_merk' => 'iPhone'
            ],
            [
                'nama_merk' => 'Xiaomi'
            ],
            [
                'nama_merk' => 'Oppo'
            ],
            [
                'nama_merk' => 'Vivo'
            ],
            [
                'nama_merk' => 'Huawei'
            ],
            [
                'nama_merk' => 'Advan'
            ],
            [
                'nama_merk' => 'Evercoss'
            ],
            [
                'nama_merk' => 'Mito'
            ],
            [
                'nama_merk' => 'Nokia'
            ],
            [
                'nama_merk' => 'HP'
            ]
        ));
    }
}
