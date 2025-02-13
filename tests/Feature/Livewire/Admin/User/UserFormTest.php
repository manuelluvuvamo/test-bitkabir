<?php

namespace Tests\Feature\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class UserFormTest extends TestCase
{
    use RefreshDatabase;

    public function it_can_create_a_user()
    {
        Livewire::test('admin.user.form.user-form')
            ->set('state.name', 'Test User')
            ->set('state.email', 'test@example.com')
            ->set('state.password', 'password')
            ->set('state.password_confirmation', 'password')
            ->call('store')
            ->assertDispatched('toast', ['message' => 'User created', 'notify' => 'success']);

        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }

    public function it_can_update_a_user()
    {
        $user = User::factory()->create();

        Livewire::test('admin.user.form.user-form', ['user' => $user])
            ->set('state.name', 'Updated User')
            ->set('state.email', 'updated@example.com')
            ->call('update')
            ->assertDispatched('toast', ['message' => 'User updated', 'notify' => 'success']);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated User',
            'email' => 'updated@example.com',
        ]);
    }

    public function it_validates_required_fields_when_creating_a_user()
    {
        Livewire::test('admin.user.form.user-form')
            ->call('store')
            ->assertHasErrors();
    }

    public function it_validates_required_fields_when_updating_a_user()
    {
        $user = User::factory()->create();

        Livewire::test('admin.user.form.user-form', ['user' => $user])
            ->call('update')
            ->assertHasErrors();
    }
}
