<?php
  include("Common.php");
  include("CheckLogin.php");
  $Status = 1;
  $StationName = "";
  $UserID=0;
   $Address="";
 $MaleBooth="";
  $FemaleBooth="";
  $msg = "";
  
if(isset($_POST['issubmit']) && $_POST['issubmit'] == 'true')
{
	if(isset($_POST['Status']) && ($_POST['Status']==1 || $_POST['Status']== 0))
		$Status=trim($_POST['Status']);
	    $Status=stripslashes($_POST['Status']);
		$Status=htmlspecialchars($_POST['Status']);
	
	if(isset($_POST['UserID']))
		$UserID=trim($_POST['UserID']);
	    $UserID=stripslashes($_POST['UserID']);
		$UserID=htmlspecialchars($_POST['UserID']);
	
	if(isset($_POST['StationName']))
		$StationName=trim($_POST['StationName']);
	    $StationName=stripslashes($_POST['StationName']);
		$StationName=htmlspecialchars($_POST['StationName']);
	
	if(isset($_POST['Address']))
		$Address=trim($_POST['Address']);
	    $Address=stripslashes($_POST['Address']);
		$Address=htmlspecialchars($_POST['Address']);
	
   if(isset($_POST['MaleBooth']))
		$MaleBooth=trim($_POST['MaleBooth']);
	    $MaleBooth=stripslashes($_POST['MaleBooth']);
		$MaleBooth=htmlspecialchars($_POST['MaleBooth']);
	
	if(isset($_POST['FemaleBooth']))
		$FemaleBooth=trim($_POST['FemaleBooth']);
	    $FemaleBooth=stripslashes($_POST['FemaleBooth']);
		$FemaleBooth=htmlspecialchars($_POST['FemaleBooth']);
	
	if($UserID == 0)
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Select Returning Officer Name
		</div>'; 
	if($StationName == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter  Polling Station StationName
		</div>';
	else if($Address == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Address Of Polling Station
		</div>';
	elseif($FemaleBooth == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Number Of Female Booths 
		</div>';
	elseif($MaleBooth == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Number Of Male Booths 
		</div>';
		
	if($msg =='')
	{
		$sql = "INSERT INTO pollingstations 
		SET 
		Status = '".$Status."',
		UserID='".$UserID."',
		StationName = '".$StationName."',
		Address= '".$Address."',
		MaleBooth = '".$MaleBooth."',
		FemaleBooth = '".$FemaleBooth."',
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
  <title>Admin | Add Polling Station</title>
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
        Polling Station Managment
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Polling Station</li>
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
              <h3 class="box-title ">Add New Polling Station</h3>
			  <button type="button" class="btn btn-block btn-primary" style="width: auto;float: right;" onclick='location.href="PollingStation.php"'>Cancel</button>

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
                  <label for="exampleInputEmail1"> User</label>
					<select class="form-control" name="UserID">
					<option value="0">Select Returning Officer Name</option>
					<?php
							
					$sql = "SELECT ID,Name,Status,DATE_FORMAT(DateAdded, '%M %d %Y') as Added,DATE_FORMAT(DateModified, '%M %d %Y') as Modified FROM users WHERE ID <> 0 AND RoleID=1";
					$res = mysqli_query($con,$sql) or die(mysqli_error($con));
					while($rows=mysqli_fetch_array($res))
					{
					?>
						<option value="<?php echo $rows['ID']?>"><?php echo $rows['Name']?></option>
					<?php
					}
					?>
                  </select>
				  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Polling Station StationName</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Polling StationName" name="StationName" pattern="[a-zA-Z\s]+" title="Must contain alphbets only" value="<?php echo $StationName;?>">
                </div>
				 <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Address" name="Address" pattern="^[#.0-9a-zA-Z\s,-]+$" value="<?php echo $Address;?>">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Male Booths</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Number Of Male Booths" name="MaleBooth" pattern="\d*" title="Must contain numbers only" maxlength="1" value="<?php echo $MaleBooth;?>">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Female Booths</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Number Of Female Booths" name="FemaleBooth" pattern="\d*" title="Must contain numbers only" maxlength="1" value="<?php echo $FemaleBooth;?>">
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
