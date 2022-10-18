@extends('admin.layouts.app')
@section('title', 'Quiz - Student Edit')
@section('css')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <style>
        .btn-group ul {
            left: 38% !important;
        }
    </style>
@endsection
@section('content')
    <div class="card mb-4">
        <div class="row">
            <div class="col-6">
                <div class="card-header page_title">
                    <h3>Student Edit</h3>
                </div>
            </div>
            <div class="col-6">
                <div class="float-right p-2">
                    <a href="{{ route('admin.student.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6>Student Edit</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.student.update', $student->id) }}" method="post">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-control-label">Student Name <span class="tx-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ $student->name }}"
                                        placeholder="Enter student name">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-control-label">Student Email <span class="tx-danger">*</span></label>
                                    <input type="text" name="email" class="form-control" value="{{ $student->email }}"
                                        placeholder="Enter student email">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-control-label">Course</label>
                                    {{-- <input type="text" name="course_id" class="form-control" value="{{ $student->course_id }}" placeholder="Enter Course"> --}}
                                    <select id="multiple_checkboxes" name="course_id[]" class="form-select" multiple>
                                        @foreach ($courses as $item)
                                            @php
                                                $qsn = DB::table('quiz_questions')
                                                    ->where('course_id', $item->id)
                                                    ->first();
                                                if ($qsn) {
                                                    $ans = DB::table('quiz_answers')
                                                        ->where('question_no', $qsn->id)
                                                        ->first();
                                                }
                                            @endphp
                                            @if (isset($qsn) && isset($ans))
                                                <option value="{{ $item->id }}"
                                                    @isset($student->course_id)
                                                    {{ in_array($item->id, json_decode($student->course_id)) ? 'selected' : '' }}
                                                @endisset>
                                                    {{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                        <div class="text-danger">{{ 'The order number field is required.' }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-control-label">Student Status <span
                                            class="tx-danger">*</span></label>
                                    <select name="status" class="form-control" required>
                                        <option value="1" {{ $student->status == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $student->status == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                    @error('status')
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
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <script>
        $(document).ready(function() {
            $('#multiple_checkboxes').multiselect({
                includeSelectAllOption: true,
                buttonWidth: '100%',
            });
        });
    </script>
@endsection
