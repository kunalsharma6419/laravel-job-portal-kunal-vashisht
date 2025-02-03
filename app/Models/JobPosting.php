<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'company', 'location', 'description', 'experience', 'salary', 'skills', 'extra', 'company_logo'];

    // Cast the skills column to an array
    protected $casts = [
        'skills' => 'array',  // Ensures skills is stored as an array
    ];
}
