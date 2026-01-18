<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // existing fillable, hidden, etc.

    /**
     * Get all general documents uploaded by the student.
     */
    public function documents()
    {
        return $this->hasMany(\App\Models\Document::class)->where('type', 'general');
    }

    /**
     * Get all admissions of the student.
     */
    public function admissions()
    {
        return $this->hasMany(\App\Models\Admission::class);
    }

    /**
     * Optional: admission-specific documents (via admission relationship)
     */
    public function admissionDocuments()
    {
        return $this->hasMany(\App\Models\Document::class)->where('type', 'admission');
    }

    
}
