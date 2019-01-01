<?php

use Illuminate\Database\Seeder;
use App\Victim;

class VictimsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /*
     * Victims Table:
     * first_name, last_name, middle_name (nullable), date_of_birth (nullable), age, gender
     *
     * */
    public function run()
    {
        $victims = [
            ['Jane','Sanders','Britton','1945-05-17',23,'F','Blunt Force Trauma',1],
            ['Ellen','Faith','Rutchick','1948-04-05',23,'F','Strangulation',1],
            ['Leslie','Marie','Perlov','1951-09-19',21,'F','Strangulation',2],
            ['Arlis','Kay','Perry','1955-02-22',19,'F','Ice pick in back, strangulation',3]

        ];

        foreach ($victims as $key => $victimData) {
            $victim = new Victim();
            $victim->first_name = $victimData[0];
            $victim->middle_name = $victimData[1];
            $victim->last_name = $victimData[2];
            $victim->date_of_birth = $victimData[3];
            $victim->age = $victimData[4];
            $victim->gender = $victimData[5];
            $victim->cause_of_death = $victimData[6];
            $victim->perpetrator_id = $victimData[7];

            $victim->save();
        }

    }
}
