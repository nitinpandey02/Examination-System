<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "examination_system";

// Create a connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo "Connection was successful<br>";
}

// Create a db
// $sql = "CREATE DATABASE examination_system";
// $result = mysqli_query($conn, $sql);

// Check for the database creation success
// if($result){
//     echo "The db was created successfully!<br>";
// }
// else{
//     echo "The db was not created successfully because of this error ---> ". mysqli_error($conn);
// }
  
?>




<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "examination_system";
	
	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}
	
	function connectDB() {
		$conn = mysql_connect($this->host,$this->user,$this->password);
		return $conn;
	}
	
	function selectDB($conn) {
		mysql_select_db($this->database,$conn);
	}
	
	function runQuery($query) {
		$result = mysql_query($query);
		while($row=mysql_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysql_query($query);
		$rowcount = mysql_num_rows($result);
		return $rowcount;	
	}
}
?>