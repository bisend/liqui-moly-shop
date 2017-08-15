<?php

use App\DatabaseModels\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        User::truncate();
        $this->command->info('[users] table truncated...');

        $this->seed();

        $this->command->info('[users] table seeded...');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    /*
     * Seeds model data
     */
    public function seed()
    {
        $faker = Faker\Factory::create();

        $limit = 33;

        for ($i = 0; $i < $limit; $i++) {
            $model = new User();
            $model->name = $faker->name;
            $model->email = $faker->unique()->email;
            $model->password = bcrypt('qqqqqq');
            $model->save();
        }
    }
}