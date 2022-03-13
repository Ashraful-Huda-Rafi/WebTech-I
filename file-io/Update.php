<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update User</title>
</head>
<body>

	<h2>Update User</h2>
	<?php

		$id=$fname =$lname =$dob =$religion =$paddress = $email ="";
	?>
	<?php 

		if ($_SERVER['REQUEST_METHOD'] === "POST") 

		{	
			function input($data) 
			{
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            } 
            $id=input($_POST['id']);
            $fname = input($_POST['fname']);
            $lname = input($_POST['lname']);
            $dob = input($_POST['dob']);
            $religion = input($_POST['religion']);
            $email = input($_POST['email']);
            $paddress = input($_POST['paddress']);
           
			
			if (empty($fname) or empty($lname) or empty($dob) or empty($religion) or empty($email) or empty($paddress)) {}
			
			else {
				define("FILENAME", "data.json");
				$handle = fopen(FILENAME, "r");
				$fr = fread($handle, filesize(FILENAME));
				$arr1 = json_decode($fr);
				$fc = fclose($handle);

				$handle = fopen(FILENAME, "w");

				for ($i = 0; $i < count($arr1); $i++) {
					if ($arr1[$i]->id===$id) {
						$arr1[$i]->fname = $fname;
						$arr1[$i]->lname = $lname;
						$arr1[$i]->dob = $dob;
						$arr1[$i]->religion = $religion;
						$arr1[$i]->paddress = $paddress;
						$arr1[$i]->email = $email;
											
					}
				}

				$data = json_encode($arr1);
				$fw = fwrite($handle, $data);
		
				$fc = fclose($handle);

				if ($fw) {
					echo "<h3>Data Update Successful</h3>";
				}

			}

		}
	?>

	 

	<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
         method="POST" novalidate>
		<fieldset>
		<label>Id*:</label>
		<input type="number" name="id" value="<?php echo $id; ?>">
		<br><br>

		<label>First Name*:</label>
		<input type="text" name="fname" value="<?php echo $fname; ?>">
		<br><br>

		<label>Last Name*:</label>
		<input type="text" name="lname" value="<?php echo $lname; ?>">
		<br><br>

		<label for="dob">DoB:</label>
     	<input type="date" id="dob" name="dob" value="<?php echo $dob; ?>">
     	<br><br>

     	<label for="religion">Religion:</label>
     	<select type="religion" name="religion" value="<?php echo $religion; ?>">
     	<option value="islam">Islam</option>
	    <option value="christianity">Christianity</option>
	    <option value="secular">Secular</option>
	    <option value="hinduism">Hinduism</option>
		</select>
	    <br><br>

	    <label for="email">Email:</label>
     	<input type="email" id="email" name="email" value="<?php echo $email; ?>">
     	<br><br>
     	<label for="paddress">Present Address:</label>
     	<textarea type="paddress" name="paddress" rows="2" cols="15" value="<?php echo $paddress; ?>"></textarea>
     	<br><br>

		<input type="submit" name="Update">
		</fieldset>
	</form>

	<br><br>



</body>
</html>