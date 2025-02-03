<?php

namespace App\Livewire\Pages\Skills;

use Livewire\Component;
use App\Models\Skill;

class Index extends Component
{
    public $skillName;

    public function render()
    {
        return view('livewire.pages.skills.index', [
            'skills' => Skill::all(),
        ]);
    }

    public function addSkill()
    {
        Skill::create(['name' => $this->skillName]);
        $this->skillName = ''; // Reset input field
    }
}
