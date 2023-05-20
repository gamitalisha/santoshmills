<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Unit;
use DB;
class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
       $unit = Unit::all();
      return view("admin.unitmaster",compact('unit'));
    }

    public function Store(Request $request){

      if($request->all()){
        $validator = Validator::make($request->all(), [
         'unit' => 'required',
         'formal_name' => 'required',
         ]);
     if($validator->fails()){
         $err = json_decode($validator->errors());
         foreach($err as $error){
         $data['error']=$error;
         }
      }else{
        if($request->hidden_id){
          $unit=Unit::find($request->hidden_id);
          $unit->unit=$request->unit;
          $unit->formal_name=$request->formal_name;
          $unit->save();
          $data['message']="Update unit SuccessFully";
        }else{
         $unit =New Unit;
         $unit->unit=$request->unit;
         $unit->formal_name=$request->formal_name;
         $unit->save();
         $data['message']="Insert unit SuccessFully";
        }
       }
      return Response()->json($data);
     }
    }

public function delete(Request $request)
{
    $unit = Unit::find($request->id);
    if (!is_null($unit)) {
        $unit->delete();
        $data['message']="Delete unit SuccessFully";

    }else {
      $data['error']="Something Wrong";
    }
    return Response()->json($data);
  }



  public function edit(Request $request)
  {
       $id=$request->id;
       $unit = Unit::find($id);
       return Response()->json($unit);
  }
}

