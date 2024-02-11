<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\User;

class TypeController extends Controller
{
    // public function index()
    // {
    //     $types = Type::all();
    //     return view('layouts.types', compact('types'));
    // }
    public function index($filter = null)
    {
        if ($filter === 'terms') {
            $types = Type::where('model', 'Term')->get();
        } elseif ($filter === 'users') {
            $types = Type::where('model', 'User')->get();
        } else {
            $types = Type::all();
        }
    
        return view('layouts.types', compact('types'));
    }
    
    // public function destroy($id)
    // {
    //     $type = Type::findOrFail($id);
    //     $type->delete();

    //     return redirect()->route('types.index')->with('success', 'Term successfully deleted!');
    // }
    public function destroy($id)
    {
        $type = Type::findOrFail($id);
        
        User::where('type_id', $id)->update(['type_id' => null]); 
    
        $type->delete();
    
        return redirect()->route('types.index')->with('success', 'Type successfully deleted!');
    }

    public function show($id)
    {
        $type = Type::where('id', $id)->firstOrFail();
        return view('types.show', compact('type'));
    }

    public function edit($id)
    {
        $type = Type::findOrFail($id);
        $types = Type::where('model', 'Type')->get();
        return view('types.edit', compact('type', 'types'));
    }

    public function create()
    {
        $types = Type::where('model', 'Type')->get();
        return view('types.edit', compact('types'));
    }

    public function update(Request $request, $id)
    {
        $type = Type::findOrFail($id);

        $type->update($request->all());

        return redirect()->route('types.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'name' => 'required',
        ]);

        $input = $request->all();

        Type::create($input);

        return redirect()->route('types.index');
    }
}
