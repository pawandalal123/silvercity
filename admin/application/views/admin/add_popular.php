<?php 
$add = '<!-- DataTables -->
<link rel="stylesheet" href="'.asset_url('plugins/select2/select2.min.css').'">
  <link rel="stylesheet" href="'.asset_url('plugins/datatables/dataTables.bootstrap.css').'">
  <link rel="stylesheet" href="'.asset_url('dist/css/bootstrap-toggle.css').'">';
$this->load->view('admin/parts/header', ['title' => 'Add Popular', 'add' => $add]); ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <div class=" text-left">
        
          <div class="btn-group"><span data-placement="top" data-toggle="tooltip" title="add"><a href="<?php echo base_url('popular') ?>" class="btn btn-primary btnPlus dvshwalert MR5">Back</a></span></div>
        </div>
             </div>
            <!-- /.box-header -->
            <div class="box-body">
          
           <div class="row">
     <form name="add_class" class="add_class" action="" method="POST">
                                 <input type="hidden" name="CLID" value="<?php echo $class[0]->CLID;?>">
                                  <div class="modal-body">
                               <div class="row">

                                            <label class="control-label col-md-3 MT5 text-right"> Image</label>
                                             <div class="form-group col-md-5">
                                             <input type="file" class="form-control" name="IMAGE" id="recipient-name">
                                             <?php 
                                              if(!empty($class[0]->IMAGE)):
                                             ?>
                                                <img src="<?php echo base_url('uploads/image/'. $class[0]->IMAGE);?>" height="50px" width="50px">
                                           <?php 
                                              endif;
                                           ?>
                                           </div>
                                          </div>


                                     <div class="row">
                                      <label class="control-label col-md-3 MT5 text-right"> Title</label>
                                      <div class="form-group col-md-5">
                                       
                                        <input class="form-control" id="groupname" type="text" name="TITLE" value="<?php echo !empty($class[0]->TITLE) ? $class[0]->TITLE : '';?>">
                                      </div>
                                    </div>

                                       <div class="row">
                                      <label class="control-label col-md-3 MT5 text-right">Discription</label>
                                      <div class="form-group col-md-5">
                                       
                                        <?php echo $this->ckeditor->editor("DESCRIPTION",$class[0]->DESCRIPTION);?>
                                      </div>
                                    </div>

                                    

                                                 
                                  </div>
                                  <div class="modal-footer ">
                                   <div class="text-right">
                <button type="submit" class="btn btn-primary MR5"><?php echo !empty($class) ? 'Update' : 'Submit' ?></button>
               </div>
                                  </div>
                                </div>
                              </form>
            
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
            url: '<?php echo base_url('popular/add')?>',
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
                  window.location.href='<?php echo base_url('popular')?>';
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
<script src="'.asset_url('dist/js/bootstrap-toggle.js').'"></script>
<script>
  $(function () {
    $(".select2").select2();    
  });
</script>';
$this->load->view('admin/parts/footer', ['add' => $add]); ?>