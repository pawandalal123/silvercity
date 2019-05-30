<?php 
$add = '<!-- DataTables -->
<link rel="stylesheet" href="'.asset_url('plugins/select2/select2.min.css').'">
  <link rel="stylesheet" href="'.asset_url('plugins/datatables/dataTables.bootstrap.css').'">
  <link rel="stylesheet" href="'.asset_url('dist/css/bootstrap-toggle.css').'">';
$this->load->view('admin/parts/header', ['title' => 'Add Cuisine', 'add' => $add]); ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <div class=" text-left">
        
          <div class="btn-group"><span data-placement="top" data-toggle="tooltip" title="add"><a href="<?php echo base_url('cuisine/cuisine_content') ?>" class="btn btn-primary btnPlus dvshwalert MR5">Back</a></span></div>
        </div>
             </div>
            <!-- /.box-header -->
            <div class="box-body">
          
           <div class="row">
           <form name="add_subcategory" class="add_subcategory" action="<?php echo base_url('cuisine/add_subcategory')?>" method="POST" enctype="multipart/form-data">
          
            <input type="hidden" name="SUBID" value="<?php echo $subcategory->SUBID;?>">
            <div class="col-md-12">
              
              <!-- /.form-group -->
                <div class="form-group">
                    <label class="control-label ">Menu Name<span style="color: red">*</span><span ></span></label>
                         
                            
                          <select style="width: 100% !important" class="form-control select2" name="CATID"> 
                                  <option value="">Select Menu</option>                   
                                    <?php                            
                                         foreach($category_details as $cat)
                                        {
                                          $select = ($subcategory->CATID==$cat->CATID) ? 'selected' :'';
                                          echo '<option value='.$cat->CATID.' '.$select.'>'.$cat->CATEGORY_NAME.'</option>';
                                        }                          
                                    ?>                              
                                </select>
                                     
                                    </div>

                <!--  <div class="form-group">
                <label>Sub Category Name<span style="color: red">*</span></label>
                 <input type="text" class="form-control" name="SUB_NAME" id="recipient-name" value="<?php echo !empty($subcategory->SUB_NAME) ? $subcategory->SUB_NAME : '';?>">
              </div> -->
              
              <div class="form-group">

                <label> Image<span style="color: red">*</span></label>
                 <input type="file" class="form-control" name="IMAGE" id="recipient-name">
                 <?php 
                  if(!empty($subcategory->IMAGE)):
                 ?>
                    <img src="<?php echo base_url('uploads/image/'. $subcategory->IMAGE);?>" height="50px" width="50px">
               <?php 
                  endif;
               ?>
              </div>

              <!-- /.form-group -->

               
            </div>
           
             <div class="clearfix"></div>
                 <div class="col-md-12">
                 <div class="form-group">
                <label>Content<span style="color: red">*</span></label>
              
               <?php echo $this->ckeditor->editor("CONTENTS",$subcategory->CONTENTS);?>
              </div>
          </div>

              <div class="text-right">
                <button type="submit" class="btn btn-primary MR5"><?php echo !empty($sub_details) ? 'Update' : 'Submit' ?></button>
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


<?php 
$add = '

<script src="'.asset_url('plugins/select2/select2.full.min.js').'"></script>
<script src="'.asset_url('dist/js/bootstrap-toggle.js').'"></script>
<script>
  $(function () {
    $(".select2").select2();    
  });

  
</script>';
$this->load->view('admin/parts/footer', ['add' => $add]); ?>