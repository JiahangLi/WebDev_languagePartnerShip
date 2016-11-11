<?php

ini_set('display_erroes',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

class Dao{


	private $host= "us-cdbr-iron-east-04.cleardb.net";
	private $dbname = "heroku_07605395906fece";
	private $user = "bd60ace27042e3";
	private $password = "a705e617";


	private function getConnection()
	{
		// Create PDO instance using MySQL connection string.
		$conn = new PDO("mysql:dbname={$this->dbname};host={$this->host};",	"$this->user", "$this->password");
		// Make sure to turn on exceptions for debugging.
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	}

	public function addUser($email, $password, $username)
	{
		$conn = $this->getConnection();
	
		$digest = $this->hashPassword($password);
		
		$query = "INSERT INTO users (email, password, username) VALUES (:email, :password, :username)";

		$stmt = $conn->prepare($query);

		$stmt->bindParam(":email", $email);
		$stmt->bindParam(":password", $digest);
		$stmt->bindParam(":username", $username);

		$stmt->execute();
	}


	public function hashPassword($password)
	{
		$hash = password_hash($password, PASSWORD_BCRYPT);
		return $hash;
	}
	

	public function validateUser($email, $password)
	{
		
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT password FROM users WHERE email= :email");
		
		$stmt->bindParam(':email', $email);
		$stmt->execute();

		$row = $stmt->fetch();
		if(!$row){
			return false;
		}
		$digest = $row['password'];
		return password_verify($password, $digest);
	}

	
		public function userinfo($email)
	{
		$conn = $this->getConnection();

		$query = "SELECT * FROM users WHERE email = :email";
		// Create the prepared statement (returns a PDOStatement object).
		$stmt = $conn->prepare($query);

		$stmt->bindParam(':email', $email);
		// Finally, execute the statement.
		$stmt->execute();
		// And return the result (an array of rows).
		return $stmt->fetch();
	}
	
	public function user_learninginfo($email ,$firstlanguage, $learninglanguage){
		$conn = $this->getConnection();
		$query = "SELECT * FROM users WHERE email = :email";
		$query = "INSERT INTO users (email, password, username) VALUES (:email, :password, :username)";

		$stmt = $conn->prepare($query);
	}
}
?>