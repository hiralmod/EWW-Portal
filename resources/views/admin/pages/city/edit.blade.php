@extends('admin.layouts.master')
@section('content')
<div class="mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">City</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('state.index') }}">City</a></li>
                            <li class="breadcrumb-item">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
   <div class="row">
      <div class="col-lg-6 col-xl-6">
         <div class="card">
            <div class="card-body">
               <form action="{{ url('admin/city/update/'.$city->id) }}" method="post" enctype="multipart/form-data" autocomplete="off" data-parsley-validate>
               	@csrf
                  <div class="row">
                     <div class="col-lg-12">

                        <div class="form-group">
                            <label for="name">Country</label>
                            <select class="form-control" name="country_id" id="country" required>
                                <option value="" placeholder="Select">Select</option>
                                @foreach ($country as $countryData)
                                    <option value="{{ $countryData['id'] }}" @selected($city->country_id == $countryData['id'])>{{ $countryData['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">State</label>
                            <select class="form-control" name="state_id" id="state" required>
                                <option value="" placeholder="Select">Select</option>
                                @foreach ($state as $stateData)
                                    <option value="{{ $stateData['id'] }}"@selected($city->state_id == $stateData['id'])>{{ $stateData['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                           <label>City Name</label>
                           <input type="text" name="name" class="form-control" value="{{$city->name }}" required="" data-parsley-required-message="Please enter city name" maxlength="25" data-parsley-minlength="2" data-parsley-minlength-message="Minimum 2 characters are required">
                        </div>
                     </div>

                     <div class="col-lg-12">
                        <div class="form-group mb-3 float-right">
                           <button type="submit" class="btn btn-blue waves-effect waves-light"><i class="mdi mdi-content-save"></i> Update</button>
                           <a href="{{ route('city.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
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