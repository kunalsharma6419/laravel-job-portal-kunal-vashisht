<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;
use App\Models\JobPosting;
use App\Models\Skill; // Import the Skill model
use Livewire\WithFileUploads;  // Import the trait

class Create extends Component
{
    use WithFileUploads;  // Use the trait

    public $title, $company, $location, $description, $experience, $salary, $skills = [], $extra, $company_logo;
    public $availableSkills = [];  // Array to hold the available skills

    public function render()
    {
        // Fetch all skills from the database
        $this->availableSkills = Skill::all();
        return view('livewire.pages.jobs.create');
    }

    public function updatedCompanyLogo()
    {
        $this->validate([
            'company_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240', // 10MB max size
        ]);
    }

    public function createJobPosting()
    {
        // Validate input fields
        $this->validate([
            'title' => 'required|string',
            'company' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
            'experience' => 'required|string',
            'salary' => 'required|string',
            'skills' => 'required|array', // Ensure skills are an array
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Validate file
        ]);

        $data = [
            'title' => $this->title,
            'company' => $this->company,
            'location' => $this->location,
            'description' => $this->description,
            'experience' => $this->experience,
            'salary' => $this->salary,
            'skills' => $this->skills,
            'extra' => $this->extra,
        ];

        // Handle file upload if exists
        if ($this->company_logo) {
            $data['company_logo'] = $this->company_logo->store('company_logos', 'public');
        }

        JobPosting::create($data);

        $this->resetFields();
    }


    public function deleteJobPosting($id)
    {
        JobPosting::find($id)->delete();
    }

    public function resetFields()
    {
        $this->title = '';
        $this->company = '';
        $this->location = '';
        $this->description = '';
        $this->experience = '';
        $this->salary = '';
        $this->skills = []; // Reset skills
        $this->extra = '';
        $this->company_logo = '';
    }
}
