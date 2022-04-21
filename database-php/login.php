<?php
    include 'DBread.php'; 
    $username=$password=$unameErr=$passErr=$errorMessage="";
    $isValid= true;
    $loginflag=false;
    if($_SERVER['REQUEST_METHOD']==="POST")
    {
      
      $username=$_POST['username'];
      $password=$_POST['password'];
      if(empty($username ))
      {
        $unameErr="username should be 8 characters 2 numerical";
        $isValid= false;
      } 
      if(empty($password ))
      {
        $passErr="password should be 8 charcter";
        $isValid= false;
      }
      if($isValid)
      {
        $username=test_input($username);
        $password=test_input($password);
        $response= login($username,$password); 
        if($response)
        {
         
           header('Location: welcome.php');
        }
        else
        {
          $errorMessage="log-in failed";
        }

          
      }
    }
    function test_input($data)
    {
      $data=trim($data);
      $data=stripcslashes($data);
      $data=htmlspecialchars($data);
      return $data;
    }
    
    
      ?>
  <!doctype html>
  <html>
  <head>
    <meta charset="utf-8">
    <title>Log in Form</title>
  </head>
  <body>
    <h1>Log in form</h1>
      <div style = "position: absolute; top: 40%; left: 50%; transform: translate(-50%, -50%);">
      <form action="" method="POST">
      <fieldset>
      <legend> Account Information:</legend>
      <label for="username">Username<span style="color: red;">*</span>:</label>
      <input type="text" id="username" name="username" >
      <span style="color: red"><?php echo $unameErr;?></span>
      <br>
      <br>
      
      <br>
      <label for="password">Password<span style="color: red;">*</span>:</label>
      <input type="Password" id="password" name="password" >
      <span style="color: red"><?php echo $passErr;?></span>
      

      



    </fieldset>
    <br>
    <input type="Submit" name="submit" value="log in">

  </form>
  <span style="color: red"><?php echo $errorMessage;?></span>
<h3>You aren't regester?
<a target="_blank" href="http://localhost/database-php/registration.php">
 Click Here
</a>

</body>
</html>