<?php include('common/header.php'); 
$sql = "SELECT * FROM tbl_our_restaurant where id=1";
$result = $conn->query($sql);
$details = mysqli_fetch_object($result);
if($details->BANNER_IMAGE)
{
?>
<div>
  <div class="container-fluid p0">
    <img src="images\<?php echo $details->BANNER_IMAGE; ?>" class="img-fluid" style="width: 100%">
  </div>
</div>
<?php 
}
include('common/whatwedo.php'); 

?>
<section class="s-block" style="padding-bottom: 10px">
  <div class="container-fluid">
    <div class="col-sm-12 text-center mb-2 mt-4">
      <img src="images\<?php echo $details->VANUE_IMAGE; ?>" class="img-fluid">
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="venu row">
          <div class="col-sm-6"></div>
          <div class="col-sm-6 text-center adress">
            <h2><?php echo $details->TITLE; ?></h2>
            <h3><?php echo $details->NAME; ?></h3>
            <hr>
            <address><?php echo $details->ADDRESS; ?></address>
            <a href="http://www.pharaohlounge.in/" class="btn3" target="_blank" style="padding: 0.3rem 1.8rem">BOOK NOW</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
if($details->OFFER_IMAGE)
{
  ?>
<section class="s-block" style="padding-bottom: 0;">
  <div class="container mb-5">
   <center><img src="images\paraohoffer.png" class="img-fluid"></center>
  </div>
  <div class="container-fluid p0">
    <img src="images\<?php echo $details->OFFER_IMAGE;?>" class="img-fluid" style="width: 100%;">
  </div>
</section>
<?php 
}

$sql = "SELECT * FROM tbl_popular WHERE STATUS = 1";
$resultpopular = $conn->query($sql);
if(mysqli_num_rows($resultpopular)>0)
{
    $jsonlist = mysqli_fetch_all ($resultpopular, MYSQLI_ASSOC);

  ?>
  <section class="s-block">
  <div class="container-fluid">
    <div class="col-md-12 text-center mb-5 mobile-padding">
      <img src="images\pop.jpg" class="img-fluid">
    </div>
    <div class="col-sm-12 text-center pop">
      <div class="row">
         <?php
         $counter=1;
       foreach ($jsonlist as $keypop => $valuepop)
       { 
        if($counter%2!=0)
        {
          ?>
           <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 restaurants-popular">
      <div class="pp-box">
      <img src="images/upload/<?php echo $valuepop['IMAGE'];?>" class="img-fluid box1">
      <h3 class="p1"><?php echo $valuepop['TITLE']?></h3>
        <div class="clearfix"></div>
        <h4>Party Events</h4>
        <h5><?php echo $valuepop['LOCATION'];?></h5>
        <a href="http://www.pharaohlounge.in/" target="_blank" class="btnenq btn1">ENQUIRE NOW</a>
      </div>
      </div>
          <?php

        }
        else
        {
          ?>
           <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 restaurants-popular">
      <div class="pp-box">
        <h3>BIRTHDAY</h3>
        <div class="clearfix"></div>
        <h4>Party Events</h4>
        <h5>Andheri East</h5>
        <a href="http://www.pharaohlounge.in/" target="_blank" class="btnenq p1 btn1">ENQUIRE NOW</a>
      <img src="images/upload/<?php echo $valuepop['IMAGE'];?>" class="img-fluid box2">
      
      </div>
      </div>
          <?php

        }
        
      $counter++;
       }
 ?>

      
    </div>
    </div>
  </div>
</section>
  <?php

}

$sql = "SELECT * FROM tbl_our_restaurant_amenities WHERE STATUS = 1";
$amanitieslist = $conn->query($sql);
if(mysqli_num_rows($amanitieslist)>0)
{
    $amanitieslist = mysqli_fetch_all($amanitieslist, MYSQLI_ASSOC);

  ?>

<section class="s-block">
  <div class="container-fluid">
    <div class="col-sm-12 text-center mb-5 mobile-padding">
      <img src="images\amenities.png" class="img-fluid">
    </div>
    <div class="col-sm-12 text-center amenities p0">
      <div class="row">

        <div class="col-sm-1"></div>
        <?php
         $counter=1;
         foreach ($amanitieslist as $keypop => $valuepop)
         { 
          ?>
          <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 p0"><img src="amenities\<?php echo  $valuepop['IMAGE']?>" class="img-fluid"><h3><?php echo  $valuepop['TITLE']?></h3></div>
          <?php
          if($counter%5==0)
          {
            echo '<div class="col-sm-1"></div></div><div class="row"><div class="col-sm-1"></div>';

          }
          $counter++;
         
           }
          ?>
          
        <div class="col-sm-1"></div>
      </div>
      
    </div>
  </div>
</section>
<?php
}
$sql = "SELECT * FROM tbl_gallery_images WHERE STATUS = 1 and TYPE=3";
$foodimages = $conn->query($sql);
if(mysqli_num_rows($foodimages)>0)
{
    $foodimages = mysqli_fetch_all($foodimages, MYSQLI_ASSOC);

  ?>

<section class="s-block">
  <div class="container-fluid text-center">
    <div class="col-sm-12 mb-5 mobile-padding"><img src="images\foodtop.png" class="img-fluid"></div>
    <div class="row">
      <?php
        
         foreach ($foodimages as $keypop => $valuepop)
         { 
          ?>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="foodbg">
          <img src="images\upload\gallery\<?php echo $valuepop['ORIGINAL_IMAGE']?>" class="img-fluid img1">
        </div>
        <h3 class="food"><?php echo $valuepop['IMAGE_LABEL']?></h3>
      </div>
      <?php
       }
      ?>
     
    </div>
  </div>
</section>
<?php 
}
if($details->SHEETING_IMAGE)
{
  ?>
<section class="s-block" style="padding-top: 0px;">
  <div class="container-fluid mobile-padding">
    <img src="images\seatingarea1.png" class="img-fluid mb-5" style="width: 100%">
  </div>
  <div class="container-fluid">
    <img src="images\<?php echo $details->SHEETING_IMAGE;?>" class="img-fluid" style="width: 100%">
  </div>
</section>
<?php

}
$sql = "SELECT * FROM tbl_gallery_images WHERE STATUS = 1 and TYPE=2";
$galleryimages = $conn->query($sql);
if(mysqli_num_rows($galleryimages)>0)
{
    $galleryimages = mysqli_fetch_all($galleryimages, MYSQLI_ASSOC);

  ?>

 
<section class="s-block" style="padding-bottom: 0px;">
  <div class="container-fluid text-center">
      <div class="col-sm-12">
        <img src="images\gallery-head.jpg" class="img-fluid mb-5">
      </div>
      <ul class="gallery">
        <?php
         $counter=1;
         foreach ($galleryimages as $keypop => $valuepop)
         { 
          ?>
        <li><img src="images\upload\gallery/<?php echo $valuepop['ORIGINAL_IMAGE'] ?>" class="img-fluid"></li>
        <?php
         }
        ?>

      </ul>
  </div>
</section>

<?php 
}
include('common/our_chefs.php'); 
include('common/ourclients.php');
include('common/workprocess.php');
include('common/footer.php');
 ?>