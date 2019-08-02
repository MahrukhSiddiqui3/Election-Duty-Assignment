<?php
include('Common.php');
 if(isset($_SESSION['IsLogin']))
  {
	   redirect("Dashboard.php"); 
  }
$Username='';
$Password='';

$msg='';


if(isset($_POST['issubmit']) && $_POST['issubmit'] == 'true')
{
	if(isset($_POST['Username']))
		$Username=trim($_POST['Username']);
	    $Username=stripslashes($_POST['Username']);
	    $Username= htmlspecialchars($_POST['Username']);
		
	if(isset($_POST['Password']))
    $Password=trim($_POST['Password']);
      $Password=stripslashes($_POST['Password']);
      $Password=htmlspecialchars($_POST['Password']);
	
	if($Username=='')
		$msg=' Enter username';
	  if($Password=='')
		$msg='Enter password';
	
	if($msg =='')
	{
		$sql = "SELECT ID,Username,OrganizationName,Password FROM organizations WHERE Username = '".$Username."'" ;
		$res = mysqli_query($con,$sql) or die(mysqli_error($con)); 
		$row = mysqli_fetch_assoc($res);		
		if($row['Password'] == $Password)
		{
			$_SESSION['IsLogin']=true;
	     	$_SESSION['OrganizationID']=$row['ID'];	
            $_SESSION['Username']=$row['Username'];
            $_SESSION['OrganizationName']=$row['OrganizationName'];
			$_SESSION['Password']=$row['Password'];

			redirect("Dashboard.php");
			
			
			
		}
		else
		{
			$msg='Invalid username / password';
		}
	}
	
}



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel | Log in</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="   index2.html"><b> LOGIN PAGE FOR ORGANIZATION</b></a>
  </div>
 
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo $msg; ?></p>

    <form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="post"> 
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="Username"  pattern="[a-zA-Z\s]+" title="Must Contain alpabets only" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
          
          </div>
        </div>
	
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
	  
	  <input type="hidden" name="issubmit" value="true">
    </form>

   
    
  </div>
  
</div>
<!-- /.login-box -->


<script src="   bower_components/jquery/dist/jquery.min.js"></script>
<script src="   bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="   plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
