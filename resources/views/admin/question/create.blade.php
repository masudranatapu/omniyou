@extends('admin.layouts.app')
@section('title', 'Quiz - Question Create')
@section('qus_active') active @endsection
@section('question_cr') active @endsection
@section('content')
    <div class="card mb-4">
        <div class="row">
            <div class="col-6">
                <div class="card-header page_title">
                    <h3>Question Create</h3>
                </div>
            </div>
            <div class="col-6">
                <div class="float-right p-2">
                    <a href="{{ route('question.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6>Question Create</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('question.store') }}" method="post">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-control-label">Question <span class="tx-danger">*</span></label>
                                    <input type="text" name="question" class="form-control" placeholder="Enter question">
                                    @error('question')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-control-label">Course<span class="tx-danger">*</span></label>
                                    <select name="course_id" class="form-control" required>
                                        <option value="" selected disabled>Select Course</option>
                                        @foreach ($courses as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-control-label">Order Number</label>
                                    <input type="text" name="order_num" class="form-control"
                                        placeholder="Enter order number">
                                    @error('order_num')
                                        <div class="text-danger">{{ 'The order number field is required.' }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="mb-3">
                                    <label class="form-control-label">Question Status <span
                                            class="tx-danger">*</span></label>
                                    <select name="status" class="form-control" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> --}}
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div><!-- card-body -->
            </div>
        </div>
    </div>

@endsection
