<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mt-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <form class="max-w" method="POST" action="{{route('addQuestion')}}">
                    @csrf
                    <div class="mb-6">
                        <label for="question" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter Question</label>
                        <div class="flex items-center">
                            <input type="text" id="question" name="question" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="What is php" required />
                            <button type="submit" class="ml-4 btn-style">Add Question</button>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="answer1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer 01</label>

                        <div class="flex items-center">
                            <input type="text" id="answer1" name="answer1" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Answer 1" required />

                            <div class="flex items-center ml-4">
                                <input id="terms" type="radio" name="correct_answer" value="answer1" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                                <label for="terms" class="ml-2 text-sm text-gray-900 dark:text-gray-300">Correct Answer</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="answer2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer 02</label>

                        <div class="flex items-center">
                            <input type="text" id="answer2" name="answer2" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Answer 1" required />

                            <div class="flex items-center ml-4">
                                <input id="terms" type="radio" name="correct_answer" value="answer2" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"/>
                                <label for="terms" class="ml-2 text-sm text-gray-900 dark:text-gray-300">Correct Answer</label>
                            </div>
                        </div>
                    </div>


                    <div class="mb-5">
                        <label for="answer3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer 03</label>

                        <div class="flex items-center">
                            <input type="text" id="answer3" name="answer3" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Answer 1" required />

                            <div class="flex items-center ml-4">
                                <input id="terms" type="radio" name="correct_answer" value="answer3" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"/>
                                <label for="terms" class="ml-2 text-sm text-gray-900 dark:text-gray-300">Correct Answer</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="answer4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer 04</label>

                        <div class="flex items-center">
                            <input type="text" id="answer4" name="answer4" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Answer 1" required />

                            <div class="flex items-center ml-4">
                                <input id="terms" type="radio" name="correct_answer" value="answer4" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"/>
                                <label for="terms" class="ml-2 text-sm text-gray-900 dark:text-gray-300">Correct Answer</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
