<?php
include("Common.php");
include("CheckLogin.php");
$EID=0;
$Status=0;
$RoleID=0;
$Password='';
$CPassword='';
$Username = "";
$Name="";
$CellNumber="";
$Email="";
$msg = "";

if(isset($_REQUEST['EID']) && ctype_digit($_REQUEST['EID']))
$EID=$_REQUEST['EID'];	


		if(isset($_POST['issubmit']) && $_POST['issubmit'] == 'true')
		{

		if(isset($_POST['Status']) && ($_POST['Status']==1 || $_POST['Status']== 0))
		$Status=trim($_POST['Status']);
         $Status=stripslashes($_POST['Status']);
		$Status=htmlspecialchars($_POST['Status']);
		
		if(isset($_POST['RoleID']) && ctype_digit($_POST['RoleID']))
		$RoleID=trim($_POST['RoleID']);
		$RoleID=stripslashes($_POST['RoleID']);
		$RoleID=htmlspecialchars($_POST['RoleID']);

		if(isset($_POST['Name']))
		$Name=trim($_POST['Name']);
	    $Name=stripslashes($_POST['Name']);
		$Name=htmlspecialchars($_POST['Name']);

		if(isset($_POST['Username']))
		$Username=trim($_POST['Username']);
	    $Username=stripslashes($_POST['Username']);
		$Username=htmlspecialchars($_POST['Username']);

		if(isset($_POST['Password']))
		$Password=trim($_POST['Password']);
	    $Password=stripslashes($_POST['Password']);
		$Password=htmlspecialchars($_POST['Password']);

		if(isset($_POST['CPassword']))
		$CPassword=trim($_POST['CPassword']);
	    $CPassword=stripslashes($_POST['CPassword']);
		$CPassword=htmlspecialchars($_POST['CPassword']);

		if(isset($_POST['CellNumber']))
		$CellNumber=trim($_POST['CellNumber']);
        $CellNumber=stripslashes($_POST['CellNumber']);
		$CellNumber=htmlspecialchars($_POST['CellNumber']);

		if(isset($_POST['Email']))
		$Email=trim($_POST['Email']);
	    $Email=stripslashes($_POST['Email']);
		$Email=htmlspecialchars($_POST['Email']);

if($RoleID == 0)
$msg = '<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Please Select Role
</div>';

else if($Name == '')
$msg = '<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Please Enter Name
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

else if($Password!=$CPassword)
{
$msg = '<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Please Enter same password;
</div>';	
}		


else if($CellNumber == '')
$msg = '<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Please Enter CellNumber
</div>';

else if($Email == '')
$msg = '<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Please Enter Email
</div>';
if($msg =='')
{
$sql = "UPDATE  users
SET 

Name = '".$Name."',
Username = '".$Username."',
Password = '".$Password."',
CellNumber = '".$CellNumber."',
Email = '".$Email."',
Status = '".$Status."',
RoleID	= '".$RoleID."',
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
$sql="SELECT ID,Status,Name,Password,Email,CellNumber,Username,DATE_FORMAT(DateAdded, '%M %d %Y') as Added,DATE_FORMAT(DateModified, '%M %d %Y') as Modified ,RoleID FROM users WHERE ID='".$EID."'";
$res=mysqli_query($con,$sql) or die (mysqli_error($con));
$rows=mysqli_fetch_assoc($res);
$Status=$rows['Status'];
$RoleID=$rows['RoleID'];
$Password=$rows['Password'];
//$CPassword=$rows['CPassword'];
$Username = $rows['Username'];
$Name=$rows['Name'];
$CellNumber=$rows['CellNumber'];
$Email=$rows['Email'];

}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin | Edit User</title>
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
User Management
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Edit User</li>
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
<h3 class="box-title">Edit User</h3>
<button type="button" class="btn btn-block btn-primary" style="width: auto;float: right;" onclick='location.href="Users.php"'>Cancel</button>

</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?EID=<?php echo $EID;?>" method="post">

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
<label for="exampleInputEmail1"> Role</label>
<select class="form-control" name="RoleID">
<option value="0">Select Role</option>
<?php

$sql = "SELECT ID,RoleName,Status,DATE_FORMAT(DateAdded, '%M %d %Y') as Added,DATE_FORMAT(DateModified, '%M %d %Y') as Modified FROM roles WHERE ID <> 0";
$res = mysqli_query($con,$sql) or die(mysqli_error($con));
while($rows=mysqli_fetch_array($res))
{
?>
<option <?php echo ($RoleID == $rows['ID'] ? 'selected' : '');?> value="<?php echo $rows['ID']?>"><?php echo $rows['RoleName']?></option>
<?php
}
?>
</select>
</div>

<div class="form-group">
<label for="exampleInputEmail1"> Name</label>
<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="Name"  pattern="[a-zA-Z\s]+" title="Must contain alphbets only" value="<?php echo $Name;?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1"> Username</label>
<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" name="Username"  pattern="[a-zA-Z\s]+" title="Must contain alphbets only" value="<?php echo $Username;?>">
</div>


<div class="form-group">
<label for="exampleInputEmail1"> Password</label>
<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Password" name="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="<?php echo $Password;?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1"> Confirm Password</label>
<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Confirm Password" name="CPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="<?php echo $CPassword;?>">
</div>


<div class="form-group">
<label for="exampleInputEmail1"> CellNumber</label>
<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter CellNumber" name="CellNumber" pattern="\d*" title="Must contain numbers only" value="<?php echo $CellNumber;?>" maxlength="11">
</div>


<div class="form-group">
<label for="exampleInputEmail1"> Email</label>
<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" name="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" value="<?php echo $Email;?>">
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
<!-- /.content -->

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
