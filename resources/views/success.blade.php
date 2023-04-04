@extends('layouts.app')
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-xl-7">
            <div class="box_wrapper success_page">
                <div class="text-center">
                    <p>Total Question : {{ $question }}<br />
                    <p>Right Answer : {{ $correct_ans }}<br />
                    <p>Wrong Answer : {{ $question - $correct_ans }}</p>
                    <p>You've Passed the interview! You Got Marks: {{ $marks }}% <br />
                        Thanks to being with HAI ENGLISH :)
                    </p>

                </div>
                <div class="mt-5 text-center">
                    <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection
