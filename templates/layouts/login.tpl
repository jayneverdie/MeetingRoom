<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="UTF-8">
  <title><?php echo APP_NAME;?></title>
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <link rel="manifest" href="/manifest.json">
  <!-- CSS -->
  <link rel="stylesheet" href="/assets/jqwidgets/styles/jqx.base.css"/>
  <link rel="stylesheet" href="/assets/bootstrap-3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/treed-menu/treed.css">
  <link rel="stylesheet" href="/assets/css/app.css">
  <link rel="stylesheet" href="/assets/sweetalert-master/dist/sweetalert.css">
  <link rel="stylesheet" href="/assets/css/multiple-select.css" />
  <link rel="stylesheet" href="/assets/jquery-ui-1.12.1/jquery-ui.min.css">
  <link rel="stylesheet" href="/assets/css/boon-all.css">
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/jqwidgets/styles/deestone2.css"/>
  <!-- CSS datepicker -->
  <link rel="stylesheet" type="text/css" href="/assets/jonthornton/jquery.timepicker.css" />
  <!-- JS -->
  <script src="/assets/sweetalert-master/dist/sweetalert.min.js"></script> 
  <script src="/assets/js/jqx_mod.js"></script>
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/js/multiple-select.js"></script>
  <script src="/assets/bootstrap-3.3.7/js/bootstrap.min.js"></script>
  <script src="/assets/jqwidgets/jqxcore.js"></script>
  <script src="/assets/jqwidgets/jqxinput.js"></script>
  <script src="/assets/jqwidgets/jqxdata.js"></script>
  <script src="/assets/jqwidgets/jqxbuttons.js"></script>
  <script src="/assets/jqwidgets/jqxbuttongroup.js"></script>
  <script src="/assets/jqwidgets/jqxscrollbar.js"></script>
  <script src="/assets/jqwidgets/jqxmenu.js"></script>
  <script src="/assets/jqwidgets/jqxlistbox.js"></script>
  <script src="/assets/jqwidgets/jqxdropdownlist.js"></script>
  <script src="/assets/jqwidgets/jqxgrid.js"></script>
  <script src="/assets/jqwidgets/jqxgrid.selection.js"></script> 
  <script src="/assets/jqwidgets/jqxgrid.columnsresize.js"></script> 
  <script src="/assets/jqwidgets/jqxgrid.filter.js"></script> 
  <script src="/assets/jqwidgets/jqxgrid.sort.js"></script> 
  <script src="/assets/jqwidgets/jqxgrid.pager.js"></script> 
  <script src="/assets/jqwidgets/jqxgrid.edit.js"></script> 
  <script src="/assets/jqwidgets/jqxdatetimeinput.js"></script> 
  <script src="/assets/jqwidgets/jqxcalendar.js"></script> 
  <script src="/assets/jqwidgets/jqxgrid.grouping.js"></script> 
  <script src="/assets/jqwidgets/jqxwindow.js"></script>
  <script src="/assets/jqwidgets/jqxinput.js"></script>
  <script src="/assets/jqwidgets/jqxcheckbox.js"></script>
  <script src="/assets/jqwidgets/jqxpanel.js"></script>
  <script src="/assets/jqwidgets/jqxcombobox.js"></script>
  <script src="/assets/jqwidgets/jqxdropdownbutton.js"></script>
  <script src="/assets/jqwidgets/globalization/globalize.js"></script>
  <script src="/assets/jquery-ui-1.12.1/jquery-ui.min.js"></script>
  <script src="/assets/js/app.js"></script>
  <script src="/assets/js/gojax.min.js"></script>
    <!--datepicker-->
  <script src="/assets/vitalets-datepicker/js/moment.min.js"></script>
  <script type="text/javascript" src="/assets/jonthornton/jquery.timepicker.js"></script>
</head>

<style type="text/css">
  .navbar-custom {
      background-color:#708090;
      color:#ffffff;
      border-radius:0;
  }

  .navbar-custom .navbar-nav > li > a {
      color:#fff;
  }

  .navbar-custom .navbar-nav > .active > a {
      color: #ffffff;
      background-color:transparent;
  }

  .navbar-custom .navbar-nav > li > a:hover,
  .navbar-custom .navbar-nav > li > a:focus,
  .navbar-custom .navbar-nav > .active > a:hover,
  .navbar-custom .navbar-nav > .active > a:focus,
  .navbar-custom .navbar-nav > .open >a {
      text-decoration: none;
      background-color: #6E7B8B;
  }

  .navbar-custom .navbar-brand {
      color:#eeeeee;
  }
  .navbar-custom .navbar-toggle {
      background-color:#eeeeee;
  }
  .navbar-custom .icon-bar {
      background-color:#33aa33;
  }
</style>

<body>
  <nav class="navbar navbar-custom navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        
        <a class="navbar-brand" href="/"><img  src="/DN2.png"/  style="padding-left:-10px;height:17px; width:auto;" >
        </a>
        <a class="navbar-brand" href="/">
          <?php echo APP_NAME;?>
        </a>
        <ul class="nav navbar-nav navbar-left">
          <li class="dropdown"><a href="/report_day">รายงานจองห้องประชุม</a></li>
          <li class="dropdown"><a href="/manual.pdf" target="_blank"><span class="glyphicon glyphicon-book"></span> คู่มือการใช้งาน</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div style="margin: 0 auto; max-width: 1200px;">
        <?=$this->section('content')?>
      </div>
    </div>
  </div>
</body>
</html>

    
