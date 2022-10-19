@extends('admin.layouts.app')
@section('title', 'Survey Edit')
@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@endsection
@section('content')
    <div class="card mb-4">
        <div class="row">
            <div class="col-6">
                <div class="card-header page_title">
                    <h3>Survey Edit</h3>
                </div>
            </div>
            <div class="col-6">
                <div class="float-right p-2">
                    <a href="{{ route('admin.survey.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6>Survey Edit</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.survey.update', $survey->id) }}" method="post">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-control-label">Survey Name <span class="tx-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ $survey->name }}"
                                        placeholder="Enter survey name">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-control-label">Survey Date </label>
                                    <input type="text" name="date" class="form-control" id="datepicker"
                                        value="{{ date_format(date_create($survey->date), 'Y-m-d') }}" placeholder="YYYY-MM-DD">
                                    @error('date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-control-label">survey Status <span class="tx-danger">*</span></label>
                                    <select name="status" class="form-control" required>
                                        <option value="1" {{ $survey->status == 1 ? 'selected':'' }}>Active</option>
                                        <option value="0" {{ $survey->status == 0 ? 'selected':'' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <h6 class="mb-3">Select Questions <span class="text-danger">*</span></h6>
                                    @error('question_ids')
                                        <div class="text-danger">Please select questions</div>
                                    @enderror
                                    <div class="row">
                                        @foreach ($questions as $item)
                                            <div class="col-md-6">
                                                <label class="brick tile-picker">
                                                    <input type="checkbox" name="question_ids[]"
                                                        value="{{ $item->id }}" {{ in_array($item->id, json_decode($survey->question_ids)) ? 'checked': '' }} >
                                                    {{ $item->question }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
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
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
@endsection
