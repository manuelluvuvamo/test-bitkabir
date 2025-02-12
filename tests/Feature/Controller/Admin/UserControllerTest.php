<?php

namespace Tests\Feature\Controller\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/admin/users');
        $response->assertStatus(200);
        $response->assertViewIs('admin.users.index');
    }

    public function testCreate()
    {
        $response = $this->get('/admin/users/create');
        $response->assertStatus(200);
        $response->assertViewIs('admin.users.create');
    }

    public function testEdit()
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);
        
        $response = $this->get("/admin/users/$user->id/edit");
        $response->assertStatus(200);
        $response->assertViewIs('admin.users.edit');
    }
}
