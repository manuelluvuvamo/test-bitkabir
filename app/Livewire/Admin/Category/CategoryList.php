<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Traits\SearchTerm;
use Log;
use Str;

class CategoryList extends Component
{
    use WithPagination;
    use SearchTerm;

    protected $paginationTheme = 'bootstrap';
    public $searchTermForm = '';
    public $searchTerm = '';

    public function render()
    {
        $categories = Category::FilterSearch($this->searchTerm)
            ->orderByDesc('id')
            ->paginate(20);

        return view('livewire.admin.category.category-list', compact('categories'));
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            Log::info('Categoria eliminada', ['category' => $category]);
            return $this->dispatch('toast', message: 'Categoria eliminada', notify: 'success');
        } catch (\Throwable $th) {
            Log::error('Falhou ao eliminar a categoria', ['category' => $category, 'error' => $th->getMessage()]);
            return $this->dispatch('toast', message: 'Falhou ao eliminar a categoria', notify: 'error');
        }
    }
}
