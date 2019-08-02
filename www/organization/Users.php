<?php
 include("Common.php");
 $sql="SELECT u.ID,u.RoleID,r.RoleName,u.CNIC,u.Grade,u.Gender,u.Address,u.Postcode,u.Name,u.Password,u.Email,u.CellNumber,u.Username,DATE_FORMAT(u.DateAdded, '%M %d %Y') as Added,DATE_FORMAT(u.DateModified, '%M %d %Y') as Modified FROM users u LEFT JOIN roles r ON u.RoleID = r.ID WHERE u.ID <> 0 AND u.Grade <> 0 AND u.OrganizationID=".$_SESSION['OrganizationID']."";
 // echo $sql;
 $res=mysqli_query($con,$sql) or die (mysqli_error($con));
  if(isset($_POST['fordelete']) && $_POST['fordelete']=='true')
 {
	$keyvalues= implode(',',$_POST['Ids']);
	// echo $keyvalues;
		$sql = "DELETE FROM users WHERE ID IN (".$keyvalues.")";
		// echo $sql;
		mysqli_query($con,$sql) or die(mysqli_error($con));
		redirect($self);
	// exit();
 }
 
 if (isset($_FILES['file'])) {
	
	require_once "simplexlsx.class.php";
	
	$xlsx = new SimpleXLSX( $_FILES['file']['tmp_name'] );
	
	// echo '<h1>Parsing Result</h1>';
	// echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';
	
	list($cols,) = $xlsx->dimension();
	$nailo=1;
	foreach( $xlsx->rows() as $k => $r) {
	if($nailo>1)
	{
	$sql11 = "INSERT INTO users SET 
	CNIC = '".addcslashes($r[0],"'")."',
	Name = '".addcslashes($r[1],"'")."',
	Gender= '".addcslashes($r[2],"'")."',
	Grade = '".addcslashes($r[3],"'")."',
	CellNumber= '".addcslashes($r[4],"'")."',
	Email = '".addcslashes($r[5],"'")."',
	Address= '".addcslashes($r[6],"'")."',
	Postcode= '".addcslashes($r[7],"'")."',
	OrganizationID= '".$_SESSION['OrganizationID']."',
	DateAdded = Now()
	";
	mysqli_query($con,$sql11) or die(mysqli_error($con));
	// echo $sql11.'<br>';
	}
	
	$nailo++;
	

}
redirect("Users.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="    bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="    bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="    bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="    bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="    dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="    dist/css/skins/_all-skins.min.css">

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

  <?php include("Header.php");
         include("Sidebar.php");
  ?>
  <!-- Left side column. contains the logo and sidebar -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>Officers</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Officers</a></li>
      
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Officers Management</h3>
				  <div class="row">
					  <div class="col-xs-4 pull-right">
					<!--MyChange--> <form method="post" enctype="multipart/form-data">
					<input type="file" class="form-control col-xs-8"  name="file"/>&nbsp;&nbsp;<input type="submit" class="btn pull-right col-xs-4" value="Upload Data"/>
					  <button type="button" class="btn btn-block btn-danger" onclick="javascript:dodelete();" style="width: auto;margin-right: 15px;float: right;margin-top: 0px;">Del</button>
					</form>
					
					</div>
				</div>
			</div>
			
			
			
			<div class="box-body">
			<form id="frmsubmit" action="<?php echo $self?>" method="post">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
				<th> <input type="checkbox" class="CheckAll"/>  </th>
				 
				  <th>CNIC</th>
                  <th>Name</th>
				  <th>Gender</th>
				   <th>Grade</th>
                  <th>CellNumber</th>
                  <th>Email</th>
				  <th>Post Code</th>
				  <th>Added </th>
				  <th>Modified </th>
				  <th> </th>
                </tr>
                </thead>
                <tbody>
				<?php
                 while($rows=mysqli_fetch_array($res))
				 {					 
				 ?>
                <tr>
                 <td> <input type="checkbox" class="CIds" name="Ids[]" value="<?php echo $rows['ID']?>"/>  </td>
				 	
				 <td><?php echo $rows['CNIC']?></td>
				  <td><?php echo $rows['Name']?></td>
				 <td><?php echo $rows['Gender']?></td>
				  <td><?php echo $rows['Grade']?></td>
                  <td><?php echo $rows ['CellNumber']?></td>
                  <td><?php echo $rows['Email']?></td>
				    <td><?php echo $rows['Postcode']?></td>
				<!-- <td><?php echo $rows['Status']==1?'<i class="fa fa-check"></i>':'<i class="fa fa-times"></i>' ?></td> -->
				  <td><?php echo $rows['Added']?> </td>
				  <td><?php echo $rows['Modified']?> </td>
				  <td><button type="button" class="btn btn-block btn-primary"  onclick='location.href="EditUsers.php?EID=<?php echo $rows['ID']?>"'>Edit</button></td>
                  
                </tr>
				 <?php 
				 }
				 ?>
				
                </tbody>
               <tfoot>
               <!-- <tr>
				<th> <input type="checkbox" class="CheckAll"/>  </th>

				  <th>CNIC</th>
                  <th>FirstName</th>
				  <th>LastName</th>
				   <th>Grade</th>
                  <th>CellNumber</th>
                  <th>Email</th>
				  <th>Address</th>
				  <th>Status</th>
				  <th>Added </th>
				  <th>Modified </th> 
                </tr>
				
				-->
                </tfoot> 
              </table>
			  <input type="hidden" name="fordelete" value="true"/>
			  </form>
            </div>
            <!-- /.box-body -->
</div>
			</div>
            </div>
            <!-- /.box-header -->
            
          <!-- /.box -->
</section>
</div>
</div>
  <!-- /.content-wrapper -->
<?php  include("Footer.php"); ?>

  <!-- Control Sidebar -->


<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="    bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="    bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="    bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="    bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="    bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="    bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="    dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="    dist/js/demo.js"></script>
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
