<?php

namespace Database\Seeders;

use App\Models\Bar;
use App\Models\Baz;
use App\Models\Foo;
use App\Models\One;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@filamentphp.com',
        ]);

        One::factory()
            ->has(Foo::factory()->count(10))
            ->has(Bar::factory()->count(10))
            ->has(Baz::factory()->count(10))
            ->create();
    }
}
