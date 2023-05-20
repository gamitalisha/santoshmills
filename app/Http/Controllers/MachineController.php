<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Machine;
use App\Models\Category;
use DB;
class MachineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
       $machine = Machine::leftjoin('mc_category','mc_category.id','=','machine_master.mc_category')->get();
       $category = Category::all();
      return view("admin.machinemaster",compact('machine','category'));
    }

    public function Store(Request $request){

      if($request->all()){
        $validator = Validator::make($request->all(), [
         'machine' => 'required',
         ]);
     if($validator->fails()){
         $err = json_decode($validator->errors());
         foreach($err as $error){
         $data['error']=$error;
         }
      }else{
        if($request->hidden_id){
          $machine=Machine::find($request->hidden_id);
          $machine->machine=$request->machine;
          $machine->mc_category=$request->mc_category;
          $machine->save();
          $data['message']="Update machine SuccessFully";
        }else{
         $machine =New Machine;
         $machine->machine=$request->machine;
         $machine->mc_category=$request->mc_category;
         $machine->save();
         $data['message']="Insert machine SuccessFully";
        }
       }
      return Response()->json($data);
     }
    }

public function delete(Request $request)
{
    $machine = Machine::find($request->id);
    if (!is_null($machine)) {
        $machine->delete();
        $data['message']="Delete Machine SuccessFully";

    }else {
      $data['error']="Something Wrong";
    }
    return Response()->json($data);
  }



  public function edit(Request $request)
  {
       $id=$request->id;
       $machine = Machine::find($id);
       return Response()->json($machine);
  }
}






















