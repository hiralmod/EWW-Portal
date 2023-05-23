<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\country;
use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class CountryController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = country::orderBy('id', 'desc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($row) {
                  if($row->status == 1) {
                    $btn = '<a href="javascript:void(0)" class="text-success" id="status_'.$row->id.'" data-table="country" data-id="'.$row->id.'" data-popup="tooltip" onclick="change_status(this);"><span class="badge rounded-pill bg-success status_btn pt-2"> Active</span></a>';
                  } else {
                    $btn = '<a href="javascript:void(0)" class="text-danger" id="status_'.$row->id.'" data-table="country" data-id="'.$row->id.'" data-popup="tooltip" onclick="change_status(this);return false;"><span class="badge rounded-pill bg-danger status_btn pt-2"> Inactive</span></a>';
                  }
                    return $btn;
                }) 
                ->editColumn('action', function ($row) {
                    $result = '<a href="' . url('admin/country/edit/'.$row['id']) . '" class="mr-2"><i class="fa fa-edit"></i></a>';
                    $result .= '<a href="" id="'.$row->id.'" data-table="country" data-id="'.$row->id.'"onclick="delete_record(this);return false;"><i class="fas fa-trash" title="Remove"></i></a>';
                    return $result;
                })
               
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return $this->adminFile('country.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->adminFile('country.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $PostField = $request->all();

        $country = country::where('name',$PostField['name'])->first();

        if(empty($country))
        {
            $data = new country();
            $data->name = $request['name'];
            $data->code = $request['code'];
            $data->save();
            Session::flash('success_message', 'Record added successfully');
        }
        else
        {
            Session::flash('error_message', 'Record already added!');
        }
       return redirect()->route('country.index');
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
    public function edit($id)
    {
        $data = country::find($id);
        return $this->adminFile('country.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->input();
        $update['name'] = $data['name'];
        $update['code'] = $data['code'];
        country::where('id', $id)->update($update);
        Session::flash('success_message', 'Record updated successfully');
        return redirect()->route('country.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
