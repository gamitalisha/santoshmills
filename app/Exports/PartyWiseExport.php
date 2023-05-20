<?php

namespace App\Exports;

use App\Models\Purchase;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PartyWiseExport implements FromView, WithHeadings
{
    protected $fromDate;
    protected $toDate;
    protected $sellerId;

    public function __construct($fromDate, $toDate, $sellerId)
    {
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
        $this->sellerId = $sellerId;
    }

    public function view(): View
    {
        $sellerdata = Purchase::leftJoin('seller_details', 'seller_details.id', '=', 'purchase_entry.seller_id')
            ->selectRaw('seller_details.s_name, sum(purchase_entry.taxamt) as total_taxable_amount, sum(purchase_entry.igst) as total_IGST, sum(purchase_entry.cgst) as total_CGST, sum(purchase_entry.sgst) as total_SGST, sum(purchase_entry.cess) as total_cess')
            ->groupBy('seller_details.s_name')
            ->when($this->fromDate && $this->toDate, function ($query) {
                return $query->whereBetween('purchase_entry.date', [$this->fromDate, $this->toDate]);
            })
            ->when($this->sellerId, function ($query) {
                return $query->where('purchase_entry.seller_id', $this->sellerId);
            })
            ->get();

        return view('report.party_wise', [
            'sellerdata' => $sellerdata
        ]);
    }

    public function headings(): array
    {
        return [
            'Party Name',
            'Tax Amount',
            'IGST',
            'CGST',
            'SGST',
            'CESS',
        ];
    }
}
