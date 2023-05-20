<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;
class McCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
       $category = Category::all();
      return view("admin.mc_categorymaster",compact('category'));
    }

    public function Store(Request $request){

      if($request->all()){
        $validator = Validator::make($request->all(), [
         'mc_category' => 'required',
         ]);
     if($validator->fails()){
         $err = json_decode($validator->errors());
         foreach($err as $error){
         $data['error']=$error;
         }
      }else{
        if($request->hidden_id){
          $category=Category::find($request->hidden_id);
          $category->mc_category=$request->mc_category;
          $category->save();
          $data['message']="Update category SuccessFully";
        }else{
         $category =New Category;
         $category->mc_category=$request->mc_category;
         $category->save();
         $data['message']="Insert category SuccessFully";
        }
       }
      return Response()->json($data);
     }
    }

public function delete(Request $request)
{
    $category = Category::find($request->id);
    if (!is_null($category)) {
        $category->delete();
        $data['message']="Delete category SuccessFully";

    }else {
      $data['error']="Something Wrong";
    }
    return Response()->json($data);
  }



  public function edit(Request $request)
  {
       $id=$request->id;
       $category = Category::find($id);
       return Response()->json($category);
  }
}






















