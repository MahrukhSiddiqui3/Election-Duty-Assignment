<?php
include("Common.php");
include("CheckLogin.php");
$EID=0;
$Status = 1;
$CityName = "";
$msg = "";
if(isset($_REQUEST['EID']) && ctype_digit($_REQUEST['EID']))
$EID = $_REQUEST['EID'];

if(isset($_POST['issubmit']) && $_POST['issubmit'] == 'true')
{

if(isset($_POST['Status']) && ($_POST['Status']==1 || $_POST['Status']== 0))
$Status=trim($_POST['Status']);

if(isset($_POST['CityName']))
$CityName=trim($_POST['CityName']);

if($CityName == '')
$msg = '<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Please Enter CityName
</div>';
if($msg =='')
{
$sql = "UPDATE cities
SET 
Status = '".$Status."',
CityName = '".$CityName."',
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

$sql = "SELECT ID,CityName,Status,DATE_FORMAT(DateAdded, '%M %d %Y') as Added,DATE_FORMAT(DateModified, '%M %d %Y') as Modified FROM cities WHERE ID = '".$EID."'";
// echo $sql;
$res = mysqli_query($con,$sql) or die(mysqli_error($con));
$rows = mysqli_fetch_assoc($res);
$Status = $rows['Status'];
$CityName = $rows['CityName'];
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Add City</title>
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
                    Cities Management
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Add City</li>
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
                                <h3 class="box-title"> Edit City</h3>
                                <button type="button" class="btn btn-block btn-primary" style="width: auto;float: right;"
                                    onclick='location.href="Cities.php"'>Cancel</button>

                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
							<div class="box-body">
                            <form role="form" action="<?php echo $self;?>?EID=<?php echo $EID;?>" method="post">

                                <?php
                                echo $msg;
                                ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status</label>

                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="Status" value="1" <?php echo ($Status=='1' ?
                                                'checked' :'')?>> Enable
                                        </label>
                                        <br>
                                        <label>
                                            <input type="radio" name="Status" value="0" <?php echo ($Status=='0' ?
                                                'checked' :'')?>> Disable
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">City Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter City Name"
                                        name="CityName" value="<?php echo $CityName;?>">
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

                    <!-- /.row -->
            </section>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
     include("Footer.php");
    ?>

    
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