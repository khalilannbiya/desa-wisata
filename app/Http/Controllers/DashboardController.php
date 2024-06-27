<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Destination;
use App\Models\Event;
use App\Models\User;

class DashboardController extends Controller
{
    public function writer() {
        $totalArticle = Article::count();
        return view('components.pages.dashboard.index',compact('totalArticle'));
    }

    public function owner() {
        $totalDestination = Destination::count();
        return view('components.pages.dashboard.index',compact('totalDestination'));
    }

    public function admin() {
        $totalEvent = Event::count();
        $totalArticle = Article::count();
        $totalDestination = Destination::count();
        $totalUser = User::where('role','!=', 'super_admin')->count();
        return view('components.pages.dashboard.index',compact('totalDestination', 'totalEvent', 'totalArticle', 'totalUser'));
    }

    public function superAdmin() {
        $totalEvent = Event::count();
        $totalArticle = Article::count();
        $totalDestination = Destination::count();
        $totalUser = User::count();
        return view('components.pages.dashboard.index',compact('totalDestination', 'totalEvent', 'totalArticle', 'totalUser'));
  
    }
    
}
