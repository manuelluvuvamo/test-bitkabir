<?php

namespace App\Livewire\Admin\Category\Form;

use App\Models\Category;
use Livewire\Component;
use Log;

class CategoryForm extends Component
{
    public $state = [];
    public $category;
    public $edition = false;

    public function mount()
    {
        if (is_null($this->category)) {
            $this->state = [
                'name' => ''
            ];
        } else {
            $this->state = $this->category->toArray();
            $this->edition = true;
        }
    }

    public function render()
    {
        return view('livewire.admin.category.form.category-form');
    }

    public function store()
    {
        $this->validate([
            'state.name' => 'required'
        ], [
            'state.name.required' => 'O nome é obrigatório.'
        ]);

        try {
            Category::create($this->state);
            Log::info('Categoria criada', ['user' => $this->state]);

            $this->reset('state');
            $this->resetErrorBag();
            $this->resetValidation();

            return $this->dispatch('toast', message: 'Categoria criada', notify: 'success');

        } catch (\Throwable $th) {
            Log::error('Falhou ao criar categoria', ['user' => $this->state, 'error' => $th->getMessage()]);

            return $this->dispatch('toast', message: 'Falhou ao criar categoria', notify: 'error');

        }
    }

    public function update()
    {
        $this->validate([
            'state.name' => 'required'
        ], [
            'state.name.required' => 'O nome é obrigatório.'
        ]);

        try {
            $this->category->update($this->state);
            Log::info('Categoria atualizado', ['category' => $this->state]);

            return $this->dispatch('toast', message: 'Categoria atualizado', notify: 'success');
        } catch (\Throwable $th) {
            Log::error('Falhou ao atualizar a categoria', ['user' => $this->state, 'error' => $th->getMessage()]);

            return $this->dispatch('toast', message: 'Falhou ao atualizar a categoria', notify: 'error');
        }
    }
}
