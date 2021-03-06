<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use App\Models\StockIn;
use App\Models\StockOut;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class StockInController extends Controller
{
    public function getStockOut($id)
    {
        $stock = StockIn::where("id", $id)->first();
        if ($stock) {
            $stocks = StockOut::where('stockIn_id', $stock->id)->get();
            if (count($stocks) > 0) {
                return view('stockIn.stockOuts', compact('stocks'));
            } else {
                return redirect()->back()->with('warning', 'no stockOut found');
            }
        }
    }
    public function getAllBranchStockOut($id)
    {
        $stocks = StockOut::where("branch_id", $id)->get();
        if ($stocks) {
            return view('stockIn.stockOuts', compact('stocks'));
        } else {
            return redirect()->back()->with('warning', 'no stockOut found');
        }
    }

    public function getAddManyStocks()
    {
        return view('stock');
    }


    function getStock($id)
    {
        $id = Crypt::decrypt($id);
        $stocks = Stock::where('branch_id', $id)->get();
        return view('stockIn.stocks', ['stocks' => $stocks]);
    }
    function getBranchStockIn($id)
    {
        $id = Crypt::decrypt($id);
        $stockIn = StockIn::where('branch_id', $id)->get();
        return view('stockIn.branchStockIn', ['stockIn' => $stockIn]);
    }

    public function getSellStocks($id)
    {
        $id = Crypt::decrypt($id);
        return view('stockOut');
    }

    function getBranchStockOut($id)
    {
        $id = Crypt::decrypt($id);
        $stockOut = StockOut::where('branch_id', $id)->get();
        return view('stockIn.branchStockOut', ['stockOut' => $stockOut]);
    }
    public function invoice($id)
    {
        $id = Crypt::decrypt($id);
        $stockOut = StockOut::where('branch_id', Auth::user()->branch->id)->where('id', $id)->first();
        return view('invoice.clientInvoice', ['stockOut' => $stockOut]);
    }
}
