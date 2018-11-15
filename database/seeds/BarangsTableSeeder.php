<?php

use Illuminate\Database\Seeder;

class BarangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create(); 
        $limit = 100; 
        
        for ($i = 0; $i < $limit; $i++) {
            DB::table('barangs')->insert([
                'nama_barang'=>$faker->company(),
                'stok' => $faker->numberBetween($min = 0, $max = 1000), //rentang angka 0 sampai 1000
                'harga' => $faker->numberBetween($min = 100, $max = 999999999), // rentang harga random antara 100 sampai 999999999, bisa juga menggunakan fungsi random number sehingga tanpa batasan, naun takutnya melebihi kapasitas integer
                'expired_date' => $faker->dateTimeBetween('now', '+10 yearss'), // untuk generate hari di masa depan 10 tahun kedepan, menggunakan ISO format
                'tanggal_produksi' => $faker->dateTimeThisDecade($max = 'now'), // menggunakan max=now karena tanggal produksi tidak mungkin dibuat pada masa depan
            ]);
        }
    }
}
