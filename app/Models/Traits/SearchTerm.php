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
                session()->flash('searchError', 'The search term must be at least 2 characters long.');
            }
            $this->searchTerm = '';
        }
    }
}
