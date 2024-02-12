<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Term;
use App\Models\Type;

class TermController extends Controller
{



    public function index($filter = null)
    {
        $query = Term::with('users');

        if ($filter == 'own') {
            $query = $query->whereHas('users', function ($q) {
                $q->where('user_id', auth()->id());
            });
        } elseif ($filter == 'others') {
            $query = $query->whereDoesntHave('users', function ($q) {
                $q->where('user_id', auth()->id());
            });
        }

        $terms = $query->get();

        return view('layouts.terms', compact('terms'));
    }

    public function destroy($id)
    {
        $term = Term::findOrFail($id);
        $term->delete();

        return redirect()->route('terms.index')->with('success', 'Term successfully deleted!');
    }

    // public function show($id)
    // {
    //     $term = Term::where('id', $id)->firstOrFail();
    //     return view('terms.show', compact('term'));
    // }
    public function show($id)
    {
        session(['last_term_id' => $id]);

        $term = Term::findOrFail($id);
        $description = $term->description;
        return view('terms.show', compact('term'));
    }


    public function edit($id)
    {
        $term = Term::find($id);
        $types = Type::where('model', 'Term')->get();

        return view('terms.edit', compact('term', 'types'));
    }

    public function create()
    {
        $types = Type::where('model', 'Term')->get();
        return view('terms.edit', compact('types'));
    }

    public function update(Request $request, $id)
    {
        $term = Term::findOrFail($id);

        $term->update($request->all());

        return redirect()->route('terms.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type_id' => 'required',
            'definition' => 'required',
        ]);

        $term = Term::create($request->all());

        if (auth()->check()) {
            $term->users()->attach(auth()->id());
        }

        return redirect()->route('terms.index');
    }
}
