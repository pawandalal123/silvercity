<?php 
include('common/header.php');
$sql = "SELECT * FROM tbl_catering_details WHERE CATID = 2";
$result = $conn->query($sql);
$details = mysqli_fetch_object($result);
?>
<section class="header-top" style="background:url('images/<?php echo $details->IMAGE; ?>') no-repeat;background-size: cover;padding: 15px 0px;">
 <div class="container-fluid">
    <div class="row">
      <div class="col-md-7">&nbsp;</div>
      <div class="col-md-5">
        <div class="enquiry text-center" style="">
            <img src="images\enq-hands.jpg" class="img-fluid pb3">
            <h6 class="promise">OUR PROMISE</h6>
            <h6>HIGH QUALITY FRESH INGREDIENTS</h6>
            <div class="formcss">
              <form name="frm" method="post" action="mail.php">
                <div class="row">
                  <div class="col-md-3"><span>Name:</span></div>
                  <div class="col-md-9"><input type="text" name="name" required=""></div>
                </div>
                <div class="row">
                  <div class="col-md-3"><span>Email:</span></div>
                  <div class="col-md-9"><input type="email" name="email" required=""></div>
                </div>
                <div class="row">
                  <div class="col-md-3"><span>Phone:</span></div>
                  <div class="col-md-9"><input type="text" name="phone" required=""></div>
                </div>
                <div class="row">
                  <div class="col-md-3"><span>Occation:</span></div>
                  <div class="col-md-9"><input type="text" name="occation" required=""></div>
                </div>
                <input type="submit" name="submits" class="btn mt-2" value="SUBMIT">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  
</section>
<?php 
 include('common/whatwedo.php');
?>
<section class="s-block mt-3">
  <div class="container topmumbai">
    <div class="row text-center">
      <div class="col-md-12 text-center mb-4">
        <img src="images\privateparty.png" class="img-fluid pb-4">
        <h6><?php echo $details->CATEGORY_ONE_LINER; ?></h6>
      </div>
    </div>
  </div>
  <?php
  $sql = "SELECT * FROM tbl_catering_party_images WHERE CAT_ID = 2 and status=1";
  $result = $conn->query($sql);
  if(mysqli_num_rows($result)>0)
  {
   $data = mysqli_fetch_all ($result, MYSQLI_ASSOC); 
   ?>
     <div class="container-fluid topmumbai">
      <div class="row text-center p0">
        <div class="col-md-1"></div>
        <?php 
        foreach ($data as $key => $value) { ?>
        <div class="col-md-2 col-sm-3 col-xs-6 mumbais mumbait p0">
          <img src="images\upload\<?php echo $value['IMAGE']?>" class="img-fluid pb-3">
          <div class="centered centeredt"><?php echo $value['IMAGE_LABEL'];?></div>
        </div>
        <?php }
        ?>
        <div class="col-md-1"></div>
      </div>
    </div>
   <?php 
  }
  ?>

</section>
  <?php
  $sqlpack = "SELECT * FROM tbl_catering_party_packages_images WHERE  status=1";
  $resultpac = $conn->query($sqlpack);
  if(mysqli_num_rows($resultpac)>0)
  {
   $datapackages = mysqli_fetch_all ($resultpac, MYSQLI_ASSOC); 
   ?>
    <section class="s-block">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12 text-center mb-4">
            <img src="images\privatepackages.png" class="img-fluid">
          </div>
          <?php 
          foreach($datapackages as $keypac => $valuepack)
          {
          ?>
          <div class="col-md-3 mumbais p0">
            <a href="" data-toggle="modal" data-target="#mytitn<?php echo $keypac;?>"><img src="images\upload\packages\<?php echo $valuepack['IMAGE']?>" class="img-fluid pb-3"></a>
          </div>
         
          <?php 
        }
          ?>

        </div>
      </div>
    </section>
    <?php 
          foreach($datapackages as $keypac => $valuepack)
          {
          ?>
              <div class="modal" id="mytitn<?php echo $keypac;?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <section class="s-block pb-5">
                        <div class="container">
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 mt-3 p0">
                              <div class="packages">
                                <div class="text-center">
                                  <div style="padding: 3.9rem 0 6rem 0;">
                                    <h5 class="typesname"><?php echo $valuepack['PACKAGE_NAME'];?></h5>
                                    <h3 class="plan"><?php echo $valuepack['PACKAGE_TYPE'];?></h3>
                                    <h5 class="pack">packages</h5>
                                    <center class="table-responsive">
                                      <?php echo $valuepack['DESCRIPTION'];?>
                                    </center>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                    </div>

      <!-- Modal footer -->

    </div>
  </div>
</div>


<?php
  }
} 
?>
<?php include('common/popular_mumbai.php'); ?>
<section class="s-block">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center mb-3 p0">
        <img src="images\weddingfood.png" class="img-fluid" style="width: 100%;">
      </div>
    </div>
  </div>
</section>
<section class="s-block loungmb">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center mb-3 p0">
        <img src="images\galleryvideos.png" class="img-fluid" style="width: 100%;">
      </div>
    </div>
  </div>
</section>
<?php include('common/workprocess.php');
include('common/footer.php'); 
?>