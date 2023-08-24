<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users=['user1','user2','user3'];
        foreach($users as $user){
            
            $resId=DB::table('users')->insertGetId([
                'user_id' => rand(5,6),
                'firstname'=>$user,
                'lastname'=>Str::random(5),
                'email' => $user.'@gmail.com',
                'phone'=>rand(10,12),
                'status'=>'1',
                'password' => Hash::make('password'),
            ]);

            if($resId){
                $resId=DB::table('model_has_roles')->insertGetId([
                    'role_id' => 1,
                    'model_type'=>'App\Models\User',
                    'model_id'=>$resId,
                ]);
            }
        }
    }
}
