<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
              
                </div>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" id="quickForm">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="email" 
                    name="email"
                    placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" 
                    id="password" 
                    name="password"
                    placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <input class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="submit"/>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> <a href="register.php" class="text-primary">Forget Password ?</a>
                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.php" class="text-primary">Create</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>

    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
    <script>
      $(function () {
  $.validator.setDefaults({
    submitHandler: function () {
 
      $.ajax({
        url:"./api/login.php",
        method:"post",
        data:{email:$("#email").val(),password:$("#password").val()},
        success:function(response){
          let res=JSON.parse(response)  
          if(res.code!==200){
 toastr.error(res.message);

          }
          else{
      
             window.location.href="/summerproject/admin/";
          }
        },
      
      })
     
    }
  });
  $('#quickForm').validate({
    rules: {
      password: {
        required: true,
        minlength: 8
      },
      email:{
        required:true,
        email:true
      }

    },
    messages: {
   
    },


    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
      </script>
  </body>
</html>