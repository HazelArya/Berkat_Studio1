<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Models\EmployeeDetail;
use Illuminate\Support\Facades\DB; // Import the DB facade

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('admin.reports.index', compact('reports'));
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);

        // Menyaring booking berdasarkan bulan dan tahun laporan
        $month = $report->date->format('m');
        $year = $report->date->format('Y');

        $employeeDetails = DB::table('employee_details')
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();

        $totalSalary = DB::table('employee_details')
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('gaji');

        // Filter bookings by success status
        $bookings = DB::table('bookings')
            ->join('reports', function($join) use ($report) {
                $join->on(DB::raw('MONTH(bookings.booking_date)'), '=', DB::raw('MONTH(reports.date)'))
                    ->on(DB::raw('YEAR(bookings.booking_date)'), '=', DB::raw('YEAR(reports.date)'));
            })
            ->select('reports.*', 'bookings.*')
            ->where('reports.id', '=', $id)
            ->where('bookings.status', '=', 'success')  // Filter for successful bookings
            ->get();

        // Menghitung total harga dan total jumlah pemesanan
        $totalPrice = $bookings->sum('price');
        $totalBookings = $bookings->count();

        return view('admin.reports.show', compact('report', 'bookings', 'totalPrice', 'totalBookings', 'employeeDetails', 'totalSalary'));
    }

    public function print($id)
    {
        $report = Report::findOrFail($id);

        $month = $report->date->format('m');
        $year = $report->date->format('Y');

        $employeeDetails = DB::table('employee_details')
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();

        $totalSalary = DB::table('employee_details')
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('gaji');

        // Filter bookings by success status
        $bookings = DB::table('bookings')
            ->join('reports', function($join) use ($report) {
                $join->on(DB::raw('MONTH(bookings.booking_date)'), '=', DB::raw('MONTH(reports.date)'))
                    ->on(DB::raw('YEAR(bookings.booking_date)'), '=', DB::raw('YEAR(reports.date)'));
            })
            ->select('reports.*', 'bookings.*')
            ->where('reports.id', '=', $id)
            ->where('bookings.status', '=', 'success')  // Filter for successful bookings
            ->get();

        // Menghitung total harga dan total jumlah pemesanan
        $totalPrice = $bookings->sum('price');
        $totalBookings = $bookings->count();

        return view('admin.reports.print', compact('report', 'bookings', 'totalPrice', 'totalBookings', 'employeeDetails', 'totalSalary'));
    }



    // Method untuk membuat laporan baru
    public function createReport()
    {
        $currentMonth = now()->month;
        $currentYear = now()->year;

        // Mengecek apakah laporan untuk bulan dan tahun ini sudah ada
        $existingReport = Report::whereMonth('date', $currentMonth)
                                ->whereYear('date', $currentYear)
                                ->first();

        // Jika laporan sudah ada, beri peringatan
        if ($existingReport) {
            return response()->json(['status' => 'error', 'message' => 'Laporan untuk bulan ini sudah dibuat.']);
        }

        // Jika laporan belum ada, buat laporan baru
        Report::create([
            'title' => "Laporan Bulan " . now()->format('F Y'),
            'date' => now()->startOfMonth(),
            'status' => 'Pending', // Status bisa disesuaikan
        ]);

        return response()->json(['status' => 'success', 'message' => 'Laporan berhasil dibuat.']);
    }
}
