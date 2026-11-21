<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'Aldous',
            'full_name' => 'Aldous Exequiel S. Damaso',
            'email' => 'aldous@example.com',
        ]);
    }
}
