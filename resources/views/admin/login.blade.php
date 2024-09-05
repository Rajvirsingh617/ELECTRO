<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">

  <!-- Custom CSS for background image -->
  <style>
    body.login-page {
      background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJ8uP4Cjo0w-fEPOzmC6KIeO7EPRatL0jjaA&s');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }
    .welcome-heading {
    font-weight: bold;
    font-size: 36px; /* Adjust the font size as needed */
    color: #333; /* Change the color to your desired value */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1); /* Adds a subtle shadow effect */
    font-family: 'Arial', sans-serif; /* Customize the font family */
    text-align: center; /* Center align the text */
    margin-top: 20px; /* Add some spacing at the top */
}

  </style>

</head>
<h1 style="font-weight: bold; font-size: 36px; color: #333; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);">WELCOME</h1>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/index2.html">
    <img width="220" src="{{$appData['app_logo']}}" />
    </a>
      
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      @if (Session::has('failed'))
          <div class="alert alert-danger">
              {{Session::get('failed')}}
          </div>
      @endif
      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input name="email" type="text" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          
            @error('email')
              <div class="alert alert-danger" role="alert">
                {{$message}}
              </div>
            @enderror
          
         
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
              <div class="alert alert-danger" role="alert">
                {{$message}}
              </div>
            @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
</body>
</html>   