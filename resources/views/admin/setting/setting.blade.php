@extends('admin.layouts.app')

@section('title')
    {{ $title ?? '' }}
@endsection

@section('meta')

@endsection

@section('css')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header pt-5">
                <h4>@lang('Settings')</h4>
            </div>
<div class="card-body">
    <form action="{{route('admin.web.setting.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
         <div class="row">
            <div class="col-md-6 mb-3">
                <div class="mb-1">
                    @if(!empty($setting->application_logo))
                        <img src="{{asset($setting->application_logo) }}" width="100" alt="Logo">
                    @else
                        <img src="{{asset('media/default.jpg')}}" width="100" alt="">
                    @endif

                </div>
               <label class="form-label">Site Logo</label>
               <input type="file" name="application_logo" id="application_logo" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <div class="mb-1">
                    @if(!empty($setting->favicon))
                  <img src="{{asset($setting->favicon) }}" width="100" alt="Favicon">
                         @else
                         <img src="{{asset('media/default.jpg')}}" width="100" alt="">
                         @endif



                </div>
               <label class="form-label">Favicon</label>
               <input type="file" name="favicon" id="favicon" class="form-control">
            </div>

                <div class="col-md-6 mb-3">
                    <div class="mb-1">
                       @if(!empty($setting->og_logo))
                     <img src="{{asset($setting->og_logo) }}" width="100" alt="Favicon">
                            @else
                            <img src="{{asset('media/default.jpg')}}" width="80px" alt="">
                            @endif



                    </div>
                   <label class="form-label">Omg Image</label>
                   <input type="file" name="og_logo" id="og_logo" class="form-control">
                </div>


         </div>
         <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">App Name</label>
                <input type="textd" name="site_name" id="site_name" class="form-control" value="{{$setting->site_name}}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Address</label>
                <input type="textd" name="address" id="address" class="form-control" value="{{$setting->address}}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Meta Title</label>
                <input type="textd" name="meta_title" id="meta_title" class="form-control" value="{{$setting->meta_title}}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Meta Keywords</label>
                <input type="textd" name="meta_keyword" id="meta_keyword" class="form-control" value="{{$setting->meta_keyword}}">
            </div>
            <div class="col-12 mb-3">
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description"  cols="30" rows="10" class="form-control">{{$setting->meta_description}}</textarea>

            </div>
            {{-- <div class="col-md-6 mb-3">
                <label class="form-label">Terms & Condtions</label>
                <textarea name="terms_service"  cols="30" rows="10" class="form-control summernote" >
                  {{$setting->terms_service}}
                </textarea>
            </div> --}}
            {{-- <div class="col-md-6 mb-3">
                <label class="form-label">Privacy Policy</label>
                <textarea name="privacy_policy"  cols="30" rows="10" class="form-control summernote" >
                    {{$setting->privacy_policy}}
                </textarea>
            </div> --}}


            <div class="col-6">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
         </div>
    </form>
</div>
        </div>
    </div>
    </div>


@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
  $('.summernote').summernote({

    tabsize: 2,
    height: 100
  });
</script>


@endsection
