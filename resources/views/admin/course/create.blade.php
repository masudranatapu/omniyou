@extends('admin.layouts.app')
@section('title', 'Quiz - Course Create')
@section('content')
 <div class="card mb-4">
    <div class="row">
          <div class="col-6">
              <div class="card-header page_title">
                  <h3>Course Create</h3>
              </div>
          </div>
          <div class="col-6">
              <div class="float-right p-2">
                  <a href="{{route('admin.course.index')}}" class="btn btn-primary">Back</a>
              </div>
          </div>
    </div>
</div>
  <div class="row">
    <div class="col-12">
       <div class="card">
          <div class="card-header">
            <h6>Course Create</h6>
          </div>
          <div class="card-body">
              <form action="{{route('admin.course.store')}}" method="post">
                @csrf
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="mb-3">
                           <label class="form-control-label">Course Name <span class="tx-danger">*</span></label>
                           <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter course name">
                           @error('name')
                            <div class="text-danger">{{$message}}</div>
                           @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-control-label">Order Number</label>
                            <input type="text" name="order_id" value="{{ old('order_id') }}" class="form-control" placeholder="Enter order number">
                            @error('order_id')
                            <div class="text-danger">{{'The order number field is required.'}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                           <label class="form-control-label">Course Status <span class="tx-danger">*</span></label>
                           <select name="status" class="form-control" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                           </select>
                           @error('status')
                            <div class="text-danger">{{$message}}</div>
                           @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
              </form>
          </div><!-- card-body -->
      </div>
    </div>
  </div>

@endsection
