<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles=['superadmin','admin','student'];
        foreach($roles as $role){
            DB::table('roles')->insert([
                'name'=>$role,
                'guard_name'=>'web'
            ]);
        }
    }
}
