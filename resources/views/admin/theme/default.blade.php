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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" rel="stylesheet">
        <link href="{!! asset('admin/css/custom-admin.css') !!}?version={{rand(1,10010)}}" rel="stylesheet">



    </head>




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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        <!-- Custom Theme JavaScript -->
        <script src="{!! asset('admin/bootstrap/dist/js/sb-admin-2.js') !!}"></script>

        <script src="{!! asset('admin/bootstrap/vendor/datatables/js/jquery.dataTables.min.js') !!}"></script>
        <script src="{!! asset('admin/bootstrap/vendor/datatables-plugins/dataTables.bootstrap.min.js') !!}"></script>
        <script src="{!! asset('admin/bootstrap/vendor/datatables-responsive/dataTables.responsive.js') !!}"></script>
        <script src="{!! asset('admin/js/custom-function.js') !!} "></script>
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
$(document).ready(function() {
$('#dataTables-example').DataTable({
responsive: true
});
$('#bid-table').DataTable({
responsive: true
});
$('#transaction-tab').DataTable({
responsive: true
});
});
        </script>
        <!-- Morris Charts JavaScript -->
        <script src="{!! asset('admin/bootstrap/vendor/raphael/raphael.min.js') !!}"></script>
        <script src="{!! asset('admin/bootstrap/vendor/morrisjs/morris.min.js') !!}"></script>
        <script src="{!! asset('admin/bootstrap/data/morris-data.js') !!}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>


        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"><input type="hidden" name="_token" value="{{ csrf_token() }}"></form>
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
                        <a class="btn btn-primary" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $.validator.setDefaults({
            submitHandler: function () {
            alert("submitted!");
            }
            });
            $(document).ready(function () {
            $("#signupForm").validate({
            rules: {
            firstname: "required",
                    lastname: "required",
                    username: {
                    required: true,
                            minlength: 2
                    },
                    password: {
                    required: true,
                            minlength: 5
                    },
                    confirm_password: {
                    required: true,
                            minlength: 5,
                            equalTo: "#password"
                    },
                    email: {
                    required: true,
                            email: true
                    },
                    agree: "required"
            },
                    messages: {
                    firstname: "Please enter your firstname",
                            lastname: "Please enter your lastname",
                            username: {
                            required: "Please enter a username",
                                    minlength: "Your username must consist of at least 2 characters"
                            },
                            password: {
                            required: "Please provide a password",
                                    minlength: "Your password must be at least 5 characters long"
                            },
                            confirm_password: {
                            required: "Please provide a password",
                                    minlength: "Your password must be at least 5 characters long",
                                    equalTo: "Please enter the same password as above"
                            },
                            email: "Please enter a valid email address",
                            agree: "Please accept our policy"
                    },
                    errorElement: "em",
                    errorPlacement: function (error, element) {
                    // Add the `help-block` class to the error element
                    error.addClass("help-block");
                    if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                    } else {
                    error.insertAfter(element);
                    }
                    },
                    highlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
                    },
                    unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
                    }
            });
            $("#signupForm1").validate({
            rules: {
            firstname1: "required",
                    lastname1: "required",
                    username1: {
                    required: true,
                            minlength: 2
                    },
                    password1: {
                    required: true,
                            minlength: 5
                    },
                    confirm_password1: {
                    required: true,
                            minlength: 5,
                            equalTo: "#password1"
                    },
                    email1: {
                    required: true,
                            email: true
                    },
                    agree1: "required"
            },
                    messages: {
                    firstname1: "Please enter your firstname",
                            lastname1: "Please enter your lastname",
                            username1: {
                            required: "Please enter a username",
                                    minlength: "Your username must consist of at least 2 characters"
                            },
                            password1: {
                            required: "Please provide a password",
                                    minlength: "Your password must be at least 5 characters long"
                            },
                            confirm_password1: {
                            required: "Please provide a password",
                                    minlength: "Your password must be at least 5 characters long",
                                    equalTo: "Please enter the same password as above"
                            },
                            email1: "Please enter a valid email address",
                            agree1: "Please accept our policy"
                    },
                    errorElement: "em",
                    errorPlacement: function (error, element) {
                    // Add the `help-block` class to the error element
                    error.addClass("help-block");
                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents(".col-sm-5").addClass("has-feedback");
                    if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                    } else {
                    error.insertAfter(element);
                    }

                    // Add the span element, if doesn't exists, and apply the icon classes to it.
                    if (!element.next("span")[ 0 ]) {
                    $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
                    }
                    },
                    success: function (label, element) {
                    // Add the span element, if doesn't exists, and apply the icon classes to it.
                    if (!$(element).next("span")[ 0 ]) {
                    $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
                    }
                    },
                    highlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
                    $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
                    },
                    unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
                    $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
                    }
            });
            });
        </script>

        <script>
            
            function isNumber(evt) {
                
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
            }
            return true;
            }
            function no_backspaces(event)
            {
            backspace = 8;
            if (event.keyCode == backspace) event.preventDefault();
            }
            $(function() {
            var start = moment().subtract(29, 'days').format('DD/MM/YYYY');
            var end = moment().format('DD/MM/YYYY');
            function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('input[name="reportrange"]').daterangepicker({
            startDate: start,
                    endDate: end,
                    locale: {
                    format: 'DD/MM/YYYY'
                    },
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
            $('#dataTable1').DataTable({
            order: [[ 3, 'desc' ], [ 0, 'asc' ]]

        } );

  });
  </script>

  <link rel="stylesheet" href="{!! asset('admin/bootstrap/css/bootstrap-treeview.css') !!} ">
  <script src="{!! asset('admin/bootstrap/js/bootstrap-treeview.js') !!}"></script>

  <script src="{!! asset('admin/bootstrap/js/html2canvas.min.js') !!}"></script>\
<script src="{!! asset('admin/bootstrap/js/canvas2image.js') !!}"></script>


  <script src="{!! asset('member/js/user-bid.js') !!}" type="text/javascript"></script>

  <script>

$(function() {

$('#default-tree').treeview({
  data: myTree,
  color: "#428bca",
  expandIcon: "glyphicon glyphicon-stop",
  collapseIcon: "glyphicon glyphicon-unchecked",
  nodeIcon: "glyphicon glyphicon-user",
  showTags: true,
  levels: 1,
  enableLinks: true,
});


});
console.log(11111)




$("#lotteryDate").datepicker({
    autoclose: true,
    clearBtn: true,
    todayHighlight: true,
    endDate: '+0d',
    format: 'dd/mm/yyyy',
});

// to canvas
$(function() {
  var test = $("#page-wrapper").get(0);

  html2canvas(test).then(function(canvas) {

  $('#save').click(function(e) {
    let type = 'png'; // image type
    let w = 1200; // image width
    let h = 1000; // image height
    let gameName = $('#lotteryType :selected').text();
    let gameDate = $("#game_date").html();
    let f = gameName+'-'+gameDate; // file name

    // save as image
    Canvas2Image.saveAsImage(canvas, w, h, type, f);
  });
});
});


  </script>

</body>


</html>
