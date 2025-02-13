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
        ], [
            'state.name.required' => 'O nome é obrigatório.',
            'state.email.required' => 'O email é obrigatório.',
            'state.email.email' => 'O email deve ser um endereço de email válido.',
            'state.email.unique' => 'Este email já está em uso.',
            'state.password.required' => 'A palavra-passe é obrigatória.',
            'state.password.min' => 'A palavra-passe deve ter pelo menos 8 caracteres.',
            'state.password_confirmation.required_with' => 'A confirmação da palavra-passe é obrigatória quando a palavra-passe está presente.',
            'state.password_confirmation.same' => 'A confirmação da palavra-passe deve corresponder à palavra-passe.',
        ]);

        try {
            User::create($this->state);
            Log::info('Utilizador criado', ['user' => $this->state]);

            $this->reset('state');
            $this->resetErrorBag();
            $this->resetValidation();

            return $this->dispatch('toast', message: 'Utilizador criado', notify: 'success');

        } catch (\Throwable $th) {
            Log::error('Falhou ao criar utilizador', ['user' => $this->state, 'error' => $th->getMessage()]);

            return $this->dispatch('toast', message: 'Falhou ao criar utilizador', notify: 'error');

        }
    }

    public function update()
    {
        $this->validate([
            'state.name' => 'required',
            'state.email' => 'required|email|unique:users,email,' . $this->user->id,
            'state.password' => 'nullable|min:8',
            'state.password_confirmation' => 'required_with:state.password|same:state.password',
        ], [
            'state.name.required' => 'O nome é obrigatório.',
            'state.email.required' => 'O email é obrigatório.',
            'state.email.email' => 'O email deve ser um endereço de email válido.',
            'state.email.unique' => 'Este email já está em uso.',
            'state.password.min' => 'A palavra-passe deve ter pelo menos 8 caracteres.',
            'state.password_confirmation.required_with' => 'A confirmação da palavra-passe é obrigatória quando a palavra-passe está presente.',
            'state.password_confirmation.same' => 'A confirmação da palavra-passe deve corresponder à palavra-passe.',
        ]);

        try {
            $this->user->update($this->state);
            Log::info('Utilizador atualizado', ['user' => $this->state]);

            return $this->dispatch('toast', message: 'Utilizador atualizado', notify: 'success');
        } catch (\Throwable $th) {
            Log::error('Falhou ao atualizar o utilizador', ['user' => $this->state, 'error' => $th->getMessage()]);

            return $this->dispatch('toast', message: 'Falhou ao atualizar o utilizador', notify: 'error');
        }
    }
}
