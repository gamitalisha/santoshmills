<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Group;
use App\Models\Alias;
use App\Models\Subgroup;
use DB;
class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
      $item = Item::leftjoin("group_master","group_master.id",'=','item_details.group_id')

      ->select('item_details.*','group_master.name as gname')->get();
       $group_name = Group::all();
      $subgroup_name=Subgroup::all();
      return view("admin.itemdetail",compact('item','group_name','subgroup_name'));
    }
      //  $item = Item::all();
      // return view("admin.itemdetail",compact('item','group_name'));


    // public function AddGroup(){
    //   return view("admin.additem$item");
    // }
    public function fetchData()
    {
        // Retrieve items with their aliases
        $items = Item::with('alias')->get();

        // Pass the data to your view or process it as needed
        return view('admin.itemdetail', ['items' => $items]);
    }



    public function Store(Request $request){
      // return $request;
      // return $request->data[0]['item'];

      if($request->all()){
        $validator = Validator::make($request->all(), [
        //  'item' => 'required',
        //  'hsn' => 'required',
        //  'group' => 'required',
        //  'sub_group' => 'required',

         ]);
     if($validator->fails()){
         $err = json_decode($validator->errors());
         foreach($err as $error){
         $data['error']=$error;
         }
      }else{
        if($request->editid){
          $item=Item::find($request->editid);
          $item->name = $request->name;
          $item->hsn_code = $request->hsn_code;
          $item->group_id = $request->group_id;
          $item->sub_group = $request->sub_group;
          $item->alias_name = $request->alias_name;
          $item->alias_hsn = $request->alias_hsn;
          $item->save();
          $data['message'] = "Update item successfully";
        }else{
          $item = new Item;
          foreach ($request->data as $data) {
            foreach ($data['item'] as $dt) {
                $item = new Item();
                $item->name = $data['details'][0]['item'];
                $item->hsn_code = $data['details'][0]['hsn_code'];
                $item->group_id = $data['details'][0]['group'];
                $item->sub_group = $data['details'][0]['sub_group'];
                $item->alias_hsn = $dt['code'];
                $item->alias_name = $dt['alias'];
                $item->save();
            }
        }
         $data['message']="Insert Item SuccessFully";
        }
       }
      return Response()->json($data);
     }
    }









public function delete(Request $request)
{
  // return $request;
    $item = Item::find($request->id);
  // return $request;

    if (!is_null($item)) {
        $item->delete();
        $data['message']="Delete Item SuccessFully";

    }else {
      $data['error']="Something Wrong";
    }
    return Response()->json($data);
  }



  public function edit(Request $request)
  {
      $id=$request->id;

       $data = Item::find($id);
       return Response()->json($data);


      //  return view("admin.group.addgroupmaster",compact('group'));
  }


}





















