<?php

namespace Database\Seeders;

use App\Models\Chapter;
use Illuminate\Database\Seeder;

class ChapterSeeder extends Seeder
{
    public function run()
    {
        Chapter::factory()->create([
            'title' => 'Fundamentals of Testing',
            'number' => '1'
        ]);

        Chapter::factory()->create([
            'title' => 'Testing Throughout the Testing Lifecycle',
            'number' => '2'
        ]);
    }
}
