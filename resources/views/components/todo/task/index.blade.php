@props([
    'task'
])

<li class="flex justify-between items-center bg-gray-50 p-4 rounded-xl shadow-xs font-medium">
    <span class="text-gray-800">{{ $task->title }}</span>
    <div class="flex items-center space-x-2">
        <button wire:click="toggle('{{ $task->id }}')"
            class="cursor-pointer rounded-lg py-1 px-3 {{ $task->is_done ? 'bg-gray-200 hover:bg-gray-300 text-gray-700' : 'bg-green-100 hover:bg-green-200 text-green-700'}}">{{ $task->is_done ? 'Undo' : 'Done' }}</button>
        <button wire:click="delete('{{ $task->id }}')" class="p-1 rounded-full text-xs cursor-pointer">
            🗑️
        </button>
    </div>
</li>