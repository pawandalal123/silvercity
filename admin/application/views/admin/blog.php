<?php 

$add = '<!-- DataTables -->
  <link rel="stylesheet" href="'.asset_url('plugins/datatables/dataTables.bootstrap.css').'">
  <link rel="stylesheet" href="'.asset_url('dist/css/bootstrap-toggle.css').'">';
$this->load->view('admin/parts/header', ['title' => 'Blog', 'add' => $add]); ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class=" text-right">
        
          <div class="btn-group"><span data-placement="top" data-toggle="tooltip" title="add"><a href="<?php echo base_url('blog/add_blog') ?>" class="btn btn-primary btnPlus dvshwalert MR5"  >Add Blog</a></span></div>
        </div>
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead style="     vertical-align: middle;">
                <tr>
                   <th>Image</th>
                   <th>Title</th>
                   <th>Post&nbspName</th>
                   <th>Created&nbspOn</th>
                  <!-- <th>Tag&nbspName</th> -->
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
              if(!empty($blog)) :
                    foreach($blog as $bkey=>$bval):
                       /*   if($bval->TAG_ID!=''):
                      $TAG_ID = json_decode($bval->TAG_ID,true);
                      $cond = "tag.TAG_ID IN (".implode(',', $TAG_ID).")";
                      $TAG_DATA = object_to_array($this->tag->get_tag_list(false,false,false,false,$cond,false));
                      $array_column = array_column($TAG_DATA,'TAG_NAME');
                      $tag_name = str_replace('"','',json_encode($array_column));
                      else:
                        $tag_name = '';
                       endif; */

                      ?>
                      
                      
                        <tr id="deleteblog<?php echo $bval->ID;?>">
                          <td><?php echo !empty($bval->POST_IMAGE) ? '<img src="'.base_url("uploads/image/".$bval->POST_IMAGE).'" height="50px" width="50px;">' : '';?></td>
                          <td><?php echo $bval->POST_TITLE;?></td>
                          <td><?php echo $bval->POST_NAME;?></td>
                          <td><?php echo date_formats($bval->POST_DATE);?></td>
                         <!--  <td><?php echo $tag_name;?></td>-->

                                <td>
                               <label>
                              <input type="checkbox" id="<?php echo $bval->ID;?>" <?php echo ($bval->POST_STATUS==1) ? 'checked' : ''?> data-toggle="toggle" data-on="Active" data-off="Pending" class="blog">
                              </label>
                              </td>
                         
                                      <td>
                                          
                                           <a href="<?php echo base_url('blog/edit/'.$bval->ID)?>"><i class="fa fa-edit" ></i></a>
                                                  
                                                  </td>
                                                  <td>
                                                
                                                  <span id="<?php echo $bval->ID;?>">
                                                    <a href="javascript:;" class="delete_blog" id="<?php echo $bval->ID;?>"><i class="fa fa-trash"></i></a>
                                                 </span>
                                            </td>
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
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript"> 
    $(document).ready(function(){

      $(".blog").change(function() {    
        var blogID = $(this).attr("id");  
        //alert(contantID); 
        $.ajax({
             type: "GET",
             url: '<?php echo base_url('blog/change_blog_status')?>'+'/'+blogID,
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


      
      
      
           
      
      
      
$('.delete_blog').click(function(){
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
         url: '<?php echo base_url('blog/delete_blog')?>'+'/'+teachersID,
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