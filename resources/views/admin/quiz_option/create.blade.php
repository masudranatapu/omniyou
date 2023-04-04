@extends('admin.layouts.app')
@section('title', 'Quiz - Option Create')
@section('qus_active') active @endsection
@section('quiz_option_create') active @endsection
@section('content')
    <div class="card mb-4">
        <div class="row">
            <div class="col-6">
                <div class="card-header page_title">
                    <h3>Quiz Option Create</h3>
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
                    <h6>Quiz Option Create</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('quizOptions.store', $id) }}" method="post">
                        @csrf

                        <input type="hidden" name="quiz_id" value="{{ $id }}">
                        <div class="row d-flex justify-content-center">
                            @if (count($allOption) != 0)
                                <div class="col-lg-6">
                                    @foreach ($allOption as $key => $value)
                                        <input type="hidden" name="id" value="{{ $value->id }}">
                                        <div class="mb-3">
                                            <label class="form-control-label">Option {{ $key + 1 }} <span
                                                    class="tx-danger">*</span></label>
                                            <input type="text" name="answer_option[]" class="form-control"
                                                placeholder="Enter answer option {{ $key + 1 }}"
                                                value="{{ $value->answer_option }}">
                                            @error('question')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endforeach
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            @else
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-control-label">Option 1 <span class="tx-danger">*</span></label>
                                        <input type="text" name="answer_option[]" class="form-control"
                                            placeholder="Enter answer option 1" required>
                                        @error('question')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-control-label">Option 2 <span class="tx-danger">*</span></label>
                                        <input type="text" name="answer_option[]" class="form-control"
                                            placeholder="Enter answer option 2" required>
                                        @error('question')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-control-label">Option 3 <span class="tx-danger">*</span></label>
                                        <input type="text" name="answer_option[]" class="form-control"
                                            placeholder="Enter answer option 3" required>
                                        @error('question')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-control-label">Option 4 <span class="tx-danger">*</span></label>
                                        <input type="text" name="answer_option[]" class="form-control"
                                            placeholder="Enter answer option 4" required>
                                        @error('question')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- <div class="mb-3">
                                    <label class="form-control-label">Order Number <span class="tx-danger">*</span></label>
                                    <input type="text" name="order" class="form-control" placeholder="Enter order number">
                                  </div> -->
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            @endif
                        </div>
                    </form>
                </div><!-- card-body -->
            </div>
        </div>
    </div>

@endsection
