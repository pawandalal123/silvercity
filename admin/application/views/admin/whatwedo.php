<?php 
$add = '<!-- DataTables -->
  <link rel="stylesheet" href="'.asset_url('plugins/datatables/dataTables.bootstrap.css').'">
  <link rel="stylesheet" href="'.asset_url('dist/css/bootstrap-toggle.css').'">';
$this->load->view('admin/parts/header', ['title' => 'What We DO ', 'add' => $add]); ?>
    <!-- Main content -->
  
                
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
      

          <div class="box">
            <div class="box-header">
           

             <div class=" text-right">
        
           <!--  <div class="btn-group"><span data-placement="top" data-toggle="tooltip" title="add"><a href="<?php echo base_url('WhatWeDo/add_WhatWeDo') ?>" class="btn btn-primary btnPlus dvshwalert MR5"  >Add</a></span></div> -->
        </div>
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                   <th> Title</th>
                  <th>Discription</th>
                   <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
                if(!empty($WhatWeDo)) :
                    foreach($WhatWeDo as $calkey=>$cal):
                      ?>
                        <tr id="deletecategory<?php echo $cal->ID;?>">
                 <td><?php echo !empty($cal->IMAGE) ? '<img src="'.base_url("uploads/image/icons/".$cal->IMAGE).'" height="50px" width="50px;">' : '';?></td> 
                          <td><?php echo $cal->TITLE;?></td>
                         
                          <td><?php echo substr($cal->DESCRIPTION,0,50);?></td>
                        

                              <td>
                              <label>
                              <input type="checkbox" id="<?php echo $cal->ID;?>" <?php echo ($cal->STATUS==1) ? 'checked' : ''?> data-toggle="toggle" data-on="Active" data-off="Pending" class="manish">
                              </label>
                              </td>
                                       <td> 
                                                  <span id="">
                                                       <a href="<?php echo base_url('whatWeDo/edit/'.$cal->ID)?>"><i class="fa fa-edit" ></i></a>
                                                  </span>
                                                  </td>

                                                <td>
                                                  <span id="<?php echo $cal->ID;?>">
                                                    <a href="javascript:;" class="delete_class" id="<?php echo $cal->ID;?>"><i class="fa fa-trash"></i></a>

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

    $("form[name='add_class']").submit(function(e) { 
      
     for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }    
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '<?php echo base_url('whatwedo/add')?>',
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


   $("form[name='update_class']").submit(function(e) { 

     for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }    
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '<?php echo base_url('whatwedo/add_whatwedo')?>',
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







  

      
      
      
                 
$('.delete_class').click(function(){
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
        url: '<?php echo base_url('whatWeDo/delete_whatwedo')?>'+'/'+teachersID,
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

  <script type="text/javascript">
    $(document).ready(function(){

   $(".manish").change(function() {    
      var categoryID = $(this).attr("id");  
    // alert(categoryID);    
      $.ajax({
           type: "GET",
           url: '<?php echo base_url('whatWeDo/change_class_status')?>'+'/'+categoryID,
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

<script>
  $(function () {
    $(".select2").select2();    
  });
</script>';
$this->load->view('admin/parts/footer', ['add' => $add]); ?>