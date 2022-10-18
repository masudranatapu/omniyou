<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="Rabin">
    <title>Admin - Login</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
    <!-- Vendor css -->
    <link href="{{asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- main CSS -->
    <link rel="stylesheet" href="{{asset('css/shamcey.css')}}">
</head>


<body class="bg-gray-900">
    <div class="signpanel-wrapper">
        <div class="signbox">
            <div class="signbox-header">
                <h2>Quiz</h2>
            </div>

            <div class="signbox-body">
              <form action="{{route('login.admin')}}" method="post">
                @csrf
                  <div class="form-group">
                      <label class="form-control-label">Email:</label>
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email">
                      @error('email')
                        <div class="text-danger">{{$message}}</div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label class="form-control-label">Password:</label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">
                      @error('password')
                        <div class="text-danger">{{$message}}</div>
                      @enderror
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Login</button>
              </form>
            </div>
        </div><!-- signbox -->
    </div><!-- signpanel-wrapper -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
</body>

</html>
