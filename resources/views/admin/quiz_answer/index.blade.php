@extends('admin.layouts.app')
@section('title', 'Quiz - Answer List')
@section('qus_active') active @endsection
@section('content')
 <div class="card mb-4">
    <div class="row">
          <div class="col-6">
              <div class="card-header page_title">
                  <h3>Quiz Answer List</h3>
              </div>
          </div>
          <div class="col-6">
              <div class="float-right p-2">
                  <a href="{{route('quiz_ans.create')}}" class="btn btn-primary">Add Quiz Answer</a>
              </div>
          </div>
    </div>
</div>
  <div class="row">
    <div class="col-12">
       <div class="card">
          <div class="card-header">
              <h6>Quiz Answer List</h6>
          </div>
           <div class="card-body">
              <div class="table-wrapper">
                <table id="datatable1" class="table responsive">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Question</th>
                      <th>Option</th>
                      <th>Answer</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                 	@foreach($data as $key=>$row)
                      <tr>
                          <td>{{ ++$key }}</td>
                          <td>{{ $row->question }} </td>
                          <td>{{ Str::limit($row->answer_option, 35) }} </td>
                          <td>{{ Str::limit($row->answer, 35) }} </td>
                          <td class="text-center">
                              <a href="{{route('quiz_ans.edit')}}" class="btn btn-primary btn-icon"><div><i class="fa fa-pencil"></i></div></a>
                              <a href="" class="btn btn-danger btn-icon" id="delete"><div><i class="fa fa-trash"></i></div></a>
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