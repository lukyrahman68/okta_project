<?php

use Illuminate\Database\Seeder;

class PelangganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = array(
            array(
                'nik' => '475575521421',
                'nama' => 'Luky Rahman',
                'alamat' => 'Jl Sarwajala no 2',
                'jk' => 'Laki - Laki',
                'ttl' => 'Jember, 16 November 1996',
                'tlpn' => '085746664326',
                'email' => 'lukyrahman68@gmail.com',
            ),
            array(
                'nik' => '57865478214',
                'nama' => 'Okta Adygantara',
                'alamat' => 'Jl Gedangan',
                'jk' => 'Laki - Laki',
                'ttl' => 'Sidoarjo, 7 Oktober 1996',
                'tlpn' => '085745124521',
                'email' => 'oktadygantara@gmail.com',
            ),
            array(
                'nik' => '87541245214',
                'nama' => 'Rendy Destara',
                'alamat' => 'Jl Gunung Anyar',
                'jk' => 'Laki - Laki',
                'ttl' => 'Sidoarjo, 18 Desember 1996',
                'tlpn' => '0875624145',
                'email' => 'rendydestara@gmail.com',
            ),
            array(
                'nik' => '65478524514',
                'nama' => 'Rendra',
                'alamat' => 'Jl Gubeng Permai',
                'jk' => 'Laki - Laki',
                'ttl' => 'Sidoarjo, 12 April 1996',
                'tlpn' => '0578452145',
                'email' => 'rendra@gmail.com',
            )
        );
        DB::table('pelanggans')->insert($data);
    }
}
