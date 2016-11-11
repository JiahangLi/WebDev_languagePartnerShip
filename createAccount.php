<?php
	session_start();
	require_once('Dao.php');
?>

<html>
    <div class="header">

    	<title>Language Parntership</title> 

	    <head>
			<link rel="stylesheet" href="login.css">
			<link rel="icon" sizes="16*16" type="image/png" href="images/shipiconpng.png">
	    </head>

		<header>
	    	<a href="index.html"><img  class= "icon" src="image/shipicon.jpg" width=40px height=40px></a>
			<a href="index.html"><h1 class="header">Language Partnership</h1></a>
	    </header>
	    
		<div>
			<ul class="nav">	
				 <li class="currentlink"><a href="learner_account_create.html">Create a learner account</a></li>
				 <li><a href="speaker_account_create.html">Create a speaker account</a></li>
				 <li><a href="login.html"> Log In </a></li>
				 <li><a href="index.html"> Homepage</a></li>
			</ul>
	    </div>

    </div>
    <div>
    <h1> Welcome Aboard</h1>

    <body class="accountCreation">
	<div class="container">
	  <div class="left">  
	     <h1> Enthusiatic Learner </h1>
	     <form name="commentForm" action="createAccount_handler.php" method="POST">
	  	Username<br> 
		  <?php if(isset($_SESSION['preset_username'])){?>
		  	<?php $username = $_SESSION['preset_username'] ?>
			<?php }?>
		  <?php if(isset($_SESSION['nameErr'])){?>
		  	<span class="error" id="nameErr"><?= $_SESSION['nameErr'] ?></span>
		  <?php }?>
      	        <input type="text" name="username" value="<?php echo $username; ?>"/ ><br>
  	       	Email<br>
			<?php if(isset($_SESSION['preset_email'])){?>
		  	<?php $email = $_SESSION['preset_email'] ?>
			<?php }?>
			 <?php if(isset($_SESSION['emailErr'])){?>
		  	<span class="error" id="emailErr"><?= $_SESSION['emailErr'] ?></span>
		 	 <?php }?>
  	        <input type="email" name="email" value="<?php echo $email; ?>"/required>
	        <br/> 
		Password<br/> 
		 <?php if(isset($_SESSION['passwordErr'])){?>
		<span class="error" id="passwordErr"><?= $_SESSION['passwordErr'] ?></span>
	 	 <?php }?>
		<input type="password" name="password" required>
	        <br/> 
	       	<input type="submit" class="button" value="Get your ticket">
	    </form>
    	  </div>
    	</div>
        <right> <img class="sidepic" src="image/voyage.jpg" class="right"></right>
    </body>
    </div>	
</html>

<?php
	unset($_SESSION['nameErr']);
	unset($_SESSION['emailErr']);
	unset($_SESSION['passwordErr']);	
?>
