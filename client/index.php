<?php session_start();
if(isset($_POST{"submit"})){
    if(!isset($_SESSION["user_id"])){
        header("Location: /summerproject/client/login.php");
    }
    if(isset($_POST["submit"])){
        $status=0;
        $index=-1;
        if(isset($_SESSION["items"])&&count($_SESSION["items"])>0){
          foreach($_SESSION["items"] as $ind=>$item){
            if($item["id"]==$_POST["id"]){
              $status=1;
              $index=$ind;
            }
          }
        }
        if($status==0){
          $_SESSION["items"][]=array(
            "name"=>$_POST["name"],
            "id"=>$_POST["id"],
            "quantity"=>1,
            "price"=>$_POST["price"]
          );
        }
        else{
          $arr= $_SESSION["items"][$index];
          $arr["quantity"]=$arr["quantity"]+1;
          $_SESSION["items"][$index]=$arr;
        }
      
      }
}
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
  <style>
  .owl-carousel .owl-item .banner img {
  display: block;
  width: 100%;
  object-fit: contain;
  height: 450px !important;
}
  </style>
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
                        <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo isset($_SESSION["items"])?count($_SESSION["items"]) :"0"; ?></span>
                      </a>
                  </form>
                </div>
              </nav>
               <!-- !Primary Navigation -->

        </header>

        <main id="main-site">
        </main>

<?php
include('Template/_banner-area.php');

?>

          <!-- Top Sale -->
          <section id="top-sale">
            <div class="container py-5">
              <h4 class="font-rubik font-size-20">New Sale</h4>
              <hr>
              <!-- owl carousel -->
                <div class="owl-carousel owl-theme">
                                 <?php


require("./connection.php");
$sql="select * from products order by id desc limit 0,5";
$stmt=$conn->prepare($sql);
$stmt->execute();
$phones=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($phones as $phone){
  ?>
                  <div class="item py-2">
                     <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="product font-rale">
                      <a href="#"><img src="/summerproject/admin/uploads/<?php echo $phone['image'];?>" alt="product1" 
style="width:100%;height: 240px;"
                        class="img-fluid"></a>
                      <div class="text-center">
                        <h6><?php echo $phone["name"];?></h6>
                        <div class="rating text-warning font-size-12">
                          <?php
                          $rates=intval($phone["rating"]);
                          for($i=0;$i<$rates;$i++){
                            ?>
                             <span><i class="fas fa-star"></i></span>
                            <?php
                          }
                          for($i=0;$i<5-$rates;$i++){
                            ?>
                             <span><i class="far fa-star"></i></span>
                            <?php
                          }
                          ?>
                   
                        </div>
                        <div class="price py-2">
                          <span>Rs <?php echo $phone["price"];?></span>
                        </div>
                        <div class="price py-1">
                          <span><?php echo $phone["stock"]>0?"In stock":"Out of stock";?></span>
                        </div>
                            <input type="hidden" name="id" value="<?php echo $phone['id'];?>"/>
                          <input type="hidden" name="name" value="<?php echo $phone['name'];?>"/>
                          <input type="hidden" name="quantity" value="1"/>
                          <input type="hidden" name="price" value="<?php echo $phone['price'];?>"/>
                          <?php
if($phone["stock"]>0){
?>
  <button type="submit" class="btn btn-warning font-size-12" name="submit">Add to Cart</button>
<?php
}
else{
  ?>
  <button type="submit" class="btn btn-warning font-size-12" name="submit">Add to Cart</button>
  <?php

}
                          ?>
                      
                      </div>
                    </div>
                  </form>
                  </div> 
                  <?php
                  }
                  ?>     
 
      
                </div>
              <!-- !owl carousel -->
            </div>
          </section>
<?php

include('footer.php'); 
?>