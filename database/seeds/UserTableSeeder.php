<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        //$faker = Faker::create();

        DB::table('users')->insert([
            'nom' => 'Diallo',
            'prenom' => 'Moud',
            'email' => 'admin@gmail.com',
            'password' => bcrypt("password"),
            'role_id' => 1,

            'created_at' => $this->randDate(),
            'updated_at' => $this->randDate()
        ]);
    }

    private function randDate()
    {
        return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
    }
}
