<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
                "name_role" => "super admin",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "name_role" => "customer",
                "created_at" => now(),
                "updated_at" => now()
            ],
        ];

        foreach ($role as $value) {
            DB::table('roles')->insert($value);
        }
    }
}
