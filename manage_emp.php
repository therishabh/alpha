<?php
include('header.php');
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$user_id = $_POST['user_id'];
	$_SESSION['name'] = $name;
	$_SESSION['user_id'] = $user_id;
	if(empty($name) && !empty($user_id))
	{
		$query = mysql_query("SELECT * FROM employee WHERE status = 'True' AND User_id = '$user_id'");
		$row = mysql_fetch_assoc($query);
	}
	elseif(!empty($name) && empty($user_id))
	{
		$query = mysql_query("SELECT * FROM employee WHERE status = 'True' AND Name like '$name%'");
		$row = mysql_fetch_assoc($query);
	}
	elseif(!empty($name) && !empty($user_id))
	{
		$query = mysql_query("SELECT * FROM employee WHERE status = 'True' AND User_id = '$user_id'");
		$row = mysql_fetch_assoc($query);
	}

}

elseif(isset($_GET['del']))
{
	$del_user_id = $_GET['del'];
	$name = $_SESSION['name'];
	$user_id = $_SESSION['user_id'];
	//update status false..
	$query = mysql_query("UPDATE employee SET Status = 'False' WHERE User_id = '$del_user_id'");
	//fetch all employees..
	if(empty($name) && !empty($user_id))
	{
		$query = mysql_query("SELECT * FROM employee WHERE status = 'True' AND User_id = '$user_id'");
		$row = mysql_fetch_assoc($query);
	}
	elseif(!empty($name) && empty($user_id))
	{
		$query = mysql_query("SELECT * FROM employee WHERE status = 'True' AND Name like '$name%'");
		$row = mysql_fetch_assoc($query);
	}
	elseif(!empty($name) && !empty($user_id))
	{
		$query = mysql_query("SELECT * FROM employee WHERE status = 'True' AND User_id = '$user_id'");
		$row = mysql_fetch_assoc($query);
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
        <div class="large-2 column"  style="background:#10255F;">
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
// $(document).keydown(function(event)
// {
// 	//store that key into keycode variable..
// 	var keycode = event.keyCode;
	
// 	//call reload.php page using get method..
// 	//we send key value with the help of get method into reload.php page.. 	
// 	$('#hello').load('keylogger.php?press_key='+keycode+'&page=manage_empoyee');

// });
//*************** END ****************

</script>


<!-- for key stock.. -->
<div id="hello"></div>
<!-- for key stock.. -->


    
    <!-- start main heading -->
    <div class="row">
    	<div class="large-3 column main_heading">
        Manage Employee
        </div>
        <div class="large-6 large-offset-2 column main_heading end">
        <span class="success_msg" style="color:#F00;">
        <?php 
		if(isset($_POST['submit']))
		{
			if(empty($name) && !empty($user_id))
			{
				if(mysql_num_rows($query) == 0)
				echo 'Not Result Found';
			}
			elseif(!empty($name) && empty($user_id))
			{
				if(mysql_num_rows($query) == 0)
				echo 'Not Result Found';
			}
			elseif(!empty($name) && !empty($user_id))
			{
				if(mysql_num_rows($query) == 0)
				echo 'Not Result Found';
			}
			elseif(empty($name) && empty($user_id))
			{
				echo 'Please Enter Any Field..!!';
			}
		}
		elseif(isset($_GET['del']))
		{
			echo "Successfully Deleted..!!";
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
   <form action="manage_emp.php" method="post">
       <div class="row">
            <div class="large-3 large-offset-3 column emp_name">
            Employee Name :
            </div>
            <div class="large-3 column end">
            <input type="text" name="name" placeholder="Employee Name">
            </div>
       </div>
       
       <div class="row">
            <div class="large-3 large-offset-3 column emp_name">
            Employee Id :
            </div>
            <div class="large-3 column end">
            <input type="text" name="user_id" placeholder="Employee Id">
            </div>
       </div>
       
        <div class="row">
            <div class="large-2 large-offset-5 column emp_name">
            <input type="submit" name="submit" value="Search">
            </div>
       </div>
      </form>
       
         <!-- start row -->
   <div class="row table">
   <div class="large-10 columns large-centered" style="text-align:center">
   
   <center>   
   
   <?php
   	if(isset($_POST['submit']) || isset($_GET['del']))
	{
		if(empty($name) && !empty($user_id))
		{
			if(mysql_num_rows($query) != 0)
			{
			echo '<table border="2">
				   <tr>
						<td class="head_table">S.No</td>
						<td class="head_table">Name</td>
						<td class="head_table">Employee Id</td>
						<td class="head_table">Mobile No.</td>
						<td class="head_table">Operation</td>
				   </tr>';
			$a = 1;
			do{
				echo '<tr>';
   				echo '<td>'.$a.'</td>';
       			echo '<td><a href="view_employee.php?user_id='.$row['User_id'].'" class="user_table">'.$row['Name'].'</a></td>';
        		echo '<td><a href="view_employee.php?user_id='.$row['User_id'].'" class="user_table">'.$row['User_id'].'</a></td>';
        		echo '<td><a href="view_employee.php?user_id='.$row['User_id'].'" class="user_table">+91'.$row['Mobile'].'</a></td>';
       			echo '<td><a href="view_employee.php?user_id='.$row['User_id'].'" class="v_e_d">view</a>
				<a href="edit_employee.php?user_id='.$row['User_id'].'" class="v_e_d">edit</a>';
				?>
				<a href="#" class="v_e_d" onclick="del('<?php echo $row['User_id'] ?>')">delete</a></td>
				
				<?php
   				echo '</tr>';
				$a++;
				}while($row = mysql_fetch_assoc($query));
			echo '</table>';
			}//end if(mysql_num_rows($query) != 0)
		
		}//end if(empty($name) && !empty($user_id))
		
		elseif(!empty($name) && empty($user_id))
		{
			if(mysql_num_rows($query) != 0)
			{
			echo '<table border="2">
				   <tr>
						<td class="head_table">S.No</td>
						<td class="head_table">Name</td>
						<td class="head_table">Employee Id</td>
						<td class="head_table">Mobile No.</td>
						<td class="head_table">Operation</td>
				   </tr>';
			$a = 1;
			do{
				echo '<tr>';
   				echo '<td>'.$a.'</td>';
       			echo '<td><a href="view_employee.php?user_id='.$row['User_id'].'" class="user_table">'.$row['Name'].'</a></td>';
        		echo '<td><a href="view_employee.php?user_id='.$row['User_id'].'" class="user_table">'.$row['User_id'].'</a></td>';
        		echo '<td><a href="view_employee.php?user_id='.$row['User_id'].'" class="user_table">+91'.$row['Mobile'].'</a></td>';
       			echo '<td><a href="view_employee.php?user_id='.$row['User_id'].'" class="v_e_d">view</a>
				<a href="edit_employee.php?user_id='.$row['User_id'].'" class="v_e_d">edit</a>';
				?>
				<a href="#" class="v_e_d" onclick="del('<?php echo $row['User_id'] ?>')">delete</a></td>
				
				<?php
   				echo '</tr>';
				$a++;
				}while($row = mysql_fetch_assoc($query));
			echo '</table>';
			}//end if(mysql_num_rows($query) != 0)
		
		}//end if(!empty($name) && empty($user_id))
		
		elseif(!empty($name) && !empty($user_id))
		{
			if(mysql_num_rows($query) != 0)
			{
			echo '<table border="2">
				   <tr>
						<td class="head_table">S.No</td>
						<td class="head_table">Name</td>
						<td class="head_table">Employee Id</td>
						<td class="head_table">Mobile No.</td>
						<td class="head_table">Operation</td>
				   </tr>';
			$a = 1;
			do{
				echo '<tr>';
   				echo '<td>'.$a.'</td>';
       			echo '<td><a href="view_employee.php?user_id='.$row['User_id'].'" class="user_table">'.$row['Name'].'</a></td>';
        		echo '<td><a href="view_employee.php?user_id='.$row['User_id'].'" class="user_table">'.$row['User_id'].'</a></td>';
        		echo '<td><a href="view_employee.php?user_id='.$row['User_id'].'" class="user_table">+91'.$row['Mobile'].'</a></td>';
       			echo '<td><a href="view_employee.php?user_id='.$row['User_id'].'" class="v_e_d">view</a>
				<a href="edit_employee.php?user_id='.$row['User_id'].'" class="v_e_d">edit</a>';
				?>
				<a href="#" class="v_e_d" onclick="del('<?php echo $row['User_id'] ?>')">delete</a></td>
				
				<?php
   				echo '</tr>';
				$a++;
				}while($row = mysql_fetch_assoc($query));
			echo '</table>';
			}//end if(mysql_num_rows($query) != 0)
		
		}//end if(!empty($name) && !empty($user_id))
		
		
	}//end if(isset($_POST['submit']))
	
	
	
   ?>
  
   </center>
   </div>
   </div>
   <!-- end row -->
       
       
   </div>
   <!-- end manage employee -->
   
 <script>
 		$(".success_msg").delay(2000).slideUp(1000);
		
//script for delete entries.. !!
function del(employee_id)
{
	var ab = confirm("Are you sure to delete "+'\"'+employee_id+'\"'+" ID");
	var url = "manage_emp.php?del="+employee_id;

	if(ab)
	{
		
			location.href = url;
	}

}
 </script>
    
   
</body>
</html>
