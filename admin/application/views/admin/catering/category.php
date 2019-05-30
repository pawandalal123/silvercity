<?php 
$add = '<!-- DataTables -->
  <link rel="stylesheet" href="'.asset_url('plugins/datatables/dataTables.bootstrap.css').'">
  <link rel="stylesheet" href="'.asset_url('dist/css/bootstrap-toggle.css').'">';
$this->load->view('admin/parts/header', ['title' => 'Catering', 'add' => $add]); ?>
    <!-- Main content -->
  
                
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
      

          <div class="box">
            <div class="box-header">
             <div class=" text-right">
        <!--   <div class="btn-group"><span data-placement="top" data-toggle="tooltip" title="add"><a class="btn btn-primary btnPlus dvshwalert MR5" data-title="add" data-toggle="modal" data-target="#exampleModal" >Add  </a></span></div> -->
        </div>
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Default Order</th>
                  <!-- <th>Tag Name</th> -->
                   <th>Menu Name</th>
                  
                  <th>Created On</th>
                    <th> Status</th>
                  <th>Edit</th>
                  <!-- <th>Delete</th> -->
                </tr>
                </thead>
                <tbody>
                 <?php 
                if(!empty($category)) :
                    foreach($category as $catkey=>$cat):
                      $tag_name = userdata('our_story_tags',['NTID'=>$cat->TAGID])->TAG_NAME;
                      ?>
                        <tr id="deletecategory<?php echo $cat->CATID;?>">
                          <td><?php echo $cat->ORDER_BY;?></td>
                        <!--   <td><?php echo $tag_name;?></td> -->
                          <td><?php echo $cat->CATEGORY_NAME;?></td>
                          <td><?php echo date_formats($cat->CREATED_ON);?></td>
                          

                                <td>
                                     <label>
                              <input type="checkbox" id="<?php echo $cat->CATID;?>" <?php echo ($cat->CATEGORY_STATUS==1) ? 'checked' : ''?> data-toggle="toggle" data-on="Active" data-off="Pending" class="category" >
                              </label>
                              </td>
                                       <td> 
                                                  <span id="">
                                                      <a href="#" data-toggle="modal" data-target="#edit<?php echo $cat->CATID;?>" <i class="fa fa-edit" ></i></a>
                                                  </span>
                                                  </td>

                                                <!-- <td>
                                                  <span id="<?php echo $cat->CATID;?>">
                                                    <a href="javascript:;" class="delete_category" id="<?php echo $cat->CATID;?>"><i class="fa fa-trash"></i></a>

                                                  </span>
                                            </td>  -->
                        <div class="modal fade" id="edit<?php echo $cat->CATID;?>" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
                              <div class="modal-dialog ">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="lnr lnr-cross" aria-hidden="true"></i></button>
                                    <h4 class="modal-title custom_align" id="Heading">Edit </h4>
                                  </div>

                                  <form name="update_category" class="update_category" action="" method="POST">

                                  <div class="modal-body">
                                  <!--  <div class="form-group">

                                            <label> Image<span style="color: red">*</span></label>
                                             <input type="file" class="form-control" name="IMAGE" id="recipient-name">
                                             <?php 
                                              if(!empty($category->IMAGE)):
                                             ?>
                                                <img src="<?php echo base_url('uploads/image/'. $category->IMAGE);?>" height="50px" width="50px">
                                           <?php 
                                              endif;
                                           ?>
                                          </div> -->
                                          <div class="row">
                                      <label class="control-label col-md-3 MT5 text-right">Menu Name<span style="color: red">*</span><span ></span></label>
                                      <div class="form-group col-md-5">
                                        <input type="hidden" name="CATID" value="<?php echo $cat->CATID;?>">
                                        <input class="form-control" id="groupname" type="text" name="CATEGORY_NAME" value="<?php echo $cat->CATEGORY_NAME;?>">
                                      </div>
                                    </div>

                                    <!--  <div class="row">
                                      <label class="control-label col-md-3 MT5 text-right">Menu Name<span style="color: red">*</span><span ></span></label>
                                      <div class="form-group col-md-5">
                                     <select class="form-control " name="TAGID">
                                       <option value="">Select Tag</option>
                                       <?php foreach ($tag as $key => $value) {

                                        $selected = ($cat->TAGID == $value->NTID) ? 'selected' : '';
                                        echo '<option value='.$value->NTID.' >'.$value->TAG_NAME.' </option>';
                                      } ?>
                                     </select>
                                      </div>
                                    </div> -->

                                    
                                      <div class="row">
                                      <label class="control-label col-md-3 MT5 text-right">Default Order<span style="color: red">*</span><span ></span></label>
                                      <div class="form-group col-md-5">
                                       
                                        <input class="form-control" id="groupname" type="number" name="ORDER_BY" value="<?php echo $cat->ORDER_BY;?>">
                                      </div>
                                    </div>
                                    

                                                 
                                  </div>
                                  <div class="modal-footer ">
                                    <div class="text-left">
                                      <button type="submit" class="btn btn-primary MR5">Update</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form name="add_category" class="add_category" action="" method="POST">
          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Category Name:</label>
                <input type="text" class="form-control" name="CATEGORY_NAME" id="recipient-name">
              </div>

               <!-- <div class="form-group">

                <label> Image<span style="color: red">*</span></label>
                 <input type="file" class="form-control" name="IMAGE" id="recipient-name">
                 
              </div> -->

	<div class="row">
                                      <label class="control-label col-md-3 MT5 text-right">Default Order<span style="color: red">*</span><span ></span></label>
                                      <div class="form-group col-md-5">
                                       
                                        <input class="form-control" id="groupname" type="number" name="ORDER_BY">
                                      </div>
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

    $("form[name='add_category']").submit(function(e) {    
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '<?php echo base_url('catering/add')?>',
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


   $("form[name='update_category']").submit(function(e) {    
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '<?php echo base_url('catering/update_category')?>',
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
           url: '<?php echo base_url('catering/change_category_status')?>'+'/'+categoryID,
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
            var categoryID  = $(this).attr('id');
           //alert(categoryID);
             $.ajax({
              type: "GET",
              url: '<?php echo base_url('catering/delete_category')?>'+'/'+categoryID,
              dataType: "json",
              success: function(data)
              {
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
               
               $('#deletecategory'+categoryID).hide();
               $('#delete_category').modal('hide');
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