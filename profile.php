<?php 
   // include_once("profile.html");
	require_once("Dao.php");
	session_start();

  	if ((isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] )||
 	  !isset($_SESSION["loggedin"])) {
 		 header("Location:login.php");
			exit;
	}
	$dao = new Dao();
	if(isset($_SESSION['email'])){
		$email = $_SESSION['email'];
		$user = $dao->userinfo($email);
		if($user){
			$_SESSION['username'] = $user['username'];
			
		}else
			echo "no info";
	}
	
?>
<html>


	    <head>
    		<title>Log In Page</title> 
		<link rel="stylesheet" href="login.css">
		<link rel="icon" type="favicon.jpg" href="image/shipicon.jpg">
	    </head>
    <div class="header">
		<header>
	    	<a href="index.html"><img  class= "icon" src="image/shipicon.jpg" width=40px height=40px></a>
			<a href="index.html"><h1 class="header">Language Partnership</h1></a>
			
	    </header>
	    
		<div>
			<ul class="nav">	
				 <li><a href="learner_account_create.html">Join as mentee</a></li>
				 <li><a href="speaker_account_create.html">Join as mentor</a></li>
				 <li class="currentlink"> <a href="profile.php"> LoggedIn</a></li>
				 <li><a href="index.html"> Homepage</a></li>
			</ul>
	    </div>

    </div>

    <h1>Welcome to Language Partnership</h1>
	<h2 class= "titleline">Thanks for joining us dear <h2>

	 <?php if(isset($_SESSION['username'])){?>
		<h2 class="titleline"><?= $_SESSION['username'] ?></h2>
	 	 <?php }?>

  <h2>Tell us more about you and what you are looking for :) </h2>

	<?php if(isset($_SESSION['errormsg'])){?>
 <span class="errormsg" ><?= $_SESSION['errormsg'] ?></span>
  <?php } ?>
 <br><br>
  <form method="POST" action="profile_handler.php">
    <div class="form-group">
      <label for="sel1">First Language(select one):</label><br>
      	<select class="dropdown" id="sel1" name="firstlanguage">
        <option value="Chinese">Chinese</option>
        <option value="English">English</option>
        <option value="Spanish">Spanish</option>
        <option value="Japanese">Japanese</option>
		<option value="Korean">Korean</option>
      </select>
      <br>
	  	<label for="sel1">Learning Language (select one):</label>
   		<select class="dropdown" id="sel2" name="learninglanguage">
        <option value="Chinese">Chinese</option>
        <option value="English">English</option>
        <option value="Spanish">Spanish</option>
        <option value="Japanese">Japanese</option>
		<option value="Korean">Korean</option>
      </select>
    </div>
	<input type="submit" class="button" value="Try your luck">
  </form>
<a href="logout.php"><h3 class="logout">Try it later. Logout</h3></a>
</html>