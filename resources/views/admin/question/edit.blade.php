@extends('admin.layouts.app')
@section('title', 'Quiz - Question Edit')

@section('qus_active') active @endsection
@section('question_edit') active @endsection

@section('content')
 <div class="card mb-4">
    <div class="row">
          <div class="col-6">
              <div class="card-header page_title">
                  <h3>Question Edit</h3>
              </div>
          </div>
          <div class="col-6">
              <div class="float-right p-2">
                  <a href="{{route('question.index')}}" class="btn btn-primary">Back</a>
              </div>
          </div>
    </div>
</div>
  <div class="row">
    <div class="col-12">
       <div class="card">
          <div class="card-header">
            <h6>Question Edit</h6>
          </div>
           <div class="card-body">
             <form action="{{route('question.update', $data->id)}}" method="post">
                @csrf
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="mb-3">
                           <label class="form-control-label">Question <span class="tx-danger">*</span></label>
                           <input type="text" name="question" value="{{$data->question}}" class="form-control" required>
                           @error('question')
                            <div class="text-danger">{{$message}}</div>
                           @enderror
                        </div>
                        <div class="mb-3">
                           <label class="form-control-label">Course Name <span class="tx-danger">*</span></label>
                           <select name="course_id" class="form-control" required>
                               <option value="" class="d-none">Select Course </option>
                               @foreach ($courses as $item)
                               <option value="{{ $item->id }}" @if($data->course_id == $item->id) selected @endif>{{ $item->name }}</option>
                               @endforeach
                           </select>
                           @error('question_type')
                            <div class="text-danger">{{$message}}</div>
                           @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-control-label">Choose Answer <span class="tx-danger">*</span></label>
                          <select name="question_option_id" class="form-control" required>
                              <option value="" selected disabled>Select Answer</option>
                              @foreach ($option as $item)
                               @if(!empty($answer->option_no))
                                <option value="{{$item->id}}" @if($item->id == $answer->option_no) selected @endif>{{$loop->iteration}}.{{$item->answer_option}}</option>
                                @else
                                <option value="{{$item->id}}">{{$loop->iteration}}.{{$item->answer_option}}</option>
                                @endif
                              @endforeach
                          </select>
                          @error('question_option_id')
                           <div class="text-danger">{{$message}}</div>
                          @enderror
                       </div>
                        <div class="mb-3">
                           <label class="form-control-label">Order Number</label>
                           <input type="text" name="order_num" value="{{$data->order_id}}" class="form-control" required>
                           @error('order_num')
                            <div class="text-danger">{{'The order number field is required.'}}</div>
                           @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-control-label">Question Status <span
                                    class="tx-danger">*</span></label>
                            <select name="status" class="form-control" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
              </form>
          </div><!-- card-body -->
      </div>
    </div>
  </div>

@endsection
