<?php

namespace Tests\Feature\Controller\Admin;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;
    
    public function testIndex()
    {
        $response = $this->get('/admin/categories');
        $response->assertStatus(200);
        $response->assertViewIs('admin.categories.index');
    }

    public function testCreate()
    {
        $response = $this->get('/admin/categories/create');
        $response->assertStatus(200);
        $response->assertViewIs('admin.categories.create');
    }

    public function testEdit()
    {
        $category = Category::factory()->create([
            'name' => 'Test Category',
        ]);
        
        $response = $this->get("/admin/categories/$category->id/edit");
        $response->assertStatus(200);
        $response->assertViewIs('admin.categories.edit');
    }
}
