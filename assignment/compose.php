<?php
session_start();
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;1,300&display=swap"
        rel="stylesheet">
    <script src="script.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>Compose</title>
</head>

<body>
    <!-- header block -->
    <div id="headerblock">

        <h1> Compose
        </h1>

        <div id="headerend">

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="compose.php" id="newpost"> + New Post</a> </li>
                <li><a href="logout.php" id="logout"> Logout</a> </li>
            </ul>


            <form action="search.php" method="post">
                <div id="filterblock">
                    <input type="text" name="filter">
                    <div>
                        <button type="submit" id="submit">Search</button>
                    </div>
                </div>
            </form>

        </div>

    </div>



    <div id="formblock">
        <form action="compose.php" method="post">


            <div class="input">
                <label for="title"><b>Title</b></label><br>
                <input type="text" size=30 autofocus name="title" required><br>
            </div>
            <div class="input">
                <label for="post"><b>Post</b></label><br>
                <textarea rows=20 cols=80 name="post"></textarea><br>
            </div>
            <div class="input">
                <label for="date"><b>Date</b></label><br>
                <input type="date" readonly value="<?php echo date("Y-m-d"); ?>" name="date" required><br>
            </div>
            <div>
                <button type="submit" id="submitpost">Publish</button>
            </div>
        </form>


    </div>

    <?php
if (isset($_REQUEST['title']) && isset($_REQUEST['post'])) {

    $conn = new mysqli("localhost", "root", "", "blog");
    if ($conn->connect_error) {
        echo "error";
        die("Connection failed: " . $conn->connect_error);
    }

    // 1. collect the data submitted by compose page 

    $title = $_REQUEST['title'];
    $text = $_REQUEST['post'];
    $date = $_REQUEST['date'];
    $user = $_SESSION['username'];

    // 2. Add to database

    $query = $conn->prepare("INSERT INTO `posts` (`title`, `post`, `date`,`user`) VALUES (?, ?, ?,?);");
    $query->bind_param("ssss", $title, $text, $date, $user);
    $query->execute();
    $result = $query->get_result();

    if($query)
    {
       
       
        echo "<script type='text/javascript'>alert('Post published!');</script>";

         
    
    }
    else
    {
    echo "<script type='text/javascript'>alert('Something went wrong :(');</script>";
    
    }


}

?>

</body>

</html>