<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admission;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationSubmitted;
use Illuminate\Support\Facades\Auth;

class AdmissionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $admission = Admission::where('email', $user->email)->latest()->first(); // latest admission
        return view('student.admissions.index', compact('admission'));
    }
    
    public function create()
    {
        return view('student.admissions.create');
    }

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

        // Generate unique application ID
        do {
            $applicationId = 'APP-' . now()->format('Ymd') . '-' . rand(1000, 9999);
        } while (Admission::where('application_id', $applicationId)->exists());

        $admission = Admission::create([
            ...$validated,
            'application_id' => $applicationId,
            'status' => 'pending',
        ]);

        Mail::to($admission->email)->send(new ApplicationSubmitted($admission));

        return redirect()
            ->route('student.admissions.documents')
            ->with('success', 'Application submitted. Please upload required documents.');
    }

    public function documents()
    {
        $user = Auth::user();
        $admission = Admission::where('email', $user->email)->latest()->first();
    
        if (!$admission) {
            return redirect()->route('student.admissions.index')
                ->with('error', 'No admission found. Please submit an application first.');
        }
    
        $documents = $admission->documents ? json_decode($admission->documents, true) : [];
    
        return view('student.admissions.documents', compact('admission', 'documents'));
    }
    
    public function uploadDocuments(Request $request)
    {
        $user = Auth::user();
        $admission = Admission::where('email', $user->email)->latest()->first();

        if (!$admission) {
            return redirect()->route('student.admissions.index')
                ->with('error', 'No admission found. Please submit an application first.');
        }

        $request->validate([
            'birth_certificate' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'baptismal_certificate' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'report_card' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'good_moral_certificate' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'medical_records' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'id_photos' => 'nullable|file|mimes:jpg,png|max:2048',
            'parent_id' => 'nullable|file|mimes:jpg,png|max:2048',
            'proof_of_residence' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $documents = $admission->documents ? json_decode($admission->documents, true) : [];

        foreach ($request->files as $key => $file) {
            $documents[$key] = $file->store('documents', 'public');
        }

        $admission->update([
            'documents' => json_encode($documents),
            'status' => 'documents_submitted',
        ]);

        return redirect()->route('student.admissions.documents')
            ->with('success', 'Documents uploaded successfully.');
    }

    public function payment()
{
    $admission = (object)[
        'application_id' => 'APP-00123',
        'total_fee' => '5000'
    ];
    return view('student.admissions.payment', compact('admission'));
}


    
    
}
