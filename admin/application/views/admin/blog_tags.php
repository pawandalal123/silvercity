<?php 
$add = '<!-- DataTables -->
  <link rel="stylesheet" href="'.asset_url('plugins/datatables/dataTables.bootstrap.css').'">
  <link rel="stylesheet" href="'.asset_url('dist/css/bootstrap-toggle.css').'">';
$this->load->view('admin/parts/header', ['title' => 'Tags', 'add' => $add]); ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
      

          <div class="box">
            <div class="box-header">
              <div class=" text-right">
        
          <div class="btn-group"><span data-placement="top" data-toggle="tooltip" title="add"><a class="btn btn-primary btnPlus dvshwalert MR5" data-title="add" data-toggle="modal" data-target="#exampleModal" >Add Tag </a></span></div>
        </div>
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>Tag name</th>
                  <th>Post Name</th>
                  <th>Ip</th>
                    <th>Tag Agent</th>
                  <th>Created By</th>
                  <th>Created Date</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
                if(!empty($blogtag)) :
                    foreach($blogtag as $tagkey=>$tag):
                      ?>
                        <tr id="deletetag<?php echo $tag->ID;?>">
                          <td><?php echo $tag->TAG_NAME;?></td>
                          <td><?php echo $tag->POST_NAME;?></td>
                          <td><?php echo $tag->IP;?></td>
                          <td><?php echo $tag->TAG_AGENT;?></td>
                          <td><?php echo $tag->USER_ID;?></td>
                          
                          <td><?php echo date_formats($tag->CREATED_DATE);?></td>
                          <!-- <td><?php echo $tag->NAME;?></td> -->
                          

                               <!--  <td>
                                     <label>
                              <input type="checkbox" id="<?php echo $tag->TAG_ID;?>" <?php echo ($tag->TAG_STATUS==1) ? 'checked' : ''?> data-toggle="toggle" data-on="Active" data-off="Pending" class="tag" >
                              </label>
                              </td>
                                    -->    <td> 
                                                  <span id="">
                                                      <a href="#" data-toggle="modal" data-target="#edit<?php echo $tag->ID; ?>"><i class="fa fa-edit" ></i></a>
                                                  </span>
                                                  </td>

                                                <td>
                                                  <span id="<?php echo $tag->ID;?>">
                                                    <a href="javascript:;" class="delete_tag" id="<?php echo $tag->ID;?>"><i class="fa fa-trash"></i></a>

                                                  </span>
                                            </td>   

                          <div class="modal fade" id="edit<?php echo $tag->ID;?>" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
                              <div class="modal-dialog ">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="lnr lnr-cross" aria-hidden="true"></i></button>
                                    <h4 class="modal-title custom_align" id="Heading">Edit Tag</h4>
                                  </div>

                                  <form name="update_tag" class="update_tag" action="" method="POST">

                                  <div class="modal-body">
                                    <div class="row">
                                      <label class="control-label col-md-3 MT5 text-right">Tag Name<span style="color: red">*</span><span ></span></label>
                                      <div class="form-group col-md-5">
                                        <input type="hidden" name="ID" value="<?php echo $tag->ID;?>">
                                        <input class="form-control" id="groupname" type="text" name="TAG_ID" value="<?php echo $tag->TAG_NAME;?>">
                                      </div>
                                    </div>


                                    <div class="row">
                                      <label class="control-label col-md-3 MT5 text-right">Post Name<span style="color: red">*</span><span ></span></label>
                                      <div class="form-group col-md-5">
                                        <input type="hidden" name="TAG_ID" value="<?php echo $tag->ID;?>">
                                        <input class="form-control" id="groupname" type="text" name="POST_ID" value="<?php echo $tag->TAG_NAME;?>">
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
        <h5 class="modal-title" id="exampleModalLabel">Add Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form name="add_tag" class="add_tag" action="" method="POST">
          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Tag Name:</label>
                <input type="text" class="form-control" name='TAG_ID' id="recipient-name">
              </div>
          </div>


          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Post Name:</label>
                <input type="text" class="form-control" name='POST_ID' id="recipient-name">
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

    $("form[name='add_tag']").submit(function(e) {    
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '<?php echo base_url('blog/add_blog_tag')?>',
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


     $("form[name='update_tag']").submit(function(e) {    
      var formData = new FormData($(this)[0]);
      $.ajax({
        url: '<?php echo base_url('blog/update_blog_tag')?>',
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
/*
  $(".tag").change(function() {    
      var tagID = $(this).attr("id");  
     //alert(tagID);    
      $.ajax({
           type: "GET",
           url: '<?php echo base_url('blog/change_tag_status')?>'+'/'+tagID,
           dataType: "json",
           success: function(data)
           {
                  
              },
        });
    });*/

  

      $('.delete_tag').click(function(){
            var tagID  = $(this).attr('id');
            //alert(tagID);
             $.ajax({
              type: "GET",
              url: '<?php echo base_url('blog/delete_blog_tag')?>'+'/'+tagID,
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
          if(data.success==true){
            setTimeout(function(){
              window.location.reload();
            }, 1000);
        }
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