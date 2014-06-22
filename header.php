<?php
include 'include/db.php';
date_default_timezone_set('Asia/Calcutta');
$current_date = date('Y-m-d');
$date = date('H');
$time = date("F j, Y, g:i a");

session_start();
if(substr($_SESSION['login_id'],0,4) == 'admi')
{

	if(!isset($_SESSION['login_id']))
	{
		header('location:index.php');
	}
	
	else{
	
		$user_id = $_SESSION['login_id'];
		$table = "msg_".$user_id;
		$query = mysql_query("SELECT * FROM admin Where Status = 'True' AND User_id = '$user_id'");
		$row_header = mysql_fetch_assoc($query);
		
		$query = mysql_query("SELECT * FROM $table WHERE Status = 'True' AND Display = '1'");
		$row_msg = mysql_fetch_assoc($query);
		$total_message =  mysql_num_rows($query);
			
	}
	
?>

<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Password Sniffer</title>

  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/foundation.css" />
  

  <script src="js/vendor/custom.modernizr.js"></script>
  <script src="js/jquery-latest.js" type="text/javascript"></script>

</head>
<body id="body">


<!-- start logo and user name div -->
<div id="full_width">

    <div class="row header" id="full_widths">
        
         <!-- start logo image -->
        <div class="large-6 columns">
        	<div class="row">
            <div class="large-10 column">
       			 <a href="#"><img src="img/logo.png" style="height:130px;  margin-left:-100px;"></a>
        	</div>
        	</div>
        </div>
        <!-- end logo image -->
        
        
        <!-- star user image -->
        <div class="large-2 large-offset-1 column" >
            <div class="row">
				<div class="large-8 large-offset-4">            
            		<img src="admin/<?php echo $row_header['Image']?>" style="height:120px;width:90px;border:3px #666 solid;"  >
            	</div>
            </div>
        </div>
        <!-- end user image -->
        
        
        <!-- start user Name -->
        <div class="large-3 column end">
        
            <div class="row ">
                <div class="large-12 columns user_name">
                <h4><a href="#" class="user_n"><?php echo $row_header['Name']?></a></h4>
                </div>
            </div>
            
            <div class="row ">
                <div class="large-12 user_name columns" style="margin-top:-10px;">
                <p class="user_n"><?php echo $row_header['User_id']?></p>
                </div>
            </div>
            
            <div class="row ">
                <div class="large-12 user_name column" style="margin-top:-19px;">
                <p><a href="view_message.php" class="user_n">Message : <?php
                if($total_message == '0')
				{
					echo "<span style='font-weight:bold;'>".$total_message."</span>";
				}
				else
				{
					echo "<span style='color:red;font-weight:bold;'>".$total_message."</span>";
				}
				?>
                </a></p>
                </div>
            </div>
            
            <div class="row ">
                <div class="large-12 user_name column" style="margin-top:-19px;">
                <p><a href="logout.php" class="user_n">Logout</a></p>
                </div>
            </div>
            
         </div>
        <!-- end user name -->
    </div>
	<!-- end logo and user name div -->
 </div> 

<?php
}// end if(substr($_SESSION['login_id'],0,4) == 'admi')
elseif(substr($_SESSION['login_id'],0,4) == 'emp_')
{

	if(!isset($_SESSION['login_id']))
	{
		header('location:index.php');
	}
	
	else{
		$user_id = $_SESSION['login_id'];
		$table = "msg_".$user_id;
		$query = mysql_query("SELECT * FROM employee Where Status = 'True' AND User_id = '$user_id'");
		$row_header = mysql_fetch_assoc($query);
		
		//for new msg display..
		$query = mysql_query("SELECT * FROM $table WHERE Status = 'True' AND Display = '1'");
		$row_msg = mysql_fetch_assoc($query);
		$total_message =  mysql_num_rows($query);
			
	}
?>


<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Password Sniffer</title>

  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/foundation.css" />
  

  <script src="js/vendor/custom.modernizr.js"></script>
  <script src="js/jquery-latest.js" type="text/javascript"></script>

</head>
<body id="body">


<!-- start logo and user name div -->
<div id="full_width">

    <div class="row header" id="full_widths">
        
       <!-- start logo image -->
        <div class="large-6 columns">
        	<div class="row">
            <div class="large-10 column">
       			 <a href="#"><img src="img/logo.png" style="height:130px;  margin-left:-100px;"></a>
        	</div>
        	</div>
        </div>
        <!-- end logo image -->
        
        
        <!-- star user image -->
        <div class="large-2 large-offset-1 column" >
            <div class="row">
				<div class="large-8 large-offset-4">            
            		<img src="employee/<?php echo $row_header['Image']?>" style="height:120px;width:90px;border:3px #666 solid;"  >
            	</div>
            </div>
        </div>
        <!-- end user image -->
        
        
        <!-- start user Name -->
        <div class="large-3 column end">
        
            <div class="row ">
                <div class="large-12 columns user_name">
                <h4><a href="#" class="user_n"><?php echo $row_header['Name']?></a></h4>
                </div>
            </div>
            
            <div class="row ">
                <div class="large-12 user_name columns" style="margin-top:-10px;">
                <p class="user_n"><?php echo $row_header['User_id']?></p>
                </div>
            </div>
            
            <div class="row ">
                <div class="large-12 user_name column" style="margin-top:-19px;">
                <p><a href="view_message.php" class="user_n">Message : <?php
                if($total_message == '0')
				{
					echo "<span style='font-weight:bold;'>".$total_message."</span>";
				}
				else
				{
					echo "<span style='color:red;font-weight:bold;'>".$total_message."</span>";
				}
				?>
                </a></p>
                </div>
            </div>
            
          
            
         </div>
        <!-- end user name -->
    </div>
	<!-- end logo and user name div -->
 </div> 




	
<?php
	
}// end if(substr($_SESSION['login_id'],0,4) == 'emp_')

else{
	unset($_SESSION['login_id']);
	header('location: index.php');
}

?>