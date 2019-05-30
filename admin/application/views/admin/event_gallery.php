<?php 

$add = '<!-- DataTables -->
  <link rel="stylesheet" href="'.asset_url('plugins/datatables/dataTables.bootstrap.css').'">
  <link rel="stylesheet" href="'.asset_url('dist/css/bootstrap-toggle.css').'">';
$this->load->view('admin/parts/header', ['title' => 'Events Gallery List', 'add' => $add]); ?>
    <!-- Main content -->
    <style>
        // Responsive images (ensure images don't scale beyond their parents)
//
// This is purposefully opt-in via an explicit class rather than being the default for all `<img>`s.
// We previously tried the "images are responsive by default" approach in Bootstrap v2,
// and abandoned it in Bootstrap v3 because it breaks lots of third-party widgets (including Google Maps)
// which weren't expecting the images within themselves to be involuntarily resized.
// See also https://github.com/twbs/bootstrap/issues/18178
.img-fluid {
  @include img-fluid;
}


// Image thumbnails
.img-thumbnail {
  padding: $thumbnail-padding;
  background-color: $thumbnail-bg;
  border: $thumbnail-border-width solid $thumbnail-border-color;
  @include border-radius($thumbnail-border-radius);
  @include box-shadow($thumbnail-box-shadow);

  // Keep them at most 100% wide
  @include img-fluid;
}

//
// Figures
//

.figure {
  // Ensures the caption's text aligns with the image.
  display: inline-block;
}

.figure-img {
  margin-bottom: ($spacer / 2);
  line-height: 1;
}

.figure-caption {
  font-size: $figure-caption-font-size;
  color: $figure-caption-color;
}

    </style>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                
                 <div class=" text-left">
                <div class="btn-group">
                     <span data-placement="top" data-toggle="tooltip" title="Back">
                     <a href="<?php echo base_url('gallery') ?>" class="btn btn-primary btnPlus dvshwalert MR5">Back</a>
                    </span>
                </div>
        </div>
        
        
              <div class=" text-right">
                <div class="btn-group">
                     <span data-placement="top" data-toggle="tooltip" title="Delete">
                     <a href="javascript:;" class="btn btn-primary btnPlus dvshwalert MR5 deleteAll">Delete</a>
                    </span>
                </div>
        </div>
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
                   <!-- Page Content -->
    
    <?php 
        if(!empty($event_gallery)):
            foreach($event_gallery as $awkey=>$awval):
    ?>
        <div class="col-lg-3 col-md-4 col-xs-6" id="delete<?php echo $awval['GIMID'];?>">
          <a href="#" class="d-block mb-4 h-100">
              <!--http://placehold.it/400x300-->
            <img class="img-fluid img-thumbnail" src="<?php echo '../../'.$awval['ORIGINAL_IMAGE']?>" alt="" height="400" width="300">
          </a>
            <input type="checkbox" value="<?php echo $awval['GIMID'];?>" class="deleteimage">
        <a href="javascript:;" class="delete" id="<?php echo $awval['GIMID'];?>"><i class="fa fa-trash"></i></a>
        </div>
    
    <?php endforeach;
     endif;
     ?>
    
    
    <!-- /.container -->        
                          

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.delete').click(function(){
             var id = $(this).attr('id');
    		 $.ajax({
    			type: "GET",
    			url: '<?php echo base_url('gallery/gallery_delete')?>'+'/'+id,
    			dataType: "json",
    			success: function(data)
    			{
    			    if(data.success==true){
    				    $('#delete'+id).hide();	
    			    }    
    			}
    		});
        });
        
        $('.deleteAll').click(function(){
            var val = [];
            $(':checkbox:checked').each(function(i){
              val[i] = $(this).val();
            });
            $.ajax({
    			type: "POST",
    			url: '<?php echo base_url('gallery/gallery_deleteALL')?>',
    			dataType: "json",
    			data: {val:val},
    			success: function(data)
    			{
    			   console.log("test");
    				    $(':checkbox:checked').each(function(i){
                              var id = $(this).val();
                              console.log(id);
                              $('#delete'+id).hide();
                        });
    			       
    			}
    		});
        });
    });
</script>
<?php 
$this->load->view('admin/parts/footer');
?>