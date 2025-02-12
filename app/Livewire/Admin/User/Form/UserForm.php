<?php

namespace App\Livewire\Admin\User\Form;

use App\Models\User;
use Livewire\Component;
use Log;

class UserForm extends Component
{
    public $state = [];
    public $user;
    public $edition = false;

    public function mount()
    {
        if (is_null($this->user)) {
            $this->state = [
                'name' => '',
                'email' => '',
                'password' => '',
                'password_confirmation' => '',
            ];
        } else {
            $this->state = $this->user->toArray();
            $this->state['password_confirmation'] = '';
            $this->edition = true;
        }
    }

    public function render()
    {
        return view('livewire.admin.user.form.user-form');
    }

    public function store()
    {
        $this->validate([
            'state.name' => 'required',
            'state.email' => 'required|email|unique:users,email',
            'state.password' => 'required|min:8',
            'state.password_confirmation' => 'required_with:state.password|same:state.password',
        ]);

        try {
            User::create($this->state);
            Log::info('User created', ['user' => $this->state]);

            $this->reset('state');
            $this->resetErrorBag();
            $this->resetValidation();

            return $this->dispatch('toast', message: 'User created', notify: 'success');

        } catch (\Throwable $th) {
            Log::error('User create failed', ['user' => $this->state, 'error' => $th->getMessage()]);

            return $this->dispatch('toast', message: 'User created failed', notify: 'error');

        }
    }

    public function update()
    {
        $this->validate([
            'state.name' => 'required',
            'state.email' => 'required|email|unique:users,email,' . $this->user->id,
            'state.password' => 'nullable|min:8',
            'state.password_confirmation' => 'required_with:state.password|same:state.password',
        ]);

        try {
            $this->user->update($this->state);
            Log::info('User updated', ['user' => $this->state]);

            $this->reset('state');
            $this->resetErrorBag();
            $this->resetValidation();

          return $this->dispatch('toast', message: 'User updated', notify: 'success');

        } catch (\Throwable $th) {
            Log::error('User update failed', ['user' => $this->state, 'error' => $th->getMessage()]);
            
            return $this->dispatch('toast', message: 'User update failed', notify: 'error');
        }
    }
}
