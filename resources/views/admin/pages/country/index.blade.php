@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"></a>Dashboard</li>
                    <li class="breadcrumb-item">Country</li>
                </ol>
            </div>
            <h4 class="page-title mt-3">Country</h4>
        </div>
        <div class="btn-group float-right mt-2 mb-2">
            <a href="{{ route('country.create') }}" class="btn btn-sm waves-effect waves-light btn-blue"><i class="fas fa-plus mr-1"></i> Add</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                {{-- <div class="row mb-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control" name="type" id="type">
                                <option value="">All Type</option>
                                <option value="1">School</option>
                                <option value="2">Teacher</option>
                            </select>
                        </div>
                    </div>
                </div> --}}
                <div class="table-responsive">
                    <table class="table table-bordered datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Country Code</th>
                                <th>Status</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section("footer_script")
<script type="text/javascript">
        var table;
        $(document).ready(function() {
            table = $('.datatable').DataTable({
                dom: "lBfrtip",
                processing: true,
                serverSide: true,
                "ajax": {
                    "url": "{{ route('country.index') }}",
                    "type": "GET",
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                buttons: ['pdf', {
                    extend: 'csv',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                        orthogonal: 'export'
                    }
                }],
                order: [
                    [0, "desc"]
                ],
                "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $(nRow).attr("id", 'row_' + aData.id);
                    return nRow;
                }
            });
            // $(document).on('change', '#type', function() {
            //     table.draw();
            // });
        });
    </script>
@endsection