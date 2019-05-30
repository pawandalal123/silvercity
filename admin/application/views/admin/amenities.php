<?php 
$add = '<!-- DataTables -->
  <link rel="stylesheet" href="'.asset_url('plugins/datatables/dataTables.bootstrap.css').'">
  <link rel="stylesheet" href="'.asset_url('dist/css/bootstrap-toggle.css').'">';
$this->load->view('admin/parts/header', ['title' => 'Amenties', 'add' => $add]); ?>
    <!-- Main content -->
  
                
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
      

          <div class="box">
            <div class="box-header">
             <div class=" text-right">
          <div class="btn-group"><span data-placement="top" data-toggle="tooltip" title="add"><a class="btn btn-primary btnPlus dvshwalert MR5" data-title="add" data-toggle="modal" data-target="#exampleModal" >Add  </a></span></div>
        </div>
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Image</th>
                   <th>Title</th>
                   <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
                if(!empty($amenities)) :
                    foreach($amenities as $catkey=>$cat):
                        ?>
                        <tr id="deletecategory<?php echo $cat->ID;?>">
                         <td><?php echo !empty($cat->IMAGE) ? '<img src="'.base_url("uploads/image/".$cat->IMAGE).'" height="50px" width="50px;">' : '';?></td>
                         <td><?php echo $cat->TITLE;?></td>
                       
                              <!--   <td>
                                     <label>
                              <input type="checkbox" id="<?php echo $cat->CATID;?>" <?php echo ($cat->STATUS==1) ? 'checked' : ''?> data-toggle="toggle" data-on="Active" data-off="Pending" class="category" >
                              </label>
                              </td> -->
                                       <td> 
                                                  <span id="">
                                                      <a href="#" data-toggle="modal" data-target="#edit<?php echo $cat->ID;?>" <i class="fa fa-edit" ></i></a>
                                                  </span>
                                                  </td>

                                                <td>
                                                  <span id="<?php echo $cat->ID;?>">
                                                    <a href="javascript:;" class="delete_amenities" id="<?php echo $cat->ID;?>"><i class="fa fa-trash"></i></a>

                                                  </span>
                                            </td> 
                        <div class="modal fade" id="edit<?php echo $cat->ID;?>" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
                              <div class="modal-dialog ">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="lnr lnr-cross" aria-hidden="true"></i></button>
                                    <h4 class="modal-title custom_align" id="Heading">Edit </h4>
                                  </div>

                                  <form name="update_restaurant" class="update_restaurant" action="" method="POST">
                                  <input type="hidden" name="ID" value="<?php echo  $cat->ID; ?>">
                                  <div class="modal-body">
                                <div class="form-group">

                                            <label>  Image<span style="color: red">*</span></label>
                                             <input type="file" class="form-control" name="IMAGE" id="recipient-name">
                                             <?php 
                                              if(!empty($cat->IMAGE)):
                                             ?>
                                                <img src="<?php echo base_url('uploads/image/'. $cat->IMAGE);?>" height="50px" width="50px">
                                           <?php 
                                              endif;
                                           ?>
                                          </div> 
                                   
                                       <div class="form-group">
                                      <label > Title<span style="color: red">*</span><span ></span></label>
                                      <div class="form-group ">
                                     <input type="text" name="TITLE" class="form-control" value="<?php echo $cat->TITLE; ?>">
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
        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form name="add_category" class="add_category" action="" method="POST">
          <div class="modal-body">
          <div class="form-group">
                      <label>  Image<span style="color: red">*</span></label>
                       <input type="file" class="form-control" name="IMAGE" id="recipient-name">
                    </div> 
             
                 <div class="form-group">
                <label > Title<span style="color: red">*</span><span ></span></label>
                <div class="form-group ">
               <input type="text" name="TITLE" class="form-control" ">
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
            url: '<?php echo base_url('restaurant/add_amenities')?>',
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


   $("form[name='update_restaurant']").submit(function(e) {    
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '<?php echo base_url('restaurant/add_amenities')?>',
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
           url: '<?php echo base_url('catering/change_party_iamges_status')?>'+'/'+categoryID,
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


  

      $('.delete_amenities').click(function(){
            var categoryID  = $(this).attr('id');
           //alert(categoryID);
             $.ajax({
              type: "GET",
              url: '<?php echo base_url('restaurant/delete_amenities')?>'+'/'+categoryID,
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