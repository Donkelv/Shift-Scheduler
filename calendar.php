<!DOCTYPE html>
<html>
<head>
    <?php $title = 'LASU Hospital | Shift Schedule'; ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
      <?php
      require_once("dbConnect.php");
      include("login_function.php");
      if(pf_check_number($_GET['id'])==TRUE){
          $validid = $_GET['id'];
          
      } else {
          header("Location:index.php");
      }
      if($validid == TRUE){
          $query = "SELECT * FROM reg_table WHERE login_id =".$validid;
          $result = $db->query($query);
          $row = mysqli_fetch_assoc($result);
          if($query == FALSE){
              echo "Could not get data";
          }
          $queryid = "SELECT * FROM login_table WHERE id=".$validid;
          $resultid = $db->query($queryid);
          $rowid = mysqli_fetch_assoc($resultid);
          if($rowid['id'] == 1){
              $_SESSION['admin'] = $rowid['id'];
          }
          if($rowid['id'] > 1){
              $_SESSION['user'] = $rowid['id'];
          }
          $mon = date('F');
          $querysh = "SELECT * FROM shift WHERE userId = '$validid' AND months = '$mon'";
          $resultsh = $db->query($querysh);
          $rowsh = mysqli_fetch_assoc($resultsh);
          $one = $rowsh[1];
          
        }
      ?>
    <!-- Logo -->
    <a href="../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Clinic - </b><?php echo $row['name']; ?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php echo '<img src="'.$row['pic'].'" class="user-image" alt="User Image">'; ?>
              
              <span class="hidden-xs"><?php echo $row['name']. ' '.$row['surname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                  <?php 
                  if(isset($_SESSION['user'])){
                      echo '<img src="'.$row['pic'].'" class="img-circle" alt="'.$row['name'].'">';

                      echo '<p>'.$row['name']. ' '.$row['surname'].'-'.$row['work_description'].
                      
                    '</p>';
                  }
                  ?>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
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
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
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
      <div class="user-panel">
        <div class="pull-left image">
            <?php
            if(isset($_SESSION['user'])){
                echo '<img src="'.$row['pic'].'" class="img-circle" alt="'.$row['name'].'">';
            }
            ?>
          
        </div>
        <div class="pull-left info">
            <?php
            if(isset($_SESSION['user'])){
                echo '<p>'.$row['name']. ' '.$row['surname'].'</p>';
            }
            ?>
          
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
 
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        
        
        
        
        
        
        <li class="active">
            <?php 
            if(isset($_SESSION['user'])){
                echo '<a href=calendar.php?id='.$validid.'>
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-red">3</small>
                  <small class="label pull-right bg-blue">17</small>
                </span>
              </a>';
              echo '<li><a href=profile.php><i class="fa fa-book"></i> <span>Profile</span></a></li>';
            }
            ?>
          
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Calendar
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calendar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Shift Key</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
                <div class="external-event bg-green">L - Long Hours</div>
                <div class="external-event bg-yellow">M - Mornining</div>
                <div class="external-event bg-aqua">N - Night</div>
                <div class="external-event bg-light-blue">O - Off</div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
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
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- fullCalendar -->
<script src="bower_components/moment/moment.js"></script>
<script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- Page specific script -->



<script>
    var one = '<?php echo $one ?>';
    var o_2 = '<?php echo $rowsh[2] ?>';
    var o_3 = '<?php echo $rowsh[3] ?>'; 
    var o_4 = '<?php echo $rowsh[4] ?>'; 
    var o_5 = '<?php echo $rowsh[5] ?>'; 
    var o_6= '<?php echo $rowsh[6] ?>'; 
    var o_7 = '<?php echo $rowsh[7] ?>'; 
    var o_8 = '<?php echo $rowsh[8] ?>'; 
    var o_9 = '<?php echo $rowsh[9] ?>'; 
    var o_10 = '<?php echo $rowsh[10] ?>'; 
    var o_11 = '<?php echo $rowsh[11] ?>'; 
    var o_12 = '<?php echo $rowsh[12] ?>'; 
    var o_13 = '<?php echo $rowsh[13] ?>'; 
    var o_14 = '<?php echo $rowsh[14] ?>'; 
    var o_15 = '<?php echo $rowsh[15] ?>'; 
    var o_16 = '<?php echo $rowsh[16] ?>'; 
    var o_17 = '<?php echo $rowsh[17] ?>'; 
    var o_18 = '<?php echo $rowsh[18] ?>'; 
    var o_19 = '<?php echo $rowsh[19] ?>'; 
    var o_20 = '<?php echo $rowsh[20] ?>'; 
    var o_21 = '<?php echo $rowsh[21] ?>'; 
    var o_22 = '<?php echo $rowsh[22] ?>'; 
    var o_23 = '<?php echo $rowsh[23] ?>'; 
    var o_24 = '<?php echo $rowsh[24] ?>'; 
    var o_25 = '<?php echo $rowsh[25] ?>'; 
    var o_26 = '<?php echo $rowsh[26] ?>'; 
    var o_27 = '<?php echo $rowsh[27] ?>'; 
    var o_28 = '<?php echo $rowsh[28] ?>'; 
    var o_29= '<?php echo $rowsh[29] ?>'; 
    var o_30 = '<?php echo $rowsh[30] ?>'; 
    var o_31 = '<?php echo $rowsh[31] ?>'; 
    
  $(function () {
    const monthsList = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    
    // const monthIndex = monthsList.indexOf(month);
    // console.log(monthIndex);
    console.log(m);
    // console.log(month);

    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      
      //Random default events
      events    : [
        {
          title          : one,
          start          : new Date(y, m, 1),
          allDay         : true,
          backgroundColor: '#0073b7', //green
          borderColor    : '#0073b7' //green
        },
        {
          title          : o_2,
          start          : new Date(y, m, 2),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_3,
          start          : new Date(y, m, 3),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_4,
          start          : new Date(y, m, 4),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_5,
          start          : new Date(y, m, 5),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_6,
          start          : new Date(y, m, 6),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_7,
          start          : new Date(y, m, 7),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_8,
          start          : new Date(y, m, 8),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_9,
          start          : new Date(y, m, 9),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_10,
          start          : new Date(y, m, 10),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_11,
          start          : new Date(y, m, 11),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_12,
          start          : new Date(y, m, 12),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_13,
          start          : new Date(y, m, 13),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_14,
          start          : new Date(y, m, 14),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_15,
          start          : new Date(y, m, 15),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_16,
          start          : new Date(y, m, 16),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_17,
          start          : new Date(y, m, 17),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_18,
          start          : new Date(y, m, 18),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_19,
          start          : new Date(y, m, 19),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_20,
          start          : new Date(y, m, 20),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_21,
          start          : new Date(y, m, 21),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_22,
          start          : new Date(y, m, 22),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_23,
          start          : new Date(y, m, 23),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_24,
          start          : new Date(y, m, 24),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_25,
          start          : new Date(y, m, 25),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_26,
          start          : new Date(y, m, 26),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
        {
          title          : o_27,
          start          : new Date(y, m, 27),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },{
          title          : o_28,
          start          : new Date(y, m, 28),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },{
          title          : o_29,
          start          : new Date(y, m, 29),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },{
          title          : o_30,
          start          : new Date(y, m, 30),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },{
          title          : o_31,
          start          : new Date(y, m, 31),
          allDay         : true,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },  
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }
      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val();
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      init_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })

  console.log(document.readyState);
  if (document.readyState) {
    const month = document.getElementsByClassName('.fc-center');
    console.log(month);
    console.log('I am it ' + month);
  }


</script>
</body>
</html>
