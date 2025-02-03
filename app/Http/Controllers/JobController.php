<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPosting;

class JobController extends Controller
{
    public function deleteJob(Request $request)
    {
        // Find the job by ID
        $job = JobPosting::find($request->job_id);

        if ($job) {
            $job->delete(); // Delete the job

            // Respond with success
            return response()->json(['status' => 'success', 'message' => 'Job has been successfully deleted!']);
        } else {
            // If the job doesn't exist
            return response()->json(['status' => 'error', 'message' => 'Job not found!']);
        }
    }

    public function index()
    {
        return response()->json(JobPosting::latest()->get()->map(function ($job) {
            return [
                'id' => $job->id,
                'title' => $job->title,
                'company' => $job->company,
                'location' => $job->location,
                'description' => $job->description,
                'experience' => $job->experience,
                'salary' => $job->salary,
                'skills' => $job->skills ?? [], // Ensure skills is an array
                'posted_at' => $job->created_at->diffForHumans(),
                'company_logo' => $job->company_logo ? asset('storage/' . $job->company_logo) : null,
            ];
        }));
    }
}
