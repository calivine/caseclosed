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
            ['Stephen','Blake','Crawford','1946-02-11','Suicide upon confrontation with police.',true,'2018-06-28','2018-06-28'],
            ['Cecil','Stan','Caldwell','1944-11-23','The night of the murders, the Bernhardts had set the table for three, and when police were called to the scene two days later, they found a hamburger casserole still out. The home showed no signs of forced entry.Both Clifford and Linda had suffered blows to the head, and Linda showed signs of strangulation and sexual assault. There were also signs that both were bound at the wrists and ankles at some point, though investigators never found the bindings.',false,null,'2003-12-13']
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
