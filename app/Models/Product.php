<?php

namespace App\Models;

use App\Models\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Product extends Model
{
    /** @use HasFactory, Searchable<\Database\Factories\UserFactory> */
    use HasFactory, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image',

    ];

    protected $searchable = [
        'name',
        'description',
        'price',
        'category.name'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilterSearch($query, $searchterm)
    {
        if (Str::length($searchterm) > 2)
            return $query->search($searchterm);

        return $query;
    }
}
