<?php
		require_once("Dao.php");
		
		session_start();
		
	
		$email=htmlentities($_POST["email"]);
		$_SESSION['email'] = $email;
		$password = $_POST['password'];
		$errors= array();
	

		$preset = ['email'=> htmlspecialchars($email)];
		if(empty($errors)){
			try{
				$dao = new Dao();
				$query = $dao->validateUser($email,$password);
				if($query) {
			//	 $userinfo = $query->fetch(PDO::FETCH_ASSOC);
			//	 $_SESSION['username'] = $userinfo['username'];
				// $username = $_SESSION['username'] ;
				$_SESSION['email']=$_POST["email"];
				$_SESSION['loggedin']=true;
				header('Location:profile.php');
			//	redirctSucess("profile.php");
				}
				else {
					$status= "password or email isn't right";
					$_SESSION['status']= $status;
					$_SESSION['loggedin']=false;
					
					header('Location:login.php');
				}
			}catch(Exception $e){
					echo $e->getMessage();
					header('Location:login.php');
			}
		}else{
			header('Location:login.php');
		}
		
		
		
?>