<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\DyiengStatus;
use DB;
class DyeingStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
       $dyeingstatus = DyiengStatus::all();
      return view("admin.dyeingstatusmaster",compact('dyeingstatus'));
    }

    public function AddDyeing(){
      return view("admin.dyeingstatusmaster");
    }




    public function Store(Request $request){

      if($request->all()){
        $validator = Validator::make($request->all(), [
         'dyeing_status' => 'required',
         ]);
     if($validator->fails()){
         $err = json_decode($validator->errors());
         foreach($err as $error){
         $data['error']=$error;
         }
      }else{
        if($request->hidden_id){
          $status=DyiengStatus::find($request->hidden_id);
          $status->dyeing_status=$request->dyeing_status;
          $status->save();
          $data['message']="Update Dyeing Status SuccessFully";
        }else{
         $status =New DyiengStatus;
         $status->dyeing_status=$request->dyeing_status;
         $status->save();
         $data['message']="Insert Dyeing Status SuccessFully";
        }
       }
      return Response()->json($data);
     }
    }

public function delete(Request $request)
{
    $group = DyiengStatus::find($request->id);
    if (!is_null($group)) {
        $group->delete();
        $data['message']="Delete Dyeing Status SuccessFully";

    }else {
      $data['error']="Something Wrong";
    }
    return Response()->json($data);
  }



  public function edit(Request $request)
  {
       $id=$request->id;
       $dyeing_status = DyiengStatus::find($id);
       return Response()->json($dyeing_status);
  }
}






















