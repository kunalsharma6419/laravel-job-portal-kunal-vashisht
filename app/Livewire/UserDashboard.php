<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JobPosting;

class UserDashboard extends Component
{
    public $search = '';
    public $location = '';
    
    public function render()
    {
        // return view('livewire.user-dashboard');
        $jobs = JobPosting::when($this->search, function ($query) {
                        $query->where('title', 'like', '%' . $this->search . '%');
                    })
                    ->when($this->location, function ($query) {
                        $query->where('location', 'like', '%' . $this->location . '%');
                    })
                    ->latest()
                    ->get();

        return view('livewire.user-dashboard', [
            'jobs' => $jobs
        ]);
    }
}
