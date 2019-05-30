<?php 
$this->load->view('common/header');
 ?>

  	<section class="banner section-notch">
		<div class="banner-slider swiper-container" dir="rtl">

      <div class="swiper-wrapper">
    <?php
    foreach ($banner as $key => $value) {

      ?>

          <div class="banner-item slide-one swiper-slide">
            <div class="banner-overlay">  <img src="<?php echo !empty($value->IMAGE) ? base_url('uploads/image/'.$value->IMAGE): ''?>" width="700" height="800" alt="about image" class="img-responsive"></div>
              <div class="container">
                <div class="banner-content">
                  <h3><?php echo !empty($value->TITTLE) ? $value->TITTLE  : ''?></h3>
                  <h2><?php echo !empty($value->HEADER) ? $value->HEADER  : ''?></h2>
                  <p><?php echo !empty($value->ABOUT) ? $value->ABOUT  : ''?></p>
              
                </div><!-- banner-content -->
              </div><!-- container -->
          </div><!-- slide item -->
          
              
                <?php
     
    }
     ?>
		  	
		    	</div><!-- slide item -->
<div class="swiper-pagination"></div>
		  	</div><!-- swiper-wrapper -->
		  	
        </div><!-- swiper-container -->
  	</section><!-- banner -->
  	<!-- Banner End here -->
  	
  	
<?php
 $k=1;
    foreach ($thought as $key => $value) {
     if($k<=1):
      ?>
<div style="    background: #173b65;
    color: #ffffff;
    font-size: 28px;
    padding-top: 12px;"><marquee><?php echo $value->THOUGHT; ?></marquee></div>
    
             <?php
                      endif; 
                    $k++;}
                ?> 


  	<!-- facility Start here -->
  	<section class="facility padding-120">
  		<div class="container">
  			<div class="row">
  				<div class="col-md-3 col-sm-6 col-xs-12">
  					<div class="facility-item">
  						<span class="icon flaticon-symbols"></span>
  						<h4>Active Learning</h4>
  						<p>Uniquely productivate real time collaboration idea-sharing after awesome quality vectors after</p>
  					</div><!-- facility item -->
  				</div>
  				<div class="col-md-3 col-sm-6 col-xs-12">
  					<div class="facility-item">
  						<span class="icon flaticon-avatar"></span>
  						<h4>Expert Teachers</h4>
  						<p>Uniquely productivate real time collaboration idea-sharing after awesome quality vectors after</p>
  					</div><!-- facility item -->
  				</div>
  				<div class="col-md-3 col-sm-6 col-xs-12">
  					<div class="facility-item">
  						<span class="icon flaticon-world"></span>
  						<h4>Strategi Location</h4>
  						<p>Uniquely productivate real time collaboration idea-sharing after awesome quality vectors after</p>
  					</div><!-- facility item -->
  				</div>
  				<div class="col-md-3 col-sm-6 col-xs-12">
  					<div class="facility-item">
  						<span class="icon flaticon-line-chart"></span>
  						<h4>Full Day Programs</h4>
  						<p>Uniquely productivate real time collaboration idea-sharing after awesome quality vectors after</p>
  					</div><!-- facility item -->
  				</div>
  			</div><!-- row -->
  		</div><!-- container -->
  	</section><!-- facility -->
  	<!-- facility End here -->


  	<!-- About Start here -->
  	<section class="about section-notch">
  		<div class="overlay padding-120">
	  		<div class="container">
	  			<div class="row">
	  				<div class="col-md-6">
	  					<div class="about-image">
	  						<img src="<?php echo !empty($aboutImage[0]->IMAGE) ? base_url('uploads/image/'.$aboutImage[0]->IMAGE): ''?>" alt="class image" class="img-responsive">
	  					</div>
	  				</div>
	  				<div class="col-md-6">
	  					<div class="about-content">
	  						<h3>About Our School</h3>
	  						<p>At Smarten School, our mission is to develop the intellect and character of each student by providing outstanding educational facilities. We foster leadership, collaboration and creativity. Smarten School is always at the forefront in the use of modern Educational Technology. Our learning specialists and teachers are exclusively trained in the science of teaching and are guided by the study of attention, memory, language development and high order cognition.</p>
							<ul>
								<li><a href="<?php echo base_url('home/about-us/overview'); ?>" class="button-default">Read More</a></li>
							</ul>
	  					</div><!-- about content -->
	  				</div>
	  			</div><!-- row -->
	  		</div><!-- container -->
  		</div><!-- overlay -->
  	</section><!-- about -->
  	<!-- About End here -->


  <!-- Classes Start here -->
  	<section class="classes padding-120">
  		<div class="container">
  			<div class="section-header">
  				<h3>Our Popular Classes</h3>
  				<p>Rapidiously expedite granular imperatives before economically sound web services. Credibly actualize pandemic strategic themeplatform.</p>
  			</div>
  			<div class="row">

           <?php
            $k=1;
          foreach ($class as $key => $value) {
          if($k<=3):
           ?>
  				<div class="col-md-4 col-sm-6 col-xs-12">
  					<div class="class-item">
  						<div class="image">
  							<img src="<?php echo !empty($value->CLASS_IMAGE) ? base_url('uploads/image/'.$value->CLASS_IMAGE): ''?>" alt="class image" class="img-responsive">
  						</div>
  						<ul class="schedule">
  							<li>
  								<!--<span>Class Title</span>-->
  							<span><?php echo $value->CLASS_TITLE;?></span>
  							</li>
  							<!-- <li>
  								<span>Years Old</span>
  								  <span><?php echo $value->EMPLOYEE_AGE;?></span>
  							</li>
  							<li>
  								<span>Tution Fee</span>
  								  <span><?php echo $value->CLASS_FEE;?></span>
  							</li> -->
  						</ul>
  						<div class="content">
                <!-- <h4><a href="#">Imagination Classes</a></h4>
                <p><span>Class Time</span> : 08:00 am - 10:00 am</p> -->
                <p><?php echo $value->CLASS_DESCRIPTION;?></p>
              </div>
  						<div class="address">
  							<p><span><i class="fa fa-home" aria-hidden="true"></i></span></span><?php echo $value->CLASS_ADDRESS;?></p>
  						</div>
  					</div><!-- class item -->
  				</div>
  			
  	  <?php
                      endif; 
                    $k++;}
                ?> 
               
  			</div><!-- row -->
  			<div class="class-button">
  				<a href="<?php echo base_url('home/student'); ?>" class="button-default">See More Classes</a>
  			</div>
  		</div><!-- container -->
  	</section><!-- classes -->
  	<!-- Classes End here -->


  	   <!-- Teachers Start here -->
    <section class="teachers section-notch">
      <div class="overlay padding-120">
        <div class="container">
          <div class="section-header bg">
            <h3>Meet Our Teachers</h3>
            <p>Rapidiously expedite granular imperatives before economically sound web services. Credibly actualize pandemic strategic themeplatform.</p>
          </div>
                 
          <div class="row">
<?php
 $k=1;
 foreach ($users as $key => $usr) {
           if($k<=4):
            ?>
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="teacher-item">
                <div class="teacher-image">
                  <img src="<?php echo !empty($usr->IMAGES) ? base_url('uploads/image/'.$usr->IMAGES): ''?>" alt="teacher image" class="img-responsive">
                </div>
                <div class="teacher-content">
            
                <h4><?php echo $usr->NAME;?><span> <?php echo $usr->DESIGNATION;?></span></h4>
                  <ul>
                  <?php if(!empty($usr->FACEBOOK)): ?>
                    <li><a href="<?php echo $usr->FACEBOOK;?>"><i class="fa fa-facebook" target="_blank" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                     <?php if(!empty($usr->TWITTER)): ?>
                    <li><a href="<?php echo $usr->TWITTER;?>"><i class="fa fa-twitter" target="_blank" aria-hidden="true"></i></a></li>
                  <?php endif; ?>
                   <!--  <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li> -->
                  </ul>
                  <p><?php echo $usr->DISCRIPTION ?></p>
                 
                </div>
              </div><!-- teacher item -->
            </div>
        
         
                  <?php
               endif; 
                    $k++;}
                ?> 
 </div>
            

<div class="class-button" style="text-align:center;">
  				<a href="<?php echo base_url('home/teacher'); ?>" class="button-default">See More Teachers</a>
  			</div>
  
        </div>

      </div>
    </section>


  
  
  
<section class="gallery padding-120">
      <div class="container">
        <div class="section-header">
          <h3>Our School Events</h3>
        
        </div>
        <ul class="gallery-menu">
        <li class="active" data-filter="*">Show all</li>
          <?php
          
          foreach ($tag as $key => $value) {
              
           echo '<li data-filter=".'.$value->GTAGID.'">'.$value->TAG_NAME.'</li>';
          }
           ?>
          </ul>
           <div class="gallery-items">
          <?php
             foreach ($tag as $key => $value):
                $gallery = object_to_array($this->gallery->get_gallery_list(6, $page=false,'galr.GID','ASC',array('gtag.GTAGID'=>$value->GTAGID)));
              /*  echo $this->db->last_query();
                echo '<pre>';
                    print_r($gallery);
                    
                echo '<br>';*/
               
                    
              ?>
                
                  <?php
                  
                  if(!empty($gallery)):
                     $agid = array_column($gallery,'GID');
                    $get_gallery_image = $this->gallery->get_gallery_image($agid,3);  
                    foreach($get_gallery_image as $gkey=>$gallval):
                       $glID = userdata('gallary',array('GID'=>$gallval['GID']))->GTAGID;
                       $image = str_replace('./','',$gallval['ORIGINAL_IMAGE']);        
                    //if(file_exists(base_url($image))): 
                         
                       
                  ?>
                    <div class="gallery-item <?php echo $glID?>">
                      
                    <div class="gallery-image">
                      <img src="<?php echo !empty($gallval['ORIGINAL_IMAGE']) ? base_url($image): ''?>" alt="gallery image" class="img-responsive">
                      <div class="gallery-overlay"><div class="bg"></div></div>
                      <div class="gallery-content">
                        <a href="<?php echo !empty($gallval['ORIGINAL_IMAGE']) ? base_url($image): ''?>" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>
                        <h4><?php echo userdata('gallary',array('GID'=>$gallval['GID']))->HEADER?></h4>
                        <span><?php echo userdata('gallary',array('GID'=>$gallval['GID']))->TITLE;?></span>
                      </div>
                    </div>
                    </div>
                  <?php 
                 // endif;
                 
                  endforeach;
                  endif;
                ?>
                  
             <?php endforeach;
          ?>

</div><!-- gallery items -->
          <div class="gallery-button"><a href="<?php echo base_url('home/gallery'); ?>" class="button-default">View More Gallery</a></div>
      </div><!-- container -->
    </section>
   


  	<!-- Achievements Start here -->
  	<section class="achievements section-notch">
  		<div class="overlay padding-120">
  			<div class="container">
        <?php
 $k=1;
 foreach ($strength as $key => $str) {
           if($k<=1):
            ?>
	  			<div class="row">
		            <div class="col-md-3 col-sm-3 col-12">
		              <div class="achievement-item">
		              	<i class="icon flaticon-student"></i>
		                <span class="counter"><?php echo $str->STUDENTS ?></span><span>+</span>
		                <p>Total Students</p>
		              </div><!-- achievement item -->
		            </div>
		            <div class="col-md-3 col-sm-3 col-12">
		              <div class="achievement-item">
		              	<i class="icon flaticon-construction"></i>
		                <span class="counter"><?php echo $str->ROOMS ?></span>
		                <p>Class Rooms</p>
		              </div><!-- achievement item -->
		            </div>
		            <div class="col-md-3 col-sm-3 col-12">
		              <div class="achievement-item">
		              	<i class="icon flaticon-school-bus"></i>
		                <span class="counter"><?php echo $str->BUS ?></span>
		                <p>Schools bus</p>
		              </div><!-- achievement item -->
		            </div>
		            <div class="col-md-3 col-sm-3 col-12">
		              <div class="achievement-item">
		              	<i class="icon flaticon-people"></i>
		                <span class="counter"><?php echo $str->TEACHERS ?></span>
		                <p>Total Teachers</p>
		              </div><!-- achievement item -->
		            </div>
		          </div><!-- row -->
                  <?php
               endif; 
                    $k++;}
                ?> 
  			</div><!-- container -->
  		</div><!-- overlay -->
  	</section><!-- achievements -->
  	<!-- Achievements End here -->


  	<!-- Testimonial Start here -->
  	<section class="testimonial padding-120">
      <div class="container">
        <div class="section-header">
        <h3>What Parents Say</h3>
        <p>Rapidiously expedite granular imperatives before economically sound web services. Credibly actualize pandemic strategic themeplatform.</p>
      </div>
      <div class="testimonial-items">
        <div class="testimonial-slider swiper-container" dir="rtl">
          <div class="swiper-wrapper">

    <?php
 $k=1;
 foreach ($testimonial as $key => $value) {
           if($k<=6):
            ?>

          <div class="testimonial-item swiper-slide">
            <div class="testimonial-details">
              <p><?php echo $value->CONTENT ?></p>
              <h4><?php echo $value->NAME ?></h4>
                  <p><a href="<?php echo $value->LINK ?>" target="_blank" class="btn btn-primary MR5 ">Online</a></p>

            </div>
            <div class="testimonial-image">
               <img src="<?php echo !empty($value->IMAGE) ? base_url('uploads/image/'.$value->IMAGE): ''?>" alt="gallery image" class="img-responsive">
            </div>
          </div>

     <?php
               endif; 
                    $k++;}
                ?> 

          <!-- testimonial-item -->
          <!-- testimonial-item -->

          </div><!-- swiper-wrapper -->
        </div><!-- swiper-container -->
          </div><!-- testimonial-items -->
      </div><!-- container -->
    </section><!-- testimonial -->
  	<!-- Testimonial End here -->



<?php 
$this->load->view('common/footer');
?>
