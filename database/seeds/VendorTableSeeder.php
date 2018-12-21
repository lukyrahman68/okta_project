<?php

use Illuminate\Database\Seeder;

class VendorTableSeeder extends Seeder
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
                'nama' => 'Happy',
                'alamat' => 'Jl Sarwajala no 2',
                'tlpn' => '085746664326',
                'barang' => 'Kulkas',
                'harga' => 2500000,
            ),
            array(
                'nama' => 'Sad',
                'alamat' => 'Jl Kalimantan no 21',
                'tlpn' => '054785478547',
                'barang' => 'Mobil',
                'harga' => 120000000,
            ),
            array(
                'nama' => 'Yamada',
                'alamat' => 'Jl Spenjang no 12',
                'tlpn' => '087547854752',
                'barang' => 'Motor',
                'harga' => 14000000,
            ),
            array(
                'nama' => 'Sulis Corp',
                'alamat' => 'Jl Nginden no 112',
                'tlpn' => '086845745785',
                'barang' => 'Mesin Cuci',
                'harga' => 1500000,
            ),
        );
        DB::table('vendors')->insert($data);
    }
}
