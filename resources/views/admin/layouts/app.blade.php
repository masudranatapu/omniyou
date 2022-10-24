<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Vendor css -->
    <link href="{{asset('lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('css/sweetalert2.min.css')}}" rel="stylesheet">
    <link href="{{asset('backlib/perfect-scrollbar/css/perfect-scrollbar.cssend')}}" rel="stylesheet">

    <!-- Shamcey CSS -->
    <link rel="stylesheet" href="{{asset('css/shamcey.css')}}">
    <style>
      .card-header.page_title h3 {
          margin: 0;
          font-size: 22px;
          color: #555;
      }
      .card-header h6 {
          color: #555;
      }
      #datatable1_wrapper select {
        border: 1px solid #ddd;
        padding: 5px 8px;
        margin-right: 4px;
        border-radius: 3px;
    }
     td {
          border: 1px solid #f4f4f4;
          vertical-align: middle !important;
          padding: 10px 10px 10px 10px !important;
      }
      th {
        border: 1px solid #ddd;
    }
    .shortcut-icon i {
        line-height: 0;
        font-size: 56px;
        margin-bottom: 7px !important;
        display: block;
    }
    </style>
    @yield('css')
  </head>

  <body>

    <div class="sh-logopanel">
      <a href="{{route('admin.dashboard')}}" class="sh-logo-text">{{ settings()->site_name ?? '' }}</a>
      <a id="navicon" href="" class="sh-navicon d-none d-xl-block"><i class="icon ion-navicon"></i></a>
      <a id="naviconMobile" href="" class="sh-navicon d-xl-none"><i class="icon ion-navicon"></i></a>
    </div><!-- sh-logopanel -->

    <div class="sh-sideleft-menu">
      <ul class="nav">
          @include('admin.layouts.sidebar')
      </ul>
    </div><!-- sh-sideleft-menu -->

    <div class="sh-headpanel">
      <div class="sh-headpanel-left">

        <!-- START: DISPLAYED IN MOBILE ONLY -->
        <div class="dropdown dropdown-app-list">
          <a href="" data-toggle="dropdown" class="dropdown-link">
            <i class="icon ion-ios-keypad tx-18"></i>
          </a>
          <div class="dropdown-menu">

          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
        <!-- END: DISPLAYED IN MOBILE ONLY -->

      </div><!-- sh-headpanel-left -->

      <div class="sh-headpanel-right">

        <div class="dropdown dropdown-profile">
          <a href="" data-toggle="dropdown" class="dropdown-link">
            <img src="{{asset( Auth::user()->image ?? 'backend/img/profile/default.jpg')}}" class="wd-60 rounded-circle" alt="{{ Auth::user()->name }}">
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="media align-items-center">
              <img src="{{asset( Auth::user()->image ?? 'backend/img/profile/default.jpg')}}" class="wd-60 ht-60 rounded-circle bd pd-5" alt="">
              <div class="media-body">
                <h6 class="tx-inverse tx-15 mg-b-5">{{Auth::user()->name}}</h6>
                <p class="mg-b-0 tx-12">{{Auth::user()->email}}</p>
              </div><!-- media-body -->
            </div><!-- media -->
            <hr>
            <ul class="dropdown-profile-nav">
              <li><a href="{{route('admin.profile')}}"><i class="icon ion-ios-person"></i> Edit Profile</a></li>
              <li><a href="javascript:void(0)" onclick="$('#logout-form').submit();"><i class="icon ion-power"></i> Logout</a></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	               @csrf
	          </form>
            </ul>
          </div><!-- dropdown-menu -->
        </div>
      </div><!-- sh-headpanel-right -->
    </div><!-- sh-headpanel -->

    <div class="sh-mainpanel">
      <div class="sh-pagebody">
          @yield('content')
      </div><!-- sh-pagebody -->
    </div><!-- sh-mainpanel -->

    <script src="{{asset('lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('js/sweetalert2.min.js')}}"></script>
    <script src="{{asset('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('lib/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('js/shamcey.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

      <script>
        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });
      </script>
      <!-- Toastr -->
        <script>
             @if(Session::has('message'))
             var type = "{{ Session::get('alert-type', 'info') }}"
             switch (type) {
               case 'info':
                 toastr.info(" {{Session::get('message')}} ");
                 break;

               case 'success':
                 toastr.success(" {{Session::get('message')}} ");
                 break;

               case 'warning':
                 toastr.warning(" {{Session::get('message')}} ");
                 break;

               case 'error':
                 toastr.error(" {{Session::get('message')}} ");
                 break;
             }
             @endif
     </script>
    <script>
     $(document).on("click", "#delete", function(e) {
       e.preventDefault();
       var link = $(this).attr("href");
       swal({
           title: "Are you want to delete?",
           text: "Once Delete, This will be Permanently Delete!",
           icon: "warning",
           buttons: true,
           dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
             window.location.href = link;
           }
         })
     })
   </script>
   @yield('js')
  </body>
</html>
