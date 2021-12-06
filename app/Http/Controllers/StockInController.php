<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use App\Models\StockIn;
use App\Models\StockOut;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $stocks = Stock::where('branch_id', $id)->get();
        return view('stockIn.stocks', ['stocks' => $stocks]);
    }
    function getProductStockIn($id)
    {
        $product = Product::where('id', $id)->first();
        if ($product) {
            return view('stockIn.productStockIn', ['product' => $product]);
        }
        return redirect()->back()->with('warning', 'product not found');
    }

    function getBranchStockIn($id)
    {
        $stockIn = StockIn::where('branch_id', $id)->get();
        return view('stockIn.branchStockIn', ['stockIn' => $stockIn]);
    }


    public function getSellStocks($id)
    {
        return view('stockOut');
    }
    

    function getBranchStockOut($id)
    {
        $stockOut = StockOut::where('branch_id', $id)->get();
        return view('stockIn.branchStockOut', ['stockOut' => $stockOut]);
    }
}
