<div class="w-full max-w-md mx-auto">
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="bg-white dark:bg-dark-bg-secondary shadow-md rounded-lg px-8 pt-6 pb-8 mb-4 transition-colors duration-200">
        @csrf
        @method('PATCH')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 dark:text-dark-text-primary text-sm font-bold mb-2 transition-colors duration-200">
                Task Title
            </label>
            <input type="text" name="title" id="title" required ma
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-dark-text-primary dark:bg-dark-bg-primary leading-tight focus:outline-none focus:shadow-outline transition-colors duration-200"
                value="{{ $task->title }}">
        </div>

        <div class="mb-6">
            <label for="description" class="block text-gray-700 dark:text-dark-text-primary text-sm font-bold mb-2 transition-colors duration-200">
                Description
            </label>
            <textarea name="description" id="description" rows="3"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-dark-text-primary dark:bg-dark-bg-primary leading-tight focus:outline-none focus:shadow-outline transition-colors duration-200">{{ $task->description }}</textarea>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-colors duration-200">
                Update Task
            </button>
            <a href="{{ route('tasks.index') }}" 
                class="text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200">
                Cancel
            </a>
        </div>
    </form>
</div> 