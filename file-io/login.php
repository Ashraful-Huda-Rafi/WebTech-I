<!DOCTYPE html>
<html>
<head>
   <meta charset = "utf-8">
   <title>Login Page</title>
</head>

<body>
  
  <h2>Login From</h2>

  <?php

     $uname= $pass="";

     $usernameErr= $passwordErr="";
     
   session_start();
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

           
            $uname = input($_POST['username']);
            $pass = input($_POST['password']);


            if (empty($uname) or empty($pass)) {
              echo "please fill up the form properly";
            }

           	
            else{	
            define("FILENAME", "data.json");
      			$handle = fopen(FILENAME, "r");
      			$fr = fread($handle, filesize(FILENAME));
      			$arr1 = json_decode($fr);
      			$fc = fclose($handle);

              for ($i = 0; $i < count($arr1); $i++) {
             
                
                if ($uname===$arr1[$i]->username and $pass===$arr1[$i]->password)
                {
                  header('location: ../p/Welcome.php');
                }
                else
                {
                  echo "There's a mismatch between the username and password.";
                }

              }
              
            }

      }
				
			
            echo "<br><br>";

          
 ?>


<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
         method="POST" novalidate >
  <fieldset>
    <legend>Logins:</legend>

     <label for="username">Username:</label>
     <input type="text" id="username" name="username" size="5">
     
   <br>

     <label for="password">Password:</label>
     <input type="password" id="password" name="password">
     
   
   <br>
    
  </fieldset>
  <br>
  <input type="submit" value="Submit">

</form>
<h3>You aren't regester?
<a target="_blank" href="http://localhost/file-io/login.php">
 Click Here
</a>

</body>
</html>