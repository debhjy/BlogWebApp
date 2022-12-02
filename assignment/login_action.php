<?php 
session_start();


if (isset($_REQUEST['username']) && isset($_REQUEST['password']))
{ 
// 1. I need to collect the data submitted by previous page (i.e. login.php)
$uname = $_REQUEST['username'];
$upass = $_REQUEST['password'];


// consulting db
$conn = new mysqli("localhost", "root", "", "blog");
if ($conn->connect_error) {
    echo "error";
    die("Connection failed: " . $conn->connect_error);
  }
// check if the uname and upass are actually in the users table

$sql = "SELECT * FROM users WHERE username = '$uname' AND password ='$upass'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    session_destroy();
    session_start();
    $_SESSION['username'] = $uname;
    
    header("Location: index.php");
    

}   
else
{
    header("Location: login.php");
    $_SESSION['error'] = 'yes';
  
}
}
else
{
   header("Location: login.php");
//    echo "<script> window.location.href = \"login.php\"; </script>";
 
   
}
?>