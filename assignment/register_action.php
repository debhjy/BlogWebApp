<?php
session_start();
?>

<?php

$conn = new mysqli("localhost", "root", "", "blog");
if ($conn->connect_error) {
    echo "error";
    die("Connection failed: " . $conn->connect_error);
}
;


if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {

    // 1. collect the data submitted by register form

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];


    //check to see if there is existing user    

    $sql = "SELECT * FROM users WHERE username = '$username'";

    $result = $conn->query($sql);

    //if existing user, bring back to login page
    if ($result->num_rows > 0) {

        header("Location: login.php");

    }
    //else create user
    else {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        $query = $conn->prepare("INSERT INTO `users` (`username`, `password`) VALUES (?, ?);");
        $query->bind_param("ss", $username, $password);
        $query->execute();
        $result = $query->get_result();

    }

}
;

?>