<?php
 include("Common.php");
  include("CheckLogin.php");
  $EID=0;
  $MaleBooth=0;
  $FemaleBooth=0;
 
  if(isset($_REQUEST['EID']) && ctype_digit($_REQUEST['EID']))
	  $EID = $_REQUEST['EID'];
  
 $sql="SELECT p.ID,p.StationName,p.Address,p.MaleBooth,p.FemaleBooth,p.UserID,p.Status,DATE_FORMAT(p.DateAdded, '%M %d %Y') as Added,DATE_FORMAT(p.DateModified, '%M %d %Y') as Modified FROM pollingstations p LEFT JOIN users u ON p.UserID = u.ID where p.ID <> 0 AND p.UserID=".$_SESSION['UserID']." AND p.ID = ". $EID."";
 $res=mysqli_query($con,$sql) or die (mysqli_error($con));
 
 $rows=mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Simple Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href=" bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href=" bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href=" bower_components/Ionicons/css/ionicons.min.css">
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
  include('Header.php');
  include ('Sidebar.php');

?>
  
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      <h1>
       Polling Station Details
        <small>Number of Booths</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
    </section>

    <!-- Main content -->
      
    </section>

    <!-- Main content -->
    <section class="content">
	<?php
	   if($MaleBooth==0 || $FemaleBooth ==0)
	  {
     ?>
	  <form  action="RoleMyOfficer.php">
      <button type="submit" class="btn btn-info" >Role My Officer</button>
	  </form>
	  
    <?php
	}
	echo $MaleBooth;
	echo $FemaleBooth;
	  ?>
	  
      <div class="row">
	  <h2>
             Male Booth Details
           </h2>
	   <?php
	   	

    for($i=1 ;$i<=$rows['MaleBooth']; $i++)
			
	{
		?>
		
	
		
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
	
              <h3 class="box-title"> BOOTHS DETAILS</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                
                  <th>Position</th>
                  
                  <th>Name</th>
                </tr>
                <tr>
                 
                  <td>Presiding Officer</td>
                
                  <td><?php echo get_officers($EID,2);?></td>
                </tr>
               
                <tr>
                 <td>Assistent Presiding Officer</td>
                
                  <td><?php echo get_officers($EID,3,$i);?></td>
                </tr>
                <tr>
                  
               <td>Assistent Presiding Officer</td>
                
                  <td><?php echo get_officers($EID,3,$i,1);?></td>
                  
                </tr>
				 <tr>
                 <td>Polling Officer</td>
                
                  <td><?php echo get_officers($EID,4,$i);?></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	
  <?php
	}
	?>
	
      </div>
	   <div class="row">
	  <h2>
             Female Booth Details
           </h2>
	   <?php
	   	

    for($i=1 ;$i<=$rows['FemaleBooth']; $i++)
			
	{
		?>
		
	
		
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
			
              <h3 class="box-title"> BOOTHS DETAILS</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                
                  <th>Position</th>
                  
                  <th>Name</th>
                </tr>
                <tr>
                 
                  <td>Presiding Officer</td>
                
                  <td><?php echo get_officers($EID,2);?></td>
                </tr>
               
                <tr>
                 <td>Assistent Presiding Officer</td>
                
                  <td><?php echo get_officers($EID,3,$i);?></td>
                </tr>
                <tr>
                  
               <td>Assistent Presiding Officer</td>
                
                  <td><?php echo get_officers($EID,3,$i,1);?></td>
                  
                </tr>
				 <tr>
                 <td>Polling Officer</td>
                
                  <td><?php echo get_officers($EID,4,$i);?></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	
  <?php
	}
	?>
	
      </div>
	
    </section>
 
  </div>
   <?php
  
  include('Footer.php');
  ?>
  </div>
 
  <!-- /.content-wrapper -->


<script src=" bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src=" bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src=" bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src=" bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src=" dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src=" dist/js/demo.js"></script>
</body>
</html>
