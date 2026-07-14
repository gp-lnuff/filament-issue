<?php

namespace Database\Seeders;

use App\Models\Bar;
use App\Models\Baz;
use App\Models\Foo;
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

        $foo1 = tap(new Foo(['description' => 'foo1']))->save();
        $foo2 = tap(new Foo(['description' => 'foo2']))->save();

        $bar6 = new Bar(['description' => 'bar6']);
        $bar6->foo()->associate($foo1)->save();
        $bar3 = new Bar(['description' => 'bar3']);
        $bar3->foo()->associate($foo2)->save();
        $bar1 = new Bar(['description' => 'bar1']);
        $bar1->foo()->associate($foo2)->save();
        $bar5 = new Bar(['description' => 'bar5']);
        $bar5->foo()->associate($foo2)->save();
        $bar2 = new Bar(['description' => 'bar2']);
        $bar2->foo()->associate($foo1)->save();
        $bar4 = new Bar(['description' => 'bar4']);
        $bar4->foo()->associate($foo1)->save();


        new Baz(['description' => 'baz1'])->save();
        new Baz(['description' => 'baz2'])->save();
        new Baz(['description' => 'baz3'])->save();
        new Baz(['description' => 'baz4'])->save();

    }
}
