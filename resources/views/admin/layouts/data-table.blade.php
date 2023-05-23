@section('datatable_css')
    <link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
<table id="{{ $DataTableId }}" class="table table-striped dt-responsive nowrap" data-export-title="">
    @if (isset($AddUrl) && !empty($AddUrl))
        <a href="{{ $AddUrl }}" class="btn btn-primary waves-effect waves-light me-1 float-right btn-sm"><i
                class="fe-plus"></i></a>
    @endif
    <thead>
        <tr>
            @foreach ($DataTableFields as $Fields)
                <th>{{ $Fields['title'] }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

@section('datatable_script')
    <!-- third party js -->
    <script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>

    <script>
        var datatable_id = "#{{ $DataTableId }}";
        var datatable_url = "{{ $DataTableUrl }}";
        var datatable_column = JSON.parse('{!! $JsonDataField !!}');
    </script>
    <script src="{{ asset('assets/js/custom_datatable/cusmtom_datatable.js') }}"></script>
@endsection