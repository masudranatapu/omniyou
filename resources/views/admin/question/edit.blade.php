@extends('admin.layouts.app')
@section('title', 'Quiz - Question Edit')

@section('qus_active') active @endsection

@section('question_edit') active @endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>Question Edit</h3>
                        </div>
                        <div class="col-6">
                            <div class="float-right p-2">
                                <a href="{{ route('question.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('question.update', $data->id) }}" method="post">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-control-label">Question <span class="tx-danger">*</span></label>
                                    <input type="text" name="question" value="{{ $data->question }}" class="form-control"
                                        required>
                                    @error('question')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-control-label">Question Type <span class="tx-danger">*</span></label>
                                    <select name="question_type" class="form-control" required>
                                        <option value="" class="d-none">Select Question Type</option>
                                        <option value="1" @if ($data->question_type == 1) selected @endif>Multiple
                                            choose, Answer single</option>
                                        {{-- <option value="2" @if ($data->question_type == 2) selected @endif>2</option> --}}
                                        <option value="2" @if ($data->question_type == 2) selected @endif>Free
                                            writing answer</option>
                                    </select>
                                    @error('question_type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- @if ($data->question_type == 1)
                                    <div class="mb-3">
                                        <label class="form-control-label">Choose Answer <span
                                                class="tx-danger">*</span></label>
                                        <select name="question_option_id" class="form-control" required>
                                            <option value="" selected disabled>Select Answer</option>
                                            @foreach ($option as $item)
                                                @if (!empty($answer->option_no))
                                                    <option value="{{ $item->id }}"
                                                        @if ($item->id == $answer->option_no) selected @endif>
                                                        {{ $loop->iteration }}.{{ $item->answer_option }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">
                                                        {{ $loop->iteration }}.{{ $item->answer_option }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('question_type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @elseif($data->question_type == 2)
                                    <label class="form-control-label">Answer <span class="tx-danger">*</span></label>
                                    <input type="text" name="question_answer" value="{{ $answer->answer ?? '' }}"
                                        class="form-control" required>
                                    @error('question')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                @endif --}}
                                <div class="mb-3">
                                    <label class="form-control-label">Order Number</label>
                                    <input type="text" name="order_num" value="{{ $data->order_id }}"
                                        class="form-control" required>
                                    @error('order_num')
                                        <div class="text-danger">{{ 'The order number field is required.' }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-control-label">Question Status <span
                                            class="tx-danger">*</span></label>
                                    <select name="status" class="form-control" required>
                                        <option value="1" {{ $data->status == 1 ? 'selected':'' }} >Active</option>
                                        <option value="0" {{ $data->status == 0 ? 'selected':'' }} >Inactive</option>
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
