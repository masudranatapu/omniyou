@extends('layouts.app')
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-xl-9">
        <div class="box_wrapper question_ans">
            <form action="#" method="post">
                <div class="timer_seconds">
                    <div class="float-end text-center">
                        <span>No Timer</span>
                    </div>
                </div>
                <div class="mb-4">
                    <h4><strong>Question:</strong> What is Lorem Ipsum?</h4>
                </div>
                <div class="mb-2">
                    <textarea name="" id="" cols="30" class="form-control" rows="10" placeholder="Type your thoughts"></textarea>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary float-end ms-2">Answer Skip</button>
                     <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection