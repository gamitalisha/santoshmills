<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Master;


class MasterController extends Controller
{
    public function index()
    {
        $master = Master::all();
        return view("admin.master", compact('master'));
    }

    public function Store(Request $request)
    {
        // return $request;
        if ($request->all()) {
            $validator = Validator::make($request->all(), [
                //    'master_name' => 'required',
            ]);
            if ($validator->fails()) {
                $err = json_decode($validator->errors());
                foreach ($err as $error) {
                    $data['error'] = $error;
                }
            } else {
                if ($request->hidden_id) {
                    $master = Master::find($request->hidden_id);
                    $master->master_name = $request->master_name;
                    $master->save();
                    $data['message'] = "Update master SuccessFully";
                } else {
                    $master = new Master;
                    $master->master_name = $request->master_name;
                    $master->save();
                    $data['message'] = "Insert master SuccessFully";
                }
            }
            return Response()->json($data);
        }
    }

    public function delete(Request $request)
    {
        $master = Master::find($request->id);
        if (!is_null($master)) {
            $master->delete();
            $data['message'] = "Delete master SuccessFully";

        } else {
            $data['error'] = "Something Wrong";
        }
        return Response()->json($data);
    }



    public function edit(Request $request)
    {
        $id = $request->id;
        $master = Master::find($id);
        return Response()->json($master);
    }

}