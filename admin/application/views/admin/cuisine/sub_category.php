<?php 
$add = '<!-- DataTables -->
  <link rel="stylesheet" href="'.asset_url('plugins/datatables/dataTables.bootstrap.css').'">
  <link rel="stylesheet" href="'.asset_url('dist/css/bootstrap-toggle.css').'">';
$this->load->view('admin/parts/header', ['title' => ' Content Management System', 'add' => $add]); ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
         <div class="box-header">
             <div class=" text-right">
     <!--  <div class="btn-group"><span data-placement="top" data-toggle="tooltip" title="add"><a href="<?php echo base_url('cuisine/addsub') ?>" class="btn btn-primary btnPlus dvshwalert MR5">Add</a></span></div> -->
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
                   <th>Menu name</th>
                   <!-- <th>Sub Menu name</th> -->
                  <th>Add Date</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <!-- <th>Delete</th> -->
                </tr>
                </thead>
                <tbody>
                 <?php 
                if(!empty($subcategory)) :
                    foreach($subcategory as $scatkey=>$scat):
                      ?>
                        <tr id="deletecategory<?php echo $scat->SUBID;?>">
                         <td><?php echo !empty($scat->IMAGE) ? '<img src="'.base_url("uploads/image/".$scat->IMAGE).'" height="50px" width="50px;">' : '';?></td>
                          <td><?php echo $scat->CATEGORY_NAME;?></td>
<!--                           <td><?php echo $scat->SUB_NAME;?></td>
 -->                          <td><?php echo date_formats($scat->MODIFIED_ON);?></td>
                         <!--  <td><?php echo date_formats($scat->MODIFIED_ON);?></td> -->

                                <td>
                                     <label>
                              <input type="checkbox" id="<?php echo $scat->SUBID;?>" <?php echo ($scat->SUB_STATUS==1) ? 'checked' : ''?> data-toggle="toggle" data-on="Active" data-off="Pending" class="category" >
                              </label>
                              </td>
                         
                                             <td>
                                                  <span id="">
                                                      <a href="<?php echo base_url('cuisine/edit/'.$scat->SUBID)?>" ><i class="fa fa-edit" ></i></a>
                                                  </span>
                                                  </td>

                                                <!-- <td>
                                                  <span id="<?php echo $scat->SUBID;?>">
                                                    <a href="javascript:;" class="delete_subcategory" id="<?php echo $scat->SUBID;?>"><i class="fa fa-trash"></i></a>
                                                  </span>
                                                  </td> -->
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


  $(".category").change(function() {    
      var categoryID = $(this).attr("id");  
     // alert(categoryID);    
      $.ajax({
           type: "GET",
           url: '<?php echo base_url('cuisine/change_subcategory_status')?>'+'/'+categoryID,
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

  

      $('.delete_subcategory').click(function(){
            var categoryID  = $(this).attr('id');
             $.ajax({
              type: "GET",
              url: '<?php echo base_url('cuisine/delete_subcategory')?>'+'/'+categoryID,
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