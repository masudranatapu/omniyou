@extends('admin.layouts.app')
@section('title', 'Quiz - Quiz List')
@section('content')
 <div class="card mb-4">
    <div class="row">
          <div class="col-6">
              <div class="card-header page_title">
                  <h3>Quiz List</h3>
              </div>
          </div>
    </div>
</div>
  <div class="row">
    <div class="col-12">
       <div class="card">
          <div class="card-header">
              <h6>Quiz List</h6>
          </div>
           <div class="card-body">
              <div class="table-wrapper">
                <table id="datatable1" class="table responsive">
                  <thead>
                    <tr>
                      <th>SL</th>
                      {{-- <th>Image</th> --}}
                      <th>Name</th>
                      <th>Eamil</th>
                      <th>Course</th>
                      <th>Marks</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($interview_user as $item)
                    @php
                      $ans = App\UserCorrectAns::where('interview_user_id',$item->id)->count();
                      $course = DB::table('courses')->where('id', $item->course_id)->first();
                    @endphp
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      {{-- <td><img src="http://localhost/quiz/public/backend/img/profile/1650247914.jpg" class="wd-60 rounded" alt=""></td> --}}
                      <td>{{$item->name}}</td>
                      <td>{{$item->email}}</td>
                      <td>
                        {{ $course->name }}
                      </td>
                      <td>{{$item->marks ?? 0}} %</td>
                      <td>@if($item->status== 1) <span style="color: green">Passed</span> @else <span style="color: red">Failed</span> @endif </td>
                      <td>{{$item->created_at}}</td>
                      <td class="text-center">
                          {{-- <a href="{{route('quiz.view',$item->id)}}" class="btn btn-primary btn-icon"><div><i class="fa fa-eye"></i></div></a> --}}
                          <a href="{{route('quiz.destroy',$item->id)}}" class="btn btn-danger btn-icon" id="delete"><div><i class="fa fa-trash"></i></div></a>
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
