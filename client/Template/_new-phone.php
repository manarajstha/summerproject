<?php
                  require("./connection.php");
                  $sql="select * from products order by id desc limit 0,4";
                  $stmt=$conn->prepare($sql);
                  $stmt->execute();
                  $newphones=$stmt->fetchAll(PDO::FETCH_ASSOC);
                  ?>
<section id="new-phones">
            <div class="container">
              <h4 class="font-rubik font-size-20">New Phones</h4>
              <hr>

                   <div class="row">
  
             
                    <?php
foreach($newphones as $newphone){
  ?>

<div class="item py-2 bg-light col-6 col-md-3">
                        <div class="product font-rale">
                          <div class="d-flex flex-column">
                            <a href="#"><img src="/summerproject/admin/uploads/<?php echo $newphone['image']; ?>" class="img-fluid" alt="pro1"></a>
                            <div class="text-center">
                              <h6><?php echo $newphone["name"]; ?></h6>
                              <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                              </div>
                              <div class="price py-2">
                                <span>Rs <?php echo $newphone["price"]; ?></span>
                              </div>
                              <button type="submit" class="btn btn-warning font-size-12">Add to Cart</button>
                            </div>
                          </div>
                        </div>
                      </div>
<?php
}
                    ?>
              
     
                   </div>
            </div>
          </section>
          <!-- !New Phones -->