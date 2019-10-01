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

        Eloquent::unguard();

        // seeds tables (should seed accordingly)
        $this->call(UserTableSeeder::class);
        $this->call(ClassTableSeeder::class);
        $this->call(ClassUserTableSeeder::class);
        $this->call(ScoreTableSeeder::class); 
        $this->call(ModulesTableSeeder::class);
        $this->call(ModuleScoreTableSeeder::class);
        $this->call(ModuleClassTableSeeder::class);
    }
}
