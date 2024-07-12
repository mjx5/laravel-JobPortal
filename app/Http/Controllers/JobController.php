<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    // Index
    public function index() {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
        return view('jobs.index', ['jobs' => $jobs]);
    }

    // Create
    public function create() {
        return view('jobs.create');
    }

    // Show
    public function show(Job $job) {
        return view('jobs.show', ['job' => $job]);
    }

    // Store
    public function store(Request $request) {
        $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        Job::create([
            'title' => $request->input('title'),
            'salary' => $request->input('salary'),
            'employer_id' => 1
        ]);

        return redirect('/jobs');
    }

    // Edit
    public function edit(Job $job) {
        Gate::authorize('edit-job', $job);
        return view('jobs.edit',['job'=>$job]);

    }


    // Update
    public function update(Request $request, Job $job) {
        $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->update([
            'title' => $request->input('title'),
            'salary' => $request->input('salary'),
        ]);

        return redirect('/jobs/' . $job->id);
    }


    // Delete
    public function destroy(Job $job) {

        $job->delete();
        return redirect('/jobs');
    }
}
