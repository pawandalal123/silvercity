<?php
  $sql = "SELECT * FROM tbl_index_images WHERE SECTION_ID = 4";
  $result = $conn->query($sql);
  if(mysqli_num_rows($result)>0)
  {
      $data = mysqli_fetch_all ($result, MYSQLI_ASSOC);
      ?>
      <section class="s-block">
  <div class="container-fluid">
    <div class="col-sm-12 text-center pb-4 mb-5">
      <img src="images\our-clients.png" class="img-fluid">
    </div>
    <div class="col-sm-12">
      <div class="clients row">
        <div class="clienttop">
         <h2>5000<sup>+</sup><span class="client-we-serve"> CLIENTS WE SERVE</span><h2>
        </h2></h2></div>
        <ul class="gallery gallerys">
      <?php
       foreach ($data as $key => $value)
       { 
        ?>
       <li><img src="images/<?php echo $value['IMAGE']; ?>" class="img-fluid"></li>
                  
  <?php } ?>
                   </ul>
      </div>
    </div>    
  </div>
</section>
                  <?php

  }
  ?>