<!DOCTYPE html>
<html>
<head>
   <meta charset = "utf-8">
   <title>Registration</title>
</head>

<body>
  
  <h2>Registration From</h2>

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

            $fname = input($_POST['fname']);
            $lname = input($_POST['lname']);
            $dob = input($_POST['dob']);
            $religion = input($_POST['religion']);
            $email = input($_POST['email']);
            $paddress = input($_POST['paddress']);
            $username = input($_POST['username']);
            $password = input($_POST['password']);    

            if (empty($fname) or empty($lname) or empty($dob) or empty($religion) or empty($email) or empty($paddress) or empty($username) or empty($password)) {}

           	
            else{	
            	define("FILENAME", "data.json");
				$handle = fopen(FILENAME, "r");
				$fr = fread($handle, filesize(FILENAME));
				$arr1 = json_decode($fr);
				$fc = fclose($handle);

				$handle = fopen(FILENAME, "w");
				if ($arr1 === NULL) {
					$id =1;
					$data = array('id'=>$id,'fname' => $fname, 'lname' => $lname, 'dob' => $dob, 'religion' => $religion, 'email'=>$email, 'paddress' => $paddress,'username' => $username, 'password' => $password);
					$data = array($data);
					$data = json_encode($data);
					$fw = fwrite($handle, $data);
				}
				else {
					$id=$arr1[count($arr1)-1]->id;
					$data = array('id'=>$id+1,'fname' => $fname, 'lname' => $lname, 'dob' => $dob, 'religion' => $religion, 'email'=>$email, 'paddress' => $paddress,'username' => $username, 'password' => $password);
					$arr1[] = $data;
					$data = json_encode($arr1);
					$fw = fwrite($handle, $data);
				}
				
				$fc = fclose($handle);

	
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
         method="POST" novalidate >
  <fieldset>
   <legend>1.Basic Information:</legend>
     <label for="fname">First Name:</label>
     <input type="text" id="fname" name="fname">
     <span > <?php echo $fnameErr; ?> </span>
  
   <br>
  
     <label for="lname">Last Name:</label>
     <input type="text" id="lname" name="lname"> 
     <span > <?php echo $lnameErr; ?> </span>
  
   <br>
     <p>Gender:</p>
     <input type="radio" id="male" name="gender" value="male">
     <span > <?php echo $genderErr; ?> </span>
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
     <span > <?php echo $dobErr; ?> </span>
   <br>
     <label for="religion">Religion:</label>
     <select type="religion" name="religion">
     <span > <?php echo $religionErr; ?> </span>
     <option value="islam">Islam</option>
     <option value="christianity">Christianity</option>
     <option value="secular">Secular</option>
     <option value="hinduism">Hinduism</option>
     <span> <?php echo $religionErr; ?> </span>
     </select>
   <br>
     
  </fieldset>
  
  <fieldset>
    <legend>2.Contact Information:</legend>
     <label for="paddress">Present Address:</label>
     <textarea type="paddress" name="paddress" rows="2" cols="15"></textarea>
     <span ><?php echo $paddressErr;?></span>
    <br>
     <label for="Permanent Address">Permanent Address:</label>
     <textarea type="Permanent Address" name="Permanent Address" rows="2" cols="15"></textarea>

    <br>
     <label for="phone">Phone:</label>
     <input type="tel" id="phone" name="phone" pattern="[0-9]{11}">
    <br>
     <label for="email">Email:</label>
     <input type="email" id="email" name="email">
     <span > <?php echo $emailErr;?> </span>
  
    <br>
     <label for="page">Personal Website Link:</label>
     <input type="url" id="page" name="page">
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
     <label for="conpassword">Confirm Password:</label>
     <input type="password" id="conpassword" name="conpassword">
     <span ><?php echo $conpasswordErr;?></span>
     <span ><?php echo $passErr;?></span>
    
   <br>
    
    
  </fieldset>
  <br>
  <input type="submit" value="Submit">

</form>
<h3>You already regester?</h3>
<a target="_blank" href="http://localhost/file-io/login.php">
 Click Here
</a>
</body>
</html>