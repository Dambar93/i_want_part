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
use App\Models\Role;

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

        Category::factory(1)->create();
        Category::factory(1)->create([
            'category_id' => 1,
            'name' => 'Front doors'
        ]);
        Category::factory(1)->create([
            'category_id' => 1,
            'name' => 'Rear doors'
        ]);
        
        Manufacture::factory(1)->create();
        Car::factory(10)->create();
        Part::factory(20)->create();
        Part::factory(20)->create([
            'condition' => 'new'
        ]);
        // Picture::factory(10)->create();
        // User::factory(1)->create([
        //     'email' => 'test@test.test',
        //     'password' => Hash::make('12345678')
        // ]);
        for($i=1; $i < 41; $i++){
            Picture::factory(1)->create([
                'part_id' => $i
            ]
            );
        }
        Role::factory(1)->create(['name' => 'ROLE_ADMIN']);
        Role::factory(1)->create(['name' => 'ROLE_USER']);
        User::factory(1)->create([
            'name' => 'Page Admin',
            'email' => 'admin@admin.admin',
            'password' => Hash::make('12345678'),
            'role' => User::ROLE_ADMIN
        ]);

        User::factory(1)->create([
            'name' => 'Damian Baranovski',
            'email' => 'dambar@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => User::ROLE_USER
        ]);
        
    }
}
