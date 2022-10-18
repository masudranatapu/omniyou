@extends('admin.layouts.app')
@section('title', 'Quiz - Options List')
@section('qus_active') active @endsection
@section('content')
 <div class="card mb-4">
    <div class="row">
          <div class="col-6">
              <div class="card-header page_title">
                  <h3>Quiz Options List</h3>
              </div>
          </div>
          <div class="col-6">
              <div class="float-right p-2">
                  <a href="{{route('quiz_option.create')}}" class="btn btn-primary">Add Quiz Option</a>
              </div>
          </div>
    </div>
</div>
  <div class="row">
    <div class="col-12">
       <div class="card">
          <div class="card-header">
              <h6>Quiz Options List</h6>
          </div>
           <div class="card-body">
              <div class="table-wrapper">
                <table id="datatable1" class="table responsive">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Question</th>
                      <th>Answer Option</th>
                      <th>Order Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                 	@foreach($data as $key=>$row)
                      <tr>
                          <td>{{ ++$key }}</td>
                          <td>{{ $row->question }} </td>
                          <td>{{ $row->answer_option }} </td>
                          <td>{{ $row->order_id }} </td>
                          <td class="text-center">
                              <a href="{{route('quiz_option.edit')}}" class="btn btn-primary btn-icon"><div><i class="fa fa-pencil"></i></div></a>
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