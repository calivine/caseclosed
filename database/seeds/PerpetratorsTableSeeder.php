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
            ['Norman','Whitehorn',9,null,null,null],
            ['Geovanni','Borjas',10,null,null,null],
            ['Michael','Sumpter',11,null,null,null],
            ['John','Getreu',12,1944,'2018-11-20',null],
            ['Johnnie','Miller',13,null,null,null],
            ['Stephen','Crawford',14,1946,null,'Suicide upon confrontation.'],
            ['Joseph','DeAngelo',15,1945,'2018-04-24','Golden State Killer'],
            ['Ricky','Harnish',16,1955,'2008-02-01',null],
            ['Kenneth','Matthews',17,null,'2018-04-24',null],
            ['Joseph','DeAngelo',18,1945,'2018-04-24','Golden State Killer'],
            ['Joseph','DeAngelo',19,1945,'2018-04-24','Golden State Killer']
        ];

        foreach ($perps as $key => $perpData) {
            $perp = new Perpetrator;

            $perp->first_name = $perpData[0];
            $perp->last_name = $perpData[1];
            $perp->victim_id = $perpData[2];
            $perp->year_of_birth = $perpData[3];
            $perp->arrest_date = $perpData[4];
            $perp->detail = $perpData[5];

            $perp->save();
        }
    }
}
