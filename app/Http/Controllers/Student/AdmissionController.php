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
    /**
     * Show the admissions form
     */
    public function create()
    {
        return view('student.admissions.create');
    }

    /**
     * Store admission then redirect to document submission
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
            $applicationId = 'APP-' . now()->format('Ymd') . '-' . rand(1000, 9999);
        } while (Admission::where('application_id', $applicationId)->exists());

        $admission = Admission::create([
            ...$validated,
            'application_id' => $applicationId,
            'status' => 'pending',
        ]);

        Mail::to($admission->email)->send(new ApplicationSubmitted($admission));

        return redirect()
            ->route('student.admissions.documents', $admission)
            ->with('success', 'Application submitted successfully. Please upload required documents.');
    }

    /**
     * Show admissions dashboard for logged-in student
     */
    public function index()
    {
        $user = Auth::user();

        $admissions = Admission::where('email', $user->email)->get();

        $progress = 100;

        return view('student.admissions.index', compact(
            'admissions',
            'progress'
        ));
    }

    /**
     * Show single admission
     */
    public function show(Admission $admission)
    {
        $this->authorizeAdmission($admission);

        return view('student.admissions.show', compact('admission'));
    }

    /**
     * Show document submission step
     */
    public function documents(Admission $admission)
    {
        $this->authorizeAdmission($admission);

        return view('student.admissions.documents', compact('admission'));
    }

    /**
     * Handle document uploads
     */
    public function uploadDocuments(Request $request, Admission $admission)
    {
        $this->authorizeAdmission($admission);

        $request->validate([
            'birth_certificate' => 'nullable|file|mimes:pdf,jpg,png',
            'baptismal_certificate' => 'nullable|file|mimes:pdf,jpg,png',
            'report_card' => 'nullable|file|mimes:pdf,jpg,png',
            'good_moral_certificate' => 'nullable|file|mimes:pdf,jpg,png',
            'medical_records' => 'nullable|file|mimes:pdf,jpg,png',
            'id_photos' => 'nullable|file|mimes:jpg,png',
            'parent_id' => 'nullable|file|mimes:jpg,png',
            'proof_of_residence' => 'nullable|file|mimes:pdf,jpg,png',
        ]);

        $documents = [];

        foreach ($request->files as $key => $file) {
            $documents[$key] = $file->store('documents', 'public');
        }

        $admission->update([
            'documents' => json_encode($documents),
            'status' => 'documents_submitted',
        ]);

        return redirect()
            ->route('student.admissions.show', $admission)
            ->with('success', 'Documents uploaded successfully.');
    }

    /**
     * Ensure logged-in student owns the admission
     */
    private function authorizeAdmission(Admission $admission)
    {
        if (!Auth::check() || Auth::user()->email !== $admission->email) {
            abort(403, 'Unauthorized');
        }
    }
}
