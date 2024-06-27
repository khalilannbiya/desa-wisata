<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Destination;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $destinations = Destination::with('galleries')->limit(3)->latest()->get();
        $events = Event::limit(3)->latest()->get();
        return view('components.pages.frontend.index', compact('destinations', 'events'));
    }

    public function destinations(Request $request)
    {

        $destinations = Destination::with(['galleries']);
        if ($request->has('keyword')) {
            $destinations = $destinations->where('name', 'like', '%' . $request->keyword . '%');
        }

        $destinations = $destinations->paginate(8);
        return view('components.pages.frontend.destination', compact('destinations'));
    }

    public function events(Request $request)
    {
        $newEvents = Event::limit(5)->latest()->get();

        $events = Event::query();
        if ($request->has('keyword')) {
            $events = $events->where('name', 'like', '%' . $request->keyword . '%');
        }

        $events = $events->paginate(8);
        return view('components.pages.frontend.event', compact('newEvents', 'events'));
    }
}
