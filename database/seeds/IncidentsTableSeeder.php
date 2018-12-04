<?php

use Illuminate\Database\Seeder;
use App\Incident;

class IncidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     *  victim_id, perpetrator_id, date, year, detail, url
     *
     */
    public function run()
    {
        $incidents = [
            [1,1,null,1978,'Raped and strangled.','https://abcnews.go.com/WNT/story?id=129709&page=1'],
            [2,2,null,2012,null,null],
            [3,3,'1969-01-07',1969,'Blunt force trauma','https://nypost.com/2018/11/20/dna-evidence-leads-to-closure-in-1969-cold-case-murder-da/'],
            [4,4,'1973-02-13',1973,'Strangulation ','https://abcnews.go.com/US/genetic-genealogy-leads-arrest-1973-cold-case-murder/story?id=59343378#'],
            [5,5,null,1974,'shot during armed robbery',null],
            [6,6,'1974-10-13',1974,'satanic ritual killing?','https://www.mercurynews.com/2018/06/28/sheriff-suspect-in-infamous-1974-stanford-chapel-murder-shoots-self-as-detectives-close-in/'],
            [7,7,'1975-09-11',1975,'Shot during burgalry.','https://www.sacbee.com/latest-news/article209851009.html'],
            [8,8,'1976-12-26',1976,'stabbed to death and sexually assaulted.','stabbed to death and sexually assaulted.'],
            [9,9,'1977-12-06',1977,'raped and stabbed.',null],
            [10,10,'1978-02-02',1978,'Shot.',null],
            [11,11,'1978-02-02',1978,'Shot.',null]
        ];

        foreach ($incidents as $key => $incidentData) {
            $incident = new Incident();

            $incident->victim_id = $incidentData[0];
            $incident->perpetrator_id = $incidentData[1];
            $incident->date = $incidentData[2];
            $incident->year = $incidentData[3];
            $incident->detail = $incidentData[4];
            $incident->url = $incidentData[5];

            $incident->save();
        }
    }
}
