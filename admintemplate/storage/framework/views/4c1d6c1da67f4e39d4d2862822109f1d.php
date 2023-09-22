<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Loreto | Login</title>
  <!-- Custom fonts for this template-->
  <link href="<?php echo e(asset('admin_assets/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 
  <!-- Custom styles for this template-->
  <link href="<?php echo e(asset('admin_assets/css/sb-admin-2.min.css')); ?>" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  </div>
                    <?php if(Session::has('error')): ?>
                    <div class="alert alert-danger" role="alert">
                      <?php echo e(Session::get('error')); ?>

                    </div>
                    <?php endif; ?>
                  <form class="row g-3 needs-validation" novalidate method="POST" action="<?php echo e(route('login.action')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <input type="text" name="email" class="form-control" id="yourEmail" required>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group has-validation">
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                    </div>
                    </div>

                    <div class="col-12">
                      <br/>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <br/>
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    
                    <div class="col-12">
                      <br/>
                      <center>
                        <p class="small mb-0">Don't have account? <a href="/register"> Register Here</a></p>
                        <br>
                        <p class="small mb-0">Forget Password ?<a href="/forget"> Click Here</a></p>
                      </center>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo e(asset('admin_assets/vendor/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo e(asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?php echo e(asset('admin_assets/js/sb-admin-2.min.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\Loreto Sisters\admintemplate\resources\views/auth/login.blade.php ENDPATH**/ ?>