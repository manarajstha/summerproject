
        <section id="special-price">
            <div class="container ">
              <div class="d-flex justify-content-between align-items-center">
              <h4 class="font-rubik font-size-20">Special Price</h4>
              <div id="filters" class="button-group text-right font-baloo font-size-16">
                <button class="btn is-checked" data-filter="*">All Brand</button>
                <button class="btn" data-filter=".Apple">Apple</button>
                <button class="btn" data-filter=".Samsung">Samsung</button>
                <button class="btn" data-filter=".Redmi">Redmi</button>
              </div>
              </div>
           

              <div class="grid">
               <?php


require("./connection.php");
$sql="select * from products order by id desc";
$stmt=$conn->prepare($sql);
$stmt->execute();
$phones=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($phones as $phone){
  ?>
    <div class="grid-item Apple border  " >
                  <div class="item py-2" style="width: 200px;">
                    <div class="product font-rale">
                      <div class="d-flex flex-column">
                        <a href="#"><img src="./assets/products/13.png" class="img-fluid" alt="pro1"></a>
                        <div class="text-center">
                          <h6><?php echo $phone["name"];?></h6>
                          <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                          </div>
                          <div class="price py-2">
                            <span>Rs <?php echo $phone["price"];?></span>
                          </div>
                          <button type="submit" class="btn btn-warning font-size-12">Add to Cart</button>
                        </div>
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
        <!-- !Special Price -->