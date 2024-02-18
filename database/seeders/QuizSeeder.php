<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    public function run()
    {
        $chapters = [
            1 => 'Fundamentals of Testing',
            2 => 'Testing Throughout the Testing Lifecycle',
        ];

        foreach ($chapters as $number => $title) {
            $chapter = Chapter::where('number', $number)->first();

            if ($chapter) {
                Quiz::create([
                    'chapter_id' => $chapter->id,
                    'title' => $title . " Quiz",
                ]);
            }
        }
    }
}
