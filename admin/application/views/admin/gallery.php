<?php 

$add = '<!-- DataTables -->
  <link rel="stylesheet" href="'.asset_url('plugins/datatables/dataTables.bootstrap.css').'">
  <link rel="stylesheet" href="'.asset_url('dist/css/bootstrap-toggle.css').'">';
$this->load->view('admin/parts/header', ['title' => 'Event Details', 'add' => $add]); ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
      

          <div class="box">
            <div class="box-header">
              <div class=" text-right">
        
          <div class="btn-group"><span data-placement="top" data-toggle="tooltip" title="add"><a class="btn btn-primary btnPlus dvshwalert MR5" data-title="add" data-toggle="modal" data-target="#exampleModal" >Add Events </a></span></div>
        </div>
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <!--  <th>Image</th> -->
                   <th>Header name</th>
                   <th>Title name</th>
                 <!--   <th>Category name</th> -->
                   <th>Tag name</th>
                  <!-- <th>Created By</th> -->
                  <th>Created On</th>
                   <th>View</th> 
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
                if(!empty($gallery)) :
                    foreach($gallery as $catkey=>$cat):
                      ?>
                        <tr id="deletecategory<?php echo $cat->GID;?>">
                       <!--  <td><?php echo !empty($cat->ORIGINAL_IMAGE) ? '<img src="'.base_url("uploads/image/".$cat->ORIGINAL_IMAGE).'" height="50px" width="50px;">' : '';?></td>
                          -->
                          <td><?php echo $cat->HEADER;?></td>
                          <td><?php echo $cat->TITLE;?></td>
                        <!--   <td><?php echo $cat->CATEGORY_NAME;?></td> -->
                          <td><?php echo $cat->TAG_NAME;?></td>
                          <!-- <td><?php echo $cat->CATEGORY_NAME;?></td> -->
                          <!-- <td><?php echo $cat->NAME;?></td> -->
                          <td><?php echo date_formats($cat->CREATED_ON);?></td>
                          

                                <!-- <td>
                                     <label>
                              <input type="checkbox" id="<?php echo $cat->GID;?>" <?php echo ($cat->CATEGORY_STATUS==1) ? 'checked' : ''?> data-toggle="toggle" data-on="Active" data-off="Pending" class="category" >
                              </label>
                              </td> -->


                               <td> 
                                                  <span id="">
                                                      <a href="<?php echo base_url('gallery/view_gallery/'.$cat->GID) ?>" ><i class="fa fa-eye" ></i></a>
                                                  </span>
                                                  </td>



                                       <td> 
                                                  <span id="">
                                                      <a href="#" data-toggle="modal" data-target="#edit<?php echo $cat->GID; ?>"><i class="fa fa-edit" ></i></a>
                                                  </span>
                                                  </td>

                                                <td>
                                                  <span id="<?php echo $cat->GID;?>">
                                                    <a href="javascript:;" class="delete_category" id="<?php echo $cat->GID;?>"><i class="fa fa-trash"></i></a>

                                                  </span>
                                            </td>   

                          <div class="modal fade" id="edit<?php echo $cat->GID;?>" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
                              <div class="modal-dialog ">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="lnr lnr-cross" aria-hidden="true"></i></button>
                                    <h4 class="modal-title custom_align" id="Heading">Edit Events</h4>
                                  </div>

                                  <form name="" class="" action="<?php echo base_url('gallery/add_gallery')?>" method="POST" enctype="multipart/form-data">
                               <div class="modal-body">
                               <input type="hidden" name="GID" value="<?php echo $cat->GID;?>">
                                    <div class="form-group">
                                      <label for="recipient-name" class="col-form-label">Header Name:<span style="color: red">*</span></label>
                                      <input type="text" class="form-control" name='HEADER' id="recipient-name" value="<?php echo $cat->HEADER;?>" required="">
                                    </div>


                                    <div class="form-group">
                                      <label for="recipient-name" class="col-form-label">Title Name:<span style="color: red">*</span></label>
                                      <input type="text" class="form-control" name='TITLE' id="recipient-name" value="<?php echo $cat->TITLE;?>" required="">
                                    </div>

                                     <div class="form-group">
                                      <label for="recipient-name" class="col-form-label"> Image:</label>
                                      <input type="file" class="form-control" name='ORIGINAL_IMAGE[]' id="recipient-name" multiple="" >
                                      <?php 
                                        if(!empty($cat->ORIGINAL_IMAGE)):
                                       ?>
                                          <img src="<?php echo base_url('uploads/image/'.$cat->ORIGINAL_IMAGE) ? $cat->ORIGINAL_IMAGE : '' ;?>" height="50px" width="50px">
                                     <?php 
                                        endif;
                                     ?>
                                     
                                       <!--<div class="uploading none">
        <label>&nbsp;</label>
        <img src="uploading.gif" alt="uploading......"/>
    </div>-->
    
                                    </div>

               <!--  <div class="form-group">
                <label>Gallery Category<span style="color: red">*</span></label>
                <select style="width: 100% !important" class="form-control select2" name="GCID" value="<?php echo $cat->CATEGORY_NAME;?>"> 
                                  <option value="">Select Gallery Category</option>                   
                                    <?php                            
                                        foreach($category as $key =>  $gcat)
                                        {
                                          $select = ($cat->GCID==$gcat->GCID) ? 'selected' :'';
                                          echo '<option value='.$gcat->GCID.' '.$select.'>'.$gcat->CATEGORY_NAME.'</option>';
                                        }                           
                                    ?>                              
                       </select>
              </div> -->



              <div class="form-group">
                <label>Tags<span style="color: red">*</span></label>
                <select style="width: 100% !important" class="form-control select2"  name="GTAGID" required=""> 
                                  <option value="">Select Tags</option>                   
                                        <?php
                                             if(!empty($tag)):

                          foreach($tag as $key=>$val):
                             $selected = ($val->GTAGID==$cat->GTAGID) ? 'selected' : '';
                              echo '<option value='.$val->GTAGID.' '.$selected.'>'.$val->TAG_NAME.'</option>';
                           endforeach; 
                      endif;
                                        ?>                            
                       </select>
              </div>
          </div>
                                  <div class="modal-footer ">
                                    <div class="text-left">
                                      <button type="submit" class="btn btn-primary MR5" id="update" >Update</button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              </div>
                            </div>
                        </tr>
                    <?php 
                  endforeach;
                endif;
                ?>
              </tbody>
                
                </tfoot>
              </table>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Events</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form name="" class="" action="<?php echo base_url('gallery/add_gallery')?>" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Header Name:<span style="color: red">*</span></label>
                <input type="text" class="form-control" name='HEADER' id="recipient-name" required="">
              </div>


              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Title Name:<span style="color: red">*</span></label>
                <input type="text" class="form-control" name='TITLE' id="recipient-name" required="">
              </div>

               <div class="form-group">
                <label for="recipient-name" class="col-form-label"> Image: <span style="color: red">*</span></label>
                <input type="file" class="form-control" name='ORIGINAL_IMAGE[]' id="recipient-name" multiple="">
                
           
    
              </div>

               <!--  <div class="form-group">
                <label>Gallery Category<span style="color: red">*</span></label>
                <select style="width: 100% !important" class="form-control select2" name="GCID" value="<?php echo $cat->CATEGORY_NAME;?>"> 
                                  <option value="">Select Gallery Category</option>                   
                                    <?php                            
                                        foreach($category as $key =>  $cat)

                                        {
                                          $select = ($blog->GCID==$cat->GCID) ? 'selected' :'';
                                          echo '<option value='.$cat->GCID.' '.$select.'>'.$cat->CATEGORY_NAME.'</option>';
                                        }                           
                                    ?>                              
                       </select>
              </div> -->



              <div class="form-group">
                <label>Tags<span style="color: red">*</span></label>
                <select style="width: 100% !important" class="form-control select2"  name="GTAGID" required="">
                  <option value="">Select Tags</option>   
                    <?php 
                      if(!empty($tag)):
                          foreach($tag as $key=>$val):
                              echo '<option value='.$val->GTAGID.'>'.$val->TAG_NAME.'</option>';
                           endforeach; 
                      endif;
                    ?> 
                </select>
              </div>




          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
          </div>
       </form>
    </div>
  </div>
</div> 

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>


<script type="text/javascript"> 

    $(document).ready(function(){

    $("form[name='add_category']").submit(function(e) {    
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '',
            type: "POST",
            data: formData,
            dataType: "json",
           // async: false,
              beforeSend: function() {
            $('#submit').html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...');
            $('#submit').prop("disabled",true);
         },
      complete: function() {
        $('#submit').html('Update');
        $('#submit').prop("disabled",false);
      },
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
                  window.location.reload();
              }, 1000);
            }
         },
            cache: false,
            contentType: false,
            processData: false
        });
        e.preventDefault();
    });


     $("form[name='update_category']").submit(function(e) {    
      var formData = new FormData($(this)[0]);
      $.ajax({
        url: '<?php echo base_url('gallery/update_gallery')?>',
        type: "POST",
        data: formData,
        dataType: "json",
       // async: false,
        beforeSend: function() {
            $('#update').html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...');
            $('#update').prop("disabled",true);
         },
      complete: function() {
        $('#update').html('Update');
        $('#update').prop("disabled",false);
      },
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
              window.location.reload();
            }, 1000);
        }
       },
        cache: false,
        contentType: false,
        processData: false
      });

      e.preventDefault();
    });

  /*$(".category").change(function() {    
      var categoryID = $(this).attr("id");  
     //alert(categoryID);    
      $.ajax({
           type: "GET",
           url: '<?php echo base_url('gallery/change_gallery_category')?>'+'/'+categoryID,
           dataType: "json",
           success: function(data)
           {
                  
              },
        });
    });
*/
  

     
      
      
      
            
      
$('.delete_category').click(function(){
      var teachersID  = $(this).attr('id');
    
      $('.show_message').html('<div class="alert alert-danger"><br>Are you sure you want to delete this Record?</div>');
      $('#teachersID').val(teachersID);
     
      $('#alert_box').modal('show');
    });
  

     


      $('.delete_teacher').click(function(){
        var teachersID  = $('#teachersID').val();

         //alert(teachersID); die;
         
           $.ajax({
            type: "GET",
       url: '<?php echo base_url('gallery/delete_gallery')?>'+'/'+teachersID,
            dataType: "json",
            success: function(data)
            {
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
                $('#delete_teacher'+teachersID).hide();
                 setTimeout(function(){
              window.location.reload();
            }, 1000);
                
              }
             $('#alert_box').modal('hide');
            }
          });
      });
      
    
  });
  </script>

<?php 
$add = '
<!-- DataTables -->
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
  });
</script>';
$this->load->view('admin/parts/footer', ['add' => $add]); ?>