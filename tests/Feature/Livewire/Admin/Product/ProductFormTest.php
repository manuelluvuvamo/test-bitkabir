<?php

namespace Tests\Feature\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ProductFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_product()
    {
        $category = Category::factory()->create();

        Livewire::test('admin.product.form.product-form')
            ->set('state.name', 'Test Product')
            ->set('state.description', 'Test Description')
            ->set('state.price', 100)
            ->set('state.category_id', $category->id)
            ->set('state.image', null)
            ->call('store')
            ->assertDispatched('toast', ['message' => 'Produto criado', 'notify' => 'success']);

        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 100,
            'category_id' => $category->id,
        ]);
    }

    public function test_it_can_update_a_product()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create();

        Livewire::test('admin.product.form.product-form', ['product' => $product])
            ->set('state.name', 'Updated Product')
            ->set('state.description', 'Updated Description')
            ->set('state.price', 200)
            ->set('state.category_id', $category->id)
            ->call('update')
            ->assertDispatched('toast', ['message' => 'Produto atualizado', 'notify' => 'success']);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Updated Product',
            'description' => 'Updated Description',
            'price' => 200,
            'category_id' => $category->id,
        ]);
    }

    public function test_it_validates_required_fields_when_creating_a_product()
    {
        Livewire::test('admin.product.form.product-form')
            ->call('store')
            ->assertHasErrors(['state.name', 'state.description', 'state.price', 'state.category_id']);
    }

    public function test_it_validates_required_fields_when_updating_a_product()
    {
        $product = Product::factory()->create();

        Livewire::test('admin.product.form.product-form', ['product' => $product])
            ->call('update')
            ->assertHasErrors(['state.name', 'state.description', 'state.price', 'state.category_id']);
    }
}
