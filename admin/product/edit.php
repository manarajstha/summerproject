<?php

require_once("../connection.php");
if(!isset($_GET["id"])){
header("Location: /summerproject/admin/product.php");
}
$query="select * from products where id=:id";
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
              <h3 class="page-title"> Products </h3>
         
            </div>
            <div class="row">
         
       
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Products</h4>
                    <form class="forms-sample" id="quickForm">
                    <input type="hidden" value="<?php echo $_GET['id'];?>" id="id"/>
        <div class="row">
                        <div class="row">
                        <div class="form-group col-md-6 col-12">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" 
                        placeholder="Name"
                        value="<?php echo $product['name'];?>"
                        name="name">
                      </div>  
                      <div class="form-group col-md-6 col-12">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" 
                        placeholder="0"
                        value="<?php echo $product['price'];?>"
                        name="price">
                      </div>
                        </div>
                        <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <label for="brand">Brand</label>
                        <input type="text" class="form-control" id="brand" 
                        placeholder="Brand"
                        value="<?php echo $product['brand'];?>"
                        name="brand">
                      </div>
                      <div class="form-group col-md-6 col-12">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock" 
                         min="0"
                         value="<?php echo $product['stock'];?>"
                        name="stock">
                      </div>
                      <div class="form-group col-md-6 col-12">
                        <label for="rating">Rating</label>
                        <input type="number" class="form-control" id="rating" 
                        placeholder="1" min="0" max="5"
                        value="<?php echo $product['rating'];?>"
                        name="rating">
                      </div>
                        </div>
                        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" rows="5" id="description" name="description"><?php echo $product['description'];?>
            </textarea>
        </div>
        <div class="form-group">
                        <label>File upload</label>
                       
                          <input type="file" class="form-control file-upload-info" placeholder="Upload Image" name="image" id="image">
                      
                      </div>
                      <img id="preview" height="200" width="200" src="/summerproject/admin/uploads/<?php echo $product['image'];?>"/>
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <a class="btn btn-light" href="/summerproject/admin/product.php">Cancel</a>
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
        let fd=new FormData();
        fd.append("id",$("#id").val());
        fd.append("name",$("#name").val())
        fd.append("price",$("#price").val())
        fd.append("brand",$("#brand").val())
        fd.append("description",$("#description").val())
        fd.append( "rating",$("#rating").val())
        fd.append("stock",$("#stock").val())
        if($("#image")[0].files.length>0){
      
        fd.append("image", $("#image")[0].files[0])
        }
      $.ajax({
        url:"./update.php",
        method:"post",
        data:fd,
        contentType:false,
        processData:false,
        success:function(response){
          let res=JSON.parse(response)  
          if(res.code!==200){
 toastr.error("cannot updatse product")

          }
          else{
             toastr.success("Product is created")
             window.location.href="/summerproject/admin/product.php";
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
      },
      price:{
        required:true
      },
     brand:{
        required:true
      },
      category:{
        required:true
      },
      rating:{
required:true
      },
      stock:{
        required:true
      },
      description:{
        required:true
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
$("document").ready(function(){
    $("#image").change(function(e){
       
        let fileReader=new FileReader()
        fileReader.onload=function(){
        
            $("#preview").attr('src',fileReader.result)
            $("#preview").css('display',"block")
        }
        fileReader.readAsDataURL(e.target.files[0])
    })
})
</script>
  </body>
</html>