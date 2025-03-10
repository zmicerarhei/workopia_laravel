<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $jobs = Job::paginate(9);

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'tags' => 'nullable|string',
            'job_type' => 'required|string',
            'remote' => 'required|boolean',
            'address' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'nullable|string',
            'company_website' => 'nullable|url',
            'contact_phone' => 'nullable|string',
            'contact_email' => 'required|string',
            'company_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $validatedData['user_id'] = Auth::user()->id;

        // Check if a file was uploaded
        if ($request->hasFile('company_logo')) {
            // Store the file and get path
            $path = $request->file('company_logo')->store('logos', 'public');

            // Add path to validated data
            $validatedData['company_logo'] = $path;
        }

        Job::create($validatedData);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job): View
    {
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job): View
    {
        // Check if the user owns the job
        $this->authorize('update', $job);

        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job): RedirectResponse
    {
        // Check if the user owns the job
        $this->authorize('update', $job);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'tags' => 'nullable|string',
            'job_type' => 'required|string',
            'remote' => 'required|boolean',
            'address' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'nullable|string',
            'company_website' => 'nullable|url',
            'contact_phone' => 'nullable|string',
            'contact_email' => 'required|string',
            'company_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        // Check if a file was uploaded
        if ($request->hasFile('company_logo')) {

            if (!empty($job->company_logo)) {
                // Delete old logo
                Storage::disk('public')->delete($job->company_logo);
            }

            // Store the file and get path
            $path = $request->file('company_logo')->store('logos', 'public');

            // Add path to validated data
            $validatedData['company_logo'] = $path;
        }

        $job->update($validatedData);

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job): RedirectResponse
    {
        // Check if the user owns the job
        $this->authorize('delete', $job);

        // If logo exists, delete it
        if (!empty($job->company_logo)) {
            Storage::disk('public')->delete($job->company_logo);
        }

        $job->delete();

        // Check if the request came from the dashboard

        if (request()->query('from') === 'dashboard') {
            return redirect()->route('dashboard')->with('success', 'Job deleted successfully');
        }

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully');
    }
}
