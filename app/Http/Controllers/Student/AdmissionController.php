<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admission;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationSubmitted;

class AdmissionController extends Controller
{
    /**
     * Show the public admissions form
     */
    public function create()
    {
        return view('student.admissions.create');
    }

    /**
     * Store the admission and send email
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_first_name' => 'required|string|max:255',
            'student_last_name'  => 'required|string|max:255',
            'date_of_birth'      => 'required|date',
            'grade_applied'      => 'required|string|max:50',
            'parent_first_name'  => 'required|string|max:255',
            'parent_last_name'   => 'required|string|max:255',
            'email'              => 'required|email|max:255',
            'phone'              => 'required|string|max:50',
            'street'             => 'required|string|max:255',
            'city'               => 'required|string|max:100',
            'state'              => 'required|string|max:100',
            'zip'                => 'required|string|max:20',
        ]);

        do {
            $applicationId = 'APP-' . date('Ymd') . '-' . mt_rand(1000, 9999);
        } while (Admission::where('application_id', $applicationId)->exists());

        $admission = Admission::create([
            'application_id'     => $applicationId,
            'student_first_name' => $validated['student_first_name'],
            'student_last_name'  => $validated['student_last_name'],
            'date_of_birth'      => $validated['date_of_birth'],
            'grade_applied'      => $validated['grade_applied'],
            'parent_first_name'  => $validated['parent_first_name'],
            'parent_last_name'   => $validated['parent_last_name'],
            'email'              => $validated['email'],
            'phone'              => $validated['phone'],
            'street'             => $validated['street'],
            'city'               => $validated['city'],
            'state'              => $validated['state'],
            'zip'                => $validated['zip'],
            'status'             => 'pending',
        ]);

        Mail::to($admission->email)->send(new ApplicationSubmitted($admission));

        return redirect()->back()->with(
            'success',
            "Your application has been submitted successfully! Your Application ID is $applicationId."
        );
    }

    /**
     * Show the admissions list for logged-in student
     */
    public function index()
    {
        $user = auth()->user();
        if (!$user) {
            abort(403, 'Unauthorized');
        }

        $admissions = Admission::where('email', $user->email)->get();

        $currentInfo = [
            'program' => 'Junior High School',
            'yearLevel' => 'Grade 7',
            'section' => 'A',
            'academicYear' => '2025–2026',
            'adviser' => 'Ms. Reyes',
            'status' => 'Active',
        ];

        $progress = 100;

        $admissionSteps = [
            [
                'title' => 'Application Submitted',
                'date' => 'Jan 05, 2026',
                'status' => 'completed',
                'iconPath' => 'M5 13l4 4L19 7',
            ],
            [
                'title' => 'Documents Uploaded',
                'date' => 'Jan 08, 2026',
                'status' => 'completed',
                'iconPath' => 'M5 13l4 4L19 7',
            ],
            [
                'title' => 'Registrar Approval',
                'date' => 'Jan 12, 2026',
                'status' => 'pending',
                'iconPath' => 'M12 8v4m0 4h.01',
            ],
        ];

        return view('student.admissions.index', compact(
            'admissions',
            'currentInfo',
            'progress',
            'admissionSteps'
        ));
    }

    /**
     * Show a single admission for logged-in student
     */
    public function show(Admission $admission)
    {
        $user = auth()->user();
        if (!$user || $admission->email !== $user->email) {
            abort(403, 'Unauthorized');
        }

        return view('student.admissions.show', compact('admission'));
    }

    /**
     * Show uploaded documents for logged-in student
     */
    public function documents()
    {
        $user = auth()->user();
        if (!$user) {
            abort(403, 'Unauthorized');
        }

        $admissions = Admission::where('email', $user->email)->get();

        return view('student.documents.index', compact('admissions'));
    }

    /**
     * Upload student documents
     */
    public function uploadDocuments(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            abort(403, 'Unauthorized');
        }

        $documents = [
            'birth_certificate',
            'baptismal_certificate',
            'report_card',
            'good_moral_certificate',
            'medical_records',
            'id_photos',
            'parent_id',
            'proof_of_residence',
        ];

        $uploadedFiles = [];

        foreach ($documents as $doc) {
            if ($request->hasFile($doc)) {
                $uploadedFiles[$doc] = $request->file($doc)->store('documents', 'public');
            }
        }

        $admission = Admission::where('email', $user->email)->first();
        if ($admission) {
            $admission->documents = json_encode($uploadedFiles);
            $admission->save();
        }

        return back()->with('success', 'Documents uploaded successfully!');
    }
}
