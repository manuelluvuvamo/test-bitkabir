<?php

namespace Tests\Feature\Model;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_creation(): void
    {
        $category = Category::factory()->create([
            'name' => 'Test Category',
        ]);

        $product = Product::factory()->create([
            'name' => 'Test Product',
            'description' => 'This is a test product.',
            'price' => 99.99,
            'category_id' => $category->id,
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
        ]);
    }
}
