@extends('layouts.app')
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-8 col-xl-7">
        <div class="box_wrapper success_page">
            <div class="text-center">
                <p>Successfully Done</p>

            </div>
            <div class="mt-5 text-center">
                <a href="{{url('/')}}" class="btn btn-primary">Back to Home</a>
            </div>
        </div>
    </div>
</div>
@endsection
