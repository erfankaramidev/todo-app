<?php

declare(strict_types=1);

namespace App\Livewire\Page;

use App\Models\Task;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Todo extends Component
{
    use WithPagination;

    /**
     * Task
     */
    #[Rule('required')]
    public string $task;

    /**
     * Task filter
     */
    public string $filter = 'all';

    /**
     * Add a new task
     */
    public function add(): void
    {
        $this->validate();

        Task::create([
            'title' => $this->task,
            'is_done' => false
        ]);

        $this->reset();
    }

    /**
     * Toggle tasks status
     */
    public function toggle(int $id): void
    {
        $task = Task::find($id);

        if (!$task) {
            return;
        }

        $task->is_done = !$task->is_done;
        $task->save();
    }

    /**
     * Delete a task
     */
    public function delete(int $id): void
    {
        Task::find($id)->delete();
    }

    /**
     * Filter tasks based on their status
     */
    public function filterStatus(string $filter): void
    {
        $this->resetPage();

        $validFilters = ['all', 'active', 'completed'];
        if (!in_array($filter, $validFilters)) {
            $filter = 'all';
        }

        $this->filter = $filter;
    }

    /**
     * Get all tasks
     */
    #[Computed]
    public function tasks(): Paginator
    {
        $query = Task::query()->orderByDesc('created_at');

        if ($this->filter === 'active') {
            $query->where('is_done', false);
        }

        if ($this->filter === 'completed') {
            $query->where('is_done', true);
        }

        return $query->simplePaginate(5);
    }
}
