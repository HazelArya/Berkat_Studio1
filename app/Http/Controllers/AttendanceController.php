<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\EmployeeDetail;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{

    public function show($user_id, $month)
    {
        $employees = EmployeeDetail::where('user_id', $user_id)
            ->with(['attendances' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])
            ->get();

        // Pastikan variabel $month dipassing ke view
        return view('admin.detail-karyawan', compact('employees', 'month'));
    }


    public function clockIn(Request $request)
    {
        $employeeDetailId = Auth::user()->employeeDetail->id;

        $attendance = Attendance::where('employee_detail_id', $employeeDetailId)
                                ->whereDate('created_at', now()->toDateString())
                                ->first();

        if ($attendance) {
            return redirect()->back()->withErrors(['message' => 'Anda sudah melakukan absen masuk hari ini.']);
        }

        Attendance::create([
            'employee_detail_id' => $employeeDetailId,
            'clock_in' => now(),
        ]);

        return redirect()->back()->with('success', 'Absen masuk berhasil.');
    }

    public function clockOut(Request $request)
    {
        $employeeDetailId = Auth::user()->employeeDetail->id;

        $attendance = Attendance::where('employee_detail_id', $employeeDetailId)
                                ->whereDate('created_at', now()->toDateString())
                                ->first();

        if (!$attendance || $attendance->clock_out) {
            return redirect()->back()->withErrors(['message' => 'Anda belum melakukan absen masuk atau sudah absen pulang hari ini.']);
        }

        $attendance->update([
            'clock_out' => now(),
        ]);

        return redirect()->back()->with('success', 'Absen pulang berhasil.');
    }

    public function showAbsensiForm()
    {
        $userId = Auth::id();

        // Periksa apakah user sudah mengirim absensi sebelumnya
        $hasSubmittedAbsensi = Attendance::where('employee_id', $userId)
            ->whereDate('created_at', now()->toDateString())
            ->exists();

        return view('employee.absensi', compact('hasSubmittedAbsensi'));
    }

}
