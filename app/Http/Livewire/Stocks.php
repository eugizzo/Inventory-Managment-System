<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Stock;
use App\Models\StockIn;
use App\Models\StockOut;
use Illuminate\Support\Facades\Crypt;

class Stocks extends Component
{
    public $products = [];
    public $items;
    public
        $messages =  [
            "items.*.product_id.required" => "Product is required",
            "items.*.purchasedQuantity.required" => "Purchased Quantity is required",
            "items.*.supplier.required" => "Supplier is required",
            "items.*.supplier.string" => "Supplier is a string variable",
            "items.*.unityPrice.required" => "unity Price is required",
            "items.*.unityPrice.min" => "unity Price is less than 1",
            "items.*.purchasedQuantity" => "Purchased Quantity is less than 1",
        ];

    public function mount()
    {
        $this->products = Product::where('company_id', Auth::user()->branch->company->id)->get();
        $this->items = [[]];
    }
    public function addRow()
    {
        $this->items[] = [];
    }
    public function removeRow($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    public function updated($fields)
    {
        $this->validateOnly(
            $fields,
            [
                'items.*.product_id' => 'required|distinct',
                'items.*.purchasedQuantity' => 'required|integer',
                'items.*.unityPrice' => 'required|integer',
                'items.*.supplier' => 'required|string',
            ],
            $this->messages
        );
    }
    public function store()
    {
        $this->validate(
            [
                'items.*.product_id' => 'required|distinct',
                'items.*.purchasedQuantity' => 'required|integer',
                'items.*.unityPrice' => 'required|integer',
                'items.*.supplier' => 'required|string',
            ],
            $this->messages
        );
        if (count($this->items) > 0) {
            $stockIn = new StockIn();
            $stockIn->branch_id = Auth::user()->branch->id;
            $stockIn->user_id = Auth::user()->id;
            $stockIn->save();
            foreach ($this->items as $item) {
                $stockIn->products()->attach($item['product_id'], [
                    'purchasedQuantity' => $item['purchasedQuantity'],
                    'unityPrice' => $item['unityPrice'],
                    'supplier' => $item['supplier'],
                ]);
                $stock = stock::where('product_id', $item['product_id'])
                    ->where('branch_id', Auth::user()->branch->id)->first();
                if (!$stock) {
                    $stock = new Stock();
                    $stock->product_id = $item['product_id'];
                    $stock->branch_id = Auth::user()->branch->id;
                    $stock->save();
                }
                $stock->update([
                    'purchasedQuantity' => $stock->purchasedQuantity + $item['purchasedQuantity'],
                    'remainingQuantity' => $stock->remainingQuantity + $item['purchasedQuantity'],
                ]);
                $product = product::where('id', $item['product_id'])->first();
                if ($product) {
                    $product->update([
                        'purchasedQuantity' => $product->purchasedQuantity + $item['purchasedQuantity'],
                        'remainingQuantity' => $product->remainingQuantity + $item['purchasedQuantity'],
                    ]);
                }
            }
            return redirect()->route('getStock', Crypt::encrypt(Auth::user()->branch->id))->with('success', 'stock registered successfully');
        } else {
            return redirect()->back()->with('warning', 'no stock to register');
        }
    }
    public function render()
    {
        return view('livewire.stocks');
    }
}
