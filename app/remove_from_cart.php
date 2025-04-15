<?php
session_start();
include("./includes/creds.php");

$productID = $_GET['productID'];
$username = $_SESSION['username'];

//Create database connection object
try {
    $conn = new PDO('mysql:host=localhost;dbname=' . DBASE, UNAME, PASS);

    $sql = "DELETE FROM Cart
            WHERE ProductID = :productID AND Uname = :username";

    $statement = $conn->prepare($sql);
    $statement->bindParam(':username', $username);
    $statement->bindParam(':productID', $productID);
    $statement->execute();
    $conn = null;

    header("Location: cart.php");
}
catch (PDOException $e) {
    echo "<h3>Database Error: Your connection to the database failed.</h3>";
    $conn = null;
}

?>
