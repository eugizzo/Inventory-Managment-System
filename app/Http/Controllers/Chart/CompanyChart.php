<?php

namespace App\Http\Controllers\Chart;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyChart extends Controller
{
    public $totalRemainingStock = [];
    public $totalprofitValue = [];
    public $stockIn = [];
    public $stockOut = [];
    public $branchName = [];
    public function profitChart()
    {
        $name = [];
        $purchased = [];
        $sold = [];
        $remaining = [];
        $profit = [];
        $products = Product::where('company_id', Auth::user()->company->id)->get();
        foreach ($products as $product) {
            $name[] = $product->name;
            $stockIn = DB::table('product_stock_in')
                ->where('product_id', '=', $product->id)
                ->sum(DB::raw('purchasedQuantity * unityPrice'));
            $purchased[] =  (int)$stockIn;
            $stockOut = DB::table('product_stock_out')
                ->where('product_id', '=', $product->id)
                ->sum(DB::raw('soldQuantity * unityPrice'));
            $sold[] =  (int)$stockOut;

            $stockIns = DB::table('product_stock_in')
                ->where('product_id', '=', $product->id)
                ->select('purchasedQuantity', 'unityPrice')
                ->orderByDesc('created_at')
                ->get();
            $remainingQuantity  = $product->remainingQuantity;
            $totalRemaining = 0;
            foreach ($stockIns as $stock) {
                if ($remainingQuantity > 0 &&  $stock->purchasedQuantity >= $remainingQuantity) {
                    $totalRemaining += ($remainingQuantity * $stock->unityPrice);
                    $remainingQuantity = 0;
                } else if ($remainingQuantity > 0 &&  $stock->purchasedQuantity < $remainingQuantity) {
                    $totalRemaining += ($stock->purchasedQuantity * $stock->unityPrice);
                    $remainingQuantity -= $stock->purchasedQuantity;
                }
            }
            $remaining[] = $totalRemaining;
            $profit[] = $stockOut -  ($stockIn - $totalRemaining);
        }
        $name = json_encode($name);
        $purchased = json_encode($purchased);
        $sold = json_encode($sold);
        $remaining = json_encode($remaining);
        $profit = json_encode($profit);
        $this->branchProfit();
        // dd($this->totalRemainingStock, $this->totalprofitValue, $this->stockIn, $this->stockOut, $this->branchName);
        return view('chart.companyChart', [
            'totalRemainingStock' => json_encode(
                $this->totalRemainingStock
            ),
            'totalprofitValue' => json_encode(
                $this->totalprofitValue
            ),
            'stockIn' => json_encode(
                $this->stockIn
            ),
            'stockOut' => json_encode(
                $this->stockOut
            ),
            'branchName' => json_encode(
                $this->branchName
            ),
        ], compact(
            'profit',
            'purchased',
            'name',
            'sold',
            'remaining',
        ));
    }
    public function branchProfit()
    {
        $branches = Branch::where('company_id', Auth::user()->company->id)->get();
        if(count($branches)<=0){
            return redirect()->back()->with('warning', 'statistics are not present as company has no branch');
        }
                    $remainingValue = [];
            $profitValue = [];
        foreach ($branches as $branch) {
            $this->branchName[] = $branch->name;
            //get total sales
            $this->stockOut[] = $this->monthSales($branch->id);
            //get total purchases
            $this->stockIn[] = $this->monthPurchases($branch->id);
            //check remaining stock value and total profit
            $stocks = Stock::where('branch_id', $branch->id)->get();
            foreach ($stocks as $stock) {
                $stockInValue = DB::table('stock_ins')
                    ->where('branch_id', $branch->id)
                    ->join('product_stock_in', 'id', '=', 'stock_in_id')
                    ->where('product_id', $stock->product_id)
                    ->sum(DB::raw('purchasedQuantity * unityPrice'));


                $stockOutValue = DB::table('stock_outs')
                    ->where('branch_id', $branch->id)
                    ->join('product_stock_out', 'id', '=', 'stock_out_id')
                    ->where('product_id', $stock->product_id)
                    ->sum(DB::raw('soldQuantity * unityPrice'));


                $stockIns = DB::table('stock_ins')
                    ->where('branch_id', $branch->id)
                    ->join('product_stock_in', 'id', '=', 'stock_in_id')
                    ->where('product_id', '=', $stock->product_id)
                    ->select('purchasedQuantity', 'unityPrice')
                    ->orderByDesc('product_stock_in.created_at')
                    ->get();
                $remainingQuantity  = $stock->remainingQuantity;
                $totalRemaining = 0;
                foreach ($stockIns as $stock) {
                    if ($remainingQuantity > 0 &&  $stock->purchasedQuantity >= $remainingQuantity) {
                        $totalRemaining += ($remainingQuantity * $stock->unityPrice);
                        $remainingQuantity = 0;
                    } else if ($remainingQuantity > 0 &&  $stock->purchasedQuantity < $remainingQuantity) {
                        $totalRemaining += ($stock->purchasedQuantity * $stock->unityPrice);
                        $remainingQuantity -= $stock->purchasedQuantity;
                    }
                }
                $remainingValue[] = $totalRemaining;
                $profitValue[] = $stockOutValue -  ($stockInValue - $totalRemaining);
            }
            $sumRemainingStock = 0;
            $sumprofitValue = 0;
            for ($i = 0; $i < count($remainingValue); $i++) {
                $sumRemainingStock += $remainingValue[$i];
                $sumprofitValue += $profitValue[$i];
            }
            $this->totalRemainingStock[] = $sumRemainingStock;
            $this->totalprofitValue[]  =  $sumprofitValue;
        }
    }
    public function monthSales($branch)
    {
        $stockOut = DB::table('stock_outs')
            ->where('branch_id', $branch)
            ->join('product_stock_out', 'id', '=', 'stock_out_id')
            ->sum(DB::raw('soldQuantity * unityPrice'));
        return (int)$stockOut;
    }
    public function monthPurchases($branch)
    {
        $stockIn = DB::table('stock_ins')
            ->where('branch_id', $branch)
            ->join('product_stock_in', 'id', '=', 'stock_in_id')
            ->sum(DB::raw('purchasedQuantity * unityPrice'));
        return (int)$stockIn;
    }
}
