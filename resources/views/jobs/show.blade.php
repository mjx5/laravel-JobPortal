<x-layout>
    <x-slot:heading>
        Job Page
    </x-slot:heading>
    <h2>{{$job['title']}}</h2>

    <h3>This job pays :{{$job['salary']}}</h3>
    <hr>
    @can('edit',$job)
        <p class="mt-6"></p>
            <a href="/jobs/{{$job->id}}/edit" class="relative inline-flex items-center px-4 py-2  text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                Edit Job
            </a>
        </p>
    @endcan

</x-layout>
