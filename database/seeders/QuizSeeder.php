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
                // Retrieve the current count of quizzes for this chapter to determine the next quiz number
                $currentQuizCount = $chapter->quizzes()->count();

                // Create a new quiz for the chapter
                Quiz::create([
                    'chapter_id' => $chapter->id,
                    // Naming the quiz as "Quiz X" based on the current count of quizzes in this chapter
                    'title' => "Quiz " . ($currentQuizCount + 1),
                ]);
            }
        }
    }
}
