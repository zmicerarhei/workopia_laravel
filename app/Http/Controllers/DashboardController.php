<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Job;

class DashboardController extends Controller
{
    // Show all users jobs listings
    public function index(): View
    {
        $user = Auth::user();

        // Get all jobs for the authenticated user
        $jobs = Job::where('user_id', $user->id)->get();

        return view('dashboard.index', compact('user', 'jobs'));
    }
}
