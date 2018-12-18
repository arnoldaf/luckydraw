<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('admin/bootstrap/vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{!! asset('admin/bootstrap/vendor/metisMenu/metisMenu.min.css') !!}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{!! asset('admin/bootstrap/dist/css/sb-admin-2.css') !!}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{!! asset('admin/bootstrap/vendor/morrisjs/morris.css') !!}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{!! asset('admin/bootstrap/vendor/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
      <link href="{!! asset('admin/bootstrap/vendor/datatables-plugins/dataTables.bootstrap.css') !!}" rel="stylesheet">

</head>



<?php
/*
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style type="text/css">svg:not(:root).svg-inline--fa {
  overflow: visible; }

.svg-inline--fa {
  display: inline-block;
  font-size: inherit;
  height: 1em;
  overflow: visible;
  vertical-align: -.125em; }
  .svg-inline--fa.fa-lg {
    vertical-align: -.225em; }
  .svg-inline--fa.fa-w-1 {
    width: 0.0625em; }
  .svg-inline--fa.fa-w-2 {
    width: 0.125em; }
  .svg-inline--fa.fa-w-3 {
    width: 0.1875em; }
  .svg-inline--fa.fa-w-4 {
    width: 0.25em; }
  .svg-inline--fa.fa-w-5 {
    width: 0.3125em; }
  .svg-inline--fa.fa-w-6 {
    width: 0.375em; }
  .svg-inline--fa.fa-w-7 {
    width: 0.4375em; }
  .svg-inline--fa.fa-w-8 {
    width: 0.5em; }
  .svg-inline--fa.fa-w-9 {
    width: 0.5625em; }
  .svg-inline--fa.fa-w-10 {
    width: 0.625em; }
  .svg-inline--fa.fa-w-11 {
    width: 0.6875em; }
  .svg-inline--fa.fa-w-12 {
    width: 0.75em; }
  .svg-inline--fa.fa-w-13 {
    width: 0.8125em; }
  .svg-inline--fa.fa-w-14 {
    width: 0.875em; }
  .svg-inline--fa.fa-w-15 {
    width: 0.9375em; }
  .svg-inline--fa.fa-w-16 {
    width: 1em; }
  .svg-inline--fa.fa-w-17 {
    width: 1.0625em; }
  .svg-inline--fa.fa-w-18 {
    width: 1.125em; }
  .svg-inline--fa.fa-w-19 {
    width: 1.1875em; }
  .svg-inline--fa.fa-w-20 {
    width: 1.25em; }
  .svg-inline--fa.fa-pull-left {
    margin-right: .3em;
    width: auto; }
  .svg-inline--fa.fa-pull-right {
    margin-left: .3em;
    width: auto; }
  .svg-inline--fa.fa-border {
    height: 1.5em; }
  .svg-inline--fa.fa-li {
    width: 2em; }
  .svg-inline--fa.fa-fw {
    width: 1.25em; }

.fa-layers svg.svg-inline--fa {
  bottom: 0;
  left: 0;
  margin: auto;
  position: absolute;
  right: 0;
  top: 0; }

.fa-layers {
  display: inline-block;
  height: 1em;
  position: relative;
  text-align: center;
  vertical-align: -.125em;
  width: 1em; }
  .fa-layers svg.svg-inline--fa {
    -webkit-transform-origin: center center;
            transform-origin: center center; }

.fa-layers-text, .fa-layers-counter {
  display: inline-block;
  position: absolute;
  text-align: center; }

.fa-layers-text {
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  -webkit-transform-origin: center center;
          transform-origin: center center; }

.fa-layers-counter {
  background-color: #ff253a;
  border-radius: 1em;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  color: #fff;
  height: 1.5em;
  line-height: 1;
  max-width: 5em;
  min-width: 1.5em;
  overflow: hidden;
  padding: .25em;
  right: 0;
  text-overflow: ellipsis;
  top: 0;
  -webkit-transform: scale(0.25);
          transform: scale(0.25);
  -webkit-transform-origin: top right;
          transform-origin: top right; }

.fa-layers-bottom-right {
  bottom: 0;
  right: 0;
  top: auto;
  -webkit-transform: scale(0.25);
          transform: scale(0.25);
  -webkit-transform-origin: bottom right;
          transform-origin: bottom right; }

.fa-layers-bottom-left {
  bottom: 0;
  left: 0;
  right: auto;
  top: auto;
  -webkit-transform: scale(0.25);
          transform: scale(0.25);
  -webkit-transform-origin: bottom left;
          transform-origin: bottom left; }

.fa-layers-top-right {
  right: 0;
  top: 0;
  -webkit-transform: scale(0.25);
          transform: scale(0.25);
  -webkit-transform-origin: top right;
          transform-origin: top right; }

.fa-layers-top-left {
  left: 0;
  right: auto;
  top: 0;
  -webkit-transform: scale(0.25);
          transform: scale(0.25);
  -webkit-transform-origin: top left;
          transform-origin: top left; }

.fa-lg {
  font-size: 1.33333em;
  line-height: 0.75em;
  vertical-align: -.0667em; }

.fa-xs {
  font-size: .75em; }

.fa-sm {
  font-size: .875em; }

.fa-1x {
  font-size: 1em; }

.fa-2x {
  font-size: 2em; }

.fa-3x {
  font-size: 3em; }

.fa-4x {
  font-size: 4em; }

.fa-5x {
  font-size: 5em; }

.fa-6x {
  font-size: 6em; }

.fa-7x {
  font-size: 7em; }

.fa-8x {
  font-size: 8em; }

.fa-9x {
  font-size: 9em; }

.fa-10x {
  font-size: 10em; }

.fa-fw {
  text-align: center;
  width: 1.25em; }

.fa-ul {
  list-style-type: none;
  margin-left: 2.5em;
  padding-left: 0; }
  .fa-ul > li {
    position: relative; }

.fa-li {
  left: -2em;
  position: absolute;
  text-align: center;
  width: 2em;
  line-height: inherit; }

.fa-border {
  border: solid 0.08em #eee;
  border-radius: .1em;
  padding: .2em .25em .15em; }

.fa-pull-left {
  float: left; }

.fa-pull-right {
  float: right; }

.fa.fa-pull-left,
.fas.fa-pull-left,
.far.fa-pull-left,
.fal.fa-pull-left,
.fab.fa-pull-left {
  margin-right: .3em; }

.fa.fa-pull-right,
.fas.fa-pull-right,
.far.fa-pull-right,
.fal.fa-pull-right,
.fab.fa-pull-right {
  margin-left: .3em; }

.fa-spin {
  -webkit-animation: fa-spin 2s infinite linear;
          animation: fa-spin 2s infinite linear; }

.fa-pulse {
  -webkit-animation: fa-spin 1s infinite steps(8);
          animation: fa-spin 1s infinite steps(8); }

@-webkit-keyframes fa-spin {
  0% {
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg); }
  100% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg); } }

@keyframes fa-spin {
  0% {
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg); }
  100% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg); } }

.fa-rotate-90 {
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=1)";
  -webkit-transform: rotate(90deg);
          transform: rotate(90deg); }

.fa-rotate-180 {
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2)";
  -webkit-transform: rotate(180deg);
          transform: rotate(180deg); }

.fa-rotate-270 {
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=3)";
  -webkit-transform: rotate(270deg);
          transform: rotate(270deg); }

.fa-flip-horizontal {
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1)";
  -webkit-transform: scale(-1, 1);
          transform: scale(-1, 1); }

.fa-flip-vertical {
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1)";
  -webkit-transform: scale(1, -1);
          transform: scale(1, -1); }

.fa-flip-horizontal.fa-flip-vertical {
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1)";
  -webkit-transform: scale(-1, -1);
          transform: scale(-1, -1); }

:root .fa-rotate-90,
:root .fa-rotate-180,
:root .fa-rotate-270,
:root .fa-flip-horizontal,
:root .fa-flip-vertical {
  -webkit-filter: none;
          filter: none; }

.fa-stack {
  display: inline-block;
  height: 2em;
  position: relative;
  width: 2em; }

.fa-stack-1x,
.fa-stack-2x {
  bottom: 0;
  left: 0;
  margin: auto;
  position: absolute;
  right: 0;
  top: 0; }

.svg-inline--fa.fa-stack-1x {
  height: 1em;
  width: 1em; }

.svg-inline--fa.fa-stack-2x {
  height: 2em;
  width: 2em; }

.fa-inverse {
  color: #fff; }

.sr-only {
  border: 0;
  clip: rect(0, 0, 0, 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px; }

.sr-only-focusable:active, .sr-only-focusable:focus {
  clip: auto;
  height: auto;
  margin: 0;
  overflow: visible;
  position: static;
  width: auto; }
  .btn-primary {
    color: #fff;
    background-color: #20a8d8 !important;

}
</style>

    <title>Administrator Panel</title>

    <!-- Bootstrap core CSS-->
   <link href="{!! asset('admin/vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{!! asset('admin/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{!! asset('admin/vendor/datatables/dataTables.bootstrap4.css') !!}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{!! asset('admin/css/sb-admin.css') !!}?a=aa" rel="stylesheet">
 <link href="{!! asset('admin/css/backend.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">


  </head>
  */?>




  <?php
  /*

  <body id="wrapper">

    @include('admin.theme.header')

    <div id="page-wrapper">

      @include('admin.theme.sidebar')

      <div id="content-wrapper">

         @yield('content')

        <!-- Sticky Footer -->
        <!--
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>
      -->
      <footer class="app-footer">
              <span class="float-left">
                  <strong>Copyright © 2018 <a href="#">Finovics</a></strong> All Rights Reserved.
              </span>
              <div class="clearfix"></div>
     </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{!! asset('admin/vendor/jquery/jquery.min.js') !!} "></script>
    <script src="{!! asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') !!} "></script>

    <!-- Core plugin JavaScript-->
    <script src="{!! asset('admin/vendor/jquery-easing/jquery.easing.min.js') !!} "></script>

    <!-- Page level plugin JavaScript-->
    <script src="{!! asset('admin/vendor/chart.js/Chart.min.js') !!} "></script>
    <script src="{!! asset('admin/vendor/datatables/jquery.dataTables.js') !!} "></script>
    <script src="{!! asset('admin/vendor/datatables/dataTables.bootstrap4.js') !!} "></script>

    <!-- Custom scripts for all pages-->
    <script src="{!! asset('admin/js/sb-admin.min.js') !!} "></script>
    <script src="{!! asset('admin/js/custom-function.js') !!} "></script>


    <!-- Demo scripts for this page-->
    <script src="{!! asset('admin/js/demo/datatables-demo.js') !!} "></script>
    <script src="{!! asset('admin/js/demo/chart-area-demo.js') !!} "></script>

    <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>

    a:hover,a:focus{
      text-decoration: none;
      outline: none;
  }
  .tab .nav-tabs{
      border: none;
      border-bottom: 2px solid #079fc9;
      margin: 0;
  }
  .tab .nav-tabs li a{
      padding: 5px 20px;
      margin: 0 10px -1px 0;
      font-size: 11px;
      font-weight: 600;
      color: #293241;
      text-transform: uppercase;
      border: 2px solid #e6e5e1;
      border-bottom: none;
      border-radius: 5px 5px 0 0;
      z-index: 1;
      position: relative;
      transition: all 0.3s ease 0s;
  }
  .tab .nav-tabs li a:hover,
  .tab .nav-tabs li.active a{
      background: #fff;
      color: #079fc9;
      border: 2px solid #079fc9;
      border-bottom-color: transparent;
  }
  .tab .nav-tabs li a:before{
      content: "";
      display: block;
      height: 2px;
      background: #fff;
      position: absolute;
      bottom: -2px;
      left: 0;
      right: 0;
      transform: scaleX(0);
      transition: all 0.3s ease-in-out 0s;
  }
  .tab .nav-tabs li.active a:before,
  .tab .nav-tabs li a:hover:before{ transform: scaleX(1); }
  .tab .tab-content{
      padding: 10px;
      font-size: 17px;
      color: #6f6f6f;
      line-height: 30px;
      letter-spacing: 1px;
      position: relative;
  }
  @media only screen and (max-width: 479px){
      .tab .nav-tabs{ border: none; }
      .tab .nav-tabs li{
          width: 100%;
          text-align: center;
          margin-bottom: 15px;
      }
      .tab .nav-tabs li a{
          margin: 0;
          border-bottom: 2px solid transparent;
      }
      .tab .nav-tabs li a:before{
          content: "";
          width: 100%;
          height: 2px;
          background: #079fc9;
          position: absolute;
          bottom: -2px;
          left: 0;
      }
  }
    </style>
@include('admin.scripts.search-users')

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"><input type="hidden" name="_token" value="{{ csrf_token() }}"></form>
  </body>
  <script>
    function no_backspaces(event)
             {
                 backspace = 8;
                 if (event.keyCode == backspace) event.preventDefault();
             }
  $(function() {
      var start = moment().subtract(29, 'days');
      var end = moment();

      function cb(start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }

        $('input[name="reportrange"]').daterangepicker({
          startDate: start,
          endDate: end,
          opens: 'left',
          ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });

        $('#dataTable1').DataTable( {
            order: [[ 3, 'desc' ], [ 0, 'asc' ]]
        } );

  });
  </script>
</html>*/?>


<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.theme.header')
        @yield('content')
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{!! asset('admin/bootstrap/vendor/jquery/jquery.min.js') !!}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{!! asset('admin/bootstrap/vendor/bootstrap/js/bootstrap.min.js') !!}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{!! asset('admin/bootstrap/vendor/metisMenu/metisMenu.min.js') !!}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{!! asset('admin/bootstrap/vendor/raphael/raphael.min.js') !!}"></script>
    <script src="{!! asset('admin/bootstrap/vendor/morrisjs/morris.min.js') !!}"></script>
    <script src="{!! asset('admin/bootstrap/data/morris-data.js') !!}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{!! asset('admin/bootstrap/dist/js/sb-admin-2.js') !!}"></script>

    <script src="{!! asset('admin/bootstrap/vendor/datatables/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('admin/bootstrap/vendor/datatables-plugins/dataTables.bootstrap.min.js') !!}"></script>
    <script src="{!! asset('admin/bootstrap/vendor/datatables-responsive/dataTables.responsive.js') !!}"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
