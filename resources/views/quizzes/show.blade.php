@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-lg font-bold mb-4">Quiz: {{ $quiz->title }}</h2>
    <form action="#" method="POST">
        @csrf
        @foreach ($quiz->questions as $questionIndex => $question)
        <div class="mb-6">
            <p class="font-semibold mb-2">{{ $questionIndex + 1 }}. {{ $question->text }}</p>
            @foreach ($question->answers as $answerIndex => $answer)
            <div class="ml-6 mb-2">
                <label class="flex items-center">
                    <input type="radio" name="questions[{{ $question->id }}]" value="{{ $answer->id }}" class="mr-2">
                    <span>{{ chr(97 + $answerIndex) }}. {{ $answer->text }}</span>
                </label>
            </div>
            @endforeach
        </div>
        @endforeach
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Submit Answers</button>
    </form>
</div>
@endsection
