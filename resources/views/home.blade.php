@extends('layouts.app')

@php

    $setting = settings();

@endphp

@section('content')
    <div class="row d-flex justify-content-center pt-5">
        @if (!empty($setting->application_logo))
            <img src="{{ asset($setting->application_logo) }}" style="width: 200px;" alt="Logo">
        @else
            <img src="{{ asset('img/logo.png') }}" style="width: 200px;" alt="">
        @endif

        <h2 class="index_heading">Welcome to {{ settings()->site_name }}</h2>
        <div class="col-md-7 col-xl-5">

            <div class="box_wrapper first_step mb-5">
                @auth
                    <form action="{{ route('start-quiz') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Courses</label>
                            <select name="course_id" id="course_id" class="form-control select">
                                <option value="">Choose Course</option>
                                @if (isset($courses))
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mt-5 text-center">
                            <button type="submit" class="btn start btn-primary">Start Interview</button>
                        </div>
                    </form>
                @else
                    <form method="POST" action="{{ route('login.admin') }}">
                        @csrf
                        <div class="">
                            <div class="form-group mb-3 ">
                                <label class="form-label" for="email" class="">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required placeholder="Enter your email address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3 ">
                                <label class="form-label" for="password" class="">{{ __('Password') }}</label>

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password" placeholder="Enter your password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        {{-- @if (Route::has('password.request'))
                            <a class="text-center d-block mt-3" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}
                    </form>
                @endauth

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
@endsection
