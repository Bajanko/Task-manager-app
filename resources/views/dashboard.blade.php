<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100 text-center">Welcome, {{ Auth::user()->name }}!</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-indigo-100 dark:bg-indigo-900 p-4 rounded-lg text-center">
                        <div class="text-3xl font-bold text-indigo-700 dark:text-indigo-300">{{ $tasks->count() }}</div>
                        <div class="text-gray-700 dark:text-gray-300">Total Tasks</div>
                    </div>
                    <div class="bg-green-100 dark:bg-green-900 p-4 rounded-lg text-center">
                        <div class="text-3xl font-bold text-green-700 dark:text-green-300">{{ $completedCount }}</div>
                        <div class="text-gray-700 dark:text-gray-300">Task Completed</div>
                    </div>
                    <div class="bg-yellow-100 dark:bg-yellow-900 p-4 rounded-lg text-center">
                        <div class="text-3xl font-bold text-yellow-700 dark:text-yellow-300">{{ $pendingCount }}</div>
                        <div class="text-gray-700 dark:text-gray-300">Pending Task</div>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-2 text-gray-800 dark:text-gray-100">Recent Tasks</h4>
                    <ul>
                        @forelse($tasks->take(5) as $task)
                            <li class="mb-2 flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded">
                                <span class="font-medium text-gray-900 dark:text-gray-100">{{ $task->title }}</span>
                                <span class="text-xs {{ $task->is_completed ? 'text-green-600 dark:text-green-400' : 'text-yellow-600 dark:text-yellow-400' }}">
                                    {{ $task->is_completed ? 'Completed' : 'Pending' }}
                                </span>
                            </li>
                        @empty
                            <li class="text-gray-500 dark:text-gray-400">No recent tasks found.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
