<?php

namespace Tests\Feature\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Livewire\Admin\Product\ProductList;
use Livewire\Livewire;

class ProductListTest extends TestCase
{
    use RefreshDatabase;

    public function test_renders_successfully()
    {
        Livewire::test(ProductList::class)
            ->assertStatus(200);
    }

    public function test_component_exists_on_the_page()
    {
        $this->get('admin/products')
            ->assertSeeLivewire(ProductList::class);
    }

    public function test_displays_products()
    {
        $category = Category::factory()->create();

        Product::factory()->create([
            'name' => 'Test Product One',
            'category_id' => $category->id,
        ]);

        Product::factory()->create([
            'name' => 'Test Product Two',
            'category_id' => $category->id,
        ]);

        Livewire::test(ProductList::class)
            ->assertSee('Test Product One')
            ->assertSee('Test Product Two');
    }

    public function test_can_set_search_term()
    {
        Livewire::test(ProductList::class)
            ->set('searchTermForm', 'Test Product')
            ->assertSet('searchTermForm', 'Test Product');
    }

    public function test_can_destroy_product()
    {
        $product = Product::factory()->create();

        Livewire::test(ProductList::class)
            ->call('destroy', $product->id)
            ->assertDispatched('toast', ['message' => 'Produto eliminado', 'notify' => 'success']);

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_destroy_product_fails()
    {
        $product = Product::factory()->create();

        // Simulate an exception when deleting the product
        Product::shouldReceive('delete')->andThrow(new \Exception('Falhou ao eliminar o produto'));

        Livewire::test(ProductList::class)
            ->call('destroy', $product->id)
            ->assertDispatched('toast', ['message' => 'Falhou ao eliminar o produto', 'notify' => 'error']);

        $this->assertDatabaseHas('products', ['id' => $product->id]);
    }
}