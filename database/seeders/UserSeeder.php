<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i <50 ; $i++) { 
            $timestamp = mt_rand(1, time());

            $day = rand(1,30);
            if($day < 10){
                $day = 0 . $day;
            }
            $month = rand(1,12);
            if($month < 10){
                $month = 0 . $month;
            }
            $year = rand(1960,2002);

            $currentDate = $year.'-'.$month.'-'.$day;
            $diff = abs(strtotime($currentDate) - strtotime(date('Y-m-d')));
            $age = floor($diff / (365*60*60*24));

            $user = new User();
            $user->first_name = Str::random(10);
            $user->last_name = Str::random(10);
            if($i == 0){
                $user->email = 'info@test.com';
            }else{
                $user->email = Str::random(10) . '@gmail.com';
            }
            $user->dob = $currentDate;
            $user->age = $age;
            $user->gender = rand(1,3);
            $user->annual_income = rand(99999,1000000);
            $user->occupation = rand(1,3);
            $user->family_type = rand(1,2);
            $user->manglik = rand(1,2);
            $user->password = Hash::make('password');
            $user->save();
        }

    }
}
