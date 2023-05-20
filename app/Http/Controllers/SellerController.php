<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Seller;
use DB;
class SellerController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

    public function index(){
         $seller = Seller::all();
        return view("admin.seller.seller",compact('seller'));
    }

    public function AddSeller(){
        return view("admin.seller.addseller");
      }



      public function Edit($id)
      {
           $seller = Seller::find($id);
           return view("admin.seller.addseller",compact('seller'));
      }


      public function Store(Request $request){
        if($request->all()){
          $validator = Validator::make($request->all(), [
           's_name'=>'required',
           ]);
       if($validator->fails()){
           $err = json_decode($validator->errors());
           foreach($err as $error){
           $data['error']=$error;
           }
        }else{
          if($request->hidden_id){
            $seller=Seller::find($request->hidden_id);
            $seller->s_name=$request->s_name;
            $seller->address=$request->address;
            $seller->contact=$request->contact;
            $seller->phone=$request->phone;
            $seller->gst_num=$request->gstin;
            $seller->pan=$request->pan;
            $seller->gst=$request->gst;
            $seller->save();
            $data['message']="Update Seller SuccessFully";
          }else{
           $seller =New Seller;
           $seller->s_name=$request->s_name;
           $seller->address=$request->address;
           $seller->contact=$request->contact;
           $seller->phone=$request->phone;
           $seller->gst_num=$request->gstin;
           $seller->gst=$request->gst;
           $seller->pan=$request->pan;
           $seller->save();
           $data['message']="Insert Seller SuccessFully";
          }
         }
        return Response()->json($data);
       }
      }

      public function delete(Request $request)
      {
          $seller = Seller::find($request->id);
          if (!is_null($seller)) {
              $seller->delete();
              $data['message']="Delete Seller SuccessFully";

          }else {
            $data['error']="Something Wrong";
          }
          return Response()->json($data);
        }
}
