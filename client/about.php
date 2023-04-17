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
              <p class="mb-0 font-weight-bold">Contact: 982617888</p>
          
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
                      <a class="nav-link" href="product.php">Products </i></a>
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
                        <span class="px-3 py-2 rounded-pill text-dark bg-light">0</span>
                      </a>
                  </form>
                </div>
              </nav>
               <!-- !Primary Navigation -->

        </header>
        <div class="container">
          <h3>About Kalika Moblie Shop</h3>
          <p>The global era of media is changing. It is demanding more of technology than anything. It is really hard to keep up with all of that hence, a medium is a must. We, Kalika Mobile Shop, have been established putting those values before us that offer to enrich the lives of people and keep them up with technology.</p>
        <p>
          Kalika Mobile Shop is the Leading Tech Portal of Nepal that gives the users information, devices that will help them decide (with Buy Guides and Tech Guides) get the most out of the Tech. Our company is spread across the internet through our various channel which includes the website itself, Youtube, GooglePlus, Facebook and Twitter.
        </p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d440.744537593908!2d84.54110124777166!3d27.90331430990846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39951f874d49cd83%3A0xb37ea86899bfb6b1!2sEasy%20Multi%20Trade%20Aabu%20Khaireni!5e0!3m2!1sen!2snp!4v1659075579127!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
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

</body>
</html>