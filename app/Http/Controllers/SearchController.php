<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Machine; 

class SearchController extends Controller
{public function index(Request $request)
    {
        $categoryId = $request->input('category');
        $query = $request->input('query');
    
        $machines = Machine::query()
            ->when($categoryId && $categoryId != 0, function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            })
            ->when($query, function ($q) use ($query) {
                $q->where(function ($subQuery) use ($query) {
                    $subQuery->where('name', 'LIKE', "%{$query}%")
                             ->orWhere('description', 'LIKE', "%{$query}%");
                });
            });
    
        $results = $machines->get();
    
        return view('pages.results', compact('results'));
    }
    
}
