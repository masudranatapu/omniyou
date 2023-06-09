@extends('admin.layouts.app')
@section('title', 'Quiz - Quiz View')
@section('content')
 <div class="card mb-4">
    <div class="row">
          <div class="col-6">
              <div class="card-header page_title">
                  <h3>Quiz View</h3>
              </div>
          </div>
          <div class="col-6">
              <div class="float-right p-2">
                  <a href="{{route('quiz.index')}}" class="btn btn-primary">Back</a>
              </div>
          </div>
    </div>
</div>
 <div class="row mb-3">
    <div class="col-12">
       <div class="card">
          <div class="card-header">
            <h6>User</h6>
          </div>
          <div class="card-body">
               <table class="table">
                  {{-- <img src="http://localhost/quiz/public/backend/img/profile/1650247914.jpg" class="wd-60 mb-3 rounded" alt=""> --}}
                  <tr>
                      <td>Name:</td>
                      <td>{{$interview_user->name}}</td>
                  </tr>
                  <tr>
                      <td>Email:</td>
                      <td>{{$interview_user->email}}</td>
                  </tr>
               </table>
          </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
       <div class="card">
          <div class="card-header">
            <h6>Quiz View</h6>
          </div>
          <div class="card-body">
              <div class="row">
                  @foreach ($ans_questions as $item)
                  <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Type: B</h5>
                         </div>
                         <div class="card-body">
                              <div class="mb-3">
                                 <input type="text" name="" class="form-control" value="{{$item->question->question ?? ''}}" readonly>
                              </div>
                              <div class="mb-3">
                                <textarea name="" id="" cols="30" rows="5" class="form-control" readonly>{{$item->answer}}</textarea>
                              </div>
                         </div>
                    </div>
                </div>
                  @endforeach

              </div>
          </div><!-- card-body -->
      </div>
    </div>
  </div>

@endsection
