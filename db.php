<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "houserent";

// Create connection
$conn = new mysqli('localhost', 'root', '', 'houserent');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*
// Create database
$sql = "CREATE DATABASE houserent";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// sql to create table
$sql = "CREATE TABLE register (
username VARCHAR(250) NOT NULL,
password VARCHAR(250) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table register created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
*/
$edit_state = false;
$id = 0;
$errors = array();

// if register button clicked
if (isset($_POST['register'])) {
	$username=$_POST['username'];
	$password_1=$_POST['password_1'];
	$password_2=$_POST['password_2'];

	//ensures that form field are filled properly
	if(empty($username)){
		array_push($errors, "username is required");
	}
	if(empty($password_1)){
		array_push($errors, "password is required");
	}
	if($password_1 != $password_2){
		array_push($errors, "Two password do not much");
	}

	// if there is no errors, user to database
	if (count($errors) == 0) {
	   $password=md5($password_1); //encrypt password before storing into database(security purpose)
	   $sql="INSERT INTO register(username, password) VALUES('$username', '$password')";
       mysqli_query($conn, $sql);
       header('location: login.php');
	}
}
// login in to from login page
	if (isset($_POST['login'])) {
		$username=$_POST['username'];
	    $password=$_POST['password'];
	    //ensures that form field are filled properly
	    if(empty($username)){
		    array_push($errors, "username is required");
	    }
	    if(empty($password)){
		    array_push($errors, "password is required");
	    }
        if (count($errors) == 0) {
           $password=md5($password);
	       $sql="SELECT * FROM register WHERE username='$username' AND password='$password'";
	       $result=mysqli_query($conn, $sql);
	       if (mysqli_num_rows($result) == 1) {
	       	// log user in
	       	$_SESSION['username']=$username;
	       	header('location: index.php'); // redirect to home page
	       }
	    else{
	       	array_push($errors, "wrong combination of username and password");
	       }
	}
}
/*
// sql to create table renterform
     $sql = "CREATE TABLE renterform (
     id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     name VARCHAR(250),sex VARCHAR(250), regday VARCHAR(250), housetype VARCHAR(250), region VARCHAR(250), city VARCHAR(250), woreda VARCHAR(250), kebele VARCHAR(250), phone_no VARCHAR(250))";

     if ($conn->query($sql) === TRUE) {
       echo "Table renterform created successfully";
     } else {
       echo "Error creating table: " . $conn->error;
    }
*/
  if (isset($_POST['photo'])) {
   	// get all submitted data from the form
   	$name = $_POST['name'];
   	$sex = $_POST['sex'];
   	$date = $_POST['date'];
   	$room = $_POST['room'];
   	$kilil = $_POST['kilil'];
   	$city = $_POST['city'];
    $woreda = $_POST['woreda'];
   	$kebele = $_POST['kebele'];
   	$number = $_POST['number'];
    
   	//ensures that form field are filled properly
  if(empty($name)){
    array_push($errors, "name is required");
  }
  if(empty($sex)){
    array_push($errors, "sex is required");
  }
  if(empty($date)){
    array_push($errors, "registration day is required");
  }
  if(empty($room)){
    array_push($errors, "house type is required");
  }
  if(empty($kilil)){
    array_push($errors, "kilil is required");
  }
  if(empty($city)){
    array_push($errors, "city is required");
  }
  if(empty($woreda)){
    array_push($errors, "woreda is required");
  }
  if(empty($kebele)){
    array_push($errors, "kebele is required");
  }
  if(empty($number)){
    array_push($errors, "phone number is required");
  }
  
  // if there is no errors, user to database
    if (count($errors) == 0) {
    $sql="INSERT INTO renterform(name, sex, regday, housetype, region, city, woreda, kebele, phone_no) VALUES ('$name', '$sex', '$date', '$room', '$kilil', '$city', '$woreda', '$kebele', '$number')";
    mysqli_query($conn, $sql);  //stores submitted data in to database table contact
   }
}
// retrive gallery records
   $reglist=mysqli_query($conn, "SELECT * FROM renterform");
/*
   // sql to create table rentpayment
     $sql = "CREATE TABLE rentpayment (
     id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     name VARCHAR(250), regday VARCHAR(250), housetype VARCHAR(250), regmonth VARCHAR(250), amount VARCHAR(250))";

     if ($conn->query($sql) === TRUE) {
       echo "Table payment created successfully";
     } else {
       echo "Error creating table: " . $conn->error;
    }
    */
    if (isset($_POST['pay'])) {
    // get all submitted data from the form
    $name1 = $_POST['fullname'];
    $room1 = $_POST['room'];
    $paymonth = $_POST['month'];
    $payamount = $_POST['amount'];
    $paydate = $_POST['date'];
    
      //ensures that form field are filled properly
  if(empty($name1)){
    array_push($errors, "name is required");
  }
  if(empty($room1)){
    array_push($errors, "house type is required");
  }
  if(empty($paymonth)){
    array_push($errors, "month is required");
  }
  if(empty($payamount)){
    array_push($errors, "amount is required");
  }
  if(empty($paydate)){
    array_push($errors, "date is required");
  }
     
     // if there is no errors, add to database
    if (count($errors) == 0) {
    $sql="INSERT INTO rentpayment(name, housetype, regmonth, amount, regday) VALUES ('$name1', '$room1', '$paymonth', '$payamount', '$paydate')";
    mysqli_query($conn, $sql);  //stores submitted data in to database table contact
   }
  }

  // retrieve gallery records
   $paylist=mysqli_query($conn, "SELECT * FROM rentpayment");

   //update records
   if (isset($_POST['update'])) {
    $id = mysql_escape_string($_POST['id']);
    $name = mysql_escape_string($_POST['name']);
    $sex = mysql_escape_string($_POST['sex']);
    $date = mysql_escape_string($_POST['date']);
    $room =mysql_escape_string($_POST['room']);
    $kilil = $_POST['kilil'];
    $city = $_POST['city'];
    $woreda = $_POST['woreda'];
    $kebele = $_POST['kebele'];
    $number = $_POST['number'];

    mysqli_query($conn, "UPDATE renterform SET name='$name', sex='$sex', regday='$date', housetype='$room', region='$kilil', woreda='$woreda', kebele='$kebele', phone_no='$number' WHERE id=$id");
    header('location: renterlist.php');
   }

   // delete records
   if (isset($_Get['del'])) {
      $id = $_Get['del'];
      mysqli_query($conn, "DELETE FROM renterform WHERE id=$id");
      header('location: renterlist.php');
   }

   //search data

     

?>