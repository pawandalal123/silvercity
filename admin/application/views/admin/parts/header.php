<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Silverspoon | <?=$title?></title>
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
  
  <link href="<?php echo base_url('uploads/images/favicon.png');?>" rel="shortcut icon" type=""/>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue <?=(!isset($simple) ? 'sidebar-mini' : '')?> <?=(isset($add_body_class) ? $add_body_class : '');?>">
<?php if(!isset($simple)) { ?>
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
 
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- <span class="logo-mini"><b>A</b>LT</span> -->
      <!-- logo for regular state and mobile devices -->
     <a href="<?=base_url('ourstory');?>" class="logo">
<img src="<?php echo base_url('images/logo.jpg');?>" width="100%" />                            
    </a>
   
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
        <!--   <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data ->
                <ul class="menu">
                  <li><!-- start message ->
                    <a href="#">
                      <div class="pull-left">
                        <img src="#" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message ->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="#" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="#" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="#" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="#" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li> -->
          <!-- Notifications: style can be found in dropdown.less -->
        <!--   <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data ->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li> -->
          <!-- Tasks: style can be found in dropdown.less -->
        <!--   <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data ->
                <ul class="menu">
                  <li><!-- Task item ->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item ->
                  <li><!-- Task item ->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item ->
                  <li><!-- Task item ->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item ->
                  <li><!-- Task item ->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item ->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li> -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="#" class="user-image" alt="">
              <span class="hidden-xs"><?=$this->session->NAME;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="">
                <img src="#" class="img-circle" alt="">                
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row ->
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
               <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>-->
                <div class="pull-right">
                  <a href="<?=base_url('logout');?>" class="btn btn-default btn-flat" style="
                                background: #3c8dbc;     color: #f4f4f4;">Sign out</a>
                </div>
                
                   <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat" style="
                                background: #3c8dbc;     color: #f4f4f4;" data-toggle="modal" data-target="#change_password" >Change Password</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="#" class="img-circle" alt="">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->NAME;?></p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
      <!-- search form -->
     <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
       <!--  <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?=base_url('dashboard');?>"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="<?=base_url('dashboard/2');?>"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
 -->

<li><a href="<?=base_url('gallery/banner_upload');?>"><i class="fa fa-picture-o"></i> <span>Banner Upload</span></a></li>

    <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Our Story</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <!--  <li><a href="<?=base_url('ourstory/tag');?>"><i class="fa fa-tag"></i> <span>Our Story Tag</span></a></li> -->
            <li><a href="<?=base_url('ourstory');?>"><i class="fa fa-list-alt"></i> <span>Our Story Menu</span></a></li>
             <li><a href="<?=base_url('ourstory/ourstory_content');?>"><i class="fa fa-asterisk"></i> <span>Content Management</span></a></li>
          
          </ul>
        </li>


         <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Cuisine</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('cuisine');?>"><i class="fa fa-list-alt"></i> <span>Cuisine Menu</span></a></li>
             <li><a href="<?=base_url('cuisine/cuisine_content');?>"><i class="fa fa-asterisk"></i> <span>Content Management</span></a></li>
          
          </ul>
        </li>




         <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Catering Sevices</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('catering');?>"><i class="fa fa-list-alt"></i> <span>Catering Sevices Menu</span></a></li>
             <li><a href="<?=base_url('catering/catering_content');?>"><i class="fa fa-asterisk"></i> <span>Content Management</span></a></li>
              <li><a href="<?=base_url('catering/party');?>"><i class="fa fa-asterisk"></i> <span>Party Image</span></a></li>
               <li><a href="<?=base_url('catering/party_packages');?>"><i class="fa fa-asterisk"></i> <span>Party Packages </span></a></li>
          
          </ul>
        </li>


         <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Main Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('menu');?>"><i class="fa fa-list-alt"></i> <span>Main Menu</span></a></li>
             <li><a href="<?=base_url('menu/menu_content');?>"><i class="fa fa-asterisk"></i> <span>Content Management</span></a></li>
          
          </ul>
        </li>


         <li class="treeview">
          <a href="#">
            <i class="fa fa-picture-o"></i> <span>Gallery</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <!-- <li><a href="<?=base_url('gallery/category');?>"><i class="fa fa-user"></i> <span>Gallery Category</span></a></li> -->
           <li><a href="<?=base_url('gallery/tag');?>"><i class="fa fa-tag"></i> <span>Gallery Tag</span></a></li>
           <li><a href="<?=base_url('gallery');?>"><i class="fa fa-list"></i> <span>Gallery List</span></a></li>
          </ul>
        </li>

         <li class="treeview ">
          <a href="#">
            <i class="fa fa-info-circle"></i> <span>Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="<?=base_url('blog/category');?>"><i class="fa fa-list-alt"></i> <span>Blog Category</span></a></li>
            <li><a href="<?=base_url('blog');?>"><i class="fa fa-list"></i> <span>Blog List</span></a></li>
           
          </ul>
        </li>

         <li><a href="<?=base_url('popular');?>"><i class="fa fa-graduation-cap"></i> <span>Popular Across Mumbai</span></a></li>


          <li><a href="<?=base_url('whatWeDo');?>"><i class="fa fa-graduation-cap"></i> <span>What We Do</span></a></li>

           <li><a href="<?=base_url('work');?>"><i class="fa fa-graduation-cap"></i> <span>Work Process</span></a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Our Restaurant</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="<?=base_url('restaurant');?>"><i class="fa fa-tag"></i> <span>Our Vanue And Offers</span></a></li>
            <li><a href="<?=base_url('restaurant/amenities');?>"><i class="fa fa-list-alt"></i> <span>Amenities</span></a></li>
             <li><a href="<?=base_url('restaurant/chefs');?>"><i class="fa fa-asterisk"></i> <span>Our Chefs</span></a></li>
          
          </ul>
        </li>
        <li><a href="<?=base_url('blog/testimonial');?>"><i class="fa fa-comment"></i> <span>Testimonials</span></a></li>

        <li><a href="<?=base_url('gallery/images');?>"><i class="fa fa-comment"></i> <span>Index Page Images</span></a></li>




        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('layouts/top-nav');?>"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="<?=base_url('layouts/boxed');?>"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="<?=base_url('layouts/fixed');?>"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="<?=base_url('layouts/collapsed-sidebar');?>"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li> -->
        <!-- <li>
          <a href="<?=base_url('widgets');?>">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li> -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('charts/chartjs');?>"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="<?=base_url('charts/morris');?>"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="<?=base_url('charts/flot');?>"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="<?=base_url('charts/inline');?>"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li> -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('ui/general');?>"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="<?=base_url('ui/icons');?>"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="<?=base_url('ui/buttons');?>"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="<?=base_url('ui/sliders');?>"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="<?=base_url('ui/timeline');?>"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="<?=base_url('ui/modals');?>"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li> -->
       <!--  <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('forms/general');?>"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="<?=base_url('forms/advanced');?>"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="<?=base_url('forms/editors');?>"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li> -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('tables/simple');?>"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="<?=base_url('tables/data');?>"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li> -->
        <!-- <li>
          <a href="<?=base_url('calendar');?>">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li> -->
        <!-- <li>
          <a href="<?=base_url('mailbox');?>">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li> -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('examples/invoice');?>"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="<?=base_url('examples/profile');?>"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="<?=base_url('examples/lockscreen');?>"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="<?=base_url('examples/404');?>"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="<?=base_url('examples/500');?>"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="<?=base_url('examples/blank');?>"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="<?=base_url('examples/pace');?>"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li> -->
       <!--  <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li> -->
        <!-- <li><a href="<?=base_url('users');?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
        <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
      </ul>

      




    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$title;?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?=$title;?></li>
      </ol>
    </section>
<?php } ?>