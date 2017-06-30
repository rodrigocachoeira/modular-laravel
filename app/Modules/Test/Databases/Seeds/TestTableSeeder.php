<?php

namespace App\Modules\Test\Databases\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Console\Command;
use Faker\Factory as Faker;
use DB;

class TestTableSeeder extends Seeder
{

  /**
  * @param Faker generator
  */
  private $faker;

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
      DB::table('tests')->delete(); //deleta todos os registros da tabela
      $this->faker = Faker::create();
      $max = 5000;

      $bar = $this->command->getOutput()->createProgressBar($max);
      $this->command->info('Start Running Tests');

      foreach (range(1, $max) as $number) {
        DB::table('tests')->insert([
          'name' => $this->faker->name,
          'description' => $this->faker->text,
          'number' => $this->faker->randomNumber,
          'money' => $this->faker->randomFloat(2, 0, 700000),
          'date' => $this->faker->date,
          'available' => $this->faker->boolean,
          'time' => $this->faker->time,
        ]);
        $bar->advance();
      }

      $bar->finish();
      
      $this->command->line('');
      $this->command->info('Tests Completed');
  }
}
