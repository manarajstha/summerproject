<?php
require("./connection.php");
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
    <link
      rel="stylesheet"
      href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"
    />
    <link
      rel="stylesheet"
      href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css"
    />
    <link
      rel="stylesheet"
      href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css"
    />
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
                </span> Products
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">

                    <a href="/summerproject/admin/product/create.php"> <i class="mdi mdi-plus icon-sm text-primary align-middle"></i>Add New</a>
                  </li>
                </ul>
              </nav>
            </div>

            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Recent Order </h4>
                    <div class="table-responsive">
                      <table class="table" id="example1">
                        <thead>
                          <tr>
                            <th> Name </th>
                            <th> Price </th>
                            <th> Brand </th>
                            <th> Operations </th>
                           
                          </tr>
                        </thead>
                        <tbody>
                        <?php
$query="select * from products";
$stmt=$conn->query($query);
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row){
?>
 <tr>
<td> <img src="./uploads/<?php echo $row['image'];?>"> <?php echo $row['name'];?></td>
<td><?php echo $row["price"];?></td>
<td><?php echo $row["brand"];?></td>
<td align="center"><i class="mdi mdi-lead-pencil text-primary editBrand" data-id="<?php echo $row['id'];?>"></i>
  <i class="mdi  mdi-delete delete-brand text-danger ml-3" data-id="<?php echo $row['id'];?>"></i</td>
</tr>
<?php
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
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank"></a> </span>
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
    <script src="./plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="./plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script>
       $(function () {
        $("#example1").DataTable({
          paging: true,
          lengthChange: true,
          searching: true,
          ordering: true,
          info: true,
          autoWidth: false,
          lengthMenu:[5,6,10],
          responsive: true,
        });
      });
      $("document").ready(function(){
        $(document).on("click",".editBrand",function(e){
          let id=e.target.dataset.id;
          window.location.href="/summerproject/admin/product/edit.php?id="+id;
 
        })
        $(document).on("click",".delete-brand",function(e){
          let id=e.target.dataset.id;
        $.ajax({
        url:"./product/remove.php",
        method:"post",
        data:{id:id},
        success:function(response){
          let res=JSON.parse(response);
    if(res.code==200){
      window.location.reload()
          }
       
        }
        })
      })
    })
    </script>
  </body>
</html>