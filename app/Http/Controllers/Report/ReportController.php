<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Item;
use App\Models\Size;
use App\Models\Unit;
use App\Models\Machine;
use App\Models\Seller;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Builder;
use DB;
use App\Exports\ReportExport;
use App\Exports\GroupwiseReportExport;
use App\Exports\PartyWiseExport;

use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function PartywiseSummeryReport(Request $request){
    //     $purchase = Purchase::orderBy('id', 'desc')
    //     ->when(
    //         $request->date_from && $request->date_to,
    //         function (Builder $builder) use ($request) {
    //             $builder->whereBetween(
    //                 DB::raw('DATE(created_at)'),
    //                 [
    //                     $request->date_from,
    //                     $request->date_to
    //                 ]
    //             );
    //         }
    //     )->get();

    //   return view('report.partysummeryreport',compact('purchase'));
    //  }

    // PartyWise Summary Report
    public function PartyWiseSummery(Request $request)
    {
        $seller = Seller::all();
        $sellerdata = null;

        if ($request->filled(['seller_id', 'fromDate', 'toDate'])) {
            $sellerdata = Purchase::leftJoin('seller_details', 'seller_details.id', '=', 'purchase_entry.seller_id')
                ->selectRaw('seller_details.id as seller_id, seller_details.s_name, sum(purchase_entry.taxamt) as total_taxable_amount, sum(purchase_entry.igst) as total_IGST, sum(purchase_entry.cgst) as total_CGST, sum(purchase_entry.sgst) as total_SGST, sum(purchase_entry.cess) as total_cess')
                ->groupBy('seller_details.id', 'seller_details.s_name')
                ->when($request->has('fromDate') && $request->has('toDate'), function ($query) use ($request) {
                    return $query->whereBetween('purchase_entry.date', [$request->fromDate, $request->toDate]);
                })
                ->when($request->has('seller_id'), function ($query) use ($request) {
                    return $query->where('purchase_entry.seller_id', $request->seller_id);
                })
                ->orderBy('seller_details.s_name')
                ->get();
        }

        return view('report.partywisesummery_report', compact('sellerdata', 'seller'));
    }

    public function PartyexportCSVFile(Request $request)
    {
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
        $sellerId = $request->seller_id;

        return Excel::download(new PartyWiseExport($fromDate, $toDate, $sellerId), 'party_wise_report.csv');
    }



     public function DateWisePurchaseReport(Request $request){
        $purchase = Purchase::leftjoin("seller_details", "seller_details.id", '=', 'purchase_entry.seller_id')
            ->leftjoin("size_master", "size_master.id", '=', 'purchase_entry.size_id')
            ->leftjoin("unit_master", "unit_master.id", '=', 'purchase_entry.unit_id')
            ->leftjoin("item_details", "item_details.id", '=', 'purchase_entry.item_id')
            ->leftjoin("group_master", "group_master.id", '=', 'purchase_entry.group_id')
            ->leftjoin("machine_master", "machine_master.id", '=', 'purchase_entry.machine_id')
            ->select('purchase_entry.*', 'seller_details.s_name as sname', 'group_master.name as gname', 'size_master.size as sizename', 'item_details.name as iname', 'unit_master.unit as uname', 'machine_master.machine as machinename')->orderBy('id', 'desc')
            ->when(
                $request->fromDate && $request->toDate,
                function (Builder $builder) use ($request) {
                    $builder->whereBetween(
                        DB::raw('DATE(purchase_entry.created_at)'),
                        [
                            $request->fromDate,
                            $request->toDate
                        ]
                    );
                }
            )->get();
        return view("report.datewisepurchasereport", compact('purchase', 'request'));

    }
    public  function exportCSVFile(Request $request)
    {
         $fromDate = $request->fromDate;
         $toDate = $request->toDate;
        return Excel::download(new ReportExport($fromDate, $toDate), 'ReportExport.csv');

    }

    public function Group(Request $request)

    {
        $groupdata = Group::all();
        $gid= $request->group_id;
        $group = Purchase::leftjoin("group_master", "group_master.id", '=', 'purchase_entry.group_id')
            ->selectRaw('group_id,group_master.id as gid,name ,sum(taxamt) as total_taxable_amount')->groupBy('group_id')->orderBy('purchase_entry.id', 'desc')
            ->selectRaw(' group_id ,sum(cgst) as total_CGST')->groupBy('group_id')->orderBy('purchase_entry.id', 'desc')
            ->selectRaw(' group_id ,sum(sgst) as total_SGST')->groupBy('group_id')->orderBy('purchase_entry.id', 'desc')
            ->selectRaw(' group_id ,sum(igst) as total_IGST')->groupBy('group_id')->orderBy('purchase_entry.id', 'desc')
            ->selectRaw(' group_id ,sum(cess) as total_cess')->groupBy('group_id')->orderBy('purchase_entry.id', 'desc')
             ->when(
               $gid,
                function (Builder $builder) use ($request) {
                    $builder->where('group_id', 'like', '%' . $request->group_id. '%');
                }
             )
            ->get();
        foreach ($group as $groups) {
            $groups->taxamt;
            $groups->igst;

        }
        return view("report.groupwisereport", compact('group', 'groupdata'));
    }


    public function GroupexportCSVFile(Request $request)
    {
         return Excel::download(new GroupwiseReportExport, 'GroupwiseReportExport.csv');
    }

    public function GroupDetailsShow($id)
    {
        $purchase = Purchase::where('group_id', $id)->get();
        $totalTaxAmt = $purchase->sum('taxamt');
        $totalIGST = $purchase->sum('igst');
        $totalCGST = $purchase->sum('cgst');
        $totalSGST = $purchase->sum('sgst');
        $totalCess = $purchase->sum('cess');
        return view('report.group_details', compact('purchase', 'totalTaxAmt', 'totalIGST', 'totalCGST', 'totalSGST', 'totalCess'));
    }



}
