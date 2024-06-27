<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Destination;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $destinations = Destination::with('galleries')->limit(3)->latest()->get();
        $events = Event::limit(3)->latest()->get();

        $articles = Article::with('user')->limit(3)->latest()->get();

        return view('components.pages.frontend.index', compact('destinations', 'events', 'articles'));
    }

    public function destinations(Request $request)
    {

        $destinations = Destination::with(['galleries'])->latest();
        if ($request->has('keyword')) {
            $destinations = $destinations->where('name', 'like', '%' . $request->keyword . '%');
        }

        $destinations = $destinations->paginate(8);
        return view('components.pages.frontend.destination', compact('destinations'));
    }

    public function events()
    {
        $newEvents = Event::limit(5)->latest()->get();
        $events = Event::latest()->get();
        return view('components.pages.frontend.event', compact('newEvents', 'events'));
    }

    public function articles(Request $request)
    {
        $articles = Article::with('user')->latest();
        if ($request->has('keyword')) {
            $articles = $articles->where('title', 'like', '%' . $request->keyword . '%');
        }

        $articles = $articles->paginate(8);
        return view('components.pages.frontend.article', compact('articles'));
    }
}
