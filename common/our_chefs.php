<?php 
$sql = "SELECT * FROM tbl_our_restaurant_chefs WHERE STATUS = 1";
$result = $conn->query($sql);
$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);

 ?>

<section class="s-block" style="padding-top: 10px;padding-bottom: 30px;">
  <div class="container-fluid">
    <div class="row chefs">
       <div class="col-md-12 text-center mobile-padding mb-5">
          <img src="images\our-chefs.png" class="img-fluid">
      </div>
    </div>
  </div>
  <div class="chef">
    <div class="container">
      <div class="row">
<?php
foreach ($json as $key => $value) { ?>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="box">             
            <div class="icon">
              <img src="images/<?php echo $value['IMAGE'];?>" class="img-fluid image">
                <div class="info1">
                  <h3><?php echo $value['NAME'];?></h3><h4><?php echo $value['DESCRIPTION'];?></h4>
                </div>
            </div>
          </div>
          <div class="space"></div>
        </div>   
        <?php } ?>   
       
      </div>
    </div>
  </div>
</section>