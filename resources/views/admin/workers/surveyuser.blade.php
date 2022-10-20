@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('select2/css/select2.css')}}">
@endsection

@section('title', 'Assigned User')

@section('content')
    @php
        $servey = DB::table('survey')->where('id', $workers->running_survey_id)->first();
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>Assigned User  for Workers</h3>
                        </div>
                        <div class="col-6">
                            <div class="float-right p-2">
                                <a href="{{ route('admin.worker.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.worker.assignedclient') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-control-label">Worker Name</label>
                                    <input type="text" readonly value="{{$workers->name}}" class="form-control">
                                    <input type="hidden" value="{{$workers->id}}" name="worker_id">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-control-label">Servey Name</label>
                                    <input type="text" readonly value="{{$servey->name}}" class="form-control">
                                    <input type="hidden" value="{{$servey->id}}" name="survey_id">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-control-label">Select Client</label>
                                    <select name="client_id[]" class="form-control select2 js-example-placeholder-single js-states" multiple>
                                        @foreach($clients as $client)
                                            <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center">
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
    <script src="{{asset('select2/js/select2.js')}}"></script>
    <script>
        $('.select2').select2({
            placeholder: "Select Client",
            allowClear: true
        });
    </script>
@endsection
