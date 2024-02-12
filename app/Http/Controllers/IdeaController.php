<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Description;
use App\Models\Term;

class IdeaController extends Controller
{

    protected $fillable = ['title'];

    public function destroy($id)
    {
        $idea = Idea::findOrFail($id);
        $idea->delete();
        return response()->json(['success' => 'Idea deleted successfully']);
    }

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
        return view('ideas.edit', compact('idea', 'type', 'fields'));
    }

    public function store(Request $request)
    {
        $idea = new Idea;
        $idea->title = $request->title;

        $termId = session('last_term_id');
        $term = Term::find($termId);

        if (!$term) {
            return back()->with('error', 'The selected term does not exist.');
        }

        $description = $term->descriptions()->first();

        if (!$description) {
            return back()->with('error', 'The selected term does not have a description.');
        }

        $idea->description_id = $description->id;

        $idea->save();

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
