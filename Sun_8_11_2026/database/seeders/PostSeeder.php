<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::create(['title' => 'Hello from my first Laravel app', 'body' => 'This page comes from the database, not from the code.']);
        Post::create(['title' => 'Why we use a framework', 'body' => 'Routing, validation and templates are already solved.']);
        Post::create(['title' => 'What MVC means to me', 'body' => 'One job per file, and I always know where to look.']);
    }
}
