<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaController extends Controller
{

    public function destroy($id)
    {
        $idea = Idea::findOrFail($id);
        $idea->delete();
        return response()->json(['success' => 'Idea deleted successfully']);
    }
    
    public function update(Request $request, $id)
    {
        $idea = Idea::findOrFail($id);
        $idea->update($request->all());
        return response()->json(['success' => 'Idea updated successfully']);
    }
    

}
