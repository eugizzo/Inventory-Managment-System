<?php

namespace App\Exports;

use App\Models\StockOut;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StockExport implements FromCollection, WithHeadingRow
{
    public function headings(): array
    {
        return [
            'Id',
            'client_email',
            'order_status',
            'product_name',
            'order_quantity',
            'order_unityPrice',
            'order_totalPrice'
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
        return collect(StockOut::where('branch_id', 2)->get());
    }
}
