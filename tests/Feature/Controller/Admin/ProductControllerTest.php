<?php

namespace Tests\Feature\Controller\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/admin/products');
        $response->assertStatus(200);
        $response->assertViewIs('admin.products.index');
    }

    public function testCreate()
    {
        $response = $this->get('/admin/products/create');
        $response->assertStatus(200);
        $response->assertViewIs('admin.products.create');
    }

    public function testEdit()
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
        
        $response = $this->get("/admin/products/$product->id/edit");
        $response->assertStatus(200);
        $response->assertViewIs('admin.products.edit');
    }
}
