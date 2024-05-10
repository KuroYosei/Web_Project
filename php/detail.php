<?php
session_start();
require_once 'databaseinfo.php';
$id = $_GET['product_id'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Figure</title>
    <script src="https://kit.fontawesome.com/966c187d0b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./index.css">
</head>
<style>
    
 .search {
            display: flex;
        }

        #search {
            font-size: larger;
            margin-top: .5rem;
        }

        .search_result {
            position: absolute;
            z-index: 999;
            background-color: gray;
            width: 35vw;
            margin-top: .5rem;
            border-radius: .5rem;
            padding: .5rem;
            display: none;
        }

        .search_result a {
            text-decoration: none;
            color: white;
        }

        .search_result ul li {
            padding: .5rem;
            cursor: pointer;
        }

        .search_result ul li:hover {
            background-color: lightgray;
            color: black;
        }
    </style>
<body>
    <div class="justbg">
    <section class="Socialicon">
            <div>
                <ul class="icon">
                    <li><a href="https://www.facebook.com"><i class="fa-brands  fa-facebook-f"></i></a></i></li>
                    <li><a href="https://www.twitter.com"><i class="fa-brands  fa-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com"><i class="fa-brands  fa-instagram"></i></a></li>
                </ul>
            </div>
            <div>
                <ul class="login">
                    <li><input type="text" placeholder="Search Anything" id="searchtxt"></li>
                    <li><i class="fa-solid fa-magnifying-glass" id="search-icon"></i></li>
                    <li><a href="user_profile.php"><i class="fa-solid fa-user user"></i></a></li>
                    <li><i class="fa-solid fa-bag-shopping cart"></i></li>
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
            <a href="index.html"><img src="./SiteLogo.png" width="100px" alt=""></a>
            <div>
                <ul id="navbar">
                    <li><i id="back" class="fa-solid fa-angle-left"></i></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="animefigure.php">Anime Figure</a>
                        
                    </li>
                    <li><a href="gundam.php" >Gundam Models</a>
                       
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
    <section>
        <div class="container">
            <span onclick="this.parentElement.style.display='none'" class="closebtn"></span>
            <img id="expandedImg">
        </div>
        <div class="row">
            <?php
            $select_image = mysqli_query($conn, "SELECT * FROM product WHERE id='$id'");
            $row = mysqli_fetch_assoc($select_image);
            ?>
            <div class="column">
                <img src="./uploadimage/<?php echo $row['productImage'] ?>" alt="Nature" style="width:100%" onclick="myFunction(this);">
            </div>
            <div class="column">
                <img src="./uploadimage/<?php echo $row['productImage2'] ?>" alt="Nature" style="width:100%" onclick="myFunction(this);">
            </div>
            <div class="column">
                <img src="./uploadimage/<?php echo $row['productImage3'] ?>" alt="Nature" style="width:100%" onclick="myFunction(this);">
            </div>
            <div class="column">
                <img src="./uploadimage/<?php echo $row['productImage4'] ?>" alt="Nature" style="width:100%" onclick="myFunction(this);">
            </div>
        </div>

        <div class="detail">
            <h2 class="pro_detail">product detail</h2>
            <dl>
                <dt>Product Name</dt>
                <dd><?php echo $row['productName']?></dd>

                <dt>series</dt>
                <dd><?php echo $row['seriesName']?></dd>

                <dt>Category</dt>
                <dd><?php echo $row['categoryType']?></dd>

                <dt>Manufacturer</dt>
                <dd><?php echo $row['manufacturerName']?></dd>

                <dt>Release Date</dt>
                <dd><?php echo $row['releaseDate']?></dd>

                <dt>Specifications</dt>
                <dd><?php echo $row['specifications']?></dd>
            </dl>
        </div>

        <div class="reminder">
            <p><?php echo $row['reminder']?></p>
            &copy; 丸山くがね・KADOKAWA刊／オーバーロード製作委員会
        </div>


    </section>




    <footer class="grid_footer">
        <ul class="icon2">
            <li><a href="https://www.facebook.com"><i class="fa-brands fa-facebook-f"></i></a></i></li>
            <li><a href="https://www.twitter.com"><i class="fa-brands  fa-twitter"></i></a></li>
            <li><a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a></li>
        </ul>
        <a href="index.php" id="copyright">&copy;Anime Club</a>
    </footer>
    <script src="./cart.js"></script>
    <script>
        function myFunction(imgs) {
            var expandImg = document.getElementById("expandedImg");
            expandImg.src = imgs.src;
            expandImg.parentElement.style.display = "block";
            expandImg.style.width ="400px";
            expandImg.style.height ="520px";
        }
    </script>
     <script>
         document.addEventListener('mouseup', function(e) {
            var searchResult = document.querySelector('.search_result');
            if (!searchResult.contains(e.target)) {
                searchResult.style.display = 'none';
            }
        });
        </script>

</body>