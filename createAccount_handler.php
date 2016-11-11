<?php

	session_start();
	ini_set('display_erroes',1);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);
	$invalid = false;
	require_once('Dao.php');

	$username = $email = $password = "";
	$dao= new Dao();	
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	  if (empty($_POST["username"])) {
	    	$nameErr = "Name is required";
				$_SESSION['nameErr']=$nameErr; 
				$invalid=true;
	  } 
	  else{
	    	$username = test_input($_POST["username"]);
				$_SESSION['preset_username'] = $username;
		    if (!preg_match("/^[a-zA-Z ]*$/",$username)) 
		    {
		      $nameErr = "Only letters and white space allowed\n"; 
					$_SESSION['nameErr']=$nameErr; 
					$invalid=true;
		    }
	  }


	    	$email = test_input($_POST["email"]);
			
				//email info validation
		    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		    {
			
		      $emailErr = "Invalid email format\n"; 
					$_SESSION['emailErr']=$emailErr; 	
					$invalid=true;			
		    }else{
							$_SESSION['preset_email']=$email;
				}
	  

				if (empty($_POST["password"])) {
					$passwordErr = "Password is required";
					$_SESSION['passwordErr']=$passwordErr; 
					$invalid=true;
				} 
				else {
					$password = test_input($_POST["password"]);
			
				}

	}


	//sanitization of the input information
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	if($invalid==true){
			header("Location:createAccount.php");
	}else{
			$dao->addUser($email,$password,$username);
			header("Location:login.php");
	}

?>