<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Size;
use DB;
class SizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
       $size = Size::all();
      return view("admin.sizemaster",compact('size'));
    }

    public function Store(Request $request){

      if($request->all()){
        $validator = Validator::make($request->all(), [
         'size' => 'required',
         ]);
     if($validator->fails()){
         $err = json_decode($validator->errors());
         foreach($err as $error){
         $data['error']=$error;
         }
      }else{
        if($request->hidden_id){
          $size=Size::find($request->hidden_id);
          $size->size=$request->size;
          $size->save();
          $data['message']="Update size SuccessFully";
        }else{
         $size =New Size;
         $size->size=$request->size;
         $size->save();
         $data['message']="Insert size SuccessFully";
        }
       }
      return Response()->json($data);
     }
    }

public function delete(Request $request)
{
    $size = Size::find($request->id);
    if (!is_null($size)) {
        $size->delete();
        $data['message']="Delete size SuccessFully";

    }else {
      $data['error']="Something Wrong";
    }
    return Response()->json($data);
  }



  public function edit(Request $request)
  {
       $id=$request->id;
       $size = Size::find($id);
       return Response()->json($size);
  }
}

