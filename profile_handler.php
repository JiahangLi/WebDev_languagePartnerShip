<?php
require_once("Dao.php");
	session_start();

    if(!isset($_SESSION['loggedin'])){
        header('Location:login.php');
    }elseif(!($_SESSION['loggedin'])){
        header('Location:login.php');
    }else{
       $email=$_SESSION['email'];
       $username=$_SESSION['username'];
    }
    
     if($_POST["firstlanguage"] == $_POST["learninglanguage"]){
         $_SESSION['errormsg']="*Please select your learning language differes from your first language.";
          header('Location:profile.php');
     }
    
    $selected_val1 = $_POST["firstlanguage"];
    $selected_val2 = $_POST["learninglanguage"];  // Storing Selected Value In Variable
   
    $dao = new Dao();
    $dao->user_learninginfo($eamil, $selected_val1, $selected_val2);

  
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
				 <li><a href="learner_account_create.html">Create an account</a></li>
				 <li><a href="search.html">Search for a partner</a></li>
				 <li class="currentlink"> <a href="profile.php"> LoggedIn</a></li>
				 <li><a href="index.html"> Homepage</a></li>
			</ul>
	    </div>
    </div>
    <p>
    
    <?php
        echo $_SESSION['username'] . " you can speak " .$selected_val1 ;
        echo " and you are looking for someone who speaks ". $selected_val2 . ".";
    ?>
   
    
    <?php 
         if($selected_val1=="English" &&  $selected_val2 =="Chinese"){
            echo "We found Jiahang Li find can help you with your Chinese!";
   }?>

     <?php 
         if($selected_val1=="English" &&  $selected_val2 =="Spanish"){
             echo "We find Monica Robbinson who can help you with your Chinese!";
   }?>

    <?php 
         if($selected_val1=="English" &&  $selected_val2 =="Japanese"){
             echo "We find Kaoru Mistukude who can help you with your Chinese!";
   }?>

    <?php 
         if($selected_val1=="English" &&  $selected_val2 =="Korean"){
             echo "We find Aram Kim who can help you with your Chinese!";
   }?>
   </p>
   <a href="profile.php"><h3 class="link">Back</h3></a>
<a href="logout.php"><h3 class="link">Try it later. Logout</h3></a> 
</html>
