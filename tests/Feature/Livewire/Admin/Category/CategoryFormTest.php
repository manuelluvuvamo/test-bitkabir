<?php

namespace Tests\Feature\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CategoryFormTest extends TestCase
{
    use RefreshDatabase;

    public function it_can_create_a_category()
    {
        Livewire::test('admin.category.form.category-form')
            ->set('state.name', 'Test Category')
            ->call('store')
            ->assertDispatched('toast', ['message' => 'Categoria criada', 'notify' => 'success']);

        $this->assertDatabaseHas('categories', [
            'name' => 'Test Category',
        ]);
    }

    public function it_can_update_a_category()
    {
        $category = Category::factory()->create();

        Livewire::test('admin.category.form.category-form', ['category' => $category])
            ->set('state.name', 'Updated Category')
            ->call('update')
            ->assertDispatched('toast', ['message' => 'Categoria atualizada', 'notify' => 'success']);

        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'name' => 'Updated Category',
        ]);
    }

    public function it_validates_required_fields_when_creating_a_category()
    {
        Livewire::test('admin.category.form.category-form')
            ->call('store')
            ->assertHasErrors();
    }

    public function it_validates_required_fields_when_updating_a_category()
    {
        $category = Category::factory()->create();

        Livewire::test('admin.category.form.category-form', ['category' => $category])
            ->call('update')
            ->assertHasErrors();
    }
}
