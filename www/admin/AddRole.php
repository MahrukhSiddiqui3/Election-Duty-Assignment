<?php
  include("Common.php");
  include("CheckLogin.php");
  $Status = 1;
  $RoleName = "";
  $GradingSelection="";
  $msg = "";
  
if(isset($_POST['issubmit']) && $_POST['issubmit'] == 'true')
{
	if(isset($_POST['RoleName']))
		$RoleName=trim($_POST['RoleName']);
	    $RoleName=stripslashes($_POST['RoleName']);
		$RoleName=htmlspecialchars($_POST['RoleName']);
	
	if(isset($_POST['GradingSelection']))
	    $GradingSelection = implode(',', $_POST['GradingSelection']); 
   

	
	if($RoleName == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter RoleName
		</div>';
		
	else if($GradingSelection == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Select Grade
		</div>';
	
	if($msg =='')
	{
		
		$sql = "INSERT INTO roles 
		SET 
		Status = '".$Status."',
		RoleName = '".$RoleName."',
		GradingSelection = '".$GradingSelection."',
		DateAdded = NOW()
		";
		mysqli_query($con,$sql) or die(mysqli_error($con));
		$msg = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Data Added
		</div>';
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Add Role</title>
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
        Roles Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Role</li>
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
              <h3 class="box-title ">Add New Role</h3>
			  <button type="button" class="btn btn-block btn-primary" style="width: auto;float: right;" onclick='location.href="Roles.php"'>Cancel</button>

            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			
			<?php
			echo $msg;
			?>
			
			<div class="box-body">
                <div class="form-group ">
                  <label for="exampleInputEmail1">Status</label>
				  
                <div class="checkbox">
                  <label>
                    <input type="radio" name="Status" value="1" <?php echo ($Status=='1' ? 'checked':'')?>> Enable
					</label>
					</br>
					<label>
                    <input type="radio"  name="Status" value="0" <?php echo ($Status=='0' ? 'checked':'')?>> Disable
                  </label>
                </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Role Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Role Name" name="RoleName" pattern="[a-zA-Z\s]+" title="Must contain alphbets only" value="<?php echo $RoleName;?>">
                </div>
				<div class="form-group ">
                  <label for="exampleInputEmail1">Select Grade</label>
				  
		        <div class="checkbox">
				 <label>
                    <input type="checkbox" name="GradingSelection[]" value="1" > 1
					</label>
					</br>
					 <label>
                    <input type="checkbox" name="GradingSelection[]" value="2" > 2
					</label>
					</br>
					 <label>
                    <input type="checkbox" name="GradingSelection[]" value="3" > 3
					</label>
					</br>
                  <label>
                    <input type="checkbox" name="GradingSelection[]" value="15" > 15
					</label>
					</br>
					<label>
                    <input type="checkbox" name="GradingSelection[]" value="16" > 16
					</label>
					</br>
					<label>
                    <input type="checkbox" name="GradingSelection[]" value="17" > 17
					</label>
					</br>
					<label>
                    <input type="checkbox" name="GradingSelection[]" value="18" > 18
					</label>
					</br>
					<label>
                    <input type="checkbox" name="GradingSelection[]" value="19" > 19
					</label>
					</div>
                </div>
              </div>
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
	 <?php
 include("Footer.php");
?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

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
