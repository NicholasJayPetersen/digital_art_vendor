<!--
* @link https://cislinux.hfcc.edu/~njpetersen/project2/index.php
* @author Nicholas Petersen
* @Date 2024-10-08
* @Category Projects
* @Package Project2_Index
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Digital Art</title>
</head>
<body>
<?php include_once ("./includes/header.php"); ?>

<div class="container">
    <div class="main-content">
        <div class="question-form">
            <form action="process_login.php" method="post">
                <label for="username">Username:</label>
                <br>
                <input class="responsive-textbox" type="text" id="username" name="username" maxlength="25" required>
                <br>
                <label for="password">Password:</label>
                <br>
                <input class="responsive-textbox" type="password" id="password" name="password" maxlength="25" required>
                <br>
                <button class="form-button" type="submit">Login</button>
            </form>
            <br><br>
            <?php

            //on successful login redirect to homepage
            if (isset($_GET['success'])){
                if ($_GET['success'] == "1"){
                    echo "<p>Login Successful!</p>";
                    echo "<script>setTimeout(function(){window.location.href='index.php';}, 2000);</script>";
                }
                else{
                    echo "<p>Login Failed...</p>";
                }
            }
            ?>

        </div>
    </div>
</div>
<?php include_once("./includes/footer.php"); ?>
<script src="js/slideshow.js"></script>
</body>
</html>