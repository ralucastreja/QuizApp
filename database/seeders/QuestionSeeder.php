<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        // Seed questions and answers for "Fundamentals of Testing" Quiz
        $quiz = Quiz::whereHas('chapter', function ($query) {
            $query->where('title', 'Fundamentals of Testing');
        })->first();

        if (!$quiz) {
            // Optionally log an error or create the quiz
            return;
        }

        $questionsAndAnswers = [
            [
                'text' => 'What is Testing?',
                'answers' => [
                    ['text' => 'Understanding software application limitations', 'is_correct' => true],
                    ['text' => 'Finding defects', 'is_correct' => false],
                    ['text' => 'Fixing defects', 'is_correct' => false],
                    ['text' => 'Writing test cases', 'is_correct' => false],
                ],
            ],
            [
                'text' => 'What is the main purpose of testing?',
                'answers' => [
                    ['text' => 'Ensuring code quality', 'is_correct' => false],
                    ['text' => 'Verifying meeting of customer requirements', 'is_correct' => true],
                    ['text' => 'Program execution', 'is_correct' => false],
                    ['text' => 'None of the above', 'is_correct' => false],
                ],
            ],
            // Add more questions here as needed
        ];

        foreach ($questionsAndAnswers as $qa) {
            $question = Question::create([
                'quiz_id' => $quiz->id,
                'text' => $qa['text'],
                // Assuming sequential numbering is desired; adjust as necessary
                'number' => Question::where('quiz_id', $quiz->id)->max('number') + 1,
            ]);

            foreach ($qa['answers'] as $answer) {
                Answer::create([
                    'question_id' => $question->id,
                    'text' => $answer['text'],
                    'is_correct' => $answer['is_correct'],
                ]);
            }
        }
    }
}
