<?php

use Illuminate\Database\Seeder;
use App\Perpetrator;

class PerpetratorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     * first_name, last_name, victim_id, year_of_birth, arrest_date, detail
     */
    public function run()
    {
        $perps = [
            ['Michael','Eugene','Sumpter','1947-09-26','Died of cancer while serving a 15-to-20-year sentence for a different crime — the 1975 rape of a 21-year-old woman in her Beacon Street home.',true,'2001-07-12','2001-07-12'],
            ['John','Arthur','Getreu','1944-08-26','',false,'2018-11-20','2018-11-20'],
            ['Stephen','Blake','Crawford','1946-02-11','Suicide upon confrontation with police.',true,'2018-06-28','2018-06-28']
        ];

        foreach ($perps as $key => $perpData) {
            $perp = new Perpetrator;

            $perp->first_name = $perpData[0];
            $perp->middle_name = $perpData[1];
            $perp->last_name = $perpData[2];
            $perp->date_of_birth = $perpData[3];
            $perp->description = $perpData[4];
            $perp->criminal_record = $perpData[5];
            $perp->arrest_date = $perpData[6];
            $perp->date_of_death = $perpData[7];

            $perp->save();
        }
    }
}
