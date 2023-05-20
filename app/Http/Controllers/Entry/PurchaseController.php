<?php

namespace App\Http\Controllers\Entry;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Item;
use App\Models\Size;
use App\Models\Unit;
use App\Models\Machine;
use App\Models\Seller;
use App\Models\Purchase;
use DB;
class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $purchase = Purchase::leftjoin("seller_details","seller_details.id",'=','purchase_entry.seller_id')
      ->leftjoin("size_master","size_master.id",'=','purchase_entry.size_id')
      ->leftjoin("unit_master","unit_master.id",'=','purchase_entry.unit_id')
      ->leftjoin("item_details","item_details.id",'=','purchase_entry.item_id')
      ->leftjoin("group_master","group_master.id",'=','purchase_entry.group_id')
      ->leftjoin("machine_master","machine_master.id",'=','purchase_entry.machine_id')
      ->select('purchase_entry.*','seller_details.s_name as sname','group_master.name as gname','size_master.size as sizename','item_details.name as iname','unit_master.unit as uname','machine_master.machine as machinename')->get();
       return view("entry.purchase.purchase",compact('purchase'));
     }
       public function Store(Request $request){

          if($request->all()){
           $validator = Validator::make($request->all(), [

            ]);
        if($validator->fails()){
            $err = json_decode($validator->errors());
            foreach($err as $error){
            $data['error']=$error;
            }
         }else{
           if($request->hidden_id){

             $purchase=Purchase::find($request->hidden_id);
             $purchase->date=$request->date;
             $purchase->invoice=$request->invoice;
             $purchase->seller_id=$request->seller_id;
             $purchase->group_id=$request->group;
             $purchase->gst=$request->gst;
             $purchase->inward=$request->inward;
             $purchase->gstin =$request->gst_bill;
             $purchase->item_id=$request->itemname;
             $purchase->size_id=$request->size;
             $purchase->qty=$request->qty;
             $purchase->unit_id=$request->unit;
             $purchase->rate=$request->rate;
             $purchase->disc=$request->disc;
             $purchase->taxamt=$request->taxamt;
             $purchase->gstamt=$request->gstamt;
             $purchase->cess=$request->cess;
             $purchase->tamt=$request->tamt;
             $purchase->machine_id=$request->machine;
             $purchase->other_details=$request->other;
             $purchase->save();
             $data['message']="Update SuccessFully";
           }else{
            $purchase =New Purchase();
            foreach ($request->data as $dt) {
            $sellergst= $dt['seller_gst'];
            if( $sellergst=="2"){
              $purchase->igst=$dt['taxamt'];

            }else{
              $tamtt=$dt['taxamt']/2;
              $purchase->cgst=$tamtt;
              $purchase->sgst=$tamtt;
            }
            $purchase->date = $dt['date'];
            $purchase->invoice = $dt['invoice'];
            $purchase->seller_id = $dt['seller_id'];
            $purchase->group_id = $dt['group'];
            $purchase->gst = $dt['gst'];
            $purchase->inward = $dt['inward'];
            $purchase->gstin = $dt['gst_bill'];
           $purchase->item_id = $dt['itemname'];
           $purchase->size_id = $dt['size'];
           $purchase->qty = $dt['qty'];
           $purchase->unit_id = $dt['unit'];
           $purchase->rate = $dt['rate'];
           $purchase->disc = $dt['disc'];
           $purchase->taxamt = $dt['taxamt'];
           $purchase->gstamt = $dt['gstamt'];
           $purchase->cess = $dt['cess'];
           $purchase->tamt = $dt['tamt'];
           $purchase->machine_id = $dt['machine'];
           $purchase->other_details = $dt['other'];
            $purchase->save();
            }
            $data['message']="Insert SuccessFully";
           }
          }
         return Response()->json($data);
        }
     }


     public function AddPurchase(Request $request){
      $last = Purchase::latest('id')->first();

      $group = Group::all();
      $item = Item::all();
      $size = Size::all();
      $unit = Unit::all();
      $seller = Seller::all();
      $machine = Machine::all();
      $ldate=$last->date;
     return view("entry.purchase.purchaseentry",compact('seller','group','item','size','unit','machine','ldate'));

     }

     public function Seller(Request $request){
       return Seller::find($request->id);
     }

     public function Edit(Request $request){
      $purchase= Purchase::find($request->id);
      $group = Group::all();
      $item = Item::all();
      $size = Size::all();
      $unit = Unit::all();
      $seller = Seller::all();
      $machine = Machine::all();
      return view("entry.purchase.purchaseentry",compact('purchase','seller','group','item','size','unit','machine'));


    }


    public function delete(Request $request)
    {
        $purchase = Purchase::find($request->id);
        if (!is_null($purchase)) {
        $purchase->delete();
        $data['message'] = "Delete Purchase SuccessFully";
        } else {
        $data['error'] = "Something Wrong";
        }
        return Response()->json($data);
     }


  }
