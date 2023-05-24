<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tech_stack;
use App\Traits\commonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class TechStackController extends Controller
{
    use commonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = tech_stack::orderBy('id', 'desc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($row) {
                  if($row->status == 1) {
                    $btn = '<a href="javascript:void(0)" class="text-success" id="status_'.$row->id.'" data-table="tech_stacks" data-id="'.$row->id.'" onclick="change_status(this);"><span class="badge bg-success"> Active</span></a>';
                  } else {
                    $btn = '<a href="javascript:void(0)" class="text-danger" id="status_'.$row->id.'" data-table="tech_stacks" data-id="'.$row->id.'" onclick="change_status(this);return false;"><span class="badge bg-danger"> Inactive</span></a>';
                  }
                    return $btn;
                }) 
                ->editColumn('action', function ($row) {
                    $result = '<a href="' . url('admin/tech_stack/edit/'.$row['id']) . '" class="mr-2"><i class="fa fa-edit fa-lg text-blue"></i></a>';
                    $result .= '<a href="" id="'.$row->id.'" data-table="tech_stacks" data-id="'.$row->id.'"onclick="delete_record(this);return false;"><i class="fas fa-trash fa-lg text-blue" title="Remove"></i></a>';
                    return $result;
                })
               
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return $this->adminFile('tech_stack.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->adminFile('tech_stack.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $PostField = $request->all();

        $country = tech_stack::where('name',$PostField['name'])->first();

        if(empty($country))
        {
            $data = new tech_stack();
            $data->name = $request['name'];
            $data->save();
            Session::flash('success_message', 'Record added successfully');
        }
        else
        {
            Session::flash('error_message', 'Record already added!');
        }
       return redirect()->route('tech_stack.index');
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
        $data = tech_stack::find($id);
        return $this->adminFile('tech_stack.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->input();
        $update['name'] = $data['name'];
        tech_stack::where('id', $id)->update($update);
        Session::flash('success_message', 'Record updated successfully');
        return redirect()->route('tech_stack.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
