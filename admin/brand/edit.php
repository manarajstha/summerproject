<?php
include("../connection.php");
$query="select * from brands where id=:id";
$stmt=$conn->prepare($query);
$stmt->bindParam(":id",$id);
$id=$_GET["id"];
$stmt->execute();
$result=$stmt->fetch();


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <link rel="stylesheet" href="/summerproject/admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/summerproject/admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/summerproject/admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/summerproject/admin/assets/images/favicon.ico" />
    <link rel="stylesheet" href="/summerproject/admin/plugins/toastr/toastr.min.css"/>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
<?php require("../template-parts/header.php");?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <?php require("../template-parts/sidebar.php");?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Brands </h3>
         
            </div>
            <div class="row">
         
       
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Brands</h4>
                    <form class="forms-sample" id="quickForm">
                    <input type="hidden" value="<?php echo $_GET['id'];?>" id="id"/>
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="name" 
                        placeholder="Name"
                        name="name"
                        value="<?php echo $result["name"];?>"
                        >
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2" name="submit">Submit</button>
                      <a class="btn btn-light" href="/summerproject/admin/brand.php">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
        
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/summerproject/admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="/summerproject/admin/plugins/jquery/jquery.min.js"></script>
<!-- jquery-validation -->
<script src="/summerproject/admin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/summerproject/admin/plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="/summerproject/admin/assets/js/off-canvas.js"></script>
    <script src="/summerproject/admin/assets/js/hoverable-collapse.js"></script>
    <script src="/summerproject/admin/assets/js/misc.js"></script>
    <script src="/summerproject/admin/plugins/toastr/toastr.min.js"></script>
    <script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      $.ajax({
        url:"./update.php",
        method:"post",
        data:{name:$("#name").val(),id:$("#id").val()},
        success:function(response){
          let res=JSON.parse(response)
         
          if(res.code!==200){
 toastr.error("cannot update brand name")

          }
          else{
             toastr.success("Brand Name updated")
          }
        },
      
      })
     
    }
  });
  $('#quickForm').validate({

    rules: {
      name: {
        required: true,
        minlength: 3
      }
    },
    messages: {
      name: {
        required: "Please provide a brand name",
        minlength: "Brand name must be at least 3 characters long"
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