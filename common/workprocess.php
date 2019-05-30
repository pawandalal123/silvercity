<?php include('common/config.php');


$sql = "SELECT * FROM tbl_work_process WHERE STATUS = 1";
$result = $conn->query($sql);

$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);


 ?>

<section class="s-block workprocess" style="padding-bottom: 30px;">
  <div class="container-fluid">
    <div class="row">
       <div class="col-md-12 text-center mb-4">
          <h2>Work Process</h2>
          <h6>We provide the best quality of food material by ensuring every responsibility is done well.</h6>
      </div>
    </div>
    <div class="row text-center mt-5">

    <?php
foreach ($json as $key => $value) { ?>

                      <div class="col-md col-sm-6 col-xs-12 customer-stories work menuchange">
                        <img src="images/<?php echo $value['IMAGE'];?>" class="img-fluid">
                        <img src="images/<?php echo $value['HOWER_IMAGE'];?>" class="img-fluid img-top">
                        <h4><?php echo $value['TITLE'];?></h4>
                        <p><?php echo $value['DESCRIPTION'];?></p>
                      </div>
                      <?php } ?>
                     
    </div>
  </div>
</section>