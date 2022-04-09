<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('admin/css/login.css')}}">
    <title>Login Admin</title>
</head>
<body>
    <div class="form-login">
      <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="margin-top: 150px;">
            <form action="" method="POST" enctype="multipart/form-data" class="loginn">
              <div class="text-center title-login" style="margin-bottom: 15px;">
                <p class="lead fw-normal mb-0 me-3"><b>Đăng nhập</b></p>
                <button type="button" class="btn btn-primary btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>
    
                <button type="button" class="btn btn-primary btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>
    
                <button type="button" class="btn btn-primary btn-floating mx-1">
                  <i class="fab fa-linkedin-in"></i>
                </button>
              </div>
    
              <!-- Email input -->
              <div class="form-outline mb-4" style="margin-bottom:15px;">
                  <label class="form-label" for="form3Example3">Email address</label>
                  <input type="email" id="form3Example3" class="form-control form-control-lg"
                  placeholder="Enter a valid email address" />
              </div>
    
              <!-- Password input -->
              <div class="form-outline mb-3" style="margin-bottom:15px;">
                  <label class="form-label" for="form3Example4">Password</label>
                  <input type="password" id="form3Example4" class="form-control form-control-lg"
                  placeholder="Enter password" />
              </div>
    
              <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox -->
                <div class="form-check mb-0">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                  <label class="form-check-label" for="form2Example3">
                    Remember me
                  </label>
                </div>
                <a href="#!" class="text-body">Forgot password?</a>
              </div>
    
              <div class="text-center text-lg-start mt-4 pt-2">
                <button type="button" class="btn btn-primary btn-lg"
                  style="padding-left: 2.5rem; padding-right: 2.5rem; margin-bottom:10px; margin-top:15px;">Login</button>
              </div>
    
            </form>
          </div>
          <div class="col-md-3"></div>
          </div>
      </div>
    </div>
</body>
</html>
