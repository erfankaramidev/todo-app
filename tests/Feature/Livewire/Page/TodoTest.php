<?php

namespace Tests\Feature\Livewire\Page;

use App\Livewire\Page\Todo;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TodoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Return the Livewire component.
     */
    protected function componentName()
    {
        return Livewire::test(Todo::class);
    }

    /**
     * Test that the component renders successfully.
     */
    public function test_renders_successfully()
    {
        $this->componentName()
            ->assertStatus(200);
    }

    /**
     * Test that the user can add a new task.
     */
    public function test_can_add_new_task()
    {
        $this->assertEquals(0, Task::count());

        $this->componentName()
            ->set('task', 'Test task')
            ->call('add');

        $this->assertEquals(1, Task::count());
    }

    /**
     * Test that the user can toggle task status.
     */
    public function test_can_toggle_task_status()
    {
        $this->componentName()
            ->set('task', 'Test task')
            ->call('add')
            ->assertSet('tasks.0.is_done', false)
            ->call('toggle', 1)
            ->assertSet('tasks.0.is_done', true);
    }

    /**
     * Test that the user can delete a task.
     */
    public function test_can_delete_task()
    {
        $this->componentName()
            ->set('task', 'Test task')
            ->call('add')
            ->assertCount('tasks', 1)
            ->call('delete', 1)
            ->assertCount('tasks', 0);
    }
}
