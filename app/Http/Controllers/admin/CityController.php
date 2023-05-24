<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\city;
use App\Models\country;
use App\Models\state;
use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class CityController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = city::orderBy('id', 'desc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($row) {
                    if ($row->status == 1)
                        $btn = '<a href="javascript:void(0)" class="text-success" id="status_'.$row->id.'" data-table="city" data-id="'.$row->id.'" onclick="change_status(this);return false;"><span class="badge bg-success"> Active</span></a>';
                    else
                        $btn = '<a href="javascript:void(0)" class="text-danger" id="status_'.$row->id.'" data-table="city" data-id="'.$row->id.'" onclick="change_status(this);return false;"><span class="badge bg-danger"> Inactive</span></a>';
                    return $btn;
                }) 
                ->editColumn('action', function ($row) {
                    $result = '<a href="' . url('admin/city/edit/'.$row['id']) . '" class="mr-2"><i class="fa fa-edit fa-lg text-blue"></i></a>';
                    $result .= '<a href="" id="'.$row->id.'" data-table="city" data-id="'.$row->id.'"onclick="delete_record(this);return false;"><i class="fas fa-trash fa-lg text-blue"></i></a>';
                    return $result;
                })
               
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return $this->adminFile('city.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data['country'] = country::where('status',1)->get();
        return $this->adminFile('city.add', $data);
    }

    public function fetchStates(Request $request)
    {
        $data['state'] = state::where("country_id", $request->country_id)->where('status', 1)->get(["name", "id"]); 
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $PostFields = $request->all();

        $city = city::where('name',$PostFields['name'])->first();

        if(empty($city))
        {
            $data = new city();
            $data->country_id = $request['country_id'];
            $data->state_id = $request['state_id'];
            $data->name = $request['name'];
            $data->save();
            Session::flash('success_message', 'Record added successfully');
        }
        else
        {
            Session::flash('error_message', 'Record already added!');
        }
       return redirect()->route('city.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['city'] = city::find($id);
        $data['country'] = country::where('status',1)->get();
        $data['state'] = state::where('status',1)->get();
        return $this->adminFile('city.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->input();
        $update['country_id'] = $data['country_id'];
        $update['state_id'] = $data['state_id'];
        $update['name'] = $data['name'];
        city::where('id', $id)->update($update);
        Session::flash('success_message', 'Record updated successfully');
        return redirect()->route('city.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
