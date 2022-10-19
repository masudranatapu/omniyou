@extends('admin.layouts.app')
@section('title', 'Client Edit')
@section('content')
 <div class="card mb-4">
    <div class="row">
          <div class="col-6">
              <div class="card-header page_title">
                  <h3>Client Edit</h3>
              </div>
          </div>
          <div class="col-6">
              <div class="float-right p-2">
                  <a href="{{route('admin.client.index')}}" class="btn btn-primary">Back</a>
              </div>
          </div>
    </div>
</div>
  <div class="row">
    <div class="col-12">
       <div class="card">
          <div class="card-header">
            <h6>Client Edit</h6>
          </div>
          <div class="card-body">
              <form action="{{route('admin.client.update', $client->id)}}" method="post">
                @csrf
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="mb-3">
                           <label class="form-control-label">client Name <span class="tx-danger">*</span></label>
                           <input type="text" name="name" class="form-control" value="{{ $client->name }}" placeholder="Enter client name">
                           @error('name')
                            <div class="text-danger">{{$message}}</div>
                           @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-control-label">Client Email </label>
                            <input type="email" name="email" class="form-control" value="{{ $client->email }}" placeholder="Enter client email">
                            @error('email')
                             <div class="text-danger">{{$message}}</div>
                            @enderror
                         </div>
                         <div class="mb-3">
                            <label class="form-control-label">Client Phone </label>
                            <input type="text" name="phone" class="form-control" value="{{ $client->phone }}" placeholder="Enter client phone">
                            @error('phone')
                             <div class="text-danger">{{$message}}</div>
                            @enderror
                         </div>
                         <div class="mb-3">
                            <label class="form-control-label">Client Address </label>
                            <input type="text" name="address" class="form-control" value="{{ $client->address }}" placeholder="Enter client address">
                            @error('address')
                             <div class="text-danger">{{$message}}</div>
                            @enderror
                         </div>
                        <div class="mb-3">
                            <label class="form-control-label">Order Number</label>
                            <input type="text" name="order_id" class="form-control" value="{{ $client->order_id }}" placeholder="Enter order number">
                            @error('order_id')
                            <div class="text-danger">{{'The order number field is required.'}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                           <label class="form-control-label">Select Worker <span class="tx-danger">*</span></label>
                           <select name="worker_id" class="form-control" required>
                            @foreach ($workers as $worker)
                                <option value="{{ $worker->id }}" {{ $worker->id == $client->worker_id ? 'selected':'' }} >{{ $worker->name }}</option>
                            @endforeach
                           </select>
                           @error('status')
                            <div class="text-danger">{{$message}}</div>
                           @enderror
                        </div>
                        <div class="mb-3">
                           <label class="form-control-label">client Status <span class="tx-danger">*</span></label>
                           <select name="status" class="form-control" required>
                            <option value="1" {{ $client->status == 1 ? 'selected':'' }}>Active</option>
                            <option value="0" {{ $client->status == 0 ? 'selected':'' }}>Inactive</option>
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
