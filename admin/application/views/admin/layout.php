<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smarten | <?=$title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=asset_url('bootstrap/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <?=(isset($add) ? $add : '');?>

  <!-- Theme style -->
  <link rel="stylesheet" href="<?=asset_url('dist/css/AdminLTE.min.css');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=asset_url('dist/css/skins/_all-skins.min.css');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=asset_url('plugins/iCheck/flat/blue.css');?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?=asset_url('plugins/morris/morris.css');?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=asset_url('plugins/jvectormap/jquery-jvectormap-1.2.2.css');?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?=asset_url('plugins/datepicker/datepicker3.css');?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=asset_url('plugins/daterangepicker/daterangepicker.css');?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?=asset_url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">

  <link rel="stylesheet" href="<?=asset_url('plugins/iCheck/square/blue.css');?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue <?=(!isset($simple) ? 'sidebar-mini' : '')?> <?=(isset($add_body_class) ? $add_body_class : '');?>">
        <div class="wrapper">
 <?php  $this->load->view('admin/parts/header');?>
 <?php  $this->load->view($view_file);?> 
 <?php  $this->load->view('admin/parts/footer');?> 
      </div>

<!-- jQuery 2.2.3 -->
<script src="<?=asset_url('plugins/jQuery/jquery-2.2.3.min.js');?>"></script>
<?php if(@$jQueryui !== false) { ?>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<?php } ?>
<!-- Bootstrap 3.3.6 -->
<script src="<?=asset_url('bootstrap/js/bootstrap.min.js');?>"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?=asset_url('plugins/morris/morris.min.js');?>"></script>
<!-- Sparkline -->
<script src="<?=asset_url('plugins/sparkline/jquery.sparkline.min.js');?>"></script>
<!-- jvectormap -->
<script src="<?=asset_url('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');?>"></script>
<script src="<?=asset_url('plugins/jvectormap/jquery-jvectormap-world-mill-en.js');?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?=asset_url('plugins/knob/jquery.knob.js');?>"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?=asset_url('plugins/daterangepicker/daterangepicker.js');?>"></script>
<!-- datepicker -->
<script src="<?=asset_url('plugins/datepicker/bootstrap-datepicker.js');?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=asset_url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>
<!-- Slimscroll -->
<script src="<?=asset_url('plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
<!-- FastClick -->
<script src="<?=asset_url('plugins/fastclick/fastclick.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?=asset_url('dist/js/app.min.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=asset_url('dist/js/demo.js');?>"></script>

<?=(isset($add) ? $add : '');?>
