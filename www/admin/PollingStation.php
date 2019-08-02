<?php
  include("Common.php");
  include("CheckLogin.php");
 $sql = "SELECT p.ID,u.Name,p.StationName,p.Address,p.MaleBooth,p.FemaleBooth,p.Status,DATE_FORMAT(p.DateAdded, '%M %d %Y') as Added,DATE_FORMAT(p.DateModified, '%M %d %Y') as Modified FROM pollingstations p LEFT JOIN users u ON p.UserID = u.ID AND u.RoleID = 1  WHERE p.ID <> 0";
 
 
 $res = mysqli_query($con,$sql) or die(mysqli_error($con));
 
 if(isset($_POST['fordelete']) && $_POST['fordelete']=='true')
 {
	$keyvalues= implode(',',$_POST['Ids']);
	// echo $keyvalues;
		$sql = "DELETE FROM pollingstations WHERE ID IN (".$keyvalues.")";
		// echo $sql;
		mysqli_query($con,$sql) or die(mysqli_error($con));
		redirect($self);
	// exit();
 }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin |Polling Station</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href=" bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href=" bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href=" bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href=" bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href=" dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href=" dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<script>
		function dodelete()
		{
			  
		  if($(".CIds").is(":checked"))
		  {
			  if(confirm("Are you sure you want to delete"))
				  $("#frmsubmit").submit();
		  }
		  else
		  {
			  alert("Please select data to delete");
		  }

		}
		$(document).ready(function(){
			
			
			$(".CheckAll").click(function(){
				$(".CIds").prop("checked",$(".CheckAll").prop("checked"));
			});

			
		});
		</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 <?php
   include("Header.php"); 
   include("Sidebar.php"); 
 ?>
   
  <!-- Left side column. contains the logo and sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>Polling Stations</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Polling Stations</a></li>
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Polling Stations Management</h3>
			  <button type="button" class="btn btn-block btn-primary" style="width: auto;float: right;" onclick='location.href="AddPollingStation.php"'>Add</button>
			  <button type="button" class="btn btn-block btn-danger" style="width: auto;margin-right: 15px;float: right;margin-top: 0px;" onclick="javascript:dodelete();">Del</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<form id="frmsubmit" action="<?php echo $self?>" method="post">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th><input type="checkbox" class="CheckAll"/></th>
				  
				      <th>Returning Officer Name</th>
				  
                  <th>Polling Station StationName</th>
				  <th>Address</th>
				  <th>Number Of Male Booth</th>
                  <th>Number Of Female Booth</th>
                  <th>Status</th>
                  <th>Added</th>
                  <th>Modfied</th>
                 
                </tr>
                </thead>
                <tbody>
				<?php 
				 while($rows=mysqli_fetch_array($res)) 
				{
				?>
                <tr>
                  <td><input type="checkbox" class="CIds" name="Ids[]" value="<?php echo $rows['ID']?>"/></td>
				  
				  <td><?php echo $rows['Name']?></td>
				 
                  <td><?php echo $rows['StationName']?></td>
				  <td> <?php echo $rows['Address']?></td>
				  <td><?php echo $rows['MaleBooth']?></td>
				  <td><?php echo $rows['FemaleBooth']?></td>
                  <td> <?php echo $rows['Status']==1?'<i class="fa fa-check"></i>':'<i class="fa fa-times"></i>';?></td>
                  <td><?php echo $rows['Added']?></td>
                  <td><?php echo $rows['Modified']?></td>
                  <td><button type="button" class="btn btn-block btn-primary" style="width: auto;float: right;" onclick='location.href="EditPollingStation.php?EID=<?php echo $rows['ID']?>"'>Edit</button><td>
                  
                </tr>
                  <?php
				   }
				   ?>
             
                </tbody>
              <!--  <tfoot>
                <tr>
                  <th>  <input type="checkbox" class="CheckAll"/>   </th>
				  <th>ID</th>
                  <th>Role StationName</th>
                  <th>Status</th>
                  <th>Added</th>
                  <th>Modfied</th>
                  <th></th>
                </tr>
                </tfoot> !-->
              </table>
			  <input type="hidden" name="fordelete" value="true"/>
			  </form>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          <!-- /.box -->
</section>
          
          </div>
		  <?php
 include("Footer.php");
?>
          </div>
  <!-- /.content-wrapper -->


       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src=" bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src=" bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src=" bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src=" bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src=" bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src=" bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src=" dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src=" dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
