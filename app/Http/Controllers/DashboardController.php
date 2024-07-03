<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Destination;
use App\Models\Event;
use App\Models\User;

class DashboardController extends Controller
{
    public function writer()
    {
        $totalArticle = Article::where('author_id', auth()->user()->id)->count();

        // Mengambil 5 artikel dengan views terbanyak
        $articles = Article::where('author_id', auth()->user()->id)->orderBy('views', 'desc')->take(5)->get();

        $articleLabels = $articles->pluck('title');
        $articleData = $articles->pluck('views');

        $dataArticle = [
            'articleLabels' => $articleLabels,
            'articleData' => $articleData
        ];

        return view('components.pages.dashboard.index', compact('totalArticle', 'dataArticle'));
    }

    public function owner()
    {
        $totalDestination = Destination::where('owner_id', auth()->user()->id)->count();

        // Mengambil 5 wisata dengan views terbanyak
        $destinations = Destination::where('owner_id', auth()->user()->id)->orderBy('views', 'desc')->take(5)->get();

        $destinationLabels = $destinations->pluck('name');
        $destinationData = $destinations->pluck('views');

        $dataDestination = [
            'destinationLabels' => $destinationLabels,
            'destinationData' => $destinationData
        ];

        return view('components.pages.dashboard.index', compact('totalDestination', 'dataDestination'));
    }

    public function admin()
    {
        $totalEvent = Event::count();
        $totalArticle = Article::count();
        $totalDestination = Destination::count();
        $totalUser = User::where('role', '!=', 'super_admin')->count();

        // Mengambil 5 acara dengan views terbanyak
        $event = Event::orderBy('views', 'desc')->take(5)->get();

        $eventLabels = $event->pluck('name');
        $eventData = $event->pluck('views');

        $dataEvent = [
            'eventLabels' => $eventLabels,
            'eventData' => $eventData
        ];

        // Mengambil 5 wisata dengan views terbanyak
        $destinations = Destination::orderBy('views', 'desc')->take(5)->get();

        $destinationLabels = $destinations->pluck('name');
        $destinationData = $destinations->pluck('views');

        $dataDestination = [
            'destinationLabels' => $destinationLabels,
            'destinationData' => $destinationData
        ];

        // Mengambil 5 artikel dengan views terbanyak
        $articles = Article::orderBy('views', 'desc')->take(5)->get();

        $articleLabels = $articles->pluck('title');
        $articleData = $articles->pluck('views');

        $dataArticle = [
            'articleLabels' => $articleLabels,
            'articleData' => $articleData
        ];

        return view('components.pages.dashboard.index', compact('totalDestination', 'totalEvent', 'totalArticle', 'totalUser', 'dataArticle', 'dataDestination', 'dataEvent'));
    }

    public function superAdmin()
    {
        $totalEvent = Event::count();
        $totalArticle = Article::count();
        $totalDestination = Destination::count();
        $totalUser = User::count();

        // Mengambil 5 acara dengan views terbanyak
        $event = Event::orderBy('views', 'desc')->take(5)->get();

        $eventLabels = $event->pluck('name');
        $eventData = $event->pluck('views');

        $dataEvent = [
            'eventLabels' => $eventLabels,
            'eventData' => $eventData
        ];

        // Mengambil 5 wisata dengan views terbanyak
        $destinations = Destination::orderBy('views', 'desc')->take(5)->get();

        $destinationLabels = $destinations->pluck('name');
        $destinationData = $destinations->pluck('views');

        $dataDestination = [
            'destinationLabels' => $destinationLabels,
            'destinationData' => $destinationData
        ];

        // Mengambil 5 artikel dengan views terbanyak
        $articles = Article::orderBy('views', 'desc')->take(5)->get();

        $articleLabels = $articles->pluck('title');
        $articleData = $articles->pluck('views');

        $dataArticle = [
            'articleLabels' => $articleLabels,
            'articleData' => $articleData
        ];

        return view('components.pages.dashboard.index', compact('totalDestination', 'totalEvent', 'totalArticle', 'totalUser', 'dataArticle', 'dataDestination', 'dataEvent'));
    }
}
