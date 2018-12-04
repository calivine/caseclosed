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
            ['Norman','Whitehorn',1,null,null,null],
            ['Geovanni','Borjas',2,null,null,null],
            ['Michael','Sumpter',3,null,null,null],
            ['John','Getreu',4,1944,'2018-11-20',null],
            ['Johnnie','Miller',5,null,null,null],
            ['Stephen','Crawford',6,1946,null,'Suicide upon confrontation.'],
            ['Joseph','DeAngelo',7,1945,'2018-04-24','Golden State Killer'],
            ['Ricky','Harnish',8,1955,'2008-02-01',null],
            ['Kenneth','Matthews',9,null,'2018-04-24',null],
            ['Joseph','DeAngelo',10,1945,'2018-04-24','Golden State Killer'],
            ['Joseph','DeAngelo',11,1945,'2018-04-24','Golden State Killer']
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
