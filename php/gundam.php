<?php
session_start();
require_once 'databaseinfo.php';
$userId = $_SESSION['id'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gundam</title>
    <script src="https://kit.fontawesome.com/966c187d0b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <style>
        .grid_allocation {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: min-content max-content min-content;
            grid-template-areas: "header" "body" "footer";
            min-height: 100vh;
            grid-gap: 10px;
        }

        .grid_header {
            grid-area: header;
        }

        .grid_body {
            grid-area: body;
            overflow: hidden;
            overflow-y: scroll;
        }

        .grid_body::-webkit-scrollbar {
            display: none;
        }

        .grid_footer {
            grid-area: footer;
        }
        .view_more>a {
            text-decoration: none;
            color:	#abb1cf;
        }
        .view_more:hover > a{
            color:black;
        }
    </style>
</head>

<body class="grid_allocation">
    <div class="grid_header">
        <div class="justbg">
            <section class="Socialicon">
                <div>
                    <ul class="icon">
                        <li><a href="https://www.facebook.com"><i class="fa-brands fa-lg fa-facebook-f"></i></a></i></li>
                        <li><a href="https://www.twitter.com"><i class="fa-brands fa-lg fa-twitter"></i></a></li>
                        <li><a href="https://www.instagram.com"><i class="fa-brands fa-lg fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div>
                    <ul class="login">
                        <li><input type="text" placeholder="Search Anything" id="searchtxt"></li>
                        <li><i class="fa-solid fa-magnifying-glass" id="search-icon"></i></li>
                        <li><a href="user_profile.php"><i class="fa-solid fa-lg fa-user user"></i></a></li>
                        <li><i class="fa-solid fa-lg fa-bag-shopping cart" id="cart"></i></li>
                        <li><a href="login.php"><button id="signin">Login</button></a></li>
                    </ul>
                </div>
            </section>

            <section>
                <div class="mobilesearch">
                    <input type="text" placeholder="Search Anything" id="mobile-searchtxt">
                    <i class="fa-solid fa-magnifying-glass" id="mobile-search-icon"></i>
                </div>
            </section>

            <header class="header">
                <a href="index.php"><img src="./SiteLogo.png" width="100px" alt=""></a>
                <div>
                    <ul id="navbar">
                        <li><i id="back" class="fa-solid fa-angle-left"></i></li>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="animefigure.php">Anime Figure</a>
                           
                        </li>
                        <li><a href="gundam.php" class="active">Gundam Models</a>
                           
                        </li>
                        <li><a href="user_product.php">User Product</a></li>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="contact_us.php">Contact US</a></li>
                        <li><a href="login.php"><button id="mobilebutton">Log-in</button></a></li>
                    </ul>
                </div>
                <div id="mobile">
                    <i class="fa-solid fa-xl fa-cart-shopping"></i>
                    <i id="menu" class="fa-solid fa-xl fa-bars"></i>
                </div>
            </header>
        </div>
    </div>

    <div class="grid_body">
        <!-- Shopping Cart -->
        <section class="for_background" id="for_background">
            <div id="shopping-cart" class="shopping-cart-container">
                <span id="for_closing_cart" class="for_closing_cart">X</span>
                <h1>Cart</h1>
                <h1 id="no_product"></h1>
                <div class="cart-table">

                    <table id="cart-content">
                        <thead></thead>
                        <tbody></tbody>
                    </table>
                </div>
                <p class="total-container" id="total-price"></p>
                <a href="#" id="checkout-btn" class="cart-btn">Checkout</a>
                <a href="#" id="clear-cart" class="cart-btn">Clear Cart</a>
            </div>
            <div class="checkout">
                <!-- <i class="fa-light fa-circle-exclamation fa-3x"></i> -->
                <h1 id="cart-display"></h1>
                <div class="lds-default">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="buy-product-btn">
                    <button class="buy-product" id="buy-yes">YES</button>
                    <button class="buy-product" id="buy-no">NO</button>
                </div>
            </div>
        </section>

        <h1 class="popular_product">Popular Product</h1>
        <!-- <section class="nav_product"> -->
        <?php
        $select = mysqli_query($conn, "SELECT * FROM product WHERE productType = 'Gundam'");
        ?>
        <div class="product_container">
            <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                <div class="each-product" id="product-box">
                    <div class="product_image">
                        <img src="./uploadimage/<?php echo $row['productImage']; ?>" class="card__image">
                        <img src="./uploadimage/<?php echo $row['productImage2']; ?>" class="change_image">
                    </div>
                    <div class="product_info">
                        <p class="product__title">
                            <?php echo $row['productName']; ?>
                        </p>
                        <p class="product__price">$
                            <?php echo $row['productPrice']; ?>
                        </p>
                    </div>
                    <button class="view_more"><a href="detail.php?product_id=<?php echo $row['id']; ?>">View More</a></button>
                    <i class="fa-sharp fa-solid fa-cart-shopping add-to-cart add-cart" data-id="<?php $row['id']; ?>"></i>
                </div>
            <?php } ?>
        </div>
    </div>

    <footer class="grid_footer">
        <ul class="icon2">
            <li><a href="https://www.facebook.com"><i class="fa-brands fa-lg fa-facebook-f"></i></a></i></li>
            <li><a href="https://www.twitter.com"><i class="fa-brands fa-lg fa-twitter"></i></a></li>
            <li><a href="https://www.instagram.com"><i class="fa-brands fa-lg fa-instagram"></i></a></li>
        </ul>
        <a href="index.php" id="copyright">&copy;Anime Club</a>
    </footer>
    <script src="cart.js"></script>
    <script src="./index.js"></script>
</body>

</html>