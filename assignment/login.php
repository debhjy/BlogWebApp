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
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:ital,wght@0,100;0,400;0,700;1,300&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handlee&display=swap" rel="stylesheet">
    <script src="script.js"></script>


    <title>Login/SignUp</title>
</head>

<body>
    <div id="loginbody">
        <!-- <h1 id="loginheader">Head in the clouds?</h1>

<div id="subtitle">
<p>start writing about it.</p>
</div> -->

        <div class="forms">

            <div class="loginblock visible">

                <form class="loginform" action="login_action.php" method="post">

                    <h2 class="logintitles">Log In</h2><br><br>

                    <?php
  if ($_SESSION['error'] == 'yes') {
      echo "<div id=\"errormessage\">Login Invalid</div>";
  }
  ;
  ?>


                    <label for="username" class="loginlabels"><b>Username</b></label>
                    <input type="text" class="textfield" name="username" required><br>

                    <label for="password" class="loginlabels"><b>Password</b></label>
                    <input type="password" class="textfield" name="password" required><br>

                    <button type="submit">Login</button><br>
                    <p class="buttonlabel">New User?</p>
                    <button type="button" class="gosignup">Sign Up </button>

                    <!-- <?php echo date("m/d/Y h:i:s a", time()) ?> -->
                </form>

            </div><!-- loginblock -->


            <div class="registerblock hidden">
                <form class="loginform" action="register_action.php" method="post">



                    <h2 class="logintitles">Sign Up</h2><br><br>
                    <label for="username" class="loginlabels"><b>Create Username</b></label>
                    <input type="text" class="textfield" name="username" required><br>

                    <label for="password" class="loginlabels"><b>Create Password</b></label>
                    <input type="password" class="textfield" name="password" required><br>

                    <button type="submit">Register</button><br>
                    <p class="buttonlabel">Have an account?</p>
                    <button type="button" class="gologin">Login</button>



                </form>
            </div><!-- registerblock -->

        </div><!-- forms-->

    </div><!-- loginbody-->
</body>

</html>