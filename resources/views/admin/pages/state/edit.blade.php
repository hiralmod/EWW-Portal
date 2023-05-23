@extends('admin.layouts.master')
@section('content')
<div class="mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Country</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('state.index') }}">Country</a></li>
                            <li class="breadcrumb-item">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
   <div class="row">
      <div class="col-lg-8 col-xl-8">
         <div class="card">
            <div class="card-body">
               <form action="{{ url('admin/state/update/'.$state->id) }}" method="post" enctype="multipart/form-data" autocomplete="off" data-parsley-validate>
               	@csrf
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="form-group">
                            <label for="name">{{ __('messages.service_name') }}
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" name="country_id">
                                <option value="" placeholder="Select">Select</option>
                                @foreach ($country as $countryData)
                                    <option value="{{ $countryData['id'] }}" @selected($state->country_id == $countryData['id'])>{{ $countryData['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                           <label>State Name</label>
                           <input type="text" name="name" class="form-control"  value="{{$state->name }}" required="" data-parsley-required-message="Please enter country name" maxlength="25" data-parsley-minlength="2" data-parsley-minlength-message="Minimum 2 characters are required">
                        </div>
                        <div class="form-group mb-3">
                           <label>State Code</label>
                           <input type="text" name="code" class="form-control"  value="{{$state->code }}" required="" data-parsley-required-message="Please enter country code" maxlength="10" data-parsley-minlength="2" data-parsley-minlength-message="Minimum 2 characters are required" >
                         </div>
                     </div>

                     <div class="col-lg-12">
                        <div class="form-group mb-3 float-right">
                           <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                           <a href="{{ route('state.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
                        </div>
                     </div>

                  </div>
               </form>
               <!-- end row-->
            </div>
            <!-- end card-body -->
         </div>
         <!-- end card -->
      </div>
      <!-- end col -->
   </div>
</div>

@endsection