<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Description;
use App\Models\Term;

class IdeaController extends Controller
{

    protected $fillable = ['title'];

    // $idea = Idea::find($id);
    // $description = $idea->description; // Esto te dará la descripción asociada
    // $term_id = $description->term_id; // Ahora puedes acceder al term_id sin problema

    public function destroy($id)
    {
        $idea = Idea::findOrFail($id);
        $idea->delete();
        return response()->json(['success' => 'Idea deleted successfully']);
    }

   
    

    // public function edit($id)
    // {
    //     $idea = Idea::find($id);
    //     $fields = ['title'];
    //     $type = 'ideas'; // o 'notes', 'descriptions', etc., dependiendo del recurso que estés editando
    //     return view('ideas.edit', compact('idea', 'type', 'fields'));
    // }
    public function edit($id)
    {
        $idea = Idea::find($id);
        $description = $idea->description;
        $term_id = session('last_term_id');
    
        $type = 'idea';
        $fields = ['title'];
        return view('ideas.edit', compact('idea', 'term_id', 'type', 'fields'));
    }

    public function create()
    {
        $idea = new Idea;
        $type = 'idea';
        $fields = ['title'];
        return view('ideas.edit', compact('idea', 'type','fields'));
    }

    // public function store(Request $request)
    // {
    //     $idea = new Idea;
    //     $idea->title = $request->title;
    //     $idea->save();

    //     // Encuentra la descripción y vincula la idea a ella
    //     $description = Description::find($request->description_id);
    //     $idea->descriptions()->attach($description);

    //     return back()->with('success', 'Idea created successfully');
    // }

    // public function update(Request $request, $id)
    // {
    //     $idea = Idea::find($id);
    //     $idea->title = $request->input('title');
    //     $idea->save();

    //     return back()->with('success', 'Idea edited successfully');
    // }

    public function store(Request $request)
    {
        // Crear la nueva idea
        $idea = new Idea;
        $idea->title = $request->title;

        // Buscar el término usando el last_term_id almacenado en la sesión
        $termId = session('last_term_id');
        $term = Term::find($termId);

        if (!$term) {
            return back()->with('error', 'The selected term does not exist.');
        }

        // Buscar la descripción asociada al término
        $description = $term->descriptions()->first();

        if (!$description) {
            return back()->with('error', 'The selected term does not have a description.');
        }

        // Establecer el description_id de la idea
        $idea->description_id = $description->id;

        // Guardar la idea
        $idea->save();

        // Redirigir al término
        return redirect()->route('terms.show', $term->id)->with('success', 'Idea created successfully');
    }

    public function update(Request $request, $id)
    {
        $idea = Idea::find($id);
        $idea->title = $request->input('title');
        $idea->save();
        $term_id = session('last_term_id');


        return redirect()->route('terms.show', $term_id)->with('success', 'Idea updated successfully');
    }
}
