<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UD WAWA COLECTION | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  {{-- data table --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <style>
    #events {
        margin-bottom: 1em;
        padding: 1em;
        background-color: #f6f6f6;
        border: 1px solid #999;
        border-radius: 3px;
        height: 100px;
        overflow: auto;
    }
    </style>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{route('kredit.index')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>W</b>W</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>WAWA</b>COLECTION</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!--<img src="{{asset('images/users/'.Auth::user()->id.'/'.Auth::user()->img)}}" class="user-image" alt="User Image">-->
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
             <li class="user-header">
                <!--<img src="{{asset('images/users/'.Auth::user()->id.'/'.Auth::user()->img)}}" class="img-circle" alt="User Image">-->

                <p>
                  {{Auth::user()->name}}
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('profile.index')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat"  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-th"></i>
          <span>Customer</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('pelanggan.create')}}"><i class="fa fa-circle-o"></i>Tambah Customer </a></li>
          <li><a href="{{route('pelanggan.index')}}"><i class="fa fa-circle-o"></i> Data Customer</a></li>
        </ul>
      </li>
      <!--<li>
        <a href="{{route('pelanggan.index')}}">
          <i class="fa fa-th"></i> <span>Customer</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">new</small>
          </span>
        </a>
      </li>-->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-th"></i>
          <span>Vendor</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('vendor.create')}}"><i class="fa fa-circle-o"></i>Tambah Vendor </a></li>
          <li><a href="{{route('vendor.index')}}"><i class="fa fa-circle-o"></i> Data Vendor</a></li>
        </ul>
      </li>
      <!--<li>
        <a href="{{route('vendor.index')}}">
          <i class="fa fa-th"></i> <span>Data Vendor</span>
          <span class="pull-right-container">
           <small class="label pull-right bg-green">new</small>
          </span>
        </a>
      </li>-->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-th"></i>
          <span>Barang Vendor</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('barang.create')}}"><i class="fa fa-circle-o"></i>Tambah Barang Vendor </a></li>
          <li><a href="{{route('barang.index')}}"><i class="fa fa-circle-o"></i> Data Barang Vendor</a></li>
        </ul>
      </li>
      <!--<li>
        <a href="{{route('barang.index')}}">
          <i class="fa fa-th"></i> <span>Data Barang Vendor</span>
          <span class="pull-right-container">
           <small class="label pull-right bg-green">new</small>
          </span>
        </a>
      </li>-->
     <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Vendor</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('vendor.index')}}"><i class="fa fa-circle-o"></i> Data Vendor</a></li>
          <li><a href="{{route('barang.index')}}"><i class="fa fa-circle-o"></i> Barang Vendor</a></li>
        </ul>
      </li>-->
      <li>
        <a href="{{route('kredit.index')}}">
          <i class="fa fa-pie-chart"></i> <span>Pengajuan Kredit Baru</span>
          <span class="pull-right-container">
            <!--<small class="fa fa-angle-left pull-right">new</small>-->
          </span>
        </a>
      </li>
      <li>
        <a href="{{route('kredit.status')}}">
          <i class="fa fa-pie-chart"></i> <span>Status Pengajuan Kredit</span>
          <span class="pull-right-container">
            <!--<small class="fa fa-angle-left pull-right">new</small>-->
          </span>
        </a>
      </li>
      <li>
        <a href="{{route('kredit.history')}}">
          <i class="fa fa-pie-chart"></i> <span>History Kredit</span>
          <span class="pull-right-container">
            <!--<small class="fa fa-angle-left pull-right">new</small>-->
          </span>
        </a>
      </li>
      <!--<li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Pengajuan Kredit</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('kredit.index')}}"><i class="fa fa-circle-o"></i> Pengajuan Kredit Baru</a></li>
          <li><a href="{{route('kredit.status')}}"><i class="fa fa-circle-o"></i> Status Pengajuan</a></li>
          <li><a href="{{route('kredit.history')}}"><i class="fa fa-circle-o"></i> History Kredit</a></li>
        </ul>
      </li>-->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Survey</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('survey.index')}}"><i class="fa fa-circle-o"></i> Pertanyaan Survey</a></li>
          <li><a href="{{route('survey.pertayaan')}}"><i class="fa fa-circle-o"></i> Kelola Survey</a></li>
        </ul>
      </li>
      <li>
        <a href="{{route('notif.index')}}">
          <i class="fa fa-pie-chart"></i> <span>Notifikasi Jatuh Tempo</span>
          <span class="pull-right-container">
            <!--<small class="fa fa-angle-left pull-right">new</small>-->
          </span>
        </a>
      </li>
      {{-- <li>
        <a href="{{route('survey.index')}}">
          <i class="fa fa-th"></i> <span>Survey</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">new</small>
          </span>
        </a>
      </li> --}}
      <!--<li>
        <a href="{{route('survey.index')}}">
          <i class="fa fa-th"></i> <span>Survey</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">new</small>
          </span>
        </a>
      </li>-->
      {{-- <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>UI Elements</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
          <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
          <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
          <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
          <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
          <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Forms</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
          <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
          <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-table"></i> <span>Tables</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
          <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
        </ul>
      </li>
      <li>
        <a href="pages/calendar.html">
          <i class="fa fa-calendar"></i> <span>Calendar</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red">3</small>
            <small class="label pull-right bg-blue">17</small>
          </span>
        </a>
      </li>
      <li>
        <a href="pages/mailbox/mailbox.html">
          <i class="fa fa-envelope"></i> <span>Mailbox</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-yellow">12</small>
            <small class="label pull-right bg-green">16</small>
            <small class="label pull-right bg-red">5</small>
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-folder"></i> <span>Examples</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
          <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
          <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
          <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
          <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
          <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
          <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
          <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
          <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>Multilevel</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i> Level One
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
              <li class="treeview">
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
      </li>
      <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
      <li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> --}}
    </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('main')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<script type="text/javascript">
		
		function isNumber(evt) {
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		}
		return true;
	}
	</script>
{{-- ajax --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>


@yield('script')
<script>
        $(function () {

          //Date picker
          $('#datepicker').datepicker({
            autoclose: true
          })


        })
        $(document).ready( function () {
            $('#pekerjaan').change( function (){
                var pekerjaan = $('#pekerjaan').find(":selected").text();
                // alert(pekerjaan);
                if(pekerjaan == "Wiraswasta"){
                    $('#form-pekerjaan').append('<div class="form-group"><label for="nama_toko">Nama Toko</label><input type="text" class="form-control" placeholder="Nama Toko" name="nama_toko" required></div><div class="form-group"><label for="alamat_toko">Alamat Toko</label><input type="text" class="form-control" placeholder="Alamat Toko" name="alamat_toko" required></div>');
                }
            });

            var table = $('#table_cari').DataTable({
                "columnDefs": [
                    {
                        "targets": [ 0 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 1 ],
                        "visible": false,
                        "searchable": false
                    }
                ]
            });
            $('#table_cari tbody').on('click', 'tr', function () {
              $('#button').prop("disabled", false);
                if($('#table_cari tbody tr').hasClass('selected')){
                    $("#table_cari tbody tr").attr('class', '');
                    $(this).toggleClass('selected');
                }else{
                    $(this).toggleClass('selected');
                }
            });
            // var tes= new Array();
            $('#button').click(function () {
                var ids = $.map(table.rows('.selected').data(), function (item) {
                    // tes.push(item[0]);
                    return item[0]
                });
                var vendor = $.map(table.rows('.selected').data(), function (item) {
                    return item[1]
                });

                $('#barang_id').val(ids);
                $('#vendor_id').val(vendor);
                console.log(tes)
                // alert(table.rows('.selected').data().length + ' row(s) selected');
            });
            // $('#myTable').DataTable();
            $(document).on('click','#cari',function (e){
                // $('.body2').remove();
                // $("#table_cari tbody tr").remove();
                table
                    .clear()
                    .draw();
                $.ajax({
                    type: 'post',
                    url: '/kredit/cari',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'kategori': $('#kategori').find(":selected").text(),
                    },
                    success: function(data) {
                        if ((data.errors)){
                        $('.error').removeClass('hidden');
                            $('.error').text(data.errors.name);
                        }
                        else {
                            $('.error').addClass('hidden');

                            // alert(data[0].barangs[0].nama);
                            data.forEach(function(value , i) {
                                data[i].barangs.forEach(function(entry, j) {
                                // alert(entry.nama)

                                table.row.add([
                                    entry.id,
                                    data[i].id,
                                    entry.nama,
                                    data[i].nama,
                                    entry.harga,

                                ]).draw( false );
                                // $('#table_cari').find('tbody').append( "<tr><td>"+ entry.nama +"</td><td>"+data[i].nama+"</td><td>"+entry.harga+"</td><td><a href='#' class='btn btn-primary btn-sm'>Pilih</a></td></tr>" );
                            });
                            });

                            // var div = document.getElementById('body');
                            // div.innerHTML += '<hr><div class="body2"><div class="form-group"><label>Nama Vendor</label><input type="text" class="form-control" placeholder="Nama Vendor" name="nama" value="'+data[0].nama+'"></div><div class="form-group"><label>Alamat</label><input type="text" class="form-control" placeholder="Alamat" name="alamat" value="'+data[0].alamat+'"></div><div class="form-group"><label>No Telphone</label><input type="text" class="form-control" placeholder="No Telphone" name="tlpn" value="'+data[0].tlpn+'"></div><div class="form-group"><label>Barang</label><select class="form-control" id="barang" name="barang"></select></div><div class="form-group"><label>Harga</label><input type="text" class="form-control" placeholder="Harga" name="harga" value="'+data[0].harga+'"></div><div class="form-group"><input type="submit" class="btn btn-primary proses" value="Proses" name="simpan" data-id="' + data[0].id + '" data-name="' + data[0].nama + '"></div></div>';

                            // $.each(data[1], function(index, item) {
                            //     $('#barang').append("<option value='"+ item.id +"'>"+item.nama+"</option>");
                            // });
                        }
                    },
                });
                $('#name').val('');
            });
            var ci_bul=[];
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!
            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd;
                }

                if (mm < 10) {
                mm = '0' + mm;
                }
            $('#kalkulasi').click(function (){
                $('#simulasi_table tbody tr').remove();
                $('#simulasi_table tfoot').remove();
                $('#jatuh_tempo').remove();
                var harga = $('#harga').text();
                var cicilan = $('select[name=cicilan] :selected').val();
                var bunga = $('input[name=bunga]:checked').val();
                var idx=0;
                var bu_hit_baru = 0;
                var cipok_baru = 0;
                var tot_ang_baru = 0;
                var harga_baru=harga;
                if(bunga=='0'){

                    var cipok = parseInt(harga)/parseInt(cicilan);
                    var bu_hit = Math.ceil(parseInt(harga)*0.25/12);
                    var angsuran = parseInt(cipok)+parseInt(bu_hit);
                    while(idx<cicilan){
                        // console.log('('+harga+'-('+idx+'*'+cipok+'))*0.25/12');
                        bu_hit_baru = parseInt(bu_hit_baru)+parseInt(bu_hit);
                        cipok_baru = parseInt(cipok_baru)+parseInt(cipok);
                        ci_bul.push(Math.round(bu_hit));
                        var tot_ang = parseInt(cipok)+parseInt(bu_hit);
                        tot_ang_baru = parseInt(tot_ang_baru)+parseInt(tot_ang);
                        console.log(cipok);
                        harga_baru = harga_baru-cipok;
                        $('#simulasi_table tbody:last-child').append('<tr><td>'+(parseInt(idx)+1)+'</td><td>Rp. '+Math.round(bu_hit).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</td><td>Rp. '+cipok.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</td><td>Rp. '+tot_ang.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</td><td>Rp. '+harga_baru.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</td></tr>')
                        idx++;
                    }
                    $('#simulasi_table').append('<tfoot><tr><td>Total</td><td>Rp. '+bu_hit_baru.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</td><td>Rp. '+cipok_baru.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</td><td>Rp. '+tot_ang_baru.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</td></tr></tfoot>');
                }else{
                    var cipok = parseInt(harga)/parseInt(cicilan);

                    while(idx<cicilan){
                        var bu_hit = Math.ceil((parseInt(harga)-(parseInt(idx)*parseInt(cipok)))*0.25/12);
                        // console.log('('+harga+'-('+idx+'*'+cipok+'))*0.25/12');
                        bu_hit_baru = parseInt(bu_hit_baru)+parseInt(bu_hit);
                        cipok_baru = parseInt(cipok_baru)+parseInt(cipok);
                        ci_bul.push(Math.round(bu_hit));
                        var tot_ang = parseInt(cipok)+parseInt(bu_hit);
                        tot_ang_baru = parseInt(tot_ang_baru)+parseInt(tot_ang);
                        console.log(harga_baru+' - '+cipok);
                        harga_baru = harga_baru-cipok;
                        $('#simulasi_table tbody:last-child').append('<tr><td>'+(parseInt(idx)+1)+'</td><td>Rp. '+Math.round(bu_hit).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</td><td>Rp. '+cipok.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</td><td>Rp. '+tot_ang.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</td><td>Rp. '+harga_baru.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</td></tr>')
                        idx++;
                    }
                    $('#simulasi_table').append('<tfoot><tr><td>Total</td><td>Rp. '+bu_hit_baru.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</td><td>Rp. '+cipok_baru.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</td><td>Rp. '+tot_ang_baru.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</td></tr></tfoot>');
                }
                today = mm + '/' + dd + '/' + yyyy;
                $('<h3 id="jatuh_tempo">Tanggal Jatuh Tempo: '+today+' </h3>').appendTo($('#tgl'));
                $('#proses_simpan').css('display','block');
                $('#cmd').css('display','block');

                // console.log('harga = '+harga);
                // console.log('cicilan = '+cicilan);
                // console.log('bunga = '+bunga);
                // console.log('cicilan Pokok = '+cipok);
                // console.log('Bunga Hitung = '+bu_hit);
                // console.log('Angsuran = '+angsuran);
                // console.log('Cicilan perbulan = '+ci_bul);
            });
           $('#proses_simpan').on('click',function(){
            now = yyyy + '-' + mm + '-' + dd;
               console.log(now);
            $.ajax({
                type: 'post',
                url: '/kredit/proses/simpan',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id_kredit': $('#kredit_id').val(),
                    'lama_cicilan':$('#cicilan').find(':selected').val(),
                    'suku_bunga':$('input[name=bunga]:checked').val(),
                    'cicilan': ci_bul,
                    'jatuh_tempo': now,
                    'pelanggan_id': $('#pelanggan_id').val(),
                },
                success: function(data) {
                    if ((data.errors)){
                    $('.error').removeClass('hidden');
                        $('.error').text(data.errors.name);
                    }
                    else {
                        window.location.href = "/kredit/status/cek";
                        }
                    },
                });
            });
        });
      </script>
</body>
</html>
