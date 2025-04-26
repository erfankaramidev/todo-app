<?php

declare(strict_types=1);

namespace App\Livewire\Page;

use App\Models\Task;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Todo extends Component
{
    /**
     * Task
     */
    #[Rule('required')]
    public string $task;

    public function add()
    {
        $this->validate();

        Task::create([
            'title' => $this->task,
            'is_done' => false
        ]);

        $this->reset();
    }

    public function toggle(int $id)
    {
        $task = Task::find($id);
        $task->is_done = !$task->is_done;
        $task->save();
    }

    #[Computed]
    public function tasks()
    {
        return Task::all();
    }
}
