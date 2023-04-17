<?php session_start();

if(!isset($_SESSION["user_id"])){
  header("Location: /summerproject/client/login.php");
}
require("./connection.php");
$sql=$conn->prepare("select * from orders where user_id=:id");
$sql->execute(["id"=>$_SESSION["user_id"]]);
$results=$sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalilka Mobile Shop</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">


</head>
<body>

    <!-- start #header -->
        <header id="header">
            <div class="strip d-flex justify-content-between px-4 py-1">
              <p class="mb-0 font-weight-bold">Contact: 9828584011</p>
          
                <div class="font-rale font-size-14">
                    <?php
if(isset($_SESSION["user_username"])){
    ?>
     <a href="mylist.php" class="px-3 border-right border-left text-dark">Orders</a>
    <a href="login.php" class="px-3 border-right border-left text-dark"><?php echo $_SESSION["user_username"]; ?></a>
    <a href="logout.php" class="px-3 border-right border-left text-dark">Logout</a>
<?Php
}
else{
    ?>
           <a href="login.php" class="px-3 border-right border-left text-dark">Login</a>
                    <a href="register.php" class="px-3 border-right border-left text-dark">Register</a>
    <?php
}

?>
             
                </div>
            </div>

            <!-- Primary Navigation -->
            <nav class="navbar navbar-expand-lg navbar-dark color-second-bg bg-navs">
                <a class="navbar-brand" href="/summerproject/client/">Kalika mobile shop</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav m-auto font-rubik">
                    <li class="nav-item active">
                      <a class="nav-link" href="/summerproject/client/">Home</a>
                    </li>
                   
                    <li class="nav-item">
                      <a class="nav-link" href="/summerproject/client/product.php">Products </i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/summerproject/client/about.php">About Us</a>
                      </li>
                  
                      <li class="nav-item">
                        <a class="nav-link" href="/summerproject/client/contact.php">Contact Us</a>
                      </li>
                      
                      
                  </ul>
                  <form action="#" class="font-size-14 font-rale">
                      <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                        <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                        <span class="px-3 py-2 rounded-pill text-dark bg-light">0</span>
                      </a>
                  </form>
                </div>
              </nav>
               <!-- !Primary Navigation -->

        </header>

        <main id="main-site">
        </main>

<div class="container py-4">

  <div id="accordion">
    <?php
foreach ($results as  $ind=>$value) {
?>
    <div class="card">
      <div class="card-header">
        <a 
style="display: block"
        class="card-link" data-toggle="collapse" href="#collapse-<?php echo $ind;?>">
          Orders
        </a>
      </div>
      <div id="collapse-<?php echo $ind;?>" class="collapse" data-parent="#accordion">
        <div class="card-body">
    <table class="table table-bordered">
      <thead>
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
      </tr>
    </thead>

    <tbody>
      <?php
$sql1=$conn->prepare("select * from carts where order_id=:id");
$sql1->execute(["id"=>$value["id"]]);
$carts=$sql1->fetchAll(PDO::FETCH_ASSOC);
foreach ($carts as $cart) {
 ?>
     <tr>
        <td><?php echo $cart["item"];?></td>
         <td><?php echo $cart["price"];?></td>
          <td><?php echo $cart["quantity"];?></td>
           <td><?php echo $cart["price"]*$cart["quantity"];?></td>
      </tr>
 <?php
}
      ?>
  
    </tbody>

    </table>
    <p>Total: Rs <?php echo $value["total"];?></p>
    <p>Status: <?php echo $value["status"];?></p>
    <p>City: <?php echo $value["city"];?></p>
    <p>Street: <?php echo $value["street"];?></p>
    <?php
if(!in_array($value["status"],array("completed","cancelled"))){
?>
    <button class="btn btn-danger btn-cancel" data-id="<?php echo $value["id"] ?>">Cancel </button>
 <?php  }  ?>
          </div>
      </div>
    </div>
<?php
}


    ?>

   
  </div>
</div>
    <!-- start #footer -->
    <footer id="footer" class="bg-dark text-white py-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-12">
                <h4 class="font-rubik font-size-20">Kalika Mobile Shop</h4>
                <p class="font-size-14 font-rale text-white-50">Aanboo Khaireni</p>
              </div>
              <div class="col-lg-4 col-12">
              
                <form class="form-row">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Email *">
                  </div>
                  <div class="col">
                    <button type="submit" class="btn btn-primary mb-2">Subscribe</button>
                  </div>
                </form>
              </div>
              <div class="col-lg-2 col-12">
                <h4 class="font-rubik font-size-20">Information</h4>
                <div class="d-flex flex-column flex-wrap">
                  <a href="#" class="font-rale font-size-14 text-white-50 pb-1">About Us</a>
                  <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Delivery Information</a>
                  <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Privacy Policy</a>
                  <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Terms & Conditions</a>
                </div>
              </div>
              <div class="col-lg-2 col-12">
                <h4 class="font-rubik font-size-20">Account</h4>
                <div class="d-flex flex-column flex-wrap">
                  <a href="#" class="font-rale font-size-14 text-white-50 pb-1">My Account</a>
                  <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Order History</a>
                 
              
                </div>
              </div>
            </div>
          </div>
        </footer>
        <div class="copyright text-center bg-dark text-white py-2">
          <p class="font-rale font-size-14">Design By <a href="#" class="color-second">Mana Raj  Shrestha</a></p>
        </div>
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
  <script src="/summerproject/admin/plugins/jquery/jquery.min.js"></script>
  <script>
    $("document").ready(function(){
      $(".btn-cancel").click(function(e){
        let id=e.target.dataset.id
        $.ajax({
    method:"post",
    url:"/summerproject/admin/order/cancel.php",
    data:{id:id},
    success:function(res){
      window.location.reload()
    }
})
      })
    })
    </script>
</body>
</html>
