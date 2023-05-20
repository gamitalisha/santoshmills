<?php

namespace App\Http\Controllers\Entry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PhysicalStock;
use DB;

class PhysicalstockentryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        //    $unit = PhysicalStock::all();
          return view("entry.physicalstockentry");
        }

        public function Store(Request $request){

          return Response()->json($request);
        }}
