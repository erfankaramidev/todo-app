@php
    /**
     * @var \App\Livewire\Page\Todo $this
     **/
@endphp
<!-- Box -->
<div class="w-full max-w-2xl bg-white shadow-md rounded-2xl p-6">
    <!-- Header -->
    <header class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold text-gray-900">To-do list</h1>
        <select wire:model.live="sort" class="border border-gray-200 rounded-lg px-3 py-2 outline-none focus:border-indigo-400">
            <option value="created">Date created</option>
            <option value="alphabetical">A-Z</option>
        </select>
    </header>

    <!-- New task input -->
    <div class="mb-4">
        <div>
            <form class="flex">
                <input wire:model="task"
                    class="flex-grow border border-gray-300 rounded-l-lg px-4 py-2 focus:border-indigo-400 outline-none"
                    type="text" name="task" placeholder="Add a new task...">
                <button wire:click.prevent="add" type="submit"
                    class="px-6 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold rounded-r-xl cursor-pointer">Add</button>

            </form>
        </div>
        @error('task')
            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
        @enderror
    </div>

    <!-- Filters -->
    <div class="flex justify-center space-x-2 mb-4">
        <x-todo.filter.button label="All" key="all" />
        <x-todo.filter.button label="Active" key="active" />
        <x-todo.filter.button label="Completed" key="completed" />
    </div>

    <!-- Task list -->
    <ul class="space-y-3 mb-4">
        @forelse ($this->tasks as $task)
            <x-todo.task wire:key="task-{{ $task->id }}" :task="$task" />
        @empty
            <p class="text-gray-600 text-center">No tasks found.</p>
        @endforelse
    </ul>

    {{-- Pagination --}}
    {{ $this->tasks->links() }}
</div>