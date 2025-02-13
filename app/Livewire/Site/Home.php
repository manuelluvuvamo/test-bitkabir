<?php

namespace App\Livewire\Site;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $products = Product::with('category')->orderByDesc('id')->get();
        $best_sellers = Product::inRandomOrder()->with('category')->orderByDesc('id')->limit(10)->get();
        $categories = Category::inRandomOrder()->limit(4)->get();

        return view('livewire.site.home', compact('products', 'categories', 'best_sellers'));
    }
}
