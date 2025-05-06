<?php session_start(); ?>
<header>
    <div class="logo">
        <a href="index.php"><img src="./images/logo.png" alt="logo"></a>
    </div>
    <div class="navbar">
        <ul>

            <?php
                if (isset($_SESSION['username'])) {
                    echo "  <li id='header-link'><a href='./index.php'>Home</a></li>
                            <li id='header-link'><a href = './catalog.php'>Catalog</a></li>
                            <li id='header-link'><a href='./contact.php'>Contact</a></li>
                            <li id='header-link'><a href='./logout.php'>Logout</a></li>
                            <li id='account-name'>Welcome, " . $_SESSION['first'] . " " . $_SESSION['last'] . "</a></li>
                            <li id='account-name'><a href='./cart.php'><img src='./images/cart-icon-small.png' alt='cart-icon'></a></li>
                            ";
                }
                else {
                    echo "  <li><a href='./index.php'>Home</a></li>
                            <li><a href = './catalog.php'>Catalog</a></li>
                            <li><a href='./contact.php'>Contact</a></li>
                            <li><a href='./login.php'>Login</a></li>";
                }
            ?>
        </ul>
    </div>
</header>
