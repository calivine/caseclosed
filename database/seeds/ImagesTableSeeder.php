<?php

use Illuminate\Database\Seeder;

use App\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $images = [
            ['https://c.o0bg.com/rf/image_371w/Boston/2011-2020/2018/11/20/BostonGlobe.com/Spotlight/Images/IMG_1156.jpg','victim',null,1],
            ['https://cbsnews2.cbsistatic.com/hub/i/r/2018/11/20/b93305d9-994a-4953-a239-7f3e381d7213/resize/620x/39a21727465ac088089d9c116d7dbcaf/sumpter2.jpg','perpetrator',null,1],
            ['https://c.o0bg.com/rf/image_835w/Boston/2011-2020/2017/04/03/BostonGlobe.com/Spotlight/Images/FullSizeRender%20(2).jpg','other',null,1],
            ['https://www.twincities.com/wp-content/uploads/2015/11/20100218__100219rutchick.jpg?w=500','victim',null,2]

        ];

        foreach($images as $imageURL)
        {
            $image = new Image;

            $image->url = $imageURL[0];
            $image->type = $imageURL[1];
            $image->caption = $imageURL[2];

            $image->perpetrator_id = $imageURL[3];

            $image->save();
        }
    }
}
