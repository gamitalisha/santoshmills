<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\OwcIssue;
use DB;
class OwcIssueController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index(){
       $owcissue = OwcIssue::all();
      return view("admin.owc_issue",compact('owcissue'));
    }

    public function Addowcissue(){        
      return view("admin.addowcissuemaster");
    }

    public function Store(Request $request){

      if($request->all()){
        $validator = Validator::make($request->all(), [
         'issue_reason' => 'required',
         ]);
     if($validator->fails()){
         $err = json_decode($validator->errors());
         foreach($err as $error){
         $data['error']=$error;
         }
      }else{
        if($request->hidden_id){
          $owcissue=OwcIssue::find($request->hidden_id);
          $owcissue->issue_reason=$request->issue_reason;
          $owcissue->save();
          $data['message']="Insert owcissue SuccessFully";
        }else{
         $owcissue =New OwcIssue;
         $owcissue->issue_reason=$request->issue_reason;
         $owcissue->save();
         $data['message']="Insert owcissue SuccessFully";
        }
       }
      return Response()->json($data);
     }

    }



     public function delete(Request $request)
        {
            $owcissue = OwcIssue::find($request->id);
            if (!is_null($owcissue)) {
                $owcissue->delete();
                $data['message']="Delete owcissue SuccessFully";

            }else {
              $data['error']="Something Wrong";
            }
            return Response()->json($data);
          }
    

    public function edit(Request $request)
    { 
        $id=$request->id;
         $owcissue = OwcIssue::find($id);
         return Response()->json($owcissue);


        //  return view("admin.owcissue.addowcissuemaster",compact('owcissue'));
    }


}
 