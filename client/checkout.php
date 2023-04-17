<?php
session_start();
if(!isset($_SESSION["user_username"])){
    header("Location: /summerproject/client/login.php");
}
if(!isset($_SESSION["items"])||count($_SESSION["items"])<=0){
    header("Location: /summerproject/client/product.php");
}
$sum=0;
foreach($_SESSION["items"] as $ind=>$item){
$t=$item["price"]*$item["quantity"];
$sum+=$t;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalika Mobile Shop</title>

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
            <header id="header">
            <div class="strip d-flex justify-content-end px-4 py-1">
          
                <div class="font-rale font-size-14">
    

    <a href="login.php" class="px-3 border-right border-left text-dark"><?php echo $_SESSION["user_username"]; ?></a>
    <a href="logout.php" class="px-3 border-right border-left text-dark">Logout</a>

                
                </div>
            </div>

            <!-- Primary Navigation -->
            <nav class="navbar navbar-expand-lg navbar-dark color-second-bg bg-navs">
                <a class="navbar-brand" href="/summerproject/">Kalika mobile shop</a>
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
<div class="checkout-area pt-95 pb-100">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7">
                <div class="billing-info-wrap">
                    <h3>Billing Details</h3>
                    <form id="loginform">

                  
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info form-group mb-20">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first_name" id="first_name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info form-group mb-20">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="last_name">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-select form-group mb-20">
                                <label>Country</label>
                                <input type="text" class="form-control" name="countryh" id="country">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info form-group mb-20">
                                <label>Street Address</label>
                    
                                <input placeholder="Apartment" type="text" class="form-control" name="street" id="street">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info form-group mb-20">
                                <label>Town / City</label>
                                <input type="text" class="form-control" id="city" name="city">
                            </div>
                        </div>
    <input type="hidden" value="<?php echo $sum;?>" id="sum"/>
                        <div class="col-lg-12">
                            <div class="billing-info form-group mb-20">
                                <label>Phone</label>
                                <input type="number" class="form-control" id="contact" name="contact">
                            </div>
                        </div>
               
                    </div>
                    <input type="submit" class="btn btn-primary" value="Checkout" />                   
                </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="your-order-area">
                    <h3>Your order</h3>
                    <div class="your-order-wrap gray-bg-4">
                       
                        <div class="payment-method">
                            <div class="payment-accordion element-mrg">
                                <div class="panel-group" id="accordion">
                                <?php
                                foreach($_SESSION["items"] as $ind=>$item){
                                    ?>
                                      <div class="panel payment-accordion">

<div class="panel-heading" id="method-one">
    <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#method1">
            Item <?php echo $ind+1; ?>
        </a>
    </h4>
</div>
<div id="method1" class="panel-collapse collapse show">
    <div class="panel-body">
        <p><?php echo $item["price"]." * ".$item["quantity"]." = ".$item["quantity"]*$item["price"];?></p>
        <p><?php echo $item["name"];?></p>
    </div>
</div>
</div>

                                    <?php
                                }
                                    ?>
                                  
                       
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>Total Price is <?php echo $sum;?></p>
                  
                </div>
            </div>
        </div>
    </div>
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
    <!-- !start #footer -->

   
    <script src="/summerproject/admin/plugins/jquery/jquery.min.js"></script>
 
    <script src="/summerproject/admin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/summerproject/admin/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="/summerproject/admin/plugins/toastr/toastr.min.js"></script>
<script>
  $.validator.addMethod(
  "regex",
  function(value, element, regexp) {
    var re = new RegExp(regexp);
    return this.optional(element) || re.test(value);
  },
  "Enter valid phone"
);

$(function () {
    $.validator.setDefaults({
    submitHandler: function () {
$.ajax({
    method:"post",
    url:"./carts/insert.php",
    data:{first_name:$("#first_name").val(),
        last_name:$("#last_name").val(),
        street:$("#street").val(),
        city:$("#city").val(),
        contact:$("#contact").val(),
    total:$("#sum").val(),
   
    
    },
    success:function(response){
 toastr.success("your order has been confirmed");
 setTimeout(()=>{
    window.location.href="/summerproject/client/product.php";
 },1000)
//     
    }
})
     
    }
  });
$('#loginform').validate({

rules: {
  first_name: {
    required: true,
  },
  last_name: {
    required:true,
},
city:{
    required:true,
},
contact:{
    required:true,
    minlength:10,
    maxlength:10,
    
},
street:{
    required:true
}
},
messages:{
    contact:{
minlength:"enter a valid phone number"
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