<!DOCTYPE html>
<html>
<head>
   <meta charset = "utf-8">
   <title>Registration</title>
</head>

<body>
  
  <h2>Registration From</h2>

  <?php
	include 'DBinsert.php';
    $fname=$lname= $username= $password="";

    $fnameErr=$lnameErr=$usernameErr=$passwordErr="";
     
  

       if($_SERVER['REQUEST_METHOD'] === "POST") 
          {
            function input($data) {

            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            } 

 			
            $fname = input($_POST['fname']);
            $lname = input($_POST['lname']);
            $username = input($_POST['username']);
            $password = input($_POST['password']);    

            
			
            echo "<br><br>";

           


            if(!empty($_POST['fname'])) 
            {
              $fname = $_POST['fname'];
            }
            else
            {
              $fnameErr="* required field";
            }

            if(!empty($_POST['lname']))
            {
              $lname=$_POST['lname'];
            }
            else
            {
              $lnameErr="* required field";
            } 

            

            if(!empty($_POST['username']))
            {
              $username=$_POST['username'];
            }
            else
            {
              $usernameErr="* required field";   
            }

            if(!empty($_POST['password']))
            {
              $password=$_POST['password'];
            }
            else
            {
              $passwordErr="* required field";
            }

            
          
          }

          
 ?>


<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
         method="POST" novalidate >
  <fieldset>


   <legend>1.Basic Information:</legend>

   
  
   <br>
     <label for="fname">First Name:</label>
     <input type="text" id="fname" name="fname">
     <span > <?php echo $fnameErr; ?> </span>
  
   <br>
  
     <label for="lname">Last Name:</label>
     <input type="text" id="lname" name="lname"> 
     <span > <?php echo $lnameErr; ?> </span>
  
   <br>
     
  </fieldset>
 

  <fieldset>
    <legend>3.Account Information:</legend>

     <label for="username">Username:</label>
     <input type="text" id="username" name="username" size="10">
     <span ><?php echo $usernameErr;?></span>
   <br>

     <label for="password">Password:</label>
     <input type="password" id="password" name="password">
     <span ><?php echo $passwordErr;?></span>
 
     
   <br>
    
    
  </fieldset>
  <br>
  <input type="submit" value="Submit">

</form>
<h3>You already regester?</h3>
<a target="_blank" href="http://localhost/database-php/login.php">
 Click Here
</a>
</body>
</html>