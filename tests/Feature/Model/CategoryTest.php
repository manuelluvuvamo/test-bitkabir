<?php

namespace Tests\Feature\Model;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_category_creation(): void
    {
        $category = Category::factory()->create([
            'name' => 'Test Category',
        ]);

        $this->assertDatabaseHas('categories', [
            'name' => 'Test Category',
        ]);
    }
}
