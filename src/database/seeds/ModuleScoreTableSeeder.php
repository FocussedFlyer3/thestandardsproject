<?php

use Illuminate\Database\Seeder;

class ModuleScoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // resets tables
        DB::statement('SET FOREIGN_KEY_CHECKS=0');  
        DB::table('module_score')->truncate();

        // score with target A
        DB::table('module_score')->insert(array(
            array('module_id' => 1, 'score_id' => 1),
            array('module_id' => 1, 'score_id' => 2),
            array('module_id' => 1, 'score_id' => 3),
            array('module_id' => 1, 'score_id' => 4),
            array('module_id' => 1, 'score_id' => 8),
            array('module_id' => 2, 'score_id' => 5),
            array('module_id' => 2, 'score_id' => 6),
            array('module_id' => 2, 'score_id' => 7),
            array('module_id' => 2, 'score_id' => 9),
            array('module_id' => 2, 'score_id' => 10),
            array('module_id' => 2, 'score_id' => 11)
        ));
    }
}
