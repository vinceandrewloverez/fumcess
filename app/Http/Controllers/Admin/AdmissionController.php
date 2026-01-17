<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    /**
     * Display a listing of admissions with stats and grades.
     */
    public function index()
    {
        // Admissions list (paginated)
        $admissions = Admission::latest()->paginate(10);

        // Dashboard stats
        $totalPendingApprovals = Admission::where('status', 'pending')->count();
        $totalApproved = Admission::where('status', 'approved')->count();
        $totalRejected = Admission::where('status', 'rejected')->count();
        $totalStudentsRegistered = Admission::count();

        // Unique grades applied for dropdown filter
        $grades = Admission::select('grade_applied')
            ->distinct()
            ->orderBy('grade_applied')
            ->pluck('grade_applied');

        return view('admin.admissions.index', compact(
            'admissions',
            'totalPendingApprovals',
            'totalApproved',
            'totalRejected',
            'totalStudentsRegistered',
            'grades'
        ));
    }

    /**
     * Show a single admission.
     */
    public function show(Admission $admission)
    {
        return view('admin.admissions.show', compact('admission'));
    }

    /**
     * Update admission status.
     */
    public function update(Request $request, Admission $admission)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $admission->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.admissions.index')
            ->with('success', 'Admission status updated successfully.');
    }

    /**
     * Delete an admission.
     */
    public function destroy(Admission $admission)
    {
        $admission->delete();

        return redirect()
            ->route('admin.admissions.index')
            ->with('success', 'Admission deleted successfully.');
    }

     /**
     * Approve an admission
     */
    public function approve(Admission $admission)
    {
        $admission->status = 'approved';
        $admission->save();

        return redirect()->back()->with('success', 'Admission approved successfully!');
    }

    /**
     * Reject an admission
     */
    public function reject(Admission $admission)
    {
        $admission->status = 'rejected';
        $admission->save();

        return redirect()->back()->with('success', 'Admission rejected successfully!');
    }
    
}
