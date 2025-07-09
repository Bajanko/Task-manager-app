@if($tasks->count() > 0)
    <div class="space-y-4">
        
        @foreach($tasks as $task)
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $task->title }}</h3>
                        @if($task->description)
                            <p class="mt-1 text-gray-600 dark:text-gray-400">{{ $task->description }}</p>
                        @endif
                        <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            <p>Created: {{ $task->created_at->format('M d, Y H:i') }}</p>
                            @if($task->due_date)
                                <p class="mt-1 {{ $task->due_date < now() ? 'text-red-500' : '' }}">
                                    Due: {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button onclick="openEditTaskModal({{ $task->id }}, '{{ addslashes($task->title) }}', '{{ addslashes($task->description) }}')"
                            class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                            Edit
                        </button>
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="completed" value="{{ $task->is_completed ? 0 : 1 }}">
                            <button type="submit" class="text-sm px-3 py-1 rounded-full {{ $task->is_completed ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $task->is_completed ? 'Completed' : 'Mark Complete' }}
                            </button>
                        </form>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline delete-task-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-600 hover:text-red-800">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center py-8">
        <p class="text-gray-500 dark:text-gray-400">No tasks found. Add your first task above!</p>
    </div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteForms = document.querySelectorAll('.delete-task-form');
    
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script> 