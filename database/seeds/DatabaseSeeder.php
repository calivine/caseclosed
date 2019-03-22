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

        $this->call(PerpetratorsTableSeeder::class);

        $this->call(VictimsTableSeeder::class);

        $this->call(ImagesTableSeeder::class);

        $this->call(SourcesTableSeeder::class);

        $this->call(UsersTableSeeder::class);

    }
}
