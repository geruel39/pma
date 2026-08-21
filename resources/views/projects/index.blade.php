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
                        <div class="">
                            <h3 class="text-lg font-semibold">{{ $project->name }}</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ $project->description }}</p>
                            <div class="flex space-x-5">
                                <p class="text-sm text-gray-500 dark:text-gray-400">Created by: {{ $project->creator->name }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Tasks: {{ $project->tasks()->count() }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Members: {{ $project->users->count() }}</p>
                            </div>
                            <div class="border my-2"></div>
                            <div class="flex space-x-5 mt-2">
                                <a href="{{ route('projects.show', $project->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">View</a>
                                <a href="{{ route('projects.edit', $project->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>