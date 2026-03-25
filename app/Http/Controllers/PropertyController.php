<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();

        return view('apartments', compact('properties'));
    }

    public function show(int $id)
    {
        $property = Property::findOrFail($id);

        return view('apartment-detail', compact('property'));
    }

    public function search(Request $request)
    {
        $query = Property::query();

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('location_name', 'like', "%{$keyword}%")
                  ->orWhere('description', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('bedrooms') && $request->input('bedrooms') !== 'any') {
            $bedrooms = (int) $request->input('bedrooms');
            $query->where('bedrooms_count', $bedrooms >= 4 ? '>=' : '=', $bedrooms);
        }

        if ($request->filled('min_price')) {
            $query->where('rent_amount', '>=', $request->input('min_price'));
        }

        if ($request->filled('max_price')) {
            $query->where('rent_amount', '<=', $request->input('max_price'));
        }

        if ($request->filled('pet_friendly')) {
            $query->where('pet_friendly', true);
        }

        $properties = $query->get();

        return view('apartments', [
            'properties' => $properties,
            'filters'    => $request->only(['keyword', 'bedrooms', 'min_price', 'max_price', 'pet_friendly']),
        ]);
    }
}
