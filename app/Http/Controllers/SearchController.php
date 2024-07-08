<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('supports.search');
    }
    // Recherche simple
    public function simpleSearch(Request $request)
    {
        $query = $request->input('query');

        $supports = Support::where('ID_support', 'LIKE', "%{$query}%")
            ->orWhere('Num_support', 'LIKE', "%{$query}%")
            ->orWhereHas('typeDeSupport', function($q) use ($query) {
                $q->where('Type_support', 'LIKE', "%{$query}%");
            })
            ->orWhere('Titre', 'LIKE', "%{$query}%")
            ->orWhereHas('genre', function($q) use ($query) {
                $q->where('Genre', 'LIKE', "%{$query}%");
            })
            ->orWhere('Duree', 'LIKE', "%{$query}%")
            ->orWhere('Date_num', 'LIKE', "%{$query}%")
            ->orWhereHas('technicien', function($q) use ($query) {
                $q->where('Nom', 'LIKE', "%{$query}%")
                  ->orWhere('Prenom', 'LIKE', "%{$query}%");
            })
            ->get();

        return view('supports.search', ['supports' => $supports]);
    }

    // Recherche avancée
    public function advancedSearch(Request $request)
    {
        $query = Support::query();

        $fields = $request->input('fields', []);
        $operators = $request->input('operators', []);
        $values = $request->input('values', []);

        foreach ($fields as $index => $field) {
            $operator = $operators[$index];
            $value = $values[$index];

            if ($field == 'type_support' || $field == 'genre' || $field == 'technicien') {
                $relation = $field == 'type_support' ? 'typeDeSupport' : ($field == 'genre' ? 'genre' : 'technicien');
                $column = $field == 'type_support' ? 'Type_support' : ($field == 'genre' ? 'Genre' : 'Nom');

                $query->whereHas($relation, function($q) use ($column, $operator, $value) {
                    $this->applyFilter($q, $column, $operator, $value);
                });
            } else {
                $this->applyFilter($query, $field, $operator, $value);
            }
        }

        $supports = $query->get();

        return view('supports.search', ['supports' => $supports]);
    }

    private function applyFilter($query, $field, $operator, $value)
    {
        switch ($operator) {
            case 'contains':
                $query->where($field, 'LIKE', "%{$value}%");
                break;
            case 'equals':
                $query->where($field, '=', $value);
                break;
            case 'not_equals':
                $query->where($field, '!=', $value);
                break;
            case 'starts_with':
                $query->where($field, 'LIKE', "{$value}%");
                break;
            case 'ends_with':
                $query->where($field, 'LIKE', "%{$value}");
                break;
            case 'greater_than':
                $query->where($field, '>', $value);
                break;
            case 'less_than':
                $query->where($field, '<', $value);
                break;
            case 'greater_than_or_equal':
                $query->where($field, '>=', $value);
                break;
            case 'less_than_or_equal':
                $query->where($field, '<=', $value);
                break;
            case 'between':
                if (is_array($value) && count($value) == 2) {
                    $query->whereBetween($field, [$value[0], $value[1]]);
                }
                break;
            default:
                // Handle unknown operator if needed
                break;
        }
    }
}
