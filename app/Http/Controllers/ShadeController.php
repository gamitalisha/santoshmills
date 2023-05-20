<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Shade;
use App\Models\Master;


    class ShadeController extends Controller
    {
     
        public function index(){
          $shade = Shade::leftJoin('master_name_master','master_name_master.id', '=', 'tbl_shade.master_id')
            ->select('tbl_shade.*','master_name_master.master_name as master')->get();        

             $master = Master::all();
          return view("admin.shade",compact('shade','master'));
        }
    
        public function Store(Request $request){
            
          if($request->all()){
            $validator = Validator::make($request->all(), [
             'shade' => 'required',
             ]);
         if($validator->fails()){ 
             $err = json_decode($validator->errors());
             foreach($err as $error){
             $data['error']=$error;
             }
          }else{
            if($request->hidden_id){
              $shade=Shade::find($request->hidden_id);
              $shade->shade=$request->shade;
              $shade->master_id=$request->master_id;
              $shade->save();
              $data['message']="Update shade SuccessFully";
            }else{
             $shade =New Shade;
             $shade->shade=$request->shade;
             $shade->master_id=$request->master_id;
             $shade->save();
             $data['message']="Insert shade SuccessFully";
            }
           }
          return Response()->json($data);
         }
        }
    
    public function delete(Request $request)
    {
        $shade = Shade::find($request->id);
        if (!is_null($shade)) {
            $shade->delete();
            $data['message']="Delete shade SuccessFully";
    
        }else {
          $data['error']="Something Wrong";
        }
        return Response()->json($data);
      }
    
    
    
      public function edit(Request $request)
      { 
           $id=$request->id;
           $shade = Shade::find($id);
           return Response()->json($shade);
      }
    }
    
    
    
    
    
    
    
       
    
        
    
       
    
    
    
       
        
    
      
    
    
    
    