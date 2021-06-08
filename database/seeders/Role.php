<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role as RoleModel;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleModel::create(['role' => 'user']);
        RoleModel::create(['role' => 'admin']);
    }
}
