<?php session_start()?>
<!--
* @link https://cislinux.hfcc.edu/~njpetersen/project1/checkout.php
* @author Nicholas Petersen
* @Date 2024-11-18
* @Category Projects
* @Package Project1_Checkout
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

    <title>Order Confirmation</title>
</head>
<body>
<?php include_once ("./includes/header.php"); ?>
<div class="container">
    <div class="main-content">
        <h1>Thank you!</h1>
        <h3>Your order is on its way.</h3>
        <p>An email will be sent with your confirmation number for your reference.</p>

    </div>
</div>
<?php include_once ("./includes/footer.php"); ?>
</body>
</html>
