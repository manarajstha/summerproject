<?php
session_start();
if(!isset($_SESSION["admin_id"])){
    header("Location: /seproject/admin/login.php");
}

require_once("../connection.php");
if(!isset($_GET["id"])){
header("Location: /seproject/admin/order.php");
}
$query="select * from orders where id=:id";
$stmt=$conn->prepare($query);
$stmt->bindParam(":id",$id);
$id=$_GET["id"];
$stmt->execute();
$product=$stmt->fetch(PDO::FETCH_ASSOC);

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
    <link rel="stylesheet" href="/summerproject/admin/plugins/toastr/toastr.min.css">
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
                    <h4 class="card-title">Create New Brands</h4>
                    <form id="quickForm">
                <div class="card-body">
                  <input type="hidden" value="<?php echo $_GET['id'];?>" id="id"/>
        <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label for="name">First Name</label>
                    <input type="text" 
                    name="name" class="form-control" id="name" placeholder=" Name"
                    value="<?php echo $product['first_name'];?>" disabled
                    >
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label for="price">Last Name</label>
                    <input type="text" name="price" class="form-control" id="price" min="10"
                    value="<?php echo $product['last_name'];?>" disabled
                    >
                  </div>
        </div>
        <div class="row">
        <div class="form-group col-md-6 col-12">
                    <label for="name">City</label>
                    <input type="text" 
                    name="name" class="form-control" id="name" placeholder=" Name"
                    value="<?php echo $product['city'];?>" disabled
                    >
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label for="price">Street</label>
                    <input type="text" name="price" class="form-control" id="price" min="10"
                    value="<?php echo $product['street'];?>" disabled
                    >
                  </div>
        </div>
        <div class="row">
        <div class="form-group col-md-6 col-12">
                    <label for="price">Contact</label>
                    <input type="text" name="price" class="form-control" id="price" min="10"
                    value="<?php echo $product['contact'];?>" disabled
                    >
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label for="price">Total</label>
                    <input type="text" name="price" class="form-control" id="price" min="10"
                    value="<?php echo $product['total'];?>" disabled
                    >
                  </div>
        </div>
        <input type="hidden" id="id" value="<?php echo $_GET['id'];?>"/>

                  <div class="form-group">
                    <label for="status">Status</label>
<?php
if(!in_array($product["status"],array("completed","cancelled"))){
?>
 <select class="form-control" id="status" name="status">
                    <?php
$arr=array("processing","delivered","completed");
foreach($arr as $l){
    if($l==$product["status"]){
?>
<option selected><?php echo $l ?></option>
<?php
    }
    else{
        ?>
<option><?php echo $l ?></option>
        <?php

    }
}
?>
                </select>
<?php
}
else{
    ?>
<input type="text" disabled value="<?php echo $product["status"];?>" class="form-control"/>
    <?php

}
?>
               
                  </div>
                  



                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?php
if($product["status"]!="completed"){
?>
 <button type="submit" class="btn btn-primary">Update</button>
<?php
}
else{
    ?>
 <button type="submit" class="btn btn-primary" disabled>Update</button>
    <?php

}
                    ?>
                 
                </div>
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
    <script src="/summerproject/admin/demos/plugins/jquery/jquery.min.js"></script>
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
        url:"./edit.php",
        method:"post",
        data:{id:$("#id").val(),status:$("#status").val()},
        success:function(response){
          let res=JSON.parse(response)
          console.log(res)
 
             toastr.success("Order is updated")
             window.location.reload();
        
        },
      
      })
      return false;
     }
  });
  $('#quickForm').validate({
  });
});

</script>
</script>
  </body>
</html>