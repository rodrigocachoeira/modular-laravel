<?php

use Illuminate\Database\Seeder;

use App\Modules\Test\Databases\Seeds\TestTableSeeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Model::unguard();
        $this->testsModules();
      Model::reguard();
    }

    /**
    * Executa a seeders de um modulo
    * em especifico
    *
    * @return void
    */
    private function testsModules ()
    {
      $this->call(TestTableSeeder::class);
    }
}
