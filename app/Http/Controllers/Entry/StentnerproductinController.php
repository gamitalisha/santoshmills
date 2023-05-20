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
use App\Models\Master;
use DB;
class StentnerproductinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
       $group = Group::all();
       $item = Item::all();
       $size = Size::all();
       $unit = Unit::all();
       $seller = Seller::all();
       $machine = Machine::all();
       $owcissue = OwcIssue::all();
       $master = Master::all();
      return view("entry.stenterproduction",compact('seller','group','item','size','unit','machine','owcissue','master'));
    }

    public function Store(Request $request){

      return Response()->json($request);
    }
}
