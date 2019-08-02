<?php
  include("Common.php");
  include("CheckLogin.php");
$Status=0;
$CNIC=0;
$FirstName="";
$LastName="";
$Grade= "";
$Address="";
$CellNumber="";
$Postcode="";
$Email="";
$msg = "";
  
if(isset($_POST['issubmit']) && $_POST['issubmit'] == 'true')
{
	
	if(isset($_POST['Status']) && ($_POST['Status']==1 || $_POST['Status']== 0))
		$Status=trim($_POST['Status']);
	
	if(isset($_POST['CNIC']) && ctype_digit($_POST['CNIC']))
		$CNIC=trim($_POST['CNIC']);

	
	if(isset($_POST['FirstName']))
		$FirstName=trim($_POST['FirstName']);
	
	if(isset($_POST['LastName']))
		$LastName=trim($_POST['LastName']);
	
	if(isset($_POST['Grade']))
		$Grade=trim($_POST['Grade']);
	
    if(isset($_POST['Address']))
		$Address=trim($_POST['Address']);
	
	if(isset($_POST['CellNumber']))
		$CellNumber=trim($_POST['CellNumber']);
	
			
	if(isset($_POST['Email']))
		$Email=trim($_POST['Email']);
	
				
	if(isset($_POST['Postcode']))
		$Postcode=trim($_POST['Postcode']);
	
	if($CNIC == 0)
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Select Role
		</div>';
		
	else if($FirstName == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please EnterFirstName
		</div>';
		
	else if($LastName == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter LastName
		</div>';
		
	else if($Grade== '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Grade
		</div>';
		
	else if($Address=='')
		{
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Address
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
		
	else if($Postcode == '')
		$msg = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		Please Enter Postcode
		</div>';
	if($msg =='')
	{
		$sql = "INSERT INTO users
		SET 
	    
		
	   FirstName = '".$FirstName ."',
	   LastName = '".$LastName ."',
        Grade = '".$Grade."',
		Address = '".$Address."',
		CellNumber = '".$CellNumber."',
		Email = '".$Email."',
		
		Status = '".$Status."',
		Postcode = '".$Postcode."',
		CNIC	= '".$CNIC."',
		OrganizationID	= '".$_SESSION['OrganizationID']."',
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
  <title>Admin | Add User</title>
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
        Officers Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Officer</li>
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
              <h3 class="box-title">Add New Officer</h3>
			  <button type="button" class="btn btn-block btn-primary" style="width: auto;float: right;" onclick='location.href="Users.php"'>Cancel</button>

            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div class="box-body">
            <form role="form" action="<?php echo $self;?>" method="post">
			
			<?php
			echo $msg;
			?>
			   <div class="box-body">
			   <div class="form-group">
                  <label for="exampleInputEmail1">Status</label>
				  
                <div class="checkbox">
                  <label>
                    <input type="radio" name="Status" value="1"<?php echo ($Status=='1' ? 'checked':'')?>> Enable
					</label>
					</br>
					<label>
                    <input type="radio"  name="Status" value="0"<?php echo ($Status=='0' ? 'checked':'')?>> Disable
                  </label>
                </div>
                </div>
               
      
				
				 <div class="form-group">
                  <label for="exampleInputEmail1"> FirstName</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter FirstName" name="FirstName" value="<?php echo $FirstName;?>">
                </div>
				 <div class="form-group">
                  <label for="exampleInputEmail1"> LastName </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter LastName" name="LastName" value="<?php echo $LastName;?>">
                </div>
              
			  
				 <div class="form-group">
                  <label for="exampleInputEmail1"> CNIC</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter CNIC" name="CNIC" value="<?php echo $CNIC;?>">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Grade</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Grade" name="Grade" value="<?php echo $Grade;?>">
                </div>
              
			  
				 <div class="form-group">
                  <label for="exampleInputEmail1"> CellNumber</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter CellNumber" name="CellNumber" value="<?php echo $CellNumber;?>">
                </div>
              
			  
				 <div class="form-group">
                  <label for="exampleInputEmail1"> Email</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" name="Email" value="<?php echo $Email;?>">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Address" name="Address" value="<?php echo $Address;?>">
                </div>
				
					<div class="form-group">
                  <label for="exampleInputEmail1">Postcode</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Postcode" name="Postcode" value="<?php echo $Postcode;?>">
                </div>
				
              </div>
              <!-- /.box-body -->
            </div>
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
  <!-- /.content-wrapper -->
  <?php
 include("Footer.php");
?>

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
