<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\country;
use App\Models\state;
use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class StateController extends Controller
{
    use commonTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = state::orderBy('id', 'desc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($row) {
                    if ($row->status == 1)
                        $btn = '<a href="javascript:void(0)" class="text-success grab" id="status_'.$row->id.'" data-table="state" data-id="'.$row->id.'" data-popup="tooltip" onclick="change_status(this);return false;"><span class="badge rounded-pill bg-success status_btn pt-2"> Active</span></a>';
                    else
                        $btn = '<a href="javascript:void(0)" class="text-danger grab" id="status_'.$row->id.'" data-table="state" data-id="'.$row->id.'" data-popup="tooltip" onclick="change_status(this);return false;"><span class="badge rounded-pill bg-danger status_btn pt-2"> Inactive</span></a>';
                    return $btn;
                }) 
                ->editColumn('action', function ($row) {
                    $result = '<a href="' . url('admin/state/edit/'.$row['id']) . '" class="mr-2"><i class="fa fa-edit"></i></a>';
                    $result .= '<a href="" style="margin-left:3px" id="'.$row->id.'" data-table="state" data-id="'.$row->id.'" data-popup="tooltip" onclick="delete_record(this);return false;"><i class="fas fa-trash" title="Remove"></i></a>';
                    return $result;
                })

                ->rawColumns(['action','status'])
                ->make(true);
        }
        return $this->adminFile('state.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['country'] = country::where('status',1)->get();
        return $this->adminFile('state.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $PostFields = $request->all();

        $state = state::where('name',$PostFields['name'])->first();

        if(empty($state))
        {
            $data = new state();
            $data->country_id = $request['country_id'];
            $data->name = $request['name'];
            $data->code = $request['code'];
            $data->save();
            Session::flash('success_message', 'Record added successfully');
        }
        else
        {
            Session::flash('error_message', 'Record already added!');
        }
       return redirect()->route('state.index');
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
        $data['state'] = state::find($id);
        $data['country'] = country::where('status',1)->get();
        return $this->adminFile('state.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->input();
        $update['country_id'] = $data['country_id'];
        $update['name'] = $data['name'];
        $update['code'] = $data['code'];
        state::where('id', $id)->update($update);
        Session::flash('success_message', 'Record updated successfully');
        return redirect()->route('state.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
