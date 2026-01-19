<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',      // Allow name for mass assignment
        'email',     // Allow email
        'password',  // Allow password
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get all general documents uploaded by the student.
     */
    public function documents()
    {
        return $this->hasMany(\App\Models\Document::class)
                    ->where('type', 'general');
    }

    /**
     * Get all admissions of the student.
     */
    public function admissions()
    {
        return $this->hasMany(\App\Models\Admission::class);
    }

    /**
     * Get all admission-specific documents.
     */
    public function admissionDocuments()
    {
        return $this->hasMany(\App\Models\Document::class)
                    ->where('type', 'admission');
    }
}
