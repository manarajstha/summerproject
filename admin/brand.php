<?php
include("./connection.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
  
      <!-- partial:partials/_navbar.html -->
      <?php require("./template-parts/header.php");?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php require("./template-parts/sidebar.php");?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Brands
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">

                    <a href="/summerproject/admin/brand/create.php"> <i class="mdi mdi-plus icon-sm text-primary align-middle"></i>Add New</a>
                  </li>
                </ul>
              </nav>
            </div>

            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All Brands</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> S.No </th>
                        
                           <th> Name </th>
                           <th> Operation </th>
                        
                          </tr>
                        </thead>
                        <tbody>
                        <?php

$query="select * from brands";
$stmt=$conn->query($query);
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $index=>$row){
  $ind=$index+1;
  $id=$row["id"];
echo ' <tr>
<td>'.$ind.'</td>
<td>'.$row["name"].'</td>
<td align="center"><i class="mdi mdi-pencil text-primary editBrand" data-id'."=$id".'></i>
  <i class="mdi mdi-delete delete-brand text-danger ml-3" data-id'."=$id".'></i</td>
</tr>
';
}
                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block"></span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end">  <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank"></a> </span>
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
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="/demos/plugins/jquery/jquery.min.js"></script>
    <script>
       $("document").ready(function(){
        $(".editBrand").click(function(e){
          let id=e.target.dataset.id;
          window.location.href="/summerproject/admin/brand/edit.php?id="+id;
 
        })
        $(".delete-brand").click(function(e){
          let id=e.target.dataset.id;
        $.ajax({
        url:"./brand/remove.php",
        method:"post",
        data:{id:id},
        success:function(response){
          let res=JSON.parse(response)
          console.log(res)
    if(res.code!==200){
          }
          else{
     
             window.location.reload()
          }
        }
        })
      })
    })
      </script>
  </body>
</html>