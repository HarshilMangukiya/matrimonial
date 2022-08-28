<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PartnerPreference;


class PartnerPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 50 ; $i++) { 

            $randomNum = rand(1,3);
            $partnerPreference = new PartnerPreference();
            $partnerPreference->user_id = $i;
            $partnerPreference->salary_from = rand(100000,300000);
            $partnerPreference->salary_to = rand(400000,1000000);
            if($randomNum == 1){

                $partnerPreference->occupation = '1';
                $partnerPreference->family_type = '1';
                $partnerPreference->manglik = '1';


            }else if($randomNum == 2){

                $partnerPreference->occupation = '1,2';
                $partnerPreference->family_type = '1,2';
                $partnerPreference->manglik = '2';

            }else if($randomNum == 3){

                $partnerPreference->occupation = '1,2,3';
                $partnerPreference->manglik = '3';
                $partnerPreference->family_type = '2';

            }
            $partnerPreference->save();
        }
    }
}
