<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Transaction;
use App\Models\Pivot;
use App\Repositories\Pivot\PivotRepository;

class ExcelsExport implements FromCollection, WithHeadings
{

    public function __construct($store_id)
    {
        $this->store_id = $store_id;
    }

    public function collection()
    {
        $orders = Pivot::where('store_id', $this->store_id)->with('product')->get();
        foreach ($orders as $key => $row) {
            $order[] = array(
                '0' => $key+1 ,
                '1' => $row->product->code_product,
                '2' => $row->product->name,
                '3' => $row->quantity,
                '4' => $row->product->desc,
            );
        }
        return (collect($order));
    }

    public function headings(): array
    {
        return [
            'STT',
            'Ma sp',
            'Ten SP',
            'So luong',
            'So luong',
            'Mo ta'
        ];
    }
}
