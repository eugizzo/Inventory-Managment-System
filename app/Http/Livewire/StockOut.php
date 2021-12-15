<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Stock;
use App\Models\StockIn;
use App\Models\StockOut as ModelsStockOut;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class StockOut extends Component
{
    public $stocks = [];
    public $items, $phoneNumber, $quantity, $unityPrice;
    public
        $messages =  [
            "items.*.product_id.required" => "Product is required",
            "items.*.soldQuantity.required" => "Sold Quantity is required",
            "phoneNumber.required" => "Phone Number is required",
            "items.*.unityPrice.required" => "unity Price is required",
            "items.*.unityPrice.min" => "unity Price is less than 1",
            "items.*.soldQuantity.min" => "Sold Quantity is less than 1",
            "items.*.soldQuantity.lte" => "Sold Quantity is more than available",
        ];


    public function mount()
    {
        $this->stocks = Stock::where('branch_id', Auth::user()->branch->id)->where('remainingQuantity', '>', 0)->get();
        $this->items[] = [
            'remainingQuantity' => '',
            'soldQuantity' => '',
            'product_id' => '',
            'unityPrice' => '',
        ];
    }
    public function render()
    {
        return view('livewire.stock-out');
    }
    public function addRow()
    {
        $this->items[] = [
            'remainingQuantity' => '',
            'soldQuantity' => '',
            'product_id' => '',
            'unityPrice' => '',
        ];
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
                'items.*.soldQuantity' => 'required|integer|min:1',
                'items.*.unityPrice' => 'required|integer|min:1',
                'phoneNumber' => 'required|string',
            ],
            $this->messages
        );
    }

    public function updatedItems($value, $nested)
    {
        $nestedData = explode(".", $nested);
        if ($nestedData[1] == 'product_id') {
            $this->quantity = Stock::where('product_id', $value)->pluck("remainingQuantity")->first();
            $this->items[$nestedData[0]] = [
                'remainingQuantity' => $this->quantity,
                'soldQuantity' => $this->items[$nestedData[0]]['soldQuantity'],
                'product_id' => $this->items[$nestedData[0]]['product_id'],
                'unityPrice' => $this->items[$nestedData[0]]['unityPrice'],
            ];
        }
    }
    public function store()
    {
        $this->validate([
            'items.*.product_id' => 'required|distinct',
            'items.*.soldQuantity' => 'required|integer|lte:items.*.remainingQuantity|min:1',
            'items.*.unityPrice' => 'required|integer|min:1',
            'phoneNumber' => 'required|string',
        ], $this->messages);
        if (count($this->items) > 0) {
            $stockOut = new ModelsStockOut();
            $stockOut->branch_id = Auth::user()->branch->id;
            $stockOut->user_id = Auth::user()->id;
            $stockOut->phoneNumber = $this->phoneNumber;
            $stockOut->save();
            foreach ($this->items as $item) {
                $stockOut->products()->attach($item['product_id'], [
                    'soldQuantity' => $item['soldQuantity'],
                    'unityPrice' => $item['unityPrice'],
                ]);

                $stock = stock::where('product_id', $item['product_id'])
                    ->where('branch_id', Auth::user()->branch->id)->first();
                if ($stock) {
                    $stock->update([
                        'soldQuantity' => $stock->soldQuantity + $item['soldQuantity'],
                        'remainingQuantity' => $stock->remainingQuantity - $item['soldQuantity'],
                    ]);
                }
                $product = Product::where('id', $item['product_id'])->first();
                if ($product) {
                    $product->update([
                        'soldQuantity' => $product->soldQuantity + $item['soldQuantity'],
                        'remainingQuantity' => $product->remainingQuantity - $item['soldQuantity'],
                    ]);
                }
            }
            return redirect()->route('getBranchStockOut', Crypt::encrypt(Auth::user()->branch->id))->with('success', 'stockOut registered successfully');
        } else {
            return redirect()->back()->with('warning', 'no stockOut to register');
        }
    }
}
