<?php 
$sql = "SELECT * FROM tbl_whatwedo WHERE STATUS = 1";
$result = $conn->query($sql);
if(mysqli_num_rows($result)>0)
{
  $json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
  ?>
  <section id="what-we-do">
  <div class="container">
    <div class="row mt-05">
<?php
foreach ($json as $key => $value) { ?>
  
 <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 p0">
          <div class="card">
            <div class="card-block">
              <img src="images/icons/<?php echo $value['IMAGE']; ?>" class="img-fluid">
              <p class="card-text"><?php echo $value['TITLE']; ?></p>
            </div>
          </div>
        </div>

<?php } ?>
      </div>
  </div>
</section>
  <?php

}




 ?>


