<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
</head>

<body>
    <style>
    .login-wrap {
        width: 90%;
        max-width: 400px;
        margin: 20px auto;
        padding: 20px 20px;
        box-shadow: 0 0 4px rgba(0, 0, 0, 0.3);
    }
    </style>
    <div class="container">
        <div class="login-wrap">
        <form class="login-form" action="index.php" id="login">
                <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username"
                id="username"
                />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" />
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <p class="text-center">Already an Account?<a href="login.php">Click </a>Here</p>
    </div>
</div>
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
        url:"./api/register.php",
        method:"post",
        data:{email:$("#email").val(),password:$("#password").val(),username:$("#username").val()},
        success:function(response){
          let res=JSON.parse(response)  
          if(res.code!=200){
 toastr.error(res.message);

          }
 
    
          else{
      
             window.location.href="/summerproject/client/login.php";
          }
        },
      
      })
     
    }
  });
  $('#login').validate({
    rules: {
      password: {
        required: true,
        minlength: 8
      },
      username: {
        required: true,
        minlength: 3
      },

      email:{
        required:true,
        email:true
      }

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