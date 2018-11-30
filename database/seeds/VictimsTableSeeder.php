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
            ['Donna','Hooker',null,null,21,'F'],
            ['BreeAnna','Guzman',null,null,22,'F'],
            ['Jane','Britton','Sanders',null,23,'F'],
            ['Leslie','Perlov','Marie',null,21,'F'],
            ['Freddie','Farah',null,null,34,'M'],
            ['Arlis','Perry','Kay','1955-02-22',19,'F'],
            ['Claude','Snelling',null,null,45,'M'],
            ['Holly','Andrews','Marie',null,16,'F'],
            ['Leona','Davis',null,null,25,'F'],
            ['Katie','Maggiore',null,null,20,'F'],
            ['Brian','Maggiore',null,null,21,'M']
        ];

        foreach ($victims as $key => $victimData) {
            $victim = new Victim();
            $victim->first_name = $victimData[0];
            $victim->last_name = $victimData[1];
            $victim->middle_name = $victimData[2];
            $victim->date_of_birth = $victimData[3];
            $victim->age = $victimData[4];
            $victim->gender = $victimData[5];

            $victim->save();
        }

    }
}
