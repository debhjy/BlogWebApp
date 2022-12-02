<?php 
session_start();

if (!isset($_SESSION['username']) ) {
    header("Location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:ital,wght@0,100;0,400;0,700;1,300&display=swap" rel="stylesheet">
    <script src="script.js"></script>
    <title>Journal</title>    
</head>
<body>


<!-- header block -->
<div id="headerblock">
    
        <h1> Journal of  

        <?php        
                echo ucfirst($_SESSION['username']);

         ?>

        </h1>

    <div id="headerend">

    <ul>
    <li><a href="index.php">Home</a></li>
  <li><a href="compose.php" id="newpost" > + New Post</a>  </li>
  <li><a href="logout.php" id="logout" > Logout</a>  </li>
</ul>


    <form action="search.php" method="post">
        <div id="filterblock">
        <input type="text" name="filter">
            <div >
            <button type="submit" id="submit">Search</button>
            </div>
        </div>
        </form>
        
        </div>

    </div>

    
        <div class="postblock">
            
<?php 

        $conn = new mysqli("localhost", "root", "", "blog");
        if ($conn->connect_error) {
            echo "error";
            die("Connection failed: " . $conn->connect_error);
        }

        if ( isset( $_SESSION['username']))
        {
            $user=$_SESSION['username'];

            $sql = "SELECT `title`, `post`, `date` FROM `posts` WHERE `user`= \"$user\" ORDER BY id DESC;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                
    ?>  <table>
    <?php  

        foreach ($result as $row) {
    ?>          
            <th><img id="postpic" src="journal.png"> <?php echo $row['title']. "<br>"."<br>"?></th>
            <tr><td><?php echo $row['post']. "<br>"."<br>"?></td></tr>
            <tr><td id="daterow"><?php echo $row['date']. "<br>"."<br>"?></td></tr>         
    <?php
         }
    ?>
</table>
<?php

    } else {
        echo "<p>No posts yet! Start composing by clicking on the '+ New Post' button up top.</p>";
    }   

            ?>

<?php
        }

      
?>
</body>
</html>