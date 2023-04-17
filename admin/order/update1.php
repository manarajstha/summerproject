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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Validation Form</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/seproject/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/seproject/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/seproject/admin/plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/seproject/admin/" class="nav-link">Home</a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->
<?php require("../template-parts/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Validation</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
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
if($product["status"]!="completed"){
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
<input type="text" disabled value="completed" class="form-control"/>
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
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/seproject/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/seproject/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="/seproject/admin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/seproject/admin/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="/seproject/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/seproject/admin/dist/js/demo.js"></script>
<script src="/seproject/admin/plugins/toastr/toastr.min.js"></script>
<!-- Page specific script -->
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
</body>
</html>
