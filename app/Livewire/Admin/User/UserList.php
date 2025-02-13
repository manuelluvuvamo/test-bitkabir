<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Traits\SearchTerm;
use Log;
use Str;

class UserList extends Component
{
    use WithPagination;
    use SearchTerm;

    protected $paginationTheme = 'bootstrap';
    public $searchTermForm = '';
    public $searchTerm = '';

    public function render()
    {
        $users = User::FilterSearch($this->searchTerm)
            ->orderByDesc('id')
            ->paginate(20);

        return view('livewire.admin.user.user-list', compact('users'));
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            Log::info('Utilizador eliminado', ['user' => $user]);
            return $this->dispatch('toast', message: 'Utilizador eliminado', notify: 'success');
        } catch (\Throwable $th) {
            Log::error('Falhou ao eliminar o utilizador', ['user' => $user, 'error' => $th->getMessage()]);
            return $this->dispatch('toast', message: 'Falhou ao eliminar o utilizador', notify: 'error');
        }
    }
}
