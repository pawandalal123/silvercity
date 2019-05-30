<?php 
$add = '<!-- DataTables -->
  <link rel="stylesheet" href="'.asset_url('plugins/datatables/dataTables.bootstrap.css').'">
  <link rel="stylesheet" href="'.asset_url('dist/css/bootstrap-toggle.css').'">';
$this->load->view('admin/parts/header', ['title' => ' Work Process', 'add' => $add]); ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
         <div class="box-header">
             <div class=" text-right">
    <div class="btn-group"><span data-placement="top" data-toggle="tooltip" title="add"><a href="<?php echo base_url('work/add_work') ?>" class="btn btn-primary btnPlus dvshwalert MR5">Add</a></span></div> 
        </div>
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
         
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>Image</th>
                   <th>Hower Image</th>
                   <th> Title</th>
                  <th>Discription</th>
                   <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
                if(!empty($work)) :
                    foreach($work as $key=>$value):
                      ?>
                       <tr id="deletecategory<?php echo $value->ID;?>">
                 <td><?php echo !empty($value->IMAGE) ? '<img src="'.base_url("uploads/images/".$value->IMAGE).'" height="50px" width="50px;">' : '';?></td> 
                  <td><?php echo !empty($value->HOWER_IMAGE) ? '<img src="'.base_url("uploads/images/".$value->HOWER_IMAGE).'" height="50px" width="50px;">' : '';?></td> 
                          <td><?php echo $value->TITLE;?></td>
                         
                          <td><?php echo substr($value->DESCRIPTION,0,50);?></td>
                        

                              <td>
                              <label>
                              <input type="checkbox" id="<?php echo $value->ID;?>" <?php echo ($value->STATUS==1) ? 'checked' : ''?> data-toggle="toggle" data-on="Active" data-off="Pending" class="manish">
                              </label>
                              </td>
                                       <td> 
                                                  <span id="">
                                                       <a href="<?php echo base_url('work/edit/'.$value->ID)?>"><i class="fa fa-edit" ></i></a>
                                                  </span>
                                                  </td>

                                                <td>
                                                  <span id="<?php echo $value->ID;?>">
                                                    <a href="javascript:;" class="delete_workprocess" id="<?php echo $value->ID;?>"><i class="fa fa-trash"></i></a>

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

      $('.delete_workprocess').click(function(){
       // alert("balram");
        var id  = $(this).attr('id');

       // alert(teachersID); die;
         
           $.ajax({
            type: "GET",
            url: '<?php echo base_url('work/delete_work')?>'+'/'+id,
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
                //$('#delete_teacher'+teachersID).hide();
                  setTimeout(function(){
              window.location.reload();
            }, 1000);
              }
           //  $('#alert_box').modal('hide');
            }
          });
      });


  $(".manish").change(function() {    
      var tagID = $(this).attr("id");  
     //alert(tagID);    
      $.ajax({
           type: "GET",
           url: '<?php echo base_url('work/change_work_status')?>'+'/'+tagID,
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
               // $('#delete_teacher'+teachersID).hide();
                  setTimeout(function(){
              window.location.reload();
            }, 1000);
              }    
              },
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