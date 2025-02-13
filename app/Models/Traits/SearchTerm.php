<?php
namespace App\Models\Traits;

use Illuminate\Support\Str;

trait SearchTerm
{
    public function updatedsearchTermForm()
    {
        $length = Str::length($this->searchTermForm);
        if ($length >= 2) {
            $this->searchTerm = $this->searchTermForm;
        } else {
            if ($length <> 0) {
                session()->flash('searchError', 'O termo de pesquisa deve ter pelo menos 2 caracteres.');
            }
            $this->searchTerm = '';
        }
    }
}
