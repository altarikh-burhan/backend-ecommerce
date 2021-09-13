<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;  
use App\Models\TransactionItem;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        $transaction = Transaction::with(['user'])->get();
        return view('pages.dashboard.report.index', compact($transaction));
    }

    public function transactionReport()
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        if (request()->date != '') {
            $date = explode(' - ' , request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23.59.59';
        }

        $transaction = Transaction::with(['user'])->whereBetween('created_at', [$start, $end])->get();
        return view('pages.dashboard.report.transaction', compact('transaction'));
    }

    public function transactionReportPdf()
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        if (request()->date != '') {
            $date = explode(' - ' , request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23.59.59';
        }

        $transaction = Transaction::with(['user'])->whereBetween('created_at', [$start, $end])->get();
        $pdf = PDF::loadView('pages.dashboard.report.transaction', compact('transaction'));
        return $pdf->stream();
    }
}