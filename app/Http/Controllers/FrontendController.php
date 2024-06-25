<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $destinations = Destination::with('galleries')->limit(3)->latest()->get();
        return view('components.pages.frontend.index', compact('destinations'));
    }

    public function destinations()
    {
        $destinations = Destination::with('galleries')->paginate(8);
        return view('components.pages.frontend.destination', compact('destinations'));
    }
}