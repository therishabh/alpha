<?php
include('include/db.php');
session_start();

date_default_timezone_set('Asia/Calcutta');
$date = date('H');
$foder_name = date('d_F_Y');


if(isset($_SESSION['login_id']))
{
	header('location:home.php');
}
else{
	if(isset($_POST['submit']))
	{

//check if office time or not..
//if($date == '9' || $date == '10' || $date == '11' || $date == '12' || $date == '13' || $date == '14' || $date == '15' || $date == '16' || $date == '17' || $date == '18')
{
	
		$user_id = $_POST['user_id'];
		$password = $_POST['password'];
		
		if(substr($user_id,0,4) == "admi")
		{
			$query = mysql_query("SELECT * FROM admin Where Status = 'True' AND User_id = '$user_id'");
			$row = mysql_fetch_assoc($query);
			if($password == $row['Password'])
			{
				$_SESSION['login_id'] = $user_id;
				//create folder into user_id folder [new folder name = today date] 16_march_2013
				//check if folder exist or not..
				if(file_exists("keylogger/$user_id/$foder_name"))
				{
					//folder exist.
				}
				else
				{
					mkdir("keylogger/$user_id/$foder_name");
				}
				
				//redirect page..
				header("location:home.php");
			}
		}
		 
		elseif(substr($user_id,0,4) == "emp_")
		{
			
			$query = mysql_query("SELECT * FROM employee Where Status = 'True' AND User_id = '$user_id'");
			$row = mysql_fetch_assoc($query);
			
			if($password == $row['Password'])
			{
				$_SESSION['login_id'] = $user_id;
				
				//create folder into user_id folder [new folder name = today date] 16_march_2013
				//check if folder exist or not..
				if(file_exists("keylogger/$user_id/$foder_name"))
				{
					//folder exist.
				}
				else
				{
					mkdir("keylogger/$user_id/$foder_name");
				}
				
				//redirect page..
				header("location:home.php");
			}		
		}
		
}//end if for office time.!!

		
	}//end if(isset($_POST['submit']))
}//end else


?>


<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Alpha</title>

  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/foundation.css" />
  

  <script src="js/vendor/custom.modernizr.js"></script>
  

</head>
<body>
<div id="login">
	
     <div style="width:100%; background:#10255F; height:170px;">
     
     	<div class="row">
            <div class="large-5 column" >
            	<img src="img/logo.png" style="margin:20px; margin-left:-50px">
            </div>
            
            <div class="large-3 column">
             	<div class="row social_icon">
                    <a href="http://www.facebook.com">
                    <div class="large-2 column facebook">
                     
                    </div>
                    </a>
                    
                    <a href="http://www.twitter.com">
                    <div class="large-2 large-offset-1 column twitter">
                     
                    </div>
                    </a>
               
                    <a href="http://www.google.com">
                    <div class="large-2 large-offset-1 end column google">
                     
                    </div>
                    </a>
                
                </div><!-- row close -->
            </div>
     
     </div><!-- row close -->
     
     <div class="login_form">
     	<form action="index.php" method="post">
    
   		<div class="row">
            <div class="large-8 large-centered column">
                <input type="text" name="user_id" required placeholder="User Id" style="text-align:center;">
            </div>
    	</div>
        
        <div class="row">
            <div class="large-8 large-centered column">
                <input type="password" name="password" required placeholder="Password" style="text-align:center;">
            </div>
    	</div>
        
     
         
         <div class="row">
            <div class="large-10 large-centered column err">
                <h6>
         <?php
		if(isset($_POST['submit']))
		{
		//if($date == '9' || $date == '10' || $date == '11' || $date == '12' || $date == '13' || $date == '14' || $date == '15' || $date == '16' || $date == '17' || $date == '18')
{	
		if(substr($user_id,0,4) == "admi")
		{
			if($password != $row['Password'])
			{
				echo "Please Enter Correct Password..!!";
			}
		}
		elseif(substr($user_id,0,4) == "emp_")
		{
			if($password != $row['Password'])
			{
				echo "Please Enter Correct Password..!!";
			}
		}
		else{
				echo "Please Enter Correct User Id and Password..!!";
		}

		
}
		
//else
//{
//	echo "This is not office time..!!";
//}
		
		}//end 	if(isset($_POST['submit']))

		?>
                </h6>
            </div>
         </div>
        
        
        <div class="row">
            <div class="large-3 large-centered column">
                <input type="submit" value="Sign In" name="submit" id="submit">
            </div>
        </div>
        </form>
    
     </div> 
     
</div>
</body>