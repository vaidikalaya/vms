<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    public function run(): void
    {
        $classes=['N.C','K.G','1st','2nd','3rd','4th','5th','6th','7th','8th','9th','10th','11th','12th'];
        foreach($classes as $class){
            DB::table('classes')->insert([
                'name'=>$class,
            ]);
        }
    }
}
