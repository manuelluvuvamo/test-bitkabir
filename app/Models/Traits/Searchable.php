<?php
namespace App\Models\Traits;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Builder;

trait Searchable
{
    /**
     * Seleccionar uma consulta para procurar um termo nos atributos
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function scopeSearch($query, $searchTerm)
    {
        $attributes = $this->searchableAttributes();
        [$searchTerm, $attributes];

        if (!$searchTerm || !$attributes) {
            return $query;
        }

        return $query->where(function (Builder $query) use ($attributes, $searchTerm) {
            foreach (Arr::wrap($attributes) as $attribute) {
                $query->when(
                    str_contains($attribute, '.'),
                    function (Builder $query) use ($attribute, $searchTerm) {
                        [$relationName, $relationAttribute] = explode('.', $attribute);

                        $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
                            $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%");
                        });
                    },
                    function (Builder $query) use ($attribute, $searchTerm) {
                        $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                    }
                );
            }
        });
    }

    /**
     * Analisar argumentos do âmbito de pesquisa
     *
     * @param array $arguments
     * @return array
     */
    private function parseArguments(array $arguments)
    {
        $args_count = count($arguments);

        return match ($args_count) {
            1 => [request(config('searchable.key')), $this->searchableAttributes()],
            2 => is_string($arguments[1])
                ? [$arguments[1], $this->searchableAttributes()]
                : [request(config('searchable.key')), $arguments[1]],
            3 => is_string($arguments[1])
                ? [$arguments[1], $arguments[2]]
                : [$arguments[2], $arguments[1]],
            default => [null, []],
        };
    }

    /**
     * Obter colunas pesquisáveis
     *
     * @return array
     */
    public function searchableAttributes()
    {
        if (method_exists($this, 'searchable')) {
            return $this->searchable();
        }

        return property_exists($this, 'searchable') ? $this->searchable : [];
    }
}