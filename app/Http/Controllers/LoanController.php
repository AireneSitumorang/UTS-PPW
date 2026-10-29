<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\LoanRequest;
use Carbon\Carbon;

class LoanController extends Controller {
    public function create() {
        $equipments = Equipment::where('status', 'tersedia')->get();
        return view('loans.create', compact('equipments'));
    }

    public function store(Request $request) {
        $equipment = Equipment::find($request->equipment_id);

        if (!$equipment || $equipment->status != 'tersedia') {
            return back()->withInput()->withErrors(['equipment_id' => 'Perangkat sedang tidak tersedia.']);
        }

        $request->validate([
            'equipment_id' => 'required',
            'borrower_name' => 'required|min:3',
            'borrower_nim' => 'required|size:8',
            'borrower_email' => 'required|email',
            'loan_date' => 'required|date|after_or_equal:today',
            'expected_return_date' => 'required|date|after_or_equal:loan_date',
            'purpose' => 'required'
        ]);

        $days = Carbon::parse($request->loan_date)->diffInDays(Carbon::parse($request->expected_return_date));
        if ($days > 7) {
            return back()->withInput()->withErrors(['expected_return_date' => 'Maksimal peminjaman adalah 7 hari.']);
        }

        LoanRequest::create([
            'equipment_id' => $request->equipment_id,
            'borrower_name' => $request->borrower_name,
            'borrower_nim' => $request->borrower_nim,
            'borrower_email' => $request->borrower_email,
            'loan_date' => $request->loan_date,
            'expected_return_date' => $request->expected_return_date,
            'purpose' => $request->purpose,
            'total_estimated_fee' => $days * $equipment->daily_rental_fee,
            'status' => 'diajukan'
        ]);

        $equipment->update(['status' => 'dipinjam']);

        return redirect('/equipments')->with('success', 'Peminjaman berhasil diajukan!');
    }
}