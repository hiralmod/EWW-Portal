<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CommonController extends Controller
{
    public function changeStatus(Request $request)
    {
        $table = $request->table;
        $id = $request->id;
        $data = DB::table($table)->whereId($id)->first();
        if(isset($data)) {
            $status= ($data->status == 1) ? 0 : 1;
            // $status['updated_at'] = date('Y-m-d H:i:s');
            DB::table($table)->whereId($id)->update(["status"=>$status]);
            Session::flash('success_message', 'Status Changed successfully');
            return redirect()->route('country.index');
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function deleteRecord(Request $request)
    {
        $table = $request->table;
        $id = $request->id;
        $data = DB::table($table)->whereId($id)->update(['deleted_at' => date("Y-m-d H:i:s")]);
        Session::flash('success_message', 'Record deleted successfully');
        return redirect()->route('country.index');
    }
}
