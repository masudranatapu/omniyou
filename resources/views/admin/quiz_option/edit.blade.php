@extends('admin.layouts.app')
@section('title', 'Quiz - Option Edit')
@section('qus_active') active @endsection
@section('quiz_option_edit') active @endsection
@section('content')
    <div class="card mb-4">
        <div class="row">
            <div class="col-6">
                <div class="card-header page_title">
                    <h3>Quiz Option Edit</h3>
                </div>
            </div>
            <div class="col-6">
                <div class="float-right p-2">
                    <a href="{{ route('quiz_option.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6>Quiz Option Edit</h6>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-control-label">Question <span class="tx-danger">*</span></label>
                                    <select name="question" class="form-control">
                                        <option value="" class="d-none">Select Question</option>
                                        @foreach ($question as $row)
                                            <option value="{{ $row->id }}">{{ $row->question }}</option>
                                        @endforeach
                                    </select>
                                    @error('question')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-control-label">Option <span class="tx-danger">*</span></label>
                                    <select name="option" class="form-control">
                                        <option value="" class="d-none">Select Option</option>
                                        <option value="1">1</option>
                                        <option value="1">1</option>
                                        <option value="1">1</option>
                                    </select>
                                    @error('option')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-control-label">Order Number <span class="tx-danger">*</span></label>
                                    <input type="text" name="order" class="form-control"
                                        placeholder="Enter order number">
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
