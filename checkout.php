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

    <title>Checkout</title>
</head>
<body>
<?php include_once ("./includes/header.php"); ?>
<div class="container">
    <div class="main-content">
        <h1>Checkout</h1>
        <?php
        include("./includes/creds.php");

        //get username from session
        $username = $_SESSION['username'];

        //Create database connection object
        try {
            $DBO = new PDO('mysql:host=localhost;dbname=' . DBASE, UNAME, PASS);
        }
        catch (PDOException $e) {
            echo "<h3>Database Error: Your connection to the database failed.</h3>";
            $DBO = null;
        }

        $sql = "SELECT First,
                        Last,
                        Email,
                        CountryCode,
                        Phone1,
                        Phone2,
                        Phone3,
                        Street,
                        City,
                        State,
                        Zip,
                        Country  
                FROM Customers
                JOIN Users ON Customers.CustomerID = Users.CustomerID
                WHERE Uname = :username";

        $statement = $DBO->prepare($sql);
        $statement->bindParam(':username', $username);
        $statement->execute();
        $customer = $statement->fetchAll();

        ?>

        <div class="checkout-form">
            <h3>Billing Address</h3>
            <h6>If different from address on file</h6>
            <form>
                <input type="text" placeholder="First name" name="firstname" id="firstname" value="<?php echo $customer[0]->First?>" required>
                <input type="text" placeholder="Last name" name="lastname" id="lastname" value="<?php echo $customer[0]->Last?>" required>
                <input type="phone" placeholder="Phone (no dashes)" name="phone" id="phone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" minlength="10" maxlength="10" value="<?php echo $customer[0]->Phone1 + $customer[0]->Phone2 + $customer[0]->Phone3?>" required>
                <input type="text" placeholder="Street" name="street" id="street" value="<?php echo $customer[0]->Street?>" required></input>
                <input type="text" placeholder="City" name="city" id="city" value="<?php echo $customer[0]->City?>" required>
                <input type="text" placeholder="State" name="state" id="state" value="<?php echo $customer[0]->State?>" required>
                <input type="text" placeholder="Zip code" name="zip" id="zip" value="<?php echo $customer[0]->Zip?>" required>
                <select name="country" id="country" required>
                <?php
                //select appropriate country code based on DB value
                    switch ($customer[0]->CountryCode) {

                        default:
                            echo'<option value="USA" selected>United States</option>
                                 <option value="CAN">Canada</option>
                                 <option value="MEX">Mexico</option>';
                            break;

                        case 'CAN':
                            echo'<option value="USA">United States</option>
                                 <option value="CAN" selected>Canada</option>
                                 <option value="MEX">Mexico</option>';
                            break;

                        case 'MEX':
                            echo'<option value="USA">United States</option>
                                 <option value="CAN">Canada</option>
                                 <option value="MEX" selected>Mexico</option>';
                            break;
                    }
                ?>
                </select>
                <button type="submit">Checkout</button>
                <h3>Payment Information</h3>
                <input type="text" id="cname" placeholder="John Doe" name="cardname" required>
                <input type="text" id="ccnum" placeholder="1234-5678-8901" name="cardnumber" required>
                <input type="text" id="expmonth" placeholder="01" name="expmonth" required>
                <input type="text" id="expyear" placeholder="2028" name="expyear" required></input>
                <input type="text" id="cvv" placeholder="111" name="cvv" required>
                <label><input type="checkbox" id="shippingaddress" name="shippingaddress" checked> Shipping address same as billing</label>
            </form>
        </div>

        <?php
        //pull all from cart
        $username = $_SESSION['username'];
        $subtotal = 0;
        $tax = 0;
        $shipping = 20;
        $total = 0;

        $sql = "SELECT Cart.ProductID,  
                        Price, 
                        Cart.Quantity,
                        Price * Cart.Quantity AS ExtPrice                        
                        FROM Cart
                        JOIN Products ON Cart.ProductID = Products.ProductID
                        WHERE Uname = :username";

        $statement = $DBO->prepare($sql);
        $statement->bindParam(':username', $username);
        $statement->execute();
        $cart = $statement->fetchAll();

        //Calulate total price
        foreach($cart as $item){
            $subtotal += $item['ExtPrice'];
        }
        $tax = $subtotal * 0.06;
        $total = $subtotal + $tax + $shipping;
        ?>

        <form action="checkout.php" method="get">
            <button type="submit">Checkout</button>
        </form>

    </div>
</div>
<?php include_once ("./includes/footer.php"); ?>
</body>
</html>
