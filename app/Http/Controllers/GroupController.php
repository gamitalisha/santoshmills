<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Group;
use DB;
class GroupController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index(){
       $group = Group::all();
      return view("admin.groupmaster",compact('group'));
    }

    public function AddGroup(){        
      return view("admin.addgroupmaster");
    }

    public function Store(Request $request){

      if($request->all()){
        $validator = Validator::make($request->all(), [
         'name' => 'required',
         ]);
     if($validator->fails()){
         $err = json_decode($validator->errors());
         foreach($err as $error){
         $data['error']=$error;
         }
      }else{
        if($request->hidden_id){
          $group=Group::find($request->hidden_id);
          $group->name=$request->name;
          $group->save();
          $data['message']="Insert Group SuccessFully";
        }else{
         $group =New Group;
         $group->name=$request->name;
         $group->save();
         $data['message']="Insert Group SuccessFully";
        }
       }
      return Response()->json($data);
     }

    }



     public function delete(Request $request)
        {
            $group = Group::find($request->id);
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
         $group = Group::find($id);
         return Response()->json($group);


        //  return view("admin.group.addgroupmaster",compact('group'));
    }


}
 