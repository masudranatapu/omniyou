@extends('layouts.app')
@section('content')
    <div class="row d-flex justify-content-center">
        <img src="{{ asset('img/logo.png') }}" alt="logo" style="width: 200px">
        <h2 class="index_heading">Welcome to HAI ENGLISH</h2>
        <div class="col-md-10">
            @php
                $interview_user = App\InterviewUser::where('id', Session::get('interview_user_id'))->first();
                // dd($interview_user);
            @endphp
            <h4 class="card-header">Edit Profile</h4>
            <div class="box_wrapper first_step mb-5">
                <form method="POST" action="{{ route('student.profile.update') }}">
                    @csrf
                    <div class="mb-3">
                        <table class="table">
                            <tr>
                                <td style="width: 10%">
                                    <h4 class="card-title">Courses:</h4>
                                </td>
                                <td style="width: 90%">
                                    @foreach ($courses as $course)
                                        <div class="badge bg-success" style="padding-bottom: 6px">
                                            {{ $course->name }}
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Student Full Name</label>
                        <input type="name" class="form-control" name="name" id="name"
                            value="{{ Auth::user()->name }}" placeholder="Your Name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email"
                            value="{{ Auth::user()->email }}">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group form-check mb-3">
                        <input type="checkbox" name="pass_change" class="form-check-input" value="1" id="pass_change">
                        <label class="form-check-label" for="pass_change">Change Password</label>
                    </div>
                    <div class="pass_change_form d-none">
                        <div class="mb-3">
                            <label class="form-control-label">Old Password: <span class="tx-danger">*</span></label>
                            <input type="password" name="old_password"
                                class="form-control @error('old_password')is-invalid @enderror"
                                placeholder="Enter old password">
                            @error('old_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-control-label">New Password: <span class="tx-danger">*</span></label>
                            <input type="password" name="new_password"
                                class="form-control @error('new_password')is-invalid @enderror"
                                placeholder="Enter new password ">
                            @error('new_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-control-label">Confirm Password: <span class="tx-danger">*</span></label>
                            <input type="password" name="password_confirmation"
                                class="form-control @error('password_confirmation')is-invalid @enderror"
                                placeholder="Re-type your new password">
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.select').select2();
        });
    </script>
    <script>
        // $(document).on('click', '#pass_change', function(){
        //     var lfckv = document.getElementById("pass_change").checked;
        //     alert(lfckv);
        // })
        $('#pass_change').click(function() {
            if ($(this).is(':checked')) {
                // alert(10)
                $('.pass_change_form').removeClass('d-none')
            } else {
                $('.pass_change_form').addClass('d-none')
            }
        });
    </script>
@endsection
