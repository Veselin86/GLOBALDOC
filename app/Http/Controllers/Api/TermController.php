<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Description;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $terms = Term::with(['descriptions', 'descriptions.ideas'])->get();
       
        return response()->json($terms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $term = Term::create($request->all());
        return response()->json($term, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $term = Term::with(['descriptions', 'descriptions.ideas'])->findOrFail($id);

        return response()->json($term);   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Term $term)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $term->update($request->all());
        return response()->json($term);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Term $term)
    {
        $term->delete();
        return response()->json(null, 204);
    }
}
