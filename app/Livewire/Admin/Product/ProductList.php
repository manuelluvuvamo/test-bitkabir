<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Traits\SearchTerm;
use Log;
use Str;

class ProductList extends Component
{
    use WithPagination;
    use SearchTerm;

    protected $paginationTheme = 'bootstrap';
    public $searchTermForm = '';
    public $searchTerm = '';

    public function render()
    {
        $products = Product::with('category')->FilterSearch($this->searchTerm)
            ->orderByDesc('id')
            ->paginate(20);

        return view('livewire.admin.product.product-list', compact('products'));
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            Log::info('Produto eliminado', ['product' => $product]);
            return $this->dispatch('toast', message: 'Produto eliminado', notify: 'success');
        } catch (\Throwable $th) {
            Log::error('Falhou ao eliminar o produto', ['product' => $product, 'error' => $th->getMessage()]);
            return $this->dispatch('toast', message: 'Falhou ao eliminar o produto', notify: 'error');
        }
    }

    public function deleteImage(Product $product)
    {
        try {
            $path = $product->image;

            $product->update(['image' => null]);
            
            if (file_exists(public_path('storage/' . $path))) {
                unlink(public_path('storage/' . $path));
            }
            Log::info('Imagem eliminada', ['product' => $product]);
            return $this->dispatch('toast', message: 'Imagem eliminada', notify: 'success');
        } catch (\Throwable $th) {
            Log::error('Falhou ao eliminar a imagem', ['product' => $product, 'error' => $th->getMessage()]);
            return $this->dispatch('toast', message: 'Falhou ao eliminar a imagem', notify: 'error');
        }
    }   
}
