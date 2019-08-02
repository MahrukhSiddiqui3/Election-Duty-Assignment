	<?php
	include("Common.php");
	include("CheckLogin.php");
	$EID=0;
	$Status=0;
	$CatID=0;
    $CityID=0;
	$Password='';
	$Username = "";
	$OrganizationName="";
	$msg = "";

if(isset($_REQUEST['EID']) && ctype_digit($_REQUEST['EID']))
$EID=$_REQUEST['EID'];	


if(isset($_POST['issubmit']) && $_POST['issubmit'] == 'true')
	{
     // print_r($_POST);
	 // exit;
	 if(isset($_POST['Status']) && ($_POST['Status']==1 || $_POST['Status']== 0))
	$Status=trim($_POST['Status']);

	if(isset($_POST['CityID']) && ctype_digit($_POST['CityID']))
	$CityID=trim($_POST['CityID']);

    if(isset($_POST['CatID']) && ctype_digit($_POST['CatID']))
	$CatID=trim($_POST['CatID']);


	if(isset($_POST['OrganizationName']))
	$OrganizationName=trim($_POST['OrganizationName']);

	if(isset($_POST['Username']))
	$Username=trim($_POST['Username']);

	if(isset($_POST['Password']))
	$Password=trim($_POST['Password']);
  
   
     // echo $OrganizationName;
	 // exit;
	if($CityID == 0)
	$msg = '<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	Please Select City
	</div>';

    else if($CatID == 0)
	$msg = '<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	Please Select Category
	</div>';


	else if($OrganizationName == '')
	$msg = '<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	Please Enter OrganizationName
	</div>';

	else if($Username == '')
	$msg = '<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	Please Enter Username
	</div>';

	else if($Password== '')
	$msg = '<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	Please Enter Password
	</div>';

	if($msg =='')
	{
	$sql = "UPDATE  organizations
	SET 

	OrganizationName = '".$OrganizationName."',
	Username = '".$Username."',
	Password = '".$Password."',
	CityID	= '".$CityID."',
	CatID	= '".$CatID."',
	DateModified = NOW()
	WHERE ID = '".$EID."'
	";
	mysqli_query($con,$sql) or die(mysqli_error($con));
	$msg = '<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	Data Modified
	</div>';
	}
}
else
	{
	 $sql="SELECT ID,Username,Password,Status,OrganizationName,CityID,CatID,DATE_FORMAT(DateAdded, '%M %d %Y') as Added,DATE_FORMAT(DateModified, '%M %d %Y') as Modified  FROM organizations WHERE ID='".$EID."'";
	$res=mysqli_query($con,$sql) or die (mysqli_error($con));
	$rows=mysqli_fetch_assoc($res);
	$Status=$rows['Status'];
	$CatID=$rows['CatID'];
	$CityID=$rows['CityID'];
	$Username = $rows['Username'];
	$Password=$rows['Password'];
	$OrganizationName=$rows['OrganizationName'];
	}

	?>
	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin | Edit Organization</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
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
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

	<?php
	include("Header.php"); 
	include("Sidebar.php"); 
	?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	<h1>
	Organization Management
	</h1>
	<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Edit Organization</li>
	</ol>
	</section>

	<!-- Main content -->
	<section class="content">
	<div class="row">
	<!-- left column -->
	<div class="col-md-12">
	<!-- general form elements -->
	<div class="box box-primary">
	<div class="box-header with-border">
	<h3 class="box-title">Edit Organization</h3>
	<button type="button" class="btn btn-block btn-primary" style="width: auto;float: right;" onclick='location.href="Organizations.php"'>Cancel</button>

	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form role="form" action="<?php echo $self;?>?EID=<?php echo $EID;?>" method="post">

	<?php
	echo $msg;
	?>
	<div class="box-body">
	<div class="form-group">
	<label for="exampleInputEmail1">Status</label>

	<div class="checkbox">
	<label>
	  <input type="radio" name="Status" value="1" <?php echo ($Status == '1' ? 'checked':'')?>> Enable
	</label>
	<br>
	<label>
	  <input type="radio"  name="Status" value="0" <?php echo ($Status == '0' ? 'checked':'')?>> Disable
	</label>
	</div>
	</div>

	<div class="form-group">
	<label for="exampleInputEmail1"> City</label>
	<select class="form-control" name="CityID">
	<option value="0">Select City</option>
	<?php

	$sql = "SELECT ID,CityName,Status,DATE_FORMAT(DateAdded, '%M %d %Y') as Added,DATE_FORMAT(DateModified, '%M %d %Y') as Modified FROM cities WHERE ID <> 0";
	$res = mysqli_query($con,$sql) or die(mysqli_error($con));
	while($rows=mysqli_fetch_array($res))
	{
	?>
	<option <?php echo ($CityID == $rows['ID'] ? 'selected' : '');?> value="<?php echo $rows['ID']?>"><?php echo $rows['CityName']?></option>
	<?php
	}
	?>
	</select>
	</div>
	
	
	<div class="form-group">
	<label for="exampleInputEmail1"> Category </label>
	<select class="form-control" name="CatID">
	<option value="0">Select Category</option>
	<?php

	$sql = "SELECT ID,CatName,Status,DATE_FORMAT(DateAdded, '%M %d %Y') as Added,DATE_FORMAT(DateModified, '%M %d %Y') as Modified FROM categories WHERE ID <> 0";
	$res = mysqli_query($con,$sql) or die(mysqli_error($con));
	while($rows=mysqli_fetch_array($res))
	{
	?>
	<option <?php echo ($CatID == $rows['ID'] ? 'selected' : '');?> value="<?php echo $rows['ID']?>"><?php echo $rows['CatName']?></option>
	<?php
	}
	?>
	</select>
	</div>


   <div class="form-group">
				<label for="exampleInputEmail1"> Organization Name</label>
				<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Organization Name" name="OrganizationName" value="<?php echo $OrganizationName;?>">
				</div>
	
	<div class="form-group">
	<label for="exampleInputEmail1"> Username</label>
	<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" name="Username" value="<?php echo $Username;?>">
	</div>


	<div class="form-group">
	<label for="exampleInputEmail1"> Password</label>
	<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Password" name="Password" value="<?php echo $Password;?>">
	</div>



	


	<!-- /.box-body -->

	<div class="box-footer">
	<button type="submit" class="btn btn-primary">Submit</button>
	</div>
	<input type="hidden" name="issubmit" value="true" />
	</form>
	</div>
	<!-- /.box -->




	</div>
	<!--/.col (left) -->
	</div>
	<!-- /.row -->
	</section>

	</div>
	 <?php
 include("Footer.php");
?>

	<!-- /.content-wrapper -->


	<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	</body>
	</html>
