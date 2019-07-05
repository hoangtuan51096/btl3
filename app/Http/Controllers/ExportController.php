<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Repositories\Pivot\PivotRepository;
use Exportable;
use App\Exports\ExcelsExport;

class ExportController extends Controller
{
    protected $pivotRepository;

    public function __construct(PivotRepository $pivotRepository)
    {
        $this->pivotRepository = $pivotRepository;
    }

    public function export(Request $request)
    {
        return Excel::download(new ExcelsExport($request->store_id), 'invoices.xlsx');
    }
}
