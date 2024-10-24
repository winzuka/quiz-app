<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mt-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                    <a href="{{route('questionPage')}}" type="button" class="btn-style">Add Questions</a>
            </div>
        </div>
        <div class="relative overflow-x-auto m-10">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Question
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Answer 1
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Answer 2
                    </th>
                    <th scope="col" class="px-6 py-3">
                       Answer 3
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Answer 4
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$question->question}}
                        </th>
                        @foreach($question->answers as $answer)
                            <td class="px-6 py-4">
                                {{$answer->answer }}
                            </td>
                        @endforeach
                        <td class="px-6 py-4">
                           <a href="{{route('editQuestion',[$question->id])}}" class="text-green-600">Edit |</a>
                            <a href="#" class="text-red-600">Remove</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </div>
</x-app-layout>
