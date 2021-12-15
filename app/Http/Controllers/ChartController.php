<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockOut;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Illuminate\Support\Facades\DB;



class ChartController extends Controller
{

    public function index()
    {
        $students = Student::all();

        $dataPoints = [];

        foreach ($students as $student) {

            $dataPoints[] = array(
                "name" => $student['name'],
                "data" => [
                    intval($student['term1_marks']),
                    intval($student['term2_marks']),
                    intval($student['term3_marks']),
                    intval($student['term4_marks']),
                ],
            );
        }

        return view("bar-graph", [
            "data" => json_encode($dataPoints),
            "terms" => json_encode(array(
                "Term 1",
                "Term 2",
                "Term 3",
                "Term 4",
            )),
        ]);
    }

    public function productChart($id)
    {
        $sold = Product::where('id', $id)->pluck('soldQuantity')->first();
        $remaining = Product::where('id', $id)->pluck('remainingQuantity')->first();
        $chart = LarapexChart::setTitle('Your Todos Stats')
            ->setLabels(['sold', 'remaining'])
            ->setDataset([$sold, $remaining]);
        return view('chart', compact('chart'));
    }


    public function Chart($id)
    {

        $stockOut = DB::table("product_stock_out")
            ->select("product_id", DB::raw('SUM(soldQuantity * unityPrice) as soldQuantity'), DB::raw("MONTH(created_at)"))
            ->orderBy('created_at')
            ->groupBy(DB::raw("product_id"))
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->get();
        return $stockOut;
        $sold = Product::where('id', $id)->pluck('soldQuantity')->first();
        $remaining = Product::where('id', $id)->pluck('remainingQuantity')->first();
        $chart = LarapexChart::setTitle('Your Todos Stats')
            ->setLabels(['sold', 'remaining'])
            ->setDataset([$sold, $remaining]);
        return view('chart', compact('chart'));
    }
}
