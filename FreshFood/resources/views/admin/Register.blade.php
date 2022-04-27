<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('login/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('login/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('login/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('login/css/style.css')}}">

    <title>Login #7</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{asset('login/images/undraw_remotely_2j6y.svg')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Đăng ký</h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
            </div>
            <form action="#" method="post">
              <div class="form-group first field--not-empty">
                <label for="username">Tài khoản</label>
                <input type="text" class="form-control" id="username"  placeholder="Nhập tài khoản" >
              </div>
              <div class="form-group last mb-4 field--not-empty">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password"  placeholder="Nhập mật khẩu">
              </div>
              <div class="form-group last mb-4 field--not-empty">
                <label for="password">Xác nhận mật khẩu</label>
                <input type="password" class="form-control" id="password"  placeholder="Nhập lại mật khẩu">
              </div>
              
              <div class="d-flex align-items-center">
                <label class=""><a href="#">Đăng nhập</a>              
              </div>

              <input type="submit" value="Đăng ký" class="btn btn-block btn-primary">

              <span class="d-block text-left my-4 text-muted">&mdash; Hoặc đăng ký  &mdash;</span>
              
              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="{{asset('login/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('login/js/popper.min.js')}}"></script>
    <script src="{{asset('login/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('login/js/main.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
swal({
    title: "Good job!",
    text: "Thành công!",
    icon: "success",
    button: "OK!",
});
// delete Product
</script>
  </body>
</html>