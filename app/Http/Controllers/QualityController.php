<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Quality;
use DB;
class QualityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
       $quality = Quality::all();
      return view("admin.qualitymaster",compact('quality'));
    }

    public function Store(Request $request){

      if($request->all()){
        $validator = Validator::make($request->all(), [
         'quality_master' => 'required',
         ]);
     if($validator->fails()){
         $err = json_decode($validator->errors());
         foreach($err as $error){
         $data['error']=$error;
         }
      }else{
        if($request->hidden_id){
          $quality=Quality::find($request->hidden_id);
          $quality->quality_master=$request->quality_master;
          $quality->save();
          $data['message']="Update quality SuccessFully";
        }else{
         $quality =New Quality;
         $quality->quality_master=$request->quality_master;
         $quality->save();
         $data['message']="Insert quality SuccessFully";
        }
       }
      return Response()->json($data);
     }
    }

public function delete(Request $request)
{
    $quality = Quality::find($request->id);
    if (!is_null($quality)) {
        $quality->delete();
        $data['message']="Delete quality SuccessFully";

    }else {
      $data['error']="Something Wrong";
    }
    return Response()->json($data);
  }



  public function edit(Request $request)
  {
       $id=$request->id;
       $quality = Quality::find($id);
       return Response()->json($quality);
  }
}

