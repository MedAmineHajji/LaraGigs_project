<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;
use League\CommonMark\Extension\CommonMark\Node\Block\ListItem;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $user = User::factory()->create([
            'name' => 'Dja Hajji',
            'email' => 'dja@test.com'
        ]);


//THIS IS HOW TO CREATE STATIC DATA WITH THE CREATE FUNCTION
        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'Laravel, JavaScript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Bostin, USA',
        //     'email' => 'email@test.com',
        //     'website' => 'https://www.acme.com/',
        //     'description' => 'Lorem ipsum dolor sit 
        //     amet, consectetur adipiscing elit, 
        //     sed do eiusmod tempor incididunt ut labore et 
        //     dolore magna aliqua.'
        // ]);
        // Listing::create([
        //     'title' => 'Full-Stack Engineer',
        //     'tags' => 'Laravel, backend, api',
        //     'company' => 'Acme Corp',
        //     'location' => 'Bostin, USA',
        //     'email' => 'email@test.com',
        //     'website' => 'https://www.acme.com/',
        //     'description' => 'Lorem ipsum dolor sit 
        //     amet, consectetur adipiscing elit, 
        //     sed do eiusmod tempor incididunt ut labore et 
        //     dolore magna aliqua.'
        // ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);




        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
