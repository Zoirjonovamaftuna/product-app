<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        DB::table('product_types')->insert([
            [
                'name' => 'shoes',
                'description' => 'A product made of leather or other materials, worn on the feet.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'clothes',
                'description' => 'A set of objects that cover, envelop the body.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'accessory',
                'description' => 'a thing which can be added to something else in order to make it more useful, versatile, or attractive.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('attributes')->insert([
            [
                'name' => 'color',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'size',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('attribute_values')->insert([
            [
                'name' => 'black',
                'attribute_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'white',
                'attribute_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'blue',
                'attribute_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'pink',
                'attribute_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'XS',
                'attribute_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'S',
                'attribute_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'M',
                'attribute_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'L',
                'attribute_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'XL',
                'attribute_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
