<?php

namespace Tests\Feature\Livewire\Admin\Category;

use App\Models\Category;
use Tests\TestCase;
use App\Livewire\Admin\Category\CategoryList;
use Livewire\Livewire;

class CategoryListTest extends TestCase
{

  public function renders_successfully()
  {
    Livewire::test(CategoryList::class)
      ->assertStatus(200);
  }

  public function component_exists_on_the_page()
  {
    $this->get('admin/categories')
      ->assertSeeLivewire(CategoryList::class);
  }

  public function displays_categories()
  {
    Category::factory()->create([
      'name' => 'Test Category One'
    ]);

    Category::factory()->create([
      'name' => 'Test Category Two'
    ]);

    Livewire::test(CategoryList::class)
      ->assertSee('Test Category One')
      ->assertSee('Test Category Two');
  }

  public function can_set_search_term()
  {
    Livewire::test(CategoryList::class)
      ->set('searchTermForm', 'Confessions of a serial soaker')
      ->assertSet('searchTermForm', 'Confessions of a serial soaker');
  }

  public function can_destroy_category()
  {
    $category = Category::factory()->create();

    Livewire::test(CategoryList::class)
      ->call('destroy', $category->id)
      ->assertDispatched('toast', ['message' => 'Categoria eliminada', 'notify' => 'success']);

    $this->assertDatabaseMissing('categories', ['id' => $category->id]);
  }

  public function destroy_category_fails()
  {
    $category = Category::factory()->create();

    // Simulate an exception when deleting the category
    Category::shouldReceive('delete')->andThrow(new \Exception('Delete failed'));

    Livewire::test(CategoryList::class)
      ->call('destroy', $category->id)
      ->assertDispatched('toast', ['message' => 'Falhou ao eliminar a categoria', 'notify' => 'error']);

    $this->assertDatabaseHas('categories', ['id' => $category->id]);
  }
}