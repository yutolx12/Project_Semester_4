<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // $user1 = User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin2@test.com',
        // ]);

        // $user2 = User::factory()->create([
        //     'name' => 'Editing',
        //     'email' => 'edit2@test.com',
        // ]);

        $user1 = User::factory()->create([
            'name' => 'Admin',
            'email' => 'superadmin1@test.com',
        ]);

        $role = Role::create(['name' => 'adminsuper']);
        $user1->assignRole($role);

        // $role = Role::create(['name' => 'admin']);
        // $user1->assignRole($role);

        // $role = Role::create(['name' => 'editing']);
        // $user2->assignRole($role);
    }
}
