<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student; // assuming you have a Student model
use App\Models\Grade;   // assuming you have a Grade model

class GradesController extends Controller
{
    /**
     * Display a listing of student grades.
     */
    public function index()
    {
        // Fetch students with their grades
        $students = Student::with('grades')->get();

        return view('registrar.grades.index', compact('students'));
    }

    /**
     * Show a form to edit a student's grades.
     */
    public function edit($studentId)
    {
        $student = Student::with('grades')->findOrFail($studentId);

        return view('registrar.grades.edit', compact('student'));
    }

    /**
     * Update the grades for a student.
     */
    public function update(Request $request, $studentId)
    {
        $student = Student::findOrFail($studentId);

        $validated = $request->validate([
            'grades.*.subject' => 'required|string',
            'grades.*.score' => 'required|numeric|min:0|max:100',
        ]);

        // Loop through each grade and update or create
        foreach ($validated['grades'] as $gradeData) {
            $student->grades()->updateOrCreate(
                ['subject' => $gradeData['subject']],
                ['score' => $gradeData['score']]
            );
        }

        return redirect()->route('registrar.grades.index')
            ->with('success', 'Grades updated successfully.');
    }
}
