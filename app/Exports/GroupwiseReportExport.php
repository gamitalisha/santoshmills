<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Purchase;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
use Auth;
class GroupwiseReportExport implements FromCollection,WithHeadings
{
    public function collection()
    {

            return Purchase::leftjoin("group_master", "group_master.id", '=', 'purchase_entry.group_id')
                ->selectRaw('group_id, name, sum(taxamt) as total_taxable_amount')
                ->groupBy('group_id')
                ->orderBy('purchase_entry.id', 'desc')
                ->selectRaw('group_id, sum(cgst) as total_CGST')
                ->groupBy('group_id')
                ->orderBy('purchase_entry.id', 'desc')
                ->selectRaw('group_id, sum(sgst) as total_SGST')
                ->groupBy('group_id')
                ->orderBy('purchase_entry.id', 'desc')
                ->selectRaw('group_id, sum(igst) as total_IGST')
                ->groupBy('group_id')
                ->orderBy('purchase_entry.id', 'desc')
                ->selectRaw('group_id, sum(cess) as total_cess')
                ->groupBy('group_id')
                ->orderBy('purchase_entry.id', 'desc')
                ->orderBy('purchase_entry.group_id')
                ->get();
    }

    public function headings(): array
    {
        return [
            'Group Id',
            'Group Name',
            'Total Taxable Amount',
            'Total CGST',
            'Total SGST',
            'Total IGST',
            'Total Cess',
        ];
    }
}
