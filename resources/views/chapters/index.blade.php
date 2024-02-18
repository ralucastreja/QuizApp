@extends('layouts.app')

@section('content')
<div class="bg-gray-800 p-4 text-gray-300 w-64">
    @foreach ($chapters as $chapter)
    <div class="mb-2">
        <!-- Dropdown header -->
        <button
            class="dropdown-header flex items-center justify-between w-full p-2 rounded text-left bg-gray-700 hover:bg-gray-600 focus:outline-none">
            <span class="dropdown-arrow mr-2">&#9660;</span> <!-- Down arrow -->
            <span>{{ $chapter->title }}</span>
        </button>
        <!-- Dropdown links -->
        <div class="dropdown-links hidden mt-1 pl-2">
            <ul class="list-none">
                @foreach ($chapter->quizzes as $quiz)
                <li>
                    <a href="{{ route('quizzes.show', $quiz->id) }}"
                        class="block p-2 rounded hover:bg-gray-600 no-underline">
                        {{ $quiz->title }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endforeach
</div>



@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.dropdown-header').forEach(function (button) {
            button.addEventListener('click', function () {
                const dropdownLinks = this.nextElementSibling;
                const arrow = this.querySelector('.dropdown-arrow');

                dropdownLinks.classList.toggle('hidden');
                arrow.innerHTML = dropdownLinks.classList.contains('hidden') ? '&#9660;' : '&#9650;';
            });
        });
    });
</script>
@endpush
