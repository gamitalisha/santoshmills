<?php

namespace App\Exports;

use App\Models\Purchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
use Auth;

class ReportExport implements  FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $fromDate;
    protected $toDate;

    public function __construct($fromDate, $toDate)
    {
        $this->fromDate= date('Y--m-d', strtotime($fromDate));
        $this->toDate= date('Y-m-d', strtotime($toDate));

    }

     public function collection()
     {

        return   Purchase::leftjoin("seller_details","seller_details.id",'=','purchase_entry.seller_id')
        ->leftjoin("size_master","size_master.id",'=','purchase_entry.size_id')
        ->leftjoin("unit_master","unit_master.id",'=','purchase_entry.unit_id')
        ->leftjoin("item_details","item_details.id",'=','purchase_entry.item_id')
        ->leftjoin("group_master","group_master.id",'=','purchase_entry.group_id')
        ->leftjoin("machine_master","machine_master.id",'=','purchase_entry.machine_id')
        ->select('purchase_entry.*','seller_details.s_name as sname','group_master.name as gname','size_master.size as sizename','item_details.name as iname','unit_master.unit as uname','machine_master.machine as machinename')
        ->orderBy('purchase_entry.created_at')
        ->get();

     }

     public function headings(): array
     {
        return [
            'Date',
            'Invoice',
            'Seller Name',
            'Group',
            'GST%',
            'Inward',
            "GST_Bill",
            'Itemname',
            'Size',
            'Unit',
            "Rate",
            "Qty",
            'Disc',
            'Taxamt',
            "Gstamt",
            "Cess",
            "Tamt",
            "Machine",
            "Other"
         ];
    }
}
