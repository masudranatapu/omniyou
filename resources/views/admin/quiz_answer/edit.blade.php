@extends('admin.layouts.app')
@section('title', 'Quiz - Answer Edit')
@section('qus_active') active @endsection
@section('quiz_edit') active @endsection
@section('content')
    <div class="card mb-4">
        <div class="row">
            <div class="col-6">
                <div class="card-header page_title">
                    <h3>Quiz Answer Edit</h3>
                </div>
            </div>
            <div class="col-6">
                <div class="float-right p-2">
                    <a href="{{ route('quiz_ans.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6>Quiz Answer Edit</h6>
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
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
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
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    @error('option')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-control-label">Answer <span class="tx-danger">*</span></label>
                                    <textarea name="answer" class="form-control" rows="5"></textarea>
                                    @error('answer')
                                        <div class="text-danger">{{ $message }}</div>
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
