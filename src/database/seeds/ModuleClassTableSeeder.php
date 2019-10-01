<?php

use Illuminate\Database\Seeder;

class ModuleClassTableSeeder extends Seeder
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
        DB::table('module_class')->truncate();

        // score with target A
        DB::table('module_class')->insert(array(
            array('module_id' => 1, 'class_id' => 1),
            array('module_id' => 2, 'class_id' => 1),
            array('module_id' => 3, 'class_id' => 1),
            array('module_id' => 4, 'class_id' => 1),
            array('module_id' => 1, 'class_id' => 2),
            array('module_id' => 2, 'class_id' => 2),
            array('module_id' => 3, 'class_id' => 2),
            array('module_id' => 4, 'class_id' => 2)
        ));
    }
}
