@extends('layouts.app')
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-xl-9">
        <div class="box_wrapper question_ans">
            <form action="#" method="post">
                <div class="timer_seconds">
                    <div class="float-end timer_count text-center">
                        <h5 id="timer"></h5>
                        <span>Timer Seconds</span>
                    </div>
                    <span id="timer_end"></span>
                </div>                <div class="mb-4">
                    <h4>What is Lorem Ipsum?</h4>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="ans1">
                            <label class="form-check-label" for="ans1">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="ans2">
                            <label class="form-check-label" for="ans2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="ans3">
                            <label class="form-check-label" for="ans3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="ans4">
                            <label class="form-check-label" for="ans4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</label>
                        </div>
                    </div>
                </div>
            </form>
            <div class="mt-5 text-center">
                <a href="{{route('quiz.step.seven')}}" class="btn btn-primary">Next</a>
            </div>
        </div>
    </div>
</div>
@endsection