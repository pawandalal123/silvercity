<?php 
$add = '<!-- DataTables -->
  <link rel="stylesheet" href="'.asset_url('plugins/datatables/dataTables.bootstrap.css').'">
  <link rel="stylesheet" href="'.asset_url('dist/css/bootstrap-toggle.css').'">';
$this->load->view('admin/parts/header', ['title' => 'Banner Upload', 'add' => $add]); ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
      

          <div class="box">
            <div class="box-header">
              <div class=" text-right">
        
          <div class="btn-group"><span data-placement="top" data-toggle="tooltip" title="add"><a class="btn btn-primary btnPlus dvshwalert MR5" data-title="add" data-toggle="modal" data-target="#exampleModal" >Add Banner </a></span></div>
        </div>
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>Image</th>
                   <th>Page Name</th>
                   <th>Tittle Name</th>
                   <th>Header</th>
                   <th>About</th>
                  <th>Created On</th>
                    <!-- <th>Tag Status</th> -->
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
                if(!empty($banner)) :
                    foreach($banner as $bankey=>$ban):
                      ?>
                        <tr id="deletetag<?php echo $ban->BID;?>">
                         <td><?php echo !empty($ban->IMAGE) ? '<img src="'.base_url("uploads/image/".$ban->IMAGE).'" height="50px" width="50px;">' : '';?></td>

                         <?php if($ban->BANNER_PAGE==0):
                         ?> <td><?php echo "Index Page";?></td>
                         <?php
                         elseif($ban->BANNER_PAGE==1): 
                         ?><td><?php echo "Our Story Page";?></td>   
                       <?php
                         elseif($ban->BANNER_PAGE==2): 
                         ?><td><?php echo "Cuisine Page";?></td>
                       <?php
                         elseif($ban->BANNER_PAGE==3): 
                         ?><td><?php echo "Catering Services Page";?></td>
                       <?php
                         elseif($ban->BANNER_PAGE==4): 
                         ?><td><?php echo "Our Restaurant Page";?></td>
                       <?php
                         elseif($ban->BANNER_PAGE==5): 
                         ?><td><?php echo "Menu Page";?></td>
                       <?php
                         elseif($ban->BANNER_PAGE==6): 
                         ?><td><?php echo "Media Page";?></td>
                       <?php
                         elseif($ban->BANNER_PAGE==7): 
                         ?><td><?php echo "Blog Page";?></td>
                       <?php
                         elseif($ban->BANNER_PAGE==8): 
                         ?><td><?php echo "Gallery Page";?></td>
                       <?php  endif; ?>
                         




                          <td><?php echo $ban->BANNER_NAME;?></td>
                          <td><?php echo $ban->HEADER;?></td>
                          <td><?php echo substr($ban->ABOUT,0,150);?></td>
                          <!-- <td><?php echo $tag->SLUG;?></td> -->
                          
                          <td><?php echo date_formats($ban->CREATED_ON);?></td>
                          <!-- <td><?php echo $tag->NAME;?></td> -->
                          

                               <!--  <td>
                                     <label>
                              <input type="checkbox" id="<?php echo $ban->BID;?>" <?php echo ($ban->BID) ? 'checked' : ''?> data-toggle="toggle" data-on="Active" data-off="Pending" class="tag" >
                              </label>
                              </td> -->
                                            <td> 
                                                  <span id="">
                                                      <a href="#" data-toggle="modal" data-target="#edit<?php echo $ban->BID; ?>"><i class="fa fa-edit" ></i></a>
                                                  </span>
                                                  </td>

                                                <td>
                                                  <span id="<?php echo $ban->BID;?>">
                                                    <a href="javascript:;" class="delete_banner" id="<?php echo $ban->BID;?>"><i class="fa fa-trash"></i></a>

                                                  </span>
                                            </td>   

                          <div class="modal fade" id="edit<?php echo $ban->BID;?>" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
                              <div class="modal-dialog ">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="lnr lnr-cross" aria-hidden="true"></i></button>
                                    <h4 class="modal-title custom_align" id="Heading">Edit Banner</h4>
                                  </div>

                                  <form name="update_banner" class="update_banner" action="" method="POST">

                                  <div class="modal-body">
                                    <div class="row">
                                      <label class="control-label col-md-3 MT5 text-right">Tittle Name<span style="color: red">*</span><span ></span></label>
                                      <div class="form-group col-md-5">
                                        <input type="hidden" name="BID" value="<?php echo $ban->BID;?>">
                                        <input class="form-control" id="groupname" type="text" name="BANNER_NAME" value="<?php echo $ban->BANNER_NAME;?>">
                                      </div>
                                    </div>
                                

                                    <div class="row">
                                      <label class="control-label col-md-3 MT5 text-right">Header<span style="color: red">*</span><span ></span></label>
                                      <div class="form-group col-md-5">
                                        <input type="hidden" name="BID" value="<?php echo $ban->BID;?>">
                                        <input class="form-control" id="groupname" type="text" name="HEADER" value="<?php echo $ban->HEADER;?>">
                                      </div>
                                    </div>

                                    <div class="row">
                                      <label class="control-label col-md-3 MT5 text-right">About<span style="color: red">*</span><span ></span></label>
                                      <div class="form-group col-md-8">
                                        <input type="hidden" name="BID" value="<?php echo $ban->BID;?>">
                                        <input class="form-control" id="groupname" type="text" name="ABOUT" value="<?php echo $ban->ABOUT;?>">
                                      </div>
                                    </div>


                                    <div class="form-group">
                                      <label for="recipient-name" class="col-form-label">Banner Image:</label>
                                      <input type="file" class="form-control" name='IMAGE' id="recipient-name" >
                                      <?php 
                                        if(!empty($ban->IMAGE)):
                                       ?>
                                          <img src="<?php echo base_url('uploads/image/'.$ban->IMAGE) ? $ban->IMAGE : '' ;?>" height="50px" width="50px">
                                     <?php 
                                        endif;
                                     ?>
                                    </div>

                                  <div class="form-group">
                                      <label class="control-label ">Banner Page Name<span style="color: red">*</span><span ></span></label>
                                         <select style="width: 100% !important" class="form-control select2" name="BANNER_PAGE" > 
                                            <option value="" >Select Page </option>
                                            <option value="0" <?php echo ($ban->BANNER_PAGE==0) ? 'Selected' : ''  ?>>Index</option>
                                            <option value="1" "<?php echo $ban->BANNER_PAGE==1 ? 'Selected' : ''   ?>>Our Story</option>
                                            <option value="2" <?php echo $ban->BANNER_PAGE==2 ? 'Selected' : ''  ?>>Cuisine </option>
                                            <option value="3" <?php echo $ban->BANNER_PAGE==3 ? 'Selected' : ''  ?>>Catering Services</option>
                                            <option value="4" <?php echo $ban->BANNER_PAGE==4 ? 'Selected' : ''  ?>>Our Restaurant</option>
                                            <option value="5" <?php echo $ban->BANNER_PAGE==5 ? 'Selected' : ''  ?>>Home Menu</option>
                                            <option value="6" <?php echo $ban->BANNER_PAGE==6 ? 'Selected' : ''   ?>>Media</option>
                                            <option value="7" <?php echo $ban->BANNER_PAGE==7 ? 'Selected' : ''  ?>>Blog</option>
                                            <option value="8" <?php echo $ban->BANNER_PAGE==8 ? 'Selected' : ''  ?>>Gallery</option>
                                          
                                          </select>    
                                       </div>
                                    
                                                 
                                  </div>
                                  <div class="modal-footer ">
                                    <div class="text-left">
                                      <button type="submit" class="btn btn-primary MR5"  id="update">Update</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form name="add_banner" class="add_banner" action="" method="POST">
          <div class="modal-body">

          <div class="form-group">
          <label class="control-label ">Banner Page Name<span style="color: red">*</span><span ></span></label>
             <select style="width: 100% !important" class="form-control select2" name="BANNER_PAGE"> 
                <option value="">Select Page </option>
                <option value="0">Index</option>
                <option value="1">Our Story</option>
                <option value="2">Cuisine</option>
                <option value="3">Catering Services</option>
                <option value="4">Our Restaurant</option>
                <option value="5">Menu</option>
                <option value="6">Media</option>
                <option value="7">Blog</option>
                <option value="8">Gallery</option>
              </select>    
           </div>


              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Tittle Name:</label>
                <input type="text" class="form-control" name='BANNER_NAME' id="recipient-name">
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Header</label>
                <input type="text" class="form-control" name='HEADER' id="recipient-name">
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">About</label>
                <input type="text" class="form-control" name='ABOUT' id="recipient-name">
              </div>


              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Banner Image:</label>
                <input type="file" class="form-control" name='IMAGE' id="recipient-name">
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

    $("form[name='add_banner']").submit(function(e) {    
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '<?php echo base_url('gallery/add_banner')?>',
            type: "POST",
            data: formData,
            dataType: "json",
            //async: false,
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


     $("form[name='update_banner']").submit(function(e) {    
      var formData = new FormData($(this)[0]);
      $.ajax({
        url: '<?php echo base_url('gallery/update_banner')?>',
        type: "POST",
        data: formData,
        dataType: "json",
        async: false,
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

  /*$(".tag").change(function() {    
      var tagID = $(this).attr("id");  
     //alert(tagID);    
      $.ajax({
           type: "GET",
           url: '<?php echo base_url('gallery/change_gallery_tag_status')?>'+'/'+tagID,
           dataType: "json",
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
        });
    });*/

  

   
          
$('.delete_banner').click(function(){
      var teachersID  = $(this).attr('id');
    
      $('.show_message').html('<div class="alert alert-danger"><br>Are you sure you want to delete this Record?</div>');
      $('#teachersID').val(teachersID);
     
      $('#alert_box').modal('show');
    });
  

     


      $('.delete_teacher').click(function(){
        var teachersID  = $('#teachersID').val();

        // alert(teachersID); die;
         
           $.ajax({
            type: "GET",
         url: '<?php echo base_url('gallery/delete_banner')?>'+'/'+teachersID,
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