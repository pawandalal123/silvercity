<?php 
include('common/header.php'); 
include('common/slider.php'); 
include('common/whatwedo.php');
$sql = "SELECT * FROM tbl_index_images WHERE SECTION_ID = 5";
$result = $conn->query($sql);
$data = mysqli_fetch_all ($result, MYSQLI_ASSOC);
        ?>
<section class="s-block abouts">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-12 col-xs-12"><!-- <img src="images/Chef-High.png" class="img-fluid mobile"> --></div>
      <div class="col-lg-7 col-md-12 col-xs-12 col-sm-12 text-center">
        <h2 class="mt10" style="text-transform: unset;"><?php echo $data[0]['HEADER']; ?></h2>
        <p><?php echo $data[0]['ABOUT']; ?></p>
          <a class="btn" href="our-story.php">Read More</a>
      </div>
    </div>
  </div>
</section>
<section class="s-block" style="padding: 70px 0 30px;">
  <div class="container-fluid">
    <div class="row loungmb">
      <div class="col-md-12 text-center">
      <h2 class="upper partymb">TOP PARTY CATEGORY</h2>
        <?php


        $sql = "SELECT * FROM tbl_index_images WHERE SECTION_ID = 0";
        $result = $conn->query($sql);

        $data = mysqli_fetch_all ($result, MYSQLI_ASSOC);


         ?>


        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10 text-center topparty">
          <h6>Bringing people to the table since 2016. SILVER SPOON HOSPITALITY I is a pioneered Company committed to providing handcrafted food and execptional service at affordable prices.</h6>
        </div>
        <div class="col-md-1"></div>
    </div>
  </div>
  <div class="container-fluid" style="padding: 0 30px;">
    <div class="row">

    <?php 
foreach ($data as $key => $value) { ?>

 <div class="col-md-6">
        <div class="row borders">
          <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12 p0 party">
            <img src="images/<?php echo $value['IMAGE'];?>" class="img-fluid">
          </div>
          <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12 p0 party text-center">
            <h4><?php echo $value['HEADER'];?></h4>
            <p><?php echo $value['about'];?>.</p>
            <a class="btn" href="house-party.php" style="padding: .17rem 2.15rem;">Book Now</a><br>
            <a class="btn" href="#">Download Menu</a>
          </div>
        </div>
      </div>
<?php } ?>
     
      
    </div>
    <br>
    
  </div>
</section>
<section class="s-block" style="padding-bottom: 10px;">
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12 text-center">
          <h2 class="loungmb">EXPLORE OUR EXQUISITE MENU</h2>
        </div>
        <div class="col-md-1 text-center"></div>
        <div class="col-md-10 text-center homemenu">
          <h1 class="extralight">“FOR SILVER SPOON, CATERING YOUR SPECIAL EVENT IS A PREVILEGE."</h1>
        </div>
        <div class="col-md-1 text-center"></div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="row menu text-center">


<?php
$sql = "SELECT * FROM tbl_index_images WHERE SECTION_ID = 1";
$result = $conn->query($sql);

$data = mysqli_fetch_all ($result, MYSQLI_ASSOC);

foreach ($data as $key => $value) { ?>

 <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
            <div class="text-center pt-3 pb-3 menuchange">
              <img src="images/<?php echo $value['IMAGE']; ?>" class="img-fluid">
              <img src="images/<?php echo $value['HOWER_IMAGE']; ?>" class="img-fluid img-top">
              <h6><?php echo $value['HEADER']; ?></h6>
            </div>
          </div>
<?php } ?>


         
           
        </div>
      </div>
    </div>
  </div>
</section>
<section class="s-block">
  <div class="container-fluid">
    <div class="row mb-4">
      <div class="col-md-12 text-center mb-4">
          <h2>BEST SELLER</h2>
      </div>
    </div>
    <div class="">
      <div class="col-md-12">
        <div class="row">
        <?php
$sql = "SELECT * FROM tbl_index_images WHERE SECTION_ID = 2";
$result = $conn->query($sql);

$data = mysqli_fetch_all ($result, MYSQLI_ASSOC);

foreach ($data as $key => $value) { ?>


          <div class="col-xl-3 col-md-6 col-sm-6 col-xs-12 text-center p0 seller">
            <img src="images/<?php echo $value['IMAGE']; ?>" class="img-fluid">
           <!--  <div class="centered"><h6>HOUSE PARTY</h6><h4>CATERING</h4></div> -->
            <a class="btn4" href="house-party.php">Book Now</a>
          </div>
          <?php } ?>
           
        </div>
      </div>
    </div>
  </div>
</section>
<section class="s-block" style="padding-bottom: 40px;">
  <div class="container-fluid">
    <div class="">
      <div class="col-md-12">
        <div class="row borders mum">
          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 text-center p0 mumbaimt">
            <h4>MUMBAI</h4>
            <h2>REAL WEDDING</h2>
            <h5 style="font-family: inherit;">GET INSPIRED FOR YOUR BIG DAY</h5>
            <a class="btn3" href="wedding-party.php" style="font-weight: 900">Book Now</a>
          </div>
          <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 p0">
            <img src="images\real-wedding.png" class="img-fluid" style="min-height: 150px;padding: 3px;">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="s-block" style="padding-bottom: 40px;">
  <div class="container-fluid">
    <div class="">
      <div class="col-md-12">
        <div class="row borders mum">
          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p0">
            <img src="images\packages.jpg" class="img-fluid package-img" style="width: 100%;height: 100%;">
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="companyvalue topsection2">
              <h1>PACKAGES</h1>
              <p style="font-weight: 100;">Redefining catering and banqueting with varied buffet packages and customised services.</p>
              <a href="all-party-packages.php" class="btn3" style="font-family: inherit;">VIEW OUR PACKAGES</a>
            </div>
          </div>          
        </div>
      </div>
    </div>
  </div>
</section>
<!-- <section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 text-center catering">
        <h2>What's Popular in Catering</h2>
      </div>
    </div>
  <div class="container-fluid mb-4">
    <div class="row">  
      <div class="col-md-6 col-xs-12">
        <div class="row borders">
            <div class="col-md-8 col-xs-8 p0">
              <img src="images/catering1.jpg" class="img-fluid">
            </div>
            <div class="col-md-4 col-xs-4 text-center p0 popmt">
              <h5>Royal Wedding</h5>
              <hr>
              <h4>The taste of silver spoon</h4>
              <a class="btn1" href="#">Book Now</a>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12">
        <div class="row borders">
            <div class="col-md-4 col-xs-4 text-center p0 popmt">
              <h5>Cocktail Party</h5>
              <hr>
              <h4>The taste of silver spoon</h4>
              <a class="btn1" href="#">Book Now</a>
            </div>
            <div class="col-md-8 col-xs-8 p0">
              <img src="images/catering2.jpg" class="img-fluid">
            </div>
        </div>
    </div>
  </div>
</section> -->
<section class="s-block" style="padding-bottom:10px">
  <div class="container">
    <div class="row">
        <div class="col-md-12 text-center easiest">
          <h3>THE EASIEST WAY TO ORDER FOR BUSINESS & PRIVATE PARTIES</h3>
        </div>
    </div>
    <div class="row" style="padding: 15px 0 70px;">
            <?php
$sql = "SELECT * FROM tbl_index_images WHERE SECTION_ID = 3";
$result = $conn->query($sql);

$data = mysqli_fetch_all ($result, MYSQLI_ASSOC);

foreach ($data as $key => $value) { ?>

        <div class="col-md-4">
          <div class="box">
            <div class="box-icon menuchange1"><img src="images/<?php echo $value['IMAGE']; ?>" class="img-fluid"><img src="images/<?php echo $value['HOWER_IMAGE']; ?>" class="img-fluid img-top"></div>
            <div class="info">
              <h4 class="text-center"><?php echo $value['HEADER']; ?></h4>
              <p><?php echo $value['ABOUT']; ?></p>
            </div>
          </div>
        </div>
        <?php } ?>
       
    </div>
  </div>
  <div class="container-fluid" style="padding: 0 45px 20px;">
    <div class="row">
      <div class="col-md-5 borders">
        <div class="text-center clicks tab-clicks">
          <img src="images\thumb.jpg" class="img-fluid" style="max-height: 50px;width: auto;">
          <h2>Click . Choose . Cater</h2>
          <h5 style="font-size: 1.6rem;font-weight: 100;margin-bottom: 1rem;">FOOD IS IN YOUR POCKET.</h5>
          <a class="btn4" href="all-party-packages.php">Book now</a>
        </div>
      </div>
      <div class="col-md-2 mb-5 mt-6 text-center ser-center">
        <h3>Two <br>Easy Ways <br>to Feed You</h3>
        <img src="images\des.png" style="margin: 0 auto;height: 30px;">
      </div>
      <div class="col-md-5 borders p0">
          <div class="row ser-bg">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12"></div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 concierge text-center">
              <h5>CONCIERGE SERVICE</h5>
              <h6>We're not a website or IVR System,Human answer the phone on:<br><br><span>+91-9916991112</span><br><span>or</span><br><span>Let us call you back</span></h6>
              <a class="btn2" href="#">Call Now</a>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>
<section class="s-block" style="padding-bottom: 25px;">
  <div class="container-fluid">
    <div class="row loungmb">
        <div class="col-md-12 text-center">
          <h2 class="upper">OUR LOUNGE</h2>
        </div>
    </div>
  </div>
  <div class="container-fluid" style="padding: 0 45px;">
    <div class="row borders">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p0 lounge">
          <img src="images\lounge.jpg" class="img-fluid" style="padding: 3px;">
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 text-center lounge mobile-lounge p0" style="margin-top: 1.9rem;">
          <h4 style="text-decoration: underline;">THE EGYPTIAN LOUNGE</h4>
          <h5>FEEL THE RHYTHM OF THE ENDLESS NIGHT</h5>
          <p>Corporate Party | Birthday Party | Cocktail Party | Team Gathering</p><p><b>ANDHERI EAST | MUMBAI</b></p>
          <a class="btn3" href="http://www.pharaohlounge.in/ " target="_blank">Book Venue</a>
        </div>
      </div>
    </div>
  
</section>
<section class="s-block" style="padding-bottom: 30px;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10 text-center clients" style="border-color: transparent;">
          <h2 class="mb-3">Clients</h2>
          <p class="mb-4" style="font-size: 1.75rem;font-weight: 100">We are acclaimed for catering numerous social,corporate as well as civic community's events in MUMBAI with remarkable consideration and proficiency.</p>
      </div>
      <div class="col-md-1"></div>
    </div>
    <div class="">
      <div class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
             <div class="row">
                      <?php
                      $sql = "SELECT * FROM tbl_index_images WHERE SECTION_ID = 4";
                      $result = $conn->query($sql);

                      $data = mysqli_fetch_all ($result, MYSQLI_ASSOC);

                      foreach ($data as $key => $value) { ?>

                                     
                                          <div class="col-sm-2 col-xs-6"><img class="d-block w-100" src="images/<?php echo $value['IMAGE']; ?>" alt="1 slide"></div>
                                         
                                      
                                      <?php } ?>
                </div>
            </div>
          
        </div>
      </div>
    </div>
  </div>
</section>
<section class="s-block" style="padding-bottom: 30px;">
  <div class="container-fluid">
    <div class="row mb-4">
       <div class="col-md-12 text-center">
          <h2>THE BLOG</h2>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 p0">
          <div class="box pr10">             
            <div class="icon">
              <img src="images\blog1.jpg" class="img-fluid image">
              <!-- <div class="image"><i class="fa fa-soundcloud"></i></div> -->
                <div class="info">
                  <h3 class="title">TASTY DESSERT</h3>
                  <h5>2nd Jan’ 2019</h5>
                  <p>
                    Our chef has been busy lately preparing some new delicious deserts recepies. You can try new flavour of popular tiramisu cake, with a fresh taste of strawberries,
                  </p>
                <a class="btn4" href="#">READ MORE</a>
              </div>
            </div>
          </div>
          <div class="space"></div>
        </div>      
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 p0">
          <div class="box pr10">             
            <div class="icon">
              <img src="images\blog2.jpg" class="img-fluid image">
              <!-- <div class="image"><i class="fa fa-soundcloud"></i></div> -->
                <div class="info">
                  <h3 class="title">FAMILY GATHERING</h3>
                  <h5>17th Jan’ 2019</h5>
                  <p>
                    Any family or friends gathering is a reason for celebration, isn’t it. We present you latest catering event, with Brook’s family that occured this summer in our Pharaoh lounge at Chakala Mumbai.
                  </p>
                <a class="btn4" href="#">READ MORE</a>
              </div>
            </div>
          </div>
          <div class="space"></div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 p0">
          <div class="box pr10">             
            <div class="icon">
              <img src="images\blog3.jpg" class="img-fluid image">
              <!-- <div class="image"><i class="fa fa-soundcloud"></i></div> -->
                <div class="info">
                  <h3 class="title">INDIAN FOOD</h3>
                  <h5>1st Feb’ 2019</h5>
                  <p>
                   The samosas are a fried or baked pastry with a savoury filling, such as spiced potatoes, onions, peas, lentils, and minced meat (lamb, beef or chicken).
                  </p>
                <a class="btn4" href="#">READ MORE</a>
              </div>
            </div>
          </div>
          <div class="space"></div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 p0">
          <div class="box pr10">             
            <div class="icon">
              <img src="images\blog4.jpg" class="img-fluid image">
              <!-- <div class="image"><i class="fa fa-soundcloud"></i></div> -->
                <div class="info">
                  <h3 class="title">ORIENTAL FOOD</h3>
                  <h5>26th Feb’ 2019</h5>
                  <p>
                    Every week we bring you fresh recipes ideas for your table. This week we decided to feature some of our Oriental table specials.It’s the perfect time of the year for using letilwine in your everyday dishes!
                  </p>
                <a class="btn4" href="#">READ MORE</a>
              </div>
            </div>
          </div>
          <div class="space"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include('common/our_chefs.php'); 

$sql = "SELECT * FROM  tbl_testimonial WHERE STATUS = 1";
$result = $conn->query($sql);

$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);

?>

<section class="s-block" style="padding-bottom: 20px;">
  <div class="container">
    <div class="row">
       <div class="col-md-12 text-center loungmb customer">
          <h2>Customer Stories</h2>
          <h3 style="font-weight: 100;font-size: 2.1rem;">What our happy clients say about us</h3>
      </div>
    </div>
  </div>
  <div class="testimonial" style="background: #fff;">
    <div class="container">
      <div class="row">
        <div class="carousel slide" data-ride="carousel">
          <div class="carousel-inner text-center mt-5 mb-4">

<?php 
$i = 1; ?>

              <div class="carousel-item client active">
                  <div class="row">


<?php foreach ($json as $key => $value) { ?>

                      <div class="col-sm-4 col-xs-12 customer-stories">
                        <img src="images/<?php echo $value['IMAGE']; ?>" class="img-fluid">
                        <h4><?php echo $value['NAME']; ?></h4>
                        <h5><?php echo $value['ABOUT']; ?></h5>
                        <p><?php echo $value['CONTENT']; ?></p>
                      </div>
                     


<?php $i++; } ?>
                  </div>
              </div>
              


          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
include('common/workprocess.php');
include('common/footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function()
    {
       var owl = $('.owl-carousel4')
      owl.owlCarousel({
            loop:true,
            nav: true,
            autoplay: true,
            autoplaySpeed: 1200,
            autoplayHoverPause:false,
            margin:12,
          responsive:{
        0:{
          items:1,
          margin:5,
          stagePadding: 20
        },
        640:{
          items:1,
          margin:8,
          stagePadding: 40
        },
        768:{
          items:1,
          stagePadding: 60
        },
        1024:{
          items:1,
          stagePadding: 60
        },
        1170:{
          items:1,
          stagePadding: 260
        }
        }
        })

    });
  </script>