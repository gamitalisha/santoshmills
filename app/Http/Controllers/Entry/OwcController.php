<?php
namespace App\Http\Controllers\Entry;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Item;
use App\Models\Size;
use App\Models\Unit;
use App\Models\Machine;
use App\Models\Seller;
use App\Models\OwcIssue;
use App\Models\Owc;
use DB;
class OwcController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $owc = Owc::leftjoin("seller_details","seller_details.id",'=','tbl_owc.seller_id')
      ->leftjoin("size_master","size_master.id",'=','tbl_owc.size_id')
      ->leftjoin("unit_master","unit_master.id",'=','tbl_owc.unit_id')
      ->leftjoin("item_details","item_details.id",'=','tbl_owc.item_id')
      ->leftjoin("machine_master","machine_master.id",'=','tbl_owc.machine_id')
      ->leftjoin("owc_issue_reason_master","owc_issue_reason_master.id",'=','tbl_owc.owcissuereason_id')
      ->select('tbl_owc.*','seller_details.s_name as sname','size_master.size as sizename','item_details.name as iname','unit_master.unit as uname','machine_master.machine as machinename','owc_issue_reason_master.issue_reason as reason')->get();
      return view("entry.owc.owc_entry",compact('owc'));
    }

      public function AddOwc(Request $request){
        $group = Group::all();
        $item = Item::all();
        $size = Size::all();
        $unit = Unit::all();
        $seller = Seller::all();
        $machine = Machine::all();
        $owcissue = OwcIssue::all();
        return view("entry.owc.owcentry",compact('seller','group','item','size','unit','machine','owcissue'));
    }

      public function Store(Request $request)
      {
        // return Response()->json($request);

        if ($request->all()) {
          $validator = Validator::make($request->all(), [
            //  'machine' => 'required',
          ]);
          if ($validator->fails()) {
            $err = json_decode($validator->errors());
            foreach ($err as $error) {
              $data['error'] = $error;
            }
          } else {
            if ($request->hidden_id) {

              $owc = Owc::find($request->hidden_id);
              $owc->date = $request->date;
              $owc->owc_number = $request->owc_number;
              $owc->seller_id = $request->seller_id;
              $owc->owcissuereason_id = $request->owcissuereason_id;
              // $owc->returnable = $request->returnable;
              $owc->item_id = $request->item_id;
              $owc->size_id = $request->size_id;
              $owc->qty = $request->qty;
              $owc->unit_id = $request->unit_id;
              $owc->machine_id = $request->machine_id;
              $owc->other = $request->other;
            //   $owc->remark = $request->remark;
              $owc->save();
              $data['message'] = "Update machine SuccessFully";
            } else {
              $owc = new Owc;
              foreach ($request->data as $dt) {
                $owc->date = $dt['date'];
                $owc->owc_number = $dt['owc_number'];
                $owc->seller_id = $dt['seller'];
                $owc->owcissuereason_id = $dt['reasone'];
                // $owc->returnable = $dt['returnable'];
                $owc->item_id = $dt['itemname'];
                $owc->size_id = $dt['size'];
                $owc->qty = $dt['qty'];
                $owc->unit_id = $dt['unit'];
                $owc->machine_id = $dt['machine'];
                $owc->other = $dt['other'];
                // $owc->remark = $dt['remark'];
                $owc->save();
              }
              $data['message'] = "Insert Owc SuccessFully";
            }
          }
          return Response()->json($data);
        }
      }

      public function Edit($id){
         $owc= Owc::find($id);
        $item = Item::all();
        $size = Size::all();
        $unit = Unit::all();
        $seller = Seller::all();
        $machine = Machine::all();
        $owcissue = OwcIssue::all();
        return view("entry.owc.owcentry",compact('owc','seller','item','size','unit','machine','owcissue'));
    }

      public function delete(Request $request)
      {
          $owc = Owc::find($request->id);
          if (!is_null($owc)) {
              $owc->delete();
              $data['message']="Delete OWC SuccessFully";

          }else {
            $data['error']="Something Wrong";
          }
          return Response()->json($data);
        }

}
