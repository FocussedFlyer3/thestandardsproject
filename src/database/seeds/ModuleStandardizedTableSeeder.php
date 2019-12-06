<?php

use Illuminate\Database\Seeder;

class ModuleStandardizedTableSeeder extends Seeder
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
        DB::table('modules_standardized')->truncate();

        //  insert mock scores  
        DB::table('modules_standardized')->insert(array(
            array(
                'module_id' => 1,
                'standardized_id' => 1
            ),
            array(
                'module_id' => 2,
                'standardized_id' => 2
            ),
            array(
                'module_id' => 3,
                'standardized_id' => 3
            ),
            array(
                'module_id' => 4,
                'standardized_id' => 4
            ),
            array(
                'module_id' => 5,
                'standardized_id' => 5
            ),
            array(
                'module_id' => 6,
                'standardized_id' => 6
            ),
            array(
                'module_id' => 1,
                'standardized_id' => 7
            ),
            array(
                'module_id' => 2,
                'standardized_id' => 8
            ),
            array(
                'module_id' => 3,
                'standardized_id' => 9
            ),
            array(
                'module_id' => 5,
                'standardized_id' => 10
            ),
            array(
                'module_id' => 6,
                'standardized_id' => 11
            ),
            array(
                'module_id' => 1,
                'standardized_id' => 12
            ),
            array(
                'module_id' => 2,
                'standardized_id' => 13
            ),
            array(
                'module_id' => 3,
                'standardized_id' => 14
            ),
            array(
                'module_id' => 4,
                'standardized_id' => 15
            ),
            array(
                'module_id' => 5,
                'standardized_id' => 16
            ),
            array(
                'module_id' => 6,
                'standardized_id' => 17
            ),
            array(
                'module_id' => 1,
                'standardized_id' => 18
            ),
            array(
                'module_id' => 1,
                'standardized_id' => 19
            ),
            array(
                'module_id' => 2,
                'standardized_id' => 20
            ),
            array(
                'module_id' => 2,
                'standardized_id' => 21
            )
        ));

    }
}
