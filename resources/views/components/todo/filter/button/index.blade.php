@php
    /**
     * @var \App\Livewire\Page\Todo $this
     **/
 @endphp
@props([
    'label',
    'key'
])

<button wire:click="filterStatus('{{ $key }}')" wire:loading.class="opacity-50 cursor-wait" wire:loading.attr="disabled"
    class="px-3 py-1 rounded-full cursor-pointer {{ $this->filter === $key ? 'bg-indigo-100 text-indigo-700 font-medium' : 'bg-gray-100 text-gray-700' }}">{{ $label }}</button>