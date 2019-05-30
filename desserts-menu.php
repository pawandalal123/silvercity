<?php include('common/header.php'); ?>
<div>
  <div class="container-fluid p0">
    <img src="images\menu-banner.png" class="img-fluid" style="width: 100%">
  </div>
</div>
<section class="s-block" style="padding-top: 10px;padding-bottom: 30px;">
  <div class="container-fluid">
  <?php include('common/menu.php'); ?>

    <div class="row menutype mt-3">
      <div class="col-md-5 col-sm-6">
        <center><img src="menu\indian.jpg" class="img-fluid mb-3"></center> 
        <ul class="row">
          <li class="col-md-6 col-sm-6 col-xs-12">Gulab Jamun</li>
          <li class="col-md-6 col-sm-6 col-xs-12">Malpua</li>
          <li class="col-md-6 col-sm-6 col-xs-12">Moong Dal Halwa</li>
          <li class="col-md-6 col-sm-6 col-xs-12">Gajar ka Halwa</li>
          <li class="col-md-6 col-sm-6 col-xs-12">Seviyan Kheer</li>
          <li class="col-md-6 col-sm-6 col-xs-12">Rabdi</li>
          <li class="col-md-6 col-sm-6 col-xs-12">Shahi Tukda</li>
          <li class="col-md-6 col-sm-6 col-xs-12">Kesari Rasmalai</li>
          <li class="col-md-6 col-sm-6 col-xs-12">Phirni</li>
          <li class="col-md-6 col-sm-6 col-xs-12">Moong dal halwa</li>
          <li class="col-md-6 col-sm-6 col-xs-12">Jalebi</li>
          <li class="col-md-6 col-sm-6 col-xs-12">Choice of Kulfi</li>
          <li class="col-md-6 col-sm-6 col-xs-12">Chawal ka kheer</li>        
        </ul>       
      </div>
      <div class="col-md-4 col-sm-6">
        <center><img src="menu\western.jpg" class="img-fluid mb-3"></center>
        <ul class="row">
          <li class="col-md-12">Choice of Ice cream</li>
          <li class="col-md-12">Panacotta ( Vanilla, Orange,Lemon, Saffron, rose)</li>
          <li class="col-md-12">Assorted pastries</li>
        </ul>
      </div>
      <div class="col-md-3 non-veg">
        <center><img src="menu\western-red.jpg" class="img-fluid mb-3"></center>
        <ul class="row">
          <li class="col-md-12">Caramel custard</li>
          <li class="col-md-12">Choice of Mousse</li>
          <li class="col-md-12">Choice of Pudding</li>
          <li class="col-md-12">Assorted pastries</li>
          <li class="col-md-12">Tiramisu</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="s-block" style="padding-top: 10px;padding-bottom: 30px;">
  <div class="container">
    <div class="row chefs">
       <div class="col-md-12 text-center mb-5">
          <h3 class="mb-3">OUR EXPERT CHEFS</h3>
          <h4>our chef used to work with taste and masala</h4>
      </div>
    </div>
  </div>
  <div class="chef">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="box">             
            <div class="icon">
              <img src="images\chefs.png" class="img-fluid image">
                <div class="info1">
                  <h3>BHIM BAITHA</h3><h4> The Continental Chef</h4>
                </div>
            </div>
          </div>
          <div class="space"></div>
        </div>      
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="box">             
            <div class="icon">
             <img src="images\chefs.png" class="img-fluid image">
                <div class="info1">
                  <h3>DHARMENDRA BORA</h3><h4>The Indian chef</h4>
                </div>
            </div>
          </div>
          <div class="space"></div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="box">             
            <div class="icon">
              <img src="images\chefs.png" class="img-fluid image">
                <div class="info1">
                  <h3>KRISHNA</h3><h4>The Oriental chef</h4>
                </div>
            </div>
          </div>
          <div class="space"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
include('common/workprocess.php'); 
include('common/popular_mumbai.php'); 
include('common/footer.php');
      ?>