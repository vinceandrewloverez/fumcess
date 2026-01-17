<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use Illuminate\Support\Str;

class PublicAdmissionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_first_name' => 'required|string|max:255',
            'student_last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'grade_applied' => 'required|string|max:50',
            'parent_first_name' => 'required|string|max:255',
            'parent_last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|string|max:20',
        ]);

        // Generate a unique Application ID
        $applicationId = 'APP-' . strtoupper(Str::random(6));

        $admission = Admission::create(array_merge($validated, [
            'status' => 'pending',
            'application_id' => $applicationId,
        ]));

        return redirect()->back()->with('success', "Your application has been submitted successfully! Your Application ID is: $applicationId");
    }
}
