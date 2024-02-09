<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Coa;
use App\Models\Transaction;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //category
        Category::create([
            'name' => 'Salary',
        ]);
        Category::create([
            'name' => 'Other Income',
        ]);
        Category::create([
            'name' => 'Family Expense',
        ]);
        Category::create([
            'name' => 'Transport Expense',
        ]);
        Category::create([
            'name' => 'Meal Expense',
        ]);

        //coa
        Coa::create([
            'code' => '401',
            'name' => 'Gaji Karyawan',
            'category_id' => '1'
        ]);
        Coa::create([
            'code' => '402',
            'name' => 'Gaji Ketua MPR',
            'category_id' => '1'
        ]);
        Coa::create([
            'code' => '403',
            'name' => 'Profit Trading',
            'category_id' => '2'
        ]);
        Coa::create([
            'code' => '601',
            'name' => 'Biaya Sekolah',
            'category_id' => '3'
        ]);
        Coa::create([
            'code' => '602',
            'name' => 'Bensin',
            'category_id' => '4'
        ]);
        Coa::create([
            'code' => '603',
            'name' => 'Parkir',
            'category_id' => '4'
        ]);
        Coa::create([
            'code' => '604',
            'name' => 'Makan Siang',
            'category_id' => '5'
        ]);
        Coa::create([
            'code' => '605',
            'name' => 'Makanan Pokok Bulanan',
            'category_id' => '5'
        ]);
    }
}
