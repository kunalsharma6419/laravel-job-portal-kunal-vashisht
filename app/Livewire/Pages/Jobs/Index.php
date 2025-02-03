<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;
use App\Models\JobPosting; // Import the JobPosting model
use App\Models\Skill; // Import the Skill model


class Index extends Component
{
    public array $jobs = [];
    // Register the event listener for delete confirmation
    // protected $listeners = ['deleteJobConfirmed' => 'deleteJob'];

    public function mount()
    {
        // $this->jobs = [
        //     [
        //         "id" => 1,
        //         "title" => "Sr. Full Stack Developer",
        //         "description" => "You will be responsible for designing, developing, and maintaining robust and scalable web applications from end to end. You must have a deep understanding of both frontend and backend development, thrives in a collaborative environment, and is passionate about delivering high-quality software solutions",
        //         "company_name" => "DWebPixel",
        //         "company_logo" => asset('logo-3.svg'),
        //         "experience" => "4-5 Yrs",
        //         "salary" => "$ 4.5-8 Lacs PA",
        //         "location" => "Remote",
        //         "skills" => [
        //             "Laravel",
        //             "React",
        //             "Vue",
        //             "MySQL",
        //         ],
        //         "extra" => [
        //             "Remote",
        //             "Full-Time",
        //         ]
        //     ],
        //     [
        //         "id" => 2,
        //         "title" => "Sr. Frontend Developer",
        //         "description" => "You will leverage your expertise in modern frontend technologies and best practices to create exceptional user experiences.",
        //         "company_name" => "DWebPixel",
        //         "company_logo" => asset('logo-2.svg'),
        //         "experience" => "3-4 Yrs",
        //         "salary" => "$ 2.5-4 Lacs PA",
        //         "location" => "Remote",
        //         "skills" => [
        //             "React",
        //             "Vue",
        //         ],
        //         "extra" => [
        //             "Remote",
        //             "Full-Time",
        //         ]
        //     ]
        // ];
        // Fetch jobs from the database
        $this->jobs = JobPosting::all()->map(function ($job) {
            // Decode the skills JSON column into an array
            $skillIds = $job->skills;

            // Fetch the skill names based on the IDs
            $skills = Skill::whereIn('id', $skillIds)->pluck('name')->toArray();

            // Ensure skills and extra are correctly handled as arrays
            $extra = explode(",", $job->extra);  // Assuming the extra field is a comma-separated string
            return [
                'id' => $job->id,
                'title' => $job->title,
                'description' => $job->description,
                'company_name' => $job->company,
                'company_logo' => asset($job->company_logo),  // You can add logic for dynamic logo
                'experience' => $job->experience, // Add a column for experience in the migration
                'salary' => $job->salary, // Add a column for salary in the migration
                'location' => $job->location,
                'skills' => is_array($skills) ? $skills : [],  // Ensure skills are an array
                'extra' => is_array($extra) ? $extra : [],  // Ensure extra is an array
            ];
        })->toArray();
    }

   // Ensure the method correctly receives the job ID
    // public function deleteJob($jobId)
    // {
    //     $job = JobPosting::find($jobId);

    //     if ($job) {
    //         $job->delete();

    //         // Remove the deleted job from the array to update the front-end
    //         $this->jobs = collect($this->jobs)->filter(function ($job) use ($jobId) {
    //             return $job['id'] !== $jobId;
    //         })->values()->toArray();

    //         $this->emit('jobDeleted', 'Job has been successfully deleted!');
    //     } else {
    //         $this->emit('jobDeleted', 'Job not found!');
    //     }
    // }




    public function render()
    {
        return view('livewire.pages.jobs.index');
    }
}
