<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Subgroup;
use DB;
class SubGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
       $subgroup = Subgroup::all();
      return view("admin.subgroupmaster",compact('subgroup'));
    }

    public function AddGroup(){
      return view("admin.addsubgroup");
    }




    public function Store(Request $request){
      if($request->all()){
        $validator = Validator::make($request->all(), [
         'sub_group' => 'required',
         ]);
     if($validator->fails()){
         $err = json_decode($validator->errors());
         foreach($err as $error){
         $data['error']=$error;
         }
      }else{
        if($request->hidden_id){
          $subgroup=Subgroup::find($request->hidden_id);
          $subgroup->sub_group=$request->sub_group;
          $subgroup->save();
          $data['message']="Update Subgroup SuccessFully";
        }else{
         $subgroup =New Subgroup;
         $subgroup->sub_group=$request->sub_group;
         $subgroup->save();
         $data['message']="Insert Group SuccessFully";
        }
       }
      return Response()->json($data);
     }
    }









public function delete(Request $request)
{
    $group = Subgroup::find($request->id);
    if (!is_null($group)) {
        $group->delete();
        $data['message']="Delete Group SuccessFully";

    }else {
      $data['error']="Something Wrong";
    }
    return Response()->json($data);
  }



  public function edit(Request $request)
  {
       $id=$request->id;
       $subgroup = Subgroup::find($id);
       return Response()->json($subgroup);
  }
}





















