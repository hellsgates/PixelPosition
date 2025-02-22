<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke() {
        $jobs = Job::where('title', 'like', '%'.request('q').'%')->get();

        if ($jobs->isEmpty()) {
            return view('jobs.no-results');
        }

        return view('jobs.results', ['jobs' => $jobs]);


    }
}
