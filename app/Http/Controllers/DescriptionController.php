<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Description;

class DescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $termId
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $termId = $request->query('termId'); // Obtiene el termId de la URL o de alguna otra fuente
        return view('descriptions.edit', compact('termId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $termId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'notes' => 'required',
            'synthesis' => 'required',
        ]);
    
        $term_id = session('last_term_id');
    
        $description = new Description([
            'notes' => $request->get('notes'),
            'synthesis' => $request->get('synthesis'),
            'term_id' => $term_id,
        ]);
    
        $description->save();
    
        return redirect()->route('terms.show', $term_id)->with('success', 'Description added successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $description = Description::find($id);

        if ($description === null) {
            return redirect()->route('terms.index')->with('error', 'Description not found');
        }

        $termId = $description->term_id;
        return view('descriptions.edit', compact('description', 'termId'));
    }

    public function update(Request $request, $id)
    {
        $description = Description::find($id);

        if ($description === null) {
            return redirect()->route('terms.index')->with('error', 'Description not found');
        }

        $description->notes = $request->notes;
        $description->synthesis = $request->synthesis;
        $description->term_id = $request->term_id;
        $description->save();

        return redirect()->route('terms.show', $request->term_id)->with('success', 'Description updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
