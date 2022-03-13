<!DOCTYPE html>
<html>
<head>
   <meta charset = "utf-8">
   <title>Registration</title>
</head>

<body>
  
  <h2>Set a New Password </h2>

  <?php

     $username = $npassword = $conpassword="";

     $passErr="";
     
   
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

            $id=input($_POST['id']);
            $username = input($_POST['username']);
            $npassword = input($_POST['npassword']);
            $conpassword = input($_POST['conpassword']);    

            if (empty($username) or empty($npassword) or empty($conpassword)) {
              echo"please fill up the form properly";
            }

           	
            else{	
            	define("FILENAME", "data.json");
      				$handle = fopen(FILENAME, "r");
      				$fr = fread($handle, filesize(FILENAME));
      				$arr1 = json_decode($fr);
      				$fc = fclose($handle);
	
  			       $handle = fopen(FILENAME, "w");

               for ($i = 0; $i < count($arr1); $i++) {
                  if ($arr1[$i]->id===$id and $arr1[$i]->username===$username) {
                    
                    $arr1[$i]->password = $conpassword;
                    
                  }
                  
               }

              $data = json_encode($arr1);
              $fw = fwrite($handle, $data);
          
              $fc = fclose($handle);

              if ($fw) {
                echo "<h3>Change Password Successfully</h3>";
              }

            }

          }
 ?>


<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
         method="POST" novalidate >
  <fieldset>
   
    <legend>Forget Password:</legend>

     <label>Id*:</label>
     <input type="number" name="id" value="<?php echo $id; ?>">
   <br>

     <label for="username">Username:</label>
     <input type="text" id="username" name="username" size="10">
    
   <br>

     <label for="npassword">New Password:</label>
     <input type="password" id="npassword" name="npassword">
     
   <br>
     <label for="conpassword">Confirm Password:</label>
     <input type="password" id="conpassword" name="conpassword">
     <span ><?php echo $passErr;?></span>
    
   <br>
    
    
  </fieldset>
  <br>
  <input type="submit" value="Submit">

</form>

</body>
</html>