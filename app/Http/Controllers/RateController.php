<?php

namespace App\Http\Controllers;

use App\Models\Ratings;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'rating' => 'required|max:1',
            'notes' => 'nullable|string',
        ]);

        Ratings::create([
            'rating' => $request->rating,
            'notes' => $request->notes,
            'name' => $request->name
        ]);

        return back()->with('success', 'شكرا لتقييمك قاعة أوتار');
    }
}
