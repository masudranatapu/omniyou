@extends('admin.layouts.app')

@section('css')

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
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-control-label">Worker Name</label>
                                <input type="text" readonly value="{{$workers->name}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-control-label">Servey Name</label>
                                <input type="text" readonly value="{{$servey->name}}" class="form-control">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Clients</h4>
                            @foreach($clients as $client)
                                <label for="cl_lbl_{{$client->id}}" class="pr-5" style="cursor: pointer" >
                                    <input type="checkbox"
                                    class="checkbox"
                                    name="client"
                                    id="cl_lbl_{{$client->id}}"
                                        @if(in_array($client->id,$client_survey)) checked @endif
                                    data-client_id="{{ $client->id }}"
                                    data-survey_id="{{$servey->id}}"
                                    data-worker_id="{{$workers->id}}"
                                        /> {{$client->name}}
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(".checkbox").change(function() {

            var client = $(this).data('client_id');
            var survey = $(this).data('survey_id');
            var worker = $(this).data('worker_id');

          if($(this).prop('checked')) {
            assignUnassign('checked',worker,survey,client);
          } else {
            assignUnassign('unchecked',worker,survey,client);
          }

        });

        function assignUnassign(check,worker,survey,client){
            // alert(check);
            // alert(worker);
            // alert(survey);
            // alert(client);

            $.ajax({
                url: "{{ route('admin.worker.assignedclient') }}",
                type:"POST",
                data:{
                    check:check,
                    worker:worker,
                    survey:survey,
                    client:client,
                    "_token": "{{ csrf_token() }}",
                },
                success:function(data){
                    console.log(data);

                    if(data.result == 1) {
                        toastr.success(data.success,'Success',{
                            closeButton:true,
                            progressBar:true,
                        });
                    }else {
                        toastr.warning(data.success,'info',{
                            closeButton:true,
                            progressBar:true,
                        });
                    }
                },
            });
        }
    </script>
@endsection
