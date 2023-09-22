<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Loreto | - Register</title>
  <!-- Custom fonts for this template-->
  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 
  <!-- Custom styles for this template-->
  <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
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
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                  </div>
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                      {{Session::get('success')}}
                    </div>
                    @endif
                  <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('register.save') }}">
                    @csrf
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                  </div>
                  
                  
                  <!-- Role selection initially hidden, with 'user' as the default role -->
                  <div class="col-12" id="roleSection">
                      <label for="userRole" class="form-label">Role</label>
                      <select name="role" class="form-control" id="userRole">
                          <option value="user">User</option>
                      </select>
                  </div>
                  
                  

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                    </div>

                    <div class="col-12">
                      <label for="password_confirmation" class="form-label">Confirm Password</label>
                      <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <center>
                      <p class="small mb-0">Already have an account? <a href="/">Log in</a></p>
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
  <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
 
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const emailInput = document.getElementById("yourEmail");
        const roleSection = document.getElementById("roleSection");
        const userRoleSelect = document.getElementById("userRole");

        emailInput.addEventListener("input", function () {
            // Check if the entered email matches the target email
            if (emailInput.value.trim() === 'muni20002raj@gmail.com') {
                roleSection.style.display = "block"; // Show the role section
                userRoleSelect.innerHTML = `
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                `; // Show both 'user' and 'admin' options
            } else {
                roleSection.style.display = "block"; // Show the role section
                userRoleSelect.innerHTML = `
                    <option value="user">User</option>
                `; // Show only 'user' option
            }
        });
    });
</script>


</body>
</html>