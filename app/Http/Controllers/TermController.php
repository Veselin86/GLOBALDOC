<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Term;

class TermController extends Controller
{
    public function index()
    {
        $terms = Term::all();
        return view('layouts.terms', compact('terms'));
    }}
