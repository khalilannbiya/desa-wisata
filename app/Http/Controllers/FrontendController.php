<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('components.pages.frontend.index');
    }

    public function destinations()
    {
        $destinations = Destination::with('galleries')->get();
        // dd($destinations);
        return view('components.pages.frontend.destination', compact('destinations'));
    }
}
