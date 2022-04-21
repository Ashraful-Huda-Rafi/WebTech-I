<?php

function connect() {
		$conn = new mysqli("localhost", "root", "", "test");
		
		if ($conn->connect_error) {
			die("Connection Error: " . $conn->connect_error);
		} 

		return $conn;
	}
?>