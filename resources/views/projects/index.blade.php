<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('projects.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Project</a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($projects as $project)
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold">{{ $project->name }}</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ $project->description }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Created by: {{ $project->creator->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>