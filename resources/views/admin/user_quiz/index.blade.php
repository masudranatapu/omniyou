@extends('admin.layouts.app')
@section('title', 'Quiz - Assessment List')

@php
$status_arr = [
    0 => 'Inactive',
    1 => 'Waiting for start',
    2 => 'Running',
    3 => 'Complete',
    4 => 'Closed'
    ];
@endphp

@section('content')
 {{-- <div class="card mb-4">
    <div class="row">
          <div class="col-6">
              <div class="card-header page_title">
                  <h3>Assessment List</h3>
              </div>
          </div>
    </div>
</div> --}}
  <div class="row">
    <div class="col-12">
       <div class="card">
          <div class="card-header">
              <h6>Assessment List</h6>
              <select  name="running_survey_id" class="form-control">
                <option value="">Select any one</option>
                @foreach ($survey as $item)
                        <option value="{{ $item->id }}" {{ request()->get('survey_id') == $item->id ? 'selected' : '' }} >
                            {{ $item->name }}
                        </option>
                @endforeach
            </select>
          </div>
           <div class="card-body">
              <div class="table-wrapper">
                <table id="datatable1" class="table responsive">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Survey</th>
                      <th>Worker</th>
                      <th>Client</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if (isset($clients_survey) && count($clients_survey) > 0)
                      @foreach ($clients_survey as $key => $item )
                       <tr>
                           <td>{{ $key+1 }}</td>
                           <td>
                               <strong>{{ $item->survey_name }}</strong>
                               <p class="m-0"><i>Date: {{ date('d M Y',strtotime($item->survey_date)) }}</i></p>
                               <p class="m-0"><i>Total Question: {{ count(json_decode($item->question_ids)) }}</i></p>
                            </td>
                           <td>{{ $item->worker_name }}</td>
                           <td>{{ $item->client_name }}</td>
                           <td>
                               {{ $status_arr[$item->status] ?? '' }}
                            </td>
                           <td class="text-center">
                               <a href="{{ route('quiz.view',$item->id) }}" class="btn btn-sm btn-primary">View</a>
                           </td>

                       </tr>

                      @endforeach

                      @endif


                  </tbody>
              </table>
            </div><!-- table-wrapper -->
           </div>
      </div>
    </div>
  </div>

@endsection
