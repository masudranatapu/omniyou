@extends('admin.layouts.app')

@section('title', 'Quiz - worker Edit')

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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>Worker Edit</h3>
                        </div>
                        <div class="col-6">
                            <div class="float-right">
                                <a href="{{ route('admin.worker.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.worker.update', $worker->id) }}" method="post">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-control-label">Worker Name <span class="tx-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ $worker->name }}"
                                        placeholder="Enter worker name">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-control-label">Worker Email <span class="tx-danger">*</span></label>
                                    <input type="text" name="email" class="form-control" value="{{ $worker->email }}"
                                        placeholder="Enter worker email">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-control-label">Active Survey <span class="tx-danger">*</span></label>
                                    <select name="running_survey_id" class="form-control">
                                        <option value="">Select any one</option>
                                        @foreach ($survey as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $worker->running_survey_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('running_survey_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="mb-3">
                                    <label class="form-control-label">Client</label>
                                    <select id="multiple_checkboxes" name="assign_client[]" class="form-select" multiple>
                                        @foreach ($clients as $item)
                                            <option value="{{ $item->id }}"
                                                {{ in_array($item->id, $old_client) ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('assign_client')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> --}}
                                <div class="mb-3">
                                    <label class="form-control-label">worker Status <span class="tx-danger">*</span></label>
                                    <select name="status" class="form-control" required>
                                        <option value="1" {{ $worker->status == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $worker->status == 0 ? 'selected' : '' }}>Inactive
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
                </div>
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
