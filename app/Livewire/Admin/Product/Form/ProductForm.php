<?php

namespace App\Livewire\Admin\Product\Form;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Log;

class ProductForm extends Component
{
    use WithFileUploads;

    public $state = [];
    public $categories;
    public $product;
    public $edition = false;

    public function mount()
    {
        $this->categories = Category::get();

        if (is_null($this->product)) {
            $this->state = [
                'name' => '',
                'description' => '',
                'price' => '',
                'category_id' => '',
                'image' => null,
            ];
        } else {
            $this->state = $this->product->toArray();
            $this->edition = true;
        }
    }

    public function render()
    {
        return view('livewire.admin.product.form.product-form');
    }

    public function store()
    {
        $this->validate([
            'state.name' => 'required',
            'state.description' => 'required',
            'state.price' => 'required|numeric',
            'state.category_id' => 'required',
            'state.image' => 'nullable|image|max:1024',
        ], [
            'state.name.required' => 'O nome é obrigatório.',
            'state.description.required' => 'A descrição é obrigatória.',
            'state.price.required' => 'O preço é obrigatório.',
            'state.price.numeric' => 'O preço deve ser um número.',
            'state.category_id.required' => 'A categoria é obrigatória.',
            'state.image.image' => 'O arquivo deve ser uma imagem.',
            'state.image.max' => 'A imagem não pode ser maior que 1MB.',
        ]);

        try {
            if ($this->state['image']) {
                $imageName = time() . '_' . preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $this->state['image']->getClientOriginalName());
                $this->state['image'] = $this->state['image']->storeAs('products', $imageName, 'public');
            }

            Product::create($this->state);
            Log::info('Produto criado', ['user' => $this->state]);

            $this->reset('state');
            $this->resetErrorBag();
            $this->resetValidation();

            return $this->dispatch('toast', message: 'Produto criado', notify: 'success');

        } catch (\Throwable $th) {
            Log::error('Falhou ao criar produto', ['user' => $this->state, 'error' => $th->getMessage()]);

            return $this->dispatch('toast', message: 'Falhou ao criar produto', notify: 'error');

        }
    }

    public function update()
    {
        $this->validate([
            'state.name' => 'required',
            'state.description' => 'required',
            'state.price' => 'required|numeric',
            'state.category_id' => 'required',
            'state.image' => ($this->state['image'] && $this->state['image'] != $this->product->image) ? 'nullable|image|max:1024' : '',
        ], [
            'state.name.required' => 'O nome é obrigatório.',
            'state.description.required' => 'A descrição é obrigatória.',
            'state.price.required' => 'O preço é obrigatório.',
            'state.price.numeric' => 'O preço deve ser um número.',
            'state.category_id.required' => 'A categoria é obrigatória.',
            'state.image.image' => 'O arquivo deve ser uma imagem.',
            'state.image.max' => 'A imagem não pode ser maior que 1MB.',
        ]);

        try {
            if ($this->state['image'] && $this->state['image'] != $this->product->image) {
                $imageName = time() . '_' . preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $this->state['image']->getClientOriginalName());
                $this->state['image'] = $this->state['image']->storeAs('products', $imageName, 'public');
                
            } else {
                unset($this->state['image']);
            }
            $this->product->update($this->state);
            Log::info('Produto atualizado', ['product' => $this->state]);

            return $this->dispatch('toast', message: 'Produto atualizado', notify: 'success');
        } catch (\Throwable $th) {
            Log::error('Falhou ao atualizar o produto', ['user' => $this->state, 'error' => $th->getMessage()]);

            return $this->dispatch('toast', message: 'Falhou ao atualizar o produto', notify: 'error');
        }
    }
}
