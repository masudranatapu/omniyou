@extends('admin.layouts.app')
@section('title', 'Quiz - Questions List')
@section('qus_active') active @endsection
@section('content')
 <div class="card mb-4">
    <div class="row">
          <div class="col-6">
              <div class="card-header page_title">
                  <h3>Questions List</h3>
              </div>
          </div>
          <div class="col-6">
              <div class="float-right p-2">
                  <a href="{{route('question.create')}}" class="btn btn-primary">Add Question</a>
              </div>
          </div>
    </div>
</div>
  <div class="row">
    <div class="col-12">
       <div class="card">
          <div class="card-header">
              <h6>Questions List</h6>
          </div>
           <div class="card-body">
              <div class="table-wrapper">
                <table id="datatable1" class="table responsive">
                  <thead>
                    <tr>
                      <th width="5%">SL</th>
                      <th width="20%">Question</th>
                      <th width="5%">Course</th>
                      <th width="20%">Question Options</th>
                      <th width="20%">Answer</th>
                      <th width="10%">Order Number</th>
                      <th width="5%">Status</th>
                      <th width="5%">Options</th>
                      <th width="10%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                 @foreach($data as $key =>$row)
                      <tr>
                          <td>{{ ++$key }}</td>
                          <td>{{ $row->question }} </td>
                          <td>
                              {{ $row->course_name }}
                          </td>
                          <td>
                            @php
                              $option = App\QuizOption::where('question_no',$row->id)->get();
                            @endphp
                            @foreach ($option as $item)
                               {{$loop->iteration}}. <span>{{$item->answer_option}}</span><br />
                            @endforeach
                          </td>
                          <td>
                            @php
                              $answer = App\QuizAnswer::where('question_no',$row->id)->first();
                              // $ans_option_id = $answer->option_no;
                              // $answer_option = DB::table('quiz_options')->where('id',$ans_option_id)->first();
                            @endphp
                            <span>{{$answer->answer ?? ''}}</span>
                          </td>
                          <td>{{ $row->order_id }} </td>
                          <td>
                            @if($row->status == 1)
                              <span class="badge badge-success">Active</span>
                            @else
                               <span class="badge badge-danger">Inactive</span>
                            @endif
                          </td>
                          <td class="text-center">
                              <a href="{{ route('quizOptions.create', $row->id) }}" class="btn btn-primary btn-icon"><div><i class="fa fa-pencil"></i></div></a>
                          </td>
                          <td class="text-center">
                              <a href="{{route('question.edit', $row->id)}}" class="btn btn-primary btn-icon"><div><i class="fa fa-pencil"></i></div></a>
                              <a href="{{route('question.destroy', $row->id)}}" class="btn btn-danger btn-icon" id="delete"><div><i class="fa fa-trash"></i></div></a>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
            </div><!-- table-wrapper -->
           </div>
      </div>
    </div>
  </div>

@endsection
