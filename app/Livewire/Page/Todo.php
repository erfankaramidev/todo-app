<?php

declare(strict_types=1);

namespace App\Livewire\Page;

use App\Models\Task;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
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
    #[Url]
    public string $filter = 'all';

    /**
     * Task sort
     */
    #[Url]
    public string $sort = 'created';

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

        $this->reset('task');
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
        $query = Task::query();

        match ($this->sort) {
            'created'      => $query->orderByDesc('created_at'),
            'alphabetical' => $query->orderBy('title'),
            default        => null
        };

        match ($this->filter) {
            'active'    => $query->active(),
            'completed' => $query->completed(),
            default     => null
        };

        return $query->simplePaginate(5);
    }
}
