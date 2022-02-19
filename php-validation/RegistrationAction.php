<!DOCTYPE html>
<html>
<head>
   <meta charset = "utf-8">
   <title>PHP FORM Submission</title>
</head>

<body>
  
  <h1>PHP FORM</h1>

  <?php

    $fname=$lname=$gender=$dob= $religion= $email= $username= $password=$conpassword=$paddress="";

    $fnameErr=$lnameErr=$genderErr=$dobErr= $religionErr =$emailErr=$usernameErr=$passwordErr= $conpasswordErr=$paddressErr=$passErr="";
     
   
  ?>


  <?php

       if($_SERVER['REQUEST_METHOD'] === "POST") 
          {
            function input($data) {

            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;

            }

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

            if(!empty($_POST['gender']))
            {
              $gender=$_POST['gender'];
            }
            else
            {
              $genderErr="* required field";
            }

            if(!empty($_POST['dob']))
            {
              $dob=$_POST['dob'];
            }
            else
            {
              $dobErr="* required field";
            }

            if(!empty($_POST['religion']))
            {
              $religion=$_POST['religion'];
            }
            else
            {
              $religionErr="* required field";
            }

            if(!empty($_POST['paddress']))
            {
              $paddress=$_POST['paddress'];
            }
            else
            {
              $paddressErr="* required field";
            }

            if(!empty($_POST['email']))
            {
              $email=$_POST['email'];
            }
            else
            {
              $emailErr="* required field";
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
            if(!empty($_POST['conpassword']))
            {
              $conpassword=$_POST['conpassword'];
            }
            else
            {
              $conpasswordErr="* required field";
            }

            if($password!=$conpassword)
            {
                $passErr="should be the same to the password";
            }
          
          }

          
 ?>

<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
         method="post" novalidate >
  <fieldset>
   <legend>1.Basic Information:</legend>
     <label for="fname">First Name:</label>
     <input type="text" id="fname" name="fname">
     <span style="color: red"> <?php echo $fnameErr; ?> </span>
  
   <br>
  
     <label for="lname">Last Name:</label>
     <input type="text" id="lname" name="lname"> 
     <span style="color: red"> <?php echo $lnameErr; ?> </span>
  
   <br>
     <p>Gender:</p>
     <input type="radio" id="male" name="gender" value="male">
     <span style="color: red"> <?php echo $genderErr; ?> </span>
     <label for="male">Male</label>
   <br>
     <input type="radio" id="female" name="gender" value="female">
     <label for="female">Female</label>
   <br>
     <input type="radio" id="other" name="gender" value="other">
     <label for="other">Other</label>
   <br>
     <label for="dob">DoB:</label>
     <input type="date" id="dob" name="dob">
     <span style="color: red"> <?php echo $dobErr; ?> </span>
   <br>
     <label for="religion">Religion:</label>
     <select type="religion" name="religion">
     <span style="color: red"> <?php echo $religionErr; ?> </span>
     <option value="islam">Islam</option>
     <option value="christianity">Christianity</option>
     <option value="secular">Secular</option>
     <option value="hinduism">Hinduism</option>
     <span style="color: red"> <?php echo $religionErr; ?> </span>
     </select>
   <br>
     
  </fieldset>
  
  <fieldset>
    <legend>2.Contact Information:</legend>
     <label for="paddress">Present Address:</label>
     <textarea type="paddress" name="paddress" rows="2" cols="15"></textarea>
     <span style="color: red"><?php echo $paddressErr;?></span>
    <br>
     <label for="Permanent Address">Permanent Address:</label>
     <textarea type="Permanent Address" name="Permanent Address" rows="2" cols="15"></textarea>

    <br>
     <label for="phone">Phone:</label>
     <input type="tel" id="phone" name="phone" pattern="[0-9]{11}">
    <br>
     <label for="email">Email:</label>
     <input type="email" id="email" name="email">
     <span style="color: red"> <?php echo $emailErr;?> </span>
  
    <br>
     <label for="page">Personal Website Link:</label>
     <input type="url" id="page" name="page">
    <br>
  </fieldset>

  <fieldset>
    <legend>3.Account Information:</legend>

     <label for="username">Username:</label>
     <input type="text" id="username" name="username" size="5">
     <span style="color: red"><?php echo $usernameErr;?></span>
   <br>

     <label for="password">Password:</label>
     <input type="password" id="password" name="password">
     <span style="color: red"><?php echo $passwordErr;?></span>
   <br>
     <label for="conpassword">Confirm Password:</label>
     <input type="password" id="conpassword" name="conpassword">
     <span style="color: red"><?php echo $conpasswordErr;?></span>
     <span style="color: red"><?php echo $passErr;?></span>
    
   <br>
    
    
  </fieldset>
  <br>
  <input type="submit" value="Submit">

</form>

</body>
</html>