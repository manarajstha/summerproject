<?php
session_start();
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
                      <a href="order.php" class="py-2 rounded-pill color-primary-bg">
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


        <section id="cart" class="py-3">
                    <div class="container-fluid w-75">
                        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

                        <!--  shopping cart items   -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- cart item -->
                                    <?php if(isset($_SESSION["items"])&&count($_SESSION["items"])>0){
foreach($_SESSION["items"] as $ind=>$item){
    ?>
                                        <div class="row border-top py-3 mt-3">
                                           
                                            <div class="col-sm-8">
                                                <h5 class="font-baloo font-size-20"><?php echo $item["name"]; ?></h5>
                                              
                                                <!-- product rating -->
                                                <div class="d-flex">
                                                    <div class="rating text-warning font-size-12">
                                                        <span><i class="fas fa-star"></i></span>
                                                        <span><i class="fas fa-star"></i></span>
                                                        <span><i class="fas fa-star"></i></span>
                                                        <span><i class="fas fa-star"></i></span>
                                                        <span><i class="far fa-star"></i></span>
                                                      </div>
                                                      <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                                                </div>
                                                <!--  !product rating-->

                                                <!-- product qty -->
                                                    <div class="qty d-flex pt-2">
                                                        <div class="d-flex font-rale w-25">
                                                            <button class="qty-up border bg-light" data-id="<?php echo $ind;?>"><i class="fas fa-angle-up" data-id="<?php echo $ind;?>"></i></button>
                                                            <input type="text" data-id="<?php echo $ind;?>" class="qty_input border px-2 w-100 bg-light" disabled 
                                                            value="<?php echo $item['quantity']; ?>">
                                                            <button data-id="<?php echo $ind;?>" class="qty-down border bg-light"><i class="fas fa-angle-down" data-id="<?php echo $ind;?>"></i></button>
                                                        </div>
                                                        <button type="submit" class="btn font-baloo text-danger px-3 border-right cart-dele" data-id="<?php echo $ind;?>">Delete</button>
                                                     
                                                    </div>
                                                <!-- !product qty -->

                                            </div>

                                            <div class="col-sm-2 text-right">
                                                <div class="font-size-20 text-danger font-baloo">
                                                    Rs<span class="product_price"><?php echo $item['price']*$item["quantity"]; ?> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
}
                                    }
?>
<!-- !cart item -->
                                    <!-- cart item -->
                                  
                                <!-- !cart item -->
                                </div>

                       

                            </div>
                            <a href="checkout.php" class="btn btn-primary">Procedd to Checkout</a>
                    </div>
                </section>



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
    <!-- !start #footer -->

    <script src="/summerproject/admin/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Owl Carousel Js file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

    <!--  isotope plugin cdn  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function () {
            function changeCart(val,index){
$.ajax({
    method:"post",
    url:"./carts/update.php",
    data:{value:val,index:index},
    success:function(res){
      window.location.reload()
    }
})
    }

  // isotope filter
  var $grid = $(".grid").isotope({
    itemSelector: ".grid-item",
    layoutMode: "fitRows",
  });


  let $qty_up = $(".qty-up");
  let $qty_down = $(".qty-down");
 
  $qty_up.click(function (e) {
    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);

    if ($input.val() >= 1) {
      $input.val(function (i, oldval) {
        return ++oldval;
      });
      changeCart($input.val(),e.target.dataset.id)

    }
  });
  $qty_down.click(function (e) {
    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
    console.log(e.target.dataset.id)
    if ($input.val() > 1) {
      $input.val(function (i, oldval) {
        return --oldval;
      });
      changeCart($input.val(),e.target.dataset.id)
    }
  });
  $(".cart-dele").click(function(e){
      
      let index=(e.target.dataset.id)
      $.ajax({
     method:"post",
     url:"./carts/delete.php",
     data:{index:index},
     success:function(res){
       window.location.reload()
     }
 })
     })
});


    </script>
</body>
</html>