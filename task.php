<?php
include('header.php');

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
        <div class="large-2 column">
         Message
        </div>
        </a>
        
        <a href="task.php">
        <div class="large-2 column" style="background:#10255F;">
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
    
    
    
        <!-- start main heading -->
    <div class="row">
    	<div class="large-12 column main_heading">
       	Task
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
    
    
    
   <!-- start admin task -->
  
       <div class="row message">
       <center>
       <a href="assign_task.php">
       	<div class="large-4 column">
        <div class="icon">Assign New Task</div>
        </div>
        </a>
        </center>
        
        <center>
        <a href="submited_task.php">
        <div class="large-4 column">
        <div class="icon">Submited Task</div>
        </div>
        </a>
        </center>
        
        <center>
        <a href="assigned_task.php">
        <div class="large-4 column">
        <div class="icon">Assigned Task</div>
        </div>
        </a>
        </center>
       </div>
       
   
   <!-- end admin task -->

    
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
    
    
        <!-- start main heading -->
    <div class="row">
    	<div class="large-12 column main_heading">
       	Task
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
    
    
    
   <!-- start admin task -->
  
       <div class="row message">
       <center>
       <a href="submit_complete_task.php">
       	<div class="large-4 column">
        <div class="icon">Submit Completed Task</div>
        </div>
        </a>
        </center>
        
        <center>
        <a href="submited_task.php">
        <div class="large-4 column">
        <div class="icon">Submited Task</div>
        </div>
        </a>
        </center>
        
        <center>
        <a href="assigned_task.php">
        <div class="large-4 column">
        <div class="icon">Assigned Task</div>
        </div>
        </a>
        </center>
       </div>
       
   
   <!-- end admin task -->

    <?php
	}
	?> 
    
    
   
 
     
   
</body>
</html>
