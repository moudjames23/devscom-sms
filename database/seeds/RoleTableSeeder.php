<?php

use App\Permission;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class RoleTableSeeder extends Seeder
{

    private function randDate()
    {
        return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
    }

    public function run()
    {

        DB::table('roles')->delete();

        $roles = ['Admin'];

        for($i = 0; $i < count($roles); $i++)
        {
            DB::table('roles')->insert([
                'nom' => $roles[$i],
                'created_at' => $this->randDate(),
                'updated_at' => $this->randDate()
            ]);
        }

        $permissions = Permission::count();


        for($i = 1; $i <= $permissions; $i++)
        {
            DB::table('permission_role')->insert([
                'permission_id' => $i,
                'role_id' => 1
            ]);
        }

    }
}