<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Manufacture;
use \App\Models\Part;
use \App\Models\Picture;
use \App\Models\Car;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // $managers=User::factory(1)->create([
        //     'email'=>'managers@managers.author',
        //     'password'=> Hash::make('123456'),
        //     'role'=>'ROLE_CONTENT_MANAGER'

        // ]);  

        Category::factory(10)->create();
        Manufacture::factory(10)->create();
        Car::factory(10)->create();
        Part::factory(10)->create();
        // Picture::factory(10)->create();
        
        
    }
}
