<?php

namespace Tests\Feature\Livewire\Admin\User;

use App\Models\User;
use Tests\TestCase;
use App\Livewire\Admin\User\UserList;
use Livewire\Livewire;

class UserListTest extends TestCase
{

  public function renders_successfully()
  {
    Livewire::test(UserList::class)
      ->assertStatus(200);
  }

  public function component_exists_on_the_page()
  {
    $this->get('admin/users')
      ->assertSeeLivewire(UserList::class);
  }

  public function displays_users()
  {
    User::factory()->create([
      'name' => 'Test User One',
      'email' => 'test.one@example.com',
      'password' => bcrypt('password'),
    ]);

    User::factory()->create([
      'name' => 'Test User Two',
      'email' => 'test.two@example.com',
      'password' => bcrypt('password'),
    ]);

    Livewire::test(UserList::class)
      ->assertSee('Test User One')
      ->assertSee('Test User Two');
  }

  public function can_set_search_term()
  {
    Livewire::test(UserList::class)
      ->set('searchTermForm', 'Confessions of a serial soaker')
      ->assertSet('searchTermForm', 'Confessions of a serial soaker');
  }

  public function can_destroy_user()
  {
    $user = User::factory()->create();

    Livewire::test(UserList::class)
      ->call('destroy', $user->id)
      ->assertDispatched('toast', ['message' => 'User deleted', 'notify' => 'success']);

    $this->assertDatabaseMissing('users', ['id' => $user->id]);
  }

  public function destroy_user_fails()
  {
    $user = User::factory()->create();

    // Simulate an exception when deleting the user
    User::shouldReceive('delete')->andThrow(new \Exception('Delete failed'));

    Livewire::test(UserList::class)
      ->call('destroy', $user->id)
      ->assertDispatched('toast', ['message' => 'User delete failed', 'notify' => 'error']);

    $this->assertDatabaseHas('users', ['id' => $user->id]);
  }
}