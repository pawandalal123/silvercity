<?php 
$add = '<!-- DataTables -->
  <link rel="stylesheet" href="'.asset_url('plugins/datatables/dataTables.bootstrap.css').'">
  <link rel="stylesheet" href="'.asset_url('dist/css/bootstrap-toggle.css').'">';
$this->load->view('admin/parts/header', ['title' => 'Testimonisal', 'add' => $add]); ?>
    <!-- Main content -->
  
                
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
      

          <div class="box">
            <div class="box-header">
             <!--  <div class=" text-right">
        
          <div class="btn-group"><span data-placement="top" data-toggle="tooltip" title="add"><a href="<?php echo base_url('category/add_category') ?>" class="btn btn-primary btnPlus dvshwalert MR5">Add Category</a></span></div>
        </div> -->

             <div class=" text-right">
        
          <div class="btn-group"><span data-placement="top" data-toggle="tooltip" title="add"><a class="btn btn-primary btnPlus dvshwalert MR5" data-title="add" data-toggle="modal" data-target="#exampleModal" >Add Testimonial </a></span></div>
        </div>
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                   <th>Name</th>
                  <!-- <th>Created By</th> -->
                  
                  <th>About</th>
                  <th>Description</th>
                  <th>Created On</th>
                    <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
                if(!empty($testimonial)) :
                  //print_r($testimonial); die();
                    foreach($testimonial as $teskey=>$test):
                      ?>
                        <tr id="deletecategory<?php echo $test->ID;?>">
                        <td><?php echo !empty($test->IMAGE) ? '<img src="'.base_url("uploads/image/".$test->IMAGE).'" height="50px" width="50px;">' : '';?></td>
                          <td><?php echo $test->NAME;?></td>
                        <td><?php echo $test->ABOUT;?></td> 
                        <td><?php echo $test->CONTENT;?></td> 
                          <td><?php echo date_formats($test->CREATED_ON);?></td>
                          

                                <td>
                                     <label>
                              <input type="checkbox" id="<?php echo $test->ID;?>" <?php echo ($test->STATUS==1) ? 'checked' : ''?> data-toggle="toggle" data-on="Active" data-off="Pending" class="category" >
                              </label>
                              </td>
                                       <td> 
                                                  <span id="">
                                                      <a href="#" data-toggle="modal" data-target="#edit<?php echo $test->ID;?>" <i class="fa fa-edit" ></i></a>
                                                  </span>
                                                  </td>

                                                <td>
                                                  <span id="<?php echo $test->ID;?>">
                                                    <a href="javascript:;" class="delete_category" id="<?php echo $test->ID;?>"><i class="fa fa-trash"></i></a>

                                                  </span>
                                            </td> 
                        <div class="modal fade" id="edit<?php echo $test->ID;?>" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
                              <div class="modal-dialog ">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="lnr lnr-cross" aria-hidden="true"></i></button>
                                    <h4 class="modal-title custom_align" id="Heading">Edit Testimonial</h4>
                                  </div>

                                  <form name="update_testimonial" class="update_testimonial" action="" method="POST">

                                  <div class="modal-body">
                               <div class="form-group">

                                            <label> Image<span style="color: red">*</span></label>
                                             <input type="file" class="form-control" name="IMAGE" id="recipient-name">
                                             <?php 
                                              if(!empty($test->IMAGE)):
                                             ?>
                                                <img src="<?php echo base_url('uploads/image/'. $test->IMAGE);?>" height="50px" width="50px">
                                           <?php 
                                              endif;
                                           ?>
                                          </div>
                                          <div class="form-group">
                                      <label >Name<span style="color: red">*</span><span ></span></label>
                                    
                                        <input type="hidden" name="ID" value="<?php echo $test->ID;?>">
                                        <input class="form-control" id="groupname" type="text" name="NAME" value="<?php echo $test->NAME;?>">
                                     
                                    </div>

                                    <div class="form-group">
                                      <label >About</label>
                                    
                                        <input type="hidden" name="ID" value="<?php echo $test->ID;?>">
                                        <input class="form-control" id="groupname" type="text" name="ABOUT" value="<?php echo $test->ABOUT;?>">
                                     
                                    </div>

                                    
                                      <div class="form-group">
                                      <label >Descrpition<span style="color: red">*</span><span ></span></label>

                                     
                                      <textarea name="CONTENT" rows="5" cols="40" value="<?php echo $test->CONTENT;?>"><?php echo $test->CONTENT;?></textarea>
                                       
                                        
                                     
                                  

                                    

                                                 
                                  </div>

                  

                                  <div class="modal-footer ">
                                    <div class="text-left">
                                      <button type="submit" class="btn btn-primary MR5">Update</button>
                                    
                                    </div>
                                    <!--  <div class="text-right">
                                      <a href="https://www.google.co.in" target="_blank"><button type="submit" class="btn btn-primary MR5">Google</button></a>
                                    </div> -->



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
        <h5 class="modal-title" id="exampleModalLabel">Add Testimonial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form name="add_testimonial" class="add_testimonial" action="" method="POST">
          <div class="modal-body">
             

            <div class="form-group">

                <label> Image<span style="color: red">*</span></label>
                 <input type="file" class="form-control" name="IMAGE" id="recipient-name">
                 
              </div> 

	                          <div class="form-group">
                                      <label >Name<span style="color: red">*</span><span ></span></label>
                                        <input class="form-control" id="groupname" type="text" name="NAME">
                                    </div>

                                    <div class="form-group">
                                      <label >About</label>
                                        <input class="form-control" id="groupname" type="text" name="ABOUT">
                                    </div>


                      <div class="form-group">
                                      <label >Description<span style="color: red">*</span><span ></span></label>
                                    
                                      <textarea name="CONTENT" rows="5" cols="40" maxlength="200"></textarea>
                                       
                                        
                                   
                                    </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
            
          </div>
       </form>
    </div>
  </div>
</div> 

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>


<script type="text/javascript"> 

       $(document).ready(function(){

    $("form[name='add_testimonial']").submit(function(e) {    
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '<?php echo base_url('blog/add_testimonial')?>',
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


   $("form[name='update_testimonial']").submit(function(e) {    
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '<?php echo base_url('blog/add_testimonial')?>',
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


  
  $(".category").change(function() {    
      var categoryID = $(this).attr("id");  
     //alert(categoryID);    
      $.ajax({
           type: "GET",
           url: '<?php echo base_url('blog/change_testimonial')?>'+'/'+categoryID,
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
            cache: false,
            contentType: false,
            processData: false
        });
        e.preventDefault();
    });


      
      
                 
$('.delete_category').click(function(){
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
         url: '<?php echo base_url('blog/delete_testimonial')?>'+'/'+teachersID,
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
</script>';
$this->load->view('admin/parts/footer', ['add' => $add]); ?>