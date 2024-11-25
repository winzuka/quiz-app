<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Total Question Count {{$totalQuestionCount}} | Correct Answer Count {{$correctAnswersCount}}
        </h2>
    </x-slot>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 m-4">

            @if(session('message'))
                <div>{{session('message')}}</div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm-rounded-lg">

                @foreach($questions as $question)
                    <form action="{{route('addAnswer',[$question->id])}}" method="POST">
                        @csrf
                        <div class="max-w-sm m-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$question->question}}</h5>

                                @foreach($question->answers as $index => $answer)
                                    <div class="m-3">
                                        <input type="radio" name="answer" id="answer" value="answer{{$index + 1}}">
                                        <label for="answer">{{$answer->answer}}</label>
                                    </div>
                                @endforeach
                                <button type="submit" class="btn-style">
                                Answer
                                </button>
                        </div>
                    </form>
                @endforeach

            </div>
        </div>
</x-app-layout>
