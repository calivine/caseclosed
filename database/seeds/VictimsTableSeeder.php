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
        $json = file_get_contents('C:\xampp\htdocs\caseclosed\victims.json');
        $json_data = json_decode($json, true);


        foreach($json_data['data'] as $victim) {
            if($victim['perpetrator_id'] >= 7) {
                $victim['perpetrator_id'] = $victim['perpetrator_id'] - 2;
            }
            $newVictim = new Victim;
            $newVictim->first_name = $victim['first_name'];
            $newVictim->middle_name = $victim['middle_name'];
            $newVictim->last_name = $victim['last_name'];
            $newVictim->date_of_birth = $victim['date_of_birth'];
            $newVictim->gender = $victim['gender'];
            $newVictim->cause_of_death = $victim['cause_of_death'];
            $newVictim->incident_date = $victim['incident_date'];
            $newVictim->location = $victim['location'];
            $newVictim->description = $victim['description'];
            $newVictim->perpetrator_id = $victim['perpetrator_id'];
            $newVictim->save();

        }


        /*
        $victims = [
            ['Jane','Sanders','Britton','1945-05-17','F','Blunt Force Trauma','1969-01-07','42°22\'22.8"N 71°07\'22.7"W','On January 7 1969, Jane Sanders Britton, a Harvard University graduate student was sexually assaulted prior to being bludgeoned to death in her Cambridge apartment. Britton was studying anthropology at Harvard, and her father was at the time a vice president at Radcliffe College, a women\'s school in Cambridge that later merged with Harvard. Her body was found on her blood-stained mattress by her boyfriend who went to check on her when she didn\'t show up for a test that morning. The night before her body was found, she had gone to dinner with classmates and went ice skating with her boyfriend in Cambridge. Toxicology testing revealed that the alcohol she drank that evening didn\'t have time to metabolize in her bloodstream before she died, suggesting she was killed shortly after returning to her apartment.The perpetrator turned out to be a serial rapist and killer named Michael Sumpter, who died in 2001. Sumpter has since been linked to the murders of two other women he didn’t know. Neighbors told police they heard someone on the fire escape that connected to Britton\'s fourth-floor apartment on the night she was killed. It is believed Sumpter entered her apartment through a window.Sumter had ties to Cambridge and had lived there as a young child. In 1967, less than two years before Britton\'s murder, he was working on Arrow Street in Cambridge, about a mile from Britton\'s apartment.',1],
            ['Ellen','Faith','Rutchick','1948-04-05','F','Strangulation','1972-01-05','42°21\'02.7"N 71°05\'21.1"W','Ellen Rutchick found work at the Colonnade Hotel in Boston, where she did event planning. On the night of Jan. 5, 1972, Rutchick left a girlfriend’s apartment and walked 10 minutes to her Beacon Street apartment.When she didn’t come to work Jan. 6, someone went to the apartment to check on her, her sister said.Police found Rutchick dead. She had been strangled and sexually assaulted.',1],
            ['Leslie','Marie','Perlov','1951-09-19','F','Strangulation','1973-02-13','Palo Alto, CA','',2],
            ['Arlis','Kay','Perry','1955-02-22','F','Ice pick in back, strangulation','1974-10-13','Stanford,CA','The night of her death, Perry and her husband were walking to the mailbox at 11:30 p.m. and quarreled over checking the tire pressure on their car. Upset, she told her husband she was going to pray at the church, an iconic landmark building on the Stanford campus (that would one day be the scene of Apple founder Steve Job’s memorial service). When she didn’t return by 3:30 a.m., Bruce Perry called police, who checked the church and found the doors locked. Crawford, the security guard, told police he found her partially hidden in a pew at 5:40 a.m. She was found face-up; an ice pick was sticking out of the back of her head. There were also signs of strangulation.olice noted Perry was naked from the waist down. A three-foot-long altar candle was in her vagina, and another between her breasts',3]

        ];

        foreach ($victims as $key => $victimData) {
            $victim = new Victim();
            $victim->first_name = $victimData[0];
            $victim->middle_name = $victimData[1];
            $victim->last_name = $victimData[2];
            $victim->date_of_birth = $victimData[3];
            $victim->gender = $victimData[4];
            $victim->cause_of_death = $victimData[5];
            $victim->incident_date = $victimData[6];
            $victim->location = $victimData[7];
            $victim->description = $victimData[8];
            $victim->perpetrator_id = $victimData[9];

            $victim->save();
        } */

    }
}
