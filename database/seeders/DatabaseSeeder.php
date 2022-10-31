<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Listing; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();

        Listing::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    //    Listing::create([
    //     'title'=>"Laravel Senior Developer",
    //     'tags'=>"Laravel, Javascript",
    //     'company'=>"Facebook",
    //     'location'=>"Taunggyi, Mandalay",
    //     'email'=>"sailaminoak@edu.mm",
    //     'website'=>"sailaminoak.edu.mm",
    //     'description'=>"Lorem Ipsum (base) hhh:laragigs sailaminoak$ php artisan make:model Listing
    //      INFO  Model [app/Models/Listing.php] created successfully.",
    //  ]);
    //  Listing::create([
    //     'title'=>"Laravel Senior Developer",
    //     'tags'=>"Laravel, Javascript",
    //     'company'=>"Facebook",
    //     'location'=>"Taunggyi, Mandalay",
    //     'email'=>"sailaminoak@edu.mm",
    //     'website'=>"sailaminoak.edu.mm",
    //     'description'=>"Lorem Ipsum (base) hhh:laragigs sailaminoak$ php artisan make:model Listing
    //      INFO  Model [app/Models/Listing.php] created successfully.",
    //  ]);
    //  Listing::create([
    //     'title'=>"Laravel Senior Developer",
    //     'tags'=>"Laravel, Javascript",
    //     'company'=>"Facebook",
    //     'location'=>"Taunggyi, Mandalay",
    //     'email'=>"sailaminoak@edu.mm",
    //     'website'=>"sailaminoak.edu.mm",
    //     'description'=>"Lorem Ipsum (base) hhh:laragigs sailaminoak$ php artisan make:model Listing
    //      INFO  Model [app/Models/Listing.php] created successfully.",
    //  ]);
    }
}
