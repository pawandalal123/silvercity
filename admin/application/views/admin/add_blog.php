<?php 
$add = '<!-- DataTables -->
<link rel="stylesheet" href="'.asset_url('plugins/select2/select2.min.css').'">
  <link rel="stylesheet" href="'.asset_url('plugins/datatables/dataTables.bootstrap.css').'">
  <link rel="stylesheet" href="'.asset_url('dist/css/bootstrap-toggle.css').'">';
$this->load->view('admin/parts/header', ['title' => 'Add Blog', 'add' => $add]); ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <div class=" text-left">
        
          <div class="btn-group"><span data-placement="top" data-toggle="tooltip" title="add"><a href="<?php echo base_url('blog') ?>" class="btn btn-primary btnPlus dvshwalert MR5">Back</a></span></div>
        </div>
             </div>
            <!-- /.box-header -->
            <div class="box-body">
          
           <div class="row">
           <form name="add_blog" class="add_blog" action="" method="POST">
            <div class="col-md-6">
              
                                  
              </div>
              <!-- /.form-group -->
              <!-- <div class="col-md-6">
<div class="form-group">
                    <label >Sub Category Name<span style="color: red">*</span></label>
                    
                     
                      <select style="width: 100% !important" class="form-control select2" name="SUBID" > 
                <option value="">Select Sub Category</option>                   
                  <?php                            
                      foreach($subcategory_details as $scat)
                      {
                        $select = ($content->SUBID==$scat->SUBID) ? 'selected' :'';
                        echo '<option value='.$scat->SUBID.' '.$select.'>'.$scat->SUB_NAME.'</option>';
                      }                           
                  ?>                              
              </select>
                    </div>
                                  
              </div> -->
            <!-- /.col -->
            <div class="col-md-12">

            <div class="form-group">
                <label>Category</label>
                <select style="width: 100% !important" class="form-control" name="CATEGORY_ID" > 
                                  <option value="">Select Category</option>                   
                                    <?php                            
                                        foreach($category as $key =>  $cat)

                                        {
                                          $select = ($blog->CATEGORY_ID==$cat->CATEGORY_ID) ? 'selected' :'';
                                          echo '<option value='.$cat->CATEGORY_ID.' '.$select.'>'.$cat->CATEGORY_NAME.'</option>';
                                        }                           
                                    ?>                              
                 </select>
              </div>

           <!--   <div class="form-group">
                <label>Tags<span style="color: red">*</span></label>
                <select style="width: 100% !important" class="form-control select2" name="TAG_ID[]" multiple="" > 
                                  <option value="">Select Tags</option>                   
                                    <?php                            
                                        foreach($tag as $tag)
                                        {
                                          $json_decode = json_decode($blog->TAG_ID,true);
                                         
                                          $select = in_array($tag->TAG_ID,$json_decode) ? 'selected' :'';
                                          echo '<option value='.$tag->TAG_ID.' '.$select.'>'.$tag->TAG_NAME.'</option>';
                                        }                           
                                    ?>                              
                       </select>
              </div>-->

              
              <!-- /.form-group -->
              <div class="form-group">
                <label>Post Name<span style="color: red">*</span></label>
                <input type="text" class="form-control" name='POST_NAME' id="recipient-name" value="<?php echo !empty($blog->POST_NAME) ? $blog->POST_NAME : '';?>">
              </div>


               <div class="form-group">
                <label>Post Title<span style="color: red">*</span></label>
                <input type="text" class="form-control" name='POST_TITLE' id="recipient-name" value="<?php echo !empty($blog->POST_TITLE) ? $blog->POST_TITLE : '';?>">
              </div>

              <div class="form-group">

                <label>Image<span style="color: red">*</span></label>
                 <input type="file" class="form-control" name="POST_IMAGE" id="recipient-name">
                 <?php 
                  if(!empty($blog->POST_IMAGE)):
                 ?>
                    <img src="<?php echo base_url('uploads/image/'.$blog->POST_IMAGE);?>" height="50px" width="50px">
               <?php 
                  endif;
               ?>
              </div>

              <!-- /.form-group -->

              <input type="hidden" name="ID" value="<?php echo !empty($blog->ID) ? $blog->ID : '';?>">
            </div>
           
             <div class="clearfix"></div>
                 <div class="col-md-12">
                 <div class="form-group">
                <label>Content</label>
              

                <?php echo $this->ckeditor->editor("POST_CONTENT",$blog->POST_CONTENT);?>
              </div>
          </div>

              <div class="text-right">
                <button type="submit" class="btn btn-primary MR5"><?php echo !empty($blog) ? 'Update' : 'Submit' ?></button>
               </div>
            </form>
            
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

    $("form[name='add_blog']").submit(function(e) {  
      for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '<?php echo base_url('blog/add')?>',
            type: "POST",
            data: formData,
            dataType: "json",
            async: false,
            success: function (data) {
              $('body,html').animate({ scrollTop: 0 }, 200);
                    $.bootstrapGrowl(data.msg,{
                      ele: 'body',
                      type: data.type,
                      offset: {from: 'top', amount: 20},
                      align: 'right',
                      width: 400,
                      delay: 4000,
                      allow_dismiss: true,
                      stackup_spacing: 10
                   });  
              if(data.success==true){
                setTimeout(function(){
                  window.location.href='<?php echo base_url('blog')?>';
              }, 1000);
            }
         },
            cache: false,
            contentType: false,
            processData: false
        });
        e.preventDefault();
    });
});


  </script>

<?php 
$add = '
<!-- DataTables -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="'.asset_url('plugins/datatables/jquery.dataTables.min.js').'"></script>
<script src="'.asset_url('plugins/datatables/dataTables.bootstrap.min.js').'"></script>
<script src="'.asset_url('dist/js/bootstrap-toggle.js').'"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $(\'#example2\').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

     $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace(\'editor1\');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });

  });
</script>
<script src="'.asset_url('plugins/select2/select2.full.min.js').'"></script>
<script src="'.asset_url('dist/js/bootstrap-toggle.js').'"></script>
<script>
  $(function () {
    $(".select2").select2();    
  });
</script>';
$this->load->view('admin/parts/footer', ['add' => $add]); ?>