<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\User;

class IndexController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        
        return view('index', compact('languages'));
    }
}
