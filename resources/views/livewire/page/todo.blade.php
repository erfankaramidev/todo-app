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
        <select id="sort" class="border border-gray-200 rounded-lg px-3 py-2 outline-none focus:border-indigo-400">
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
        <button wire:click="filterStatus('all')" class="px-3 py-1 rounded-full cursor-pointer {{ $this->filter == 'all' ? 'bg-indigo-100 text-indigo-700 font-medium' : 'bg-gray-100 text-gray-700' }}">All</button>
        <button wire:click="filterStatus('active')" class="px-3 py-1 rounded-full cursor-pointer {{ $this->filter == 'active' ? 'bg-indigo-100 text-indigo-700 font-medium' : 'bg-gray-100 text-gray-700' }}">Active</button>
        <button wire:click="filterStatus('completed')" class="px-3 py-1 rounded-full cursor-pointer {{ $this->filter == 'completed' ? 'bg-indigo-100 text-indigo-700 font-medium' : 'bg-gray-100 text-gray-700' }}">Completed</button>
    </div>

    <!-- Task list -->
    <ul class="space-y-3 mb-4">
        @foreach ($this->tasks as $task)
            <li wire:key="{{ $task->id }}"
                class="flex justify-between items-center bg-gray-50 p-4 rounded-xl shadow-xs font-medium">
                <span class="text-gray-800">{{ $task->title }}</span>
                <div class="flex items-center space-x-2">
                    <button wire:click="toggle('{{ $task->id }}')"
                        class="cursor-pointer rounded-lg py-1 px-3 {{ $task->is_done ? 'bg-gray-200 hover:bg-gray-300 text-gray-700' : 'bg-green-100 hover:bg-green-200 text-green-700'}}">{{ $task->is_done ? 'Undo' : 'Done' }}</button>
                    <button wire:click="delete('{{ $task->id }}')" class="p-1 rounded-full text-xs cursor-pointer">
                        🗑️
                    </button>
                </div>
            </li>
        @endforeach
    </ul>

    {{-- Pagination --}}
    {{ $this->tasks->links() }}
</div>