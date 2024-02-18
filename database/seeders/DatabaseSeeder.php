<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        Employee::create([
            'name' => 'purbaya',
            'email' => 'purbaya@gmail.com',
            'position_id' => '1',
            'department_id' => '1',
            'address' => 'bandung',
        ]);
        Department::create([
            'name' => 'IT',
            'description' => 'Mengelola sistem informasi',
        ]);
        Position::create([
            'name' => 'Developer',
            'department_id' => '1',
            'description' => 'Mengembangkan web perusahaan',
        ]);
    }
}
