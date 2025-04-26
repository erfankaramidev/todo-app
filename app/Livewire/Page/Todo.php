<?php

declare(strict_types=1);

namespace App\Livewire\Page;

use App\Models\Task;
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
     * Add a new task
     */
    public function add()
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
    public function toggle(int $id)
    {
        $task = Task::find($id);
        $task->is_done = !$task->is_done;
        $task->save();
    }

    /**
     * Delete a task
     */
    public function delete(int $id) 
    {
        Task::find($id)->delete();
    }

    /**
     * Get all tasks
     */
    #[Computed]
    public function tasks()
    {
        return Task::simplePaginate(5);
    }
}
