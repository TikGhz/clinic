<?
	session_start();
	include("include/connect.php");
	$module=$_GET['module'];
	$file=$_GET['file'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>คลีนิคทันตกรรมทันตแพทย์ทองฉัตร</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/plugins/timeline.css" rel="stylesheet">
	
    <!-- DataTables CSS -->
    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">
    
    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/jasny-bootstrap.min.css">
    
    <!-- Custom Select2 CSS & compiled -->
    <link rel="stylesheet" href="select2/select2.css">
    
    <!-- Date -->
    <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css">
    
    <!-- Cal 
    <link rel="stylesheet" href="js/fullcalendar-2.1.1/fullcalendar.min.css">-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">คลีนิคทันตกรรมทันตแพทย์ทองฉัตร</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <? echo $_SESSION[login_name]; ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="index_panel.php?module=signin&file=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                	<? include("include/menu_admin.php"); ?>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
		<?
	$thaiweek=array("วันอาทิตย์","วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัส","วันศุกร์","วันเสาร์");
	$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	
            if($module){
                include("module/$module/$file.php");
            }
            else{
                include("module/dashboard/main_dashboard.php");
            }
        ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
    
    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
	
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
	</script>

	<!-- Jasny Latest compiled and minified JavaScript -->
	<script src="js/jasny-bootstrap.min.js"></script>
    
    <!-- Validator -->
    <script type="text/javascript" src="js/validator.js"></script>
    
    <!-- Date -->
    <!--<script src="js/jquery.js"></script>-->
	<script src="js/jquery.datetimepicker.js"></script>
    
    <!--ckeditor_4.4.4 <script src="ckeditor_4.4.4/ckeditor/ckeditor.js"></script>-->
    <script>
		jQuery('#datetimepicker7').datetimepicker({
			timepicker:false,
			lang:'th',
			format:'Y-m-d',
			minDate:'-1970-01-01',//yesterday is minimum date(for today use 0 or -1970/01/01)
			maxDate:'+1972-01-01'//tommorow is maximum date calendar
		});
		
		jQuery(function(){
			jQuery('#date_timepicker_start').datetimepicker({
				format:'Y-m-d',
				lang:'th',
					onShow:function( ct ){
						this.setOptions({
						maxDate:jQuery('#date_timepicker_end').val()?jQuery('#date_timepicker_end').val():false
					})
			},
				timepicker:false
		 });
		 
			jQuery('#date_timepicker_end').datetimepicker({
				format:'Y-m-d',
				lang:'th',
					onShow:function( ct ){
						this.setOptions({
						minDate:jQuery('#date_timepicker_start').val()?jQuery('#date_timepicker_start').val():false
					})
				},
				timepicker:false
			});
		});
		
		$(document).ready(function() {
    $('#example').dataTable( {
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            data = api.column( 5 ).data();
            total = data.length ?
                data.reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                } ) :
                0;
 
            // Total over this page
            data = api.column( 5, { page: 'current'} ).data();
            pageTotal = data.length ?
                data.reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                } ) :
                0;
 
            // Update footer
            $( api.column( 5 ).footer() ).html(
                '$'+pageTotal +' ( $'+ total +' total)'
            );
        }
    } );
} );
    </script>
    
    <script src="select2/select2.js"></script>
    <script>
        $(document).ready(function() { 
		
		  $("#e9").select2();
		  
		  $("#mySel").select2({
			allowClear:false
		  });
		  
		  $("#mySel1").select2({
			allowClear:false
		  });
		  
		  $("#mySel2").select2({
			allowClear:false
		  });
		  
		  $("#mySel3").select2({
			allowClear:false
		  });
		  
		  $("#mySel4").select2({
			allowClear:false
		  });
		  
		  $("#mySel5").select2({
			allowClear:false
		  });
		  
		  $("#mySel6").select2({
			allowClear:false
		  });
		  
		  $("#mySel7").select2({
			allowClear:false
		  });
		  
		  $("#mySel8").select2({
			allowClear:false
		  });
		  
		  $("#mySel9").select2({
			allowClear:false
		  });
		  
		  $("#mySel10").select2({
			allowClear:false
		  });
		  
		  $('.single option').click(function() {
			// only affects options contained within the same optgroup
			// and doesn't include this
			$(this).siblings().prop('selected', false);
		   });
  
		}
		);
		jQuery('#datetimepicker21').datetimepicker({
		  datepicker:false,
		  format:'H:i'
		});
		jQuery('#datetimepicker22').datetimepicker({
		  datepicker:false,
		  format:'H:i'
		});
    </script>
    <script>
	if($("#p_diseases1").prop('checked')){
		$("#symptoms").prop('disabled', true);
		$("#mySel2").prop('disabled', true);
	}
	function onenable(){
		$("#symptoms").prop('disabled', true);
		$("#mySel2").prop('disabled', true);
	}
	function offenable(){
		$("#symptoms").prop('disabled', false);
		$("#mySel2").prop('disabled', false);
	}
	</script>
    <?
	function getAge($birthday) {
		$then = strtotime($birthday);
		return(floor((time()-$then)/31556926));
	}
	?>
	<?	
	function gatAlert(){		?>
		<div>
			<?	if($_SESSION[success]!=""){	?>
						<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert">
								<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
							</button>
							<strong>สำเร็จ!</strong> <? echo $_SESSION[success]; ?>
                    	</div>
			<?	$_SESSION[success]=""; 
					}	?>
                    
			<?	if($_SESSION[info]!=""){	?>
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                            </button>
                            <strong>ประกาศ!</strong> <? echo $_SESSION[info]; ?>
                        </div>
			<?	$_SESSION[info]=""; }	?>
                    
			<?	if($_SESSION[warning]!=""){	?>
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                            </button>
                            <strong>แจ้งเตือน!</strong> <? echo $_SESSION[warning]; ?>
                        </div>
			<?	$_SESSION[warning]=""; 
					}	?>
                    
			<?	if($_SESSION[danger]!=""){	?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                            </button>
                            <strong>ผิดพลาด!</strong> <? echo $_SESSION[danger]; ?>
                        </div>
			<?	$_SESSION[danger]="";
					}	?>
		</div>
	<? 
	}	?>
    
</body>

</html>
