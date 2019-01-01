<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call(PerpetratorsTableSeeder::class);

        $this->call(VictimsTableSeeder::class);

        $this->call(DetailsTableSeeder::class);

        $this->call(ImagesTableSeeder::class);

        $this->call(SourcesTableSeeder::class);
    }
}
