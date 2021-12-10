<?php

namespace App\Http\Controllers;

use App\Exports\StockExport;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Stock;
use App\Models\StockOut;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use PhpOffice\PhpSpreadsheet\Writer\Pdf as WriterPdf;

class ExportController extends Controller
{
    public function generatePdf()
    {
        $stockOut = StockOut::where('branch_id', Auth::user()->branch->id)->where('id', 1)->first();
        $pdf = PDF::loadView('invoice.clientInvoice', compact('stockOut'));
        return $pdf->download('orders.pdf');
    }
}
