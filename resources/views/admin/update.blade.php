<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mt-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <form class="max-w" method="POST" action="{{route('updateQuestion', [$question->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="question" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter Question</label>
                        <div class="flex items-center">
                            <input type="text" id="question" name="question" class="input-field" value="{{$question->question}}" placeholder="What is php" required />
                            <button type="submit" class="ml-4 btn-style">Update Question</button>
                        </div>
                    </div>
                    @foreach($answers as $index => $answer)
                        <div class="mb-5">
                            <label for="answer{{$index + 1}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer {{$index + 1}}</label>
                            <div class="flex items-center">
                                <input type="text" id="answer{{$index + 1}}" name="answer{{$index + 1}}" class="input-field" value="{{$answer}}" placeholder="Answer 1" required />

                                <div class="flex items-center ml-4">
                                    <input id="correct_answer1" type="radio" name="correct_answer" value="answer1" class="btn-radio"
                                        {{$correct_answer === 'answer'.($index + 1) ? 'checked' : ''}}
                                    />
                                    <label for="correct_answer1" class="ml-2 text-sm text-gray-900 dark:text-gray-300">Correct Answer</label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
