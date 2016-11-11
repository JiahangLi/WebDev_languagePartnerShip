<?php
	include_once("login.html"); 
	session_start();
	if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin'])
	{
		header("Location: profile.php");
	}
	$email="";
	if(isset($_SESSION['preset_email'])){
		$email = $_SESSION['preset_email'];
	}

?>
<html>
    <div class="header">


	    <head>
    		<title>Log In Page</title> 
		<link rel="stylesheet" href="login.css">
		<link rel="icon" type="favicon.jpg" href="image/shipicon.jpg">
	    </head>

		<header>
	    	<a href="index.html"><img  class= "icon" src="image/shipicon.jpg" width=40px height=40px></a>
			<a href="index.html"><h1 class="header">Language Partnership</h1></a>
	    </header>
	    
		<div>
			<ul class="nav">	
				 <li><a href="learner_account_create.html">Create an account</a></li>
				 <li><a href="search.html">Search for a partner</a></li>
				 <li class="currentlink"> <a href="login.html"> Log In </a></li>
				 <li><a href="index.html"> Homepage</a></li>
			</ul>
	    </div>

    </div>

    <div class="middle">
  	  <body background="image/login.jpg">
	

		<div class="container">
		  <div class="center">  
	    	 <center><h1>CHECK IN </h1></center>
			 	
	  <form method="POST" action="login_handler.php">
	    	 <center> Email<br> 
      	        <input type="text" name="email" value="" required><br>
  	       <center> Password </center>
  	   		    <center><input type="password" name="password" value="" required>
	            <br/></center> 
	         	<input type="submit" class="button" value="get on board">
				 <?php displayError('message')?>
				 
	  		  </form>

				<p> No Account? No problem! <a href="learner_account_create.html" class="signUpLink">Sign up!</a> </p>
				
    	  </div>
    	</div>
    </body>
    </div>

</html>