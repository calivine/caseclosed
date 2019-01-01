<?php

use Illuminate\Database\Seeder;

use App\Source;

class SourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sources = [
            ['https://nypost.com/2018/11/20/dna-evidence-leads-to-closure-in-1969-cold-case-murder-da/','https://www.findagrave.com/memorial/180038886','https://www.bostonglobe.com/metro/2018/11/19/dna-testing-yields-new-clues-year-old-cold-case/DjlroxIbBM0najjgkGaPVL/story.html','https://www.cbsnews.com/news/jane-britton-murder-harvard-students-killer-id-michael-sumpter-prosecutor-says/','https://www.boston25news.com/news/who-killed-jane-britton-50-year-murder-investigation-finally-closed/875994868',1],
            ['https://www.twincities.com/2010/02/18/family-of-former-st-paul-woman-killed-in-boston-in-1972-finally-has-some-answers/',null,null,null,null,2],
            ['https://abcnews.go.com/US/genetic-genealogy-leads-arrest-1973-cold-case-murder/story?id=59343378#',null,null,null,null,3],
            ['https://www.mercurynews.com/2018/06/28/sheriff-suspect-in-infamous-1974-stanford-chapel-murder-shoots-self-as-detectives-close-in/','https://www.mercurynews.com/2018/06/29/stanford-church-slaying-suspect-was-likely-plotting-suicide-for-two-years/',null,null,null,4]
        ];

        foreach($sources as $sourceData) {
            $source = new Source;

            $source->url1 = $sourceData[0];
            $source->url2 = $sourceData[1];
            $source->url3 = $sourceData[2];
            $source->url4 = $sourceData[3];
            $source->url5 = $sourceData[4];
            $source->victim_id = $sourceData[5];

            $source->save();


        }


    }
}
