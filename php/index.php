<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Club</title>
    <link rel="stylesheet" href="./index.css">
    <script src="https://kit.fontawesome.com/966c187d0b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="shotcut icon" href="./SiteLogo.png" type="image/x-icon">
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
            <a href="index.php"><img src="./SiteLogo.png" width="100px" alt=""></a>
            <div>
                <ul id="navbar">
                    <li><i id="back" class="fa-solid fa-angle-left"></i></li>
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="animefigure.php">Anime Figure</a>
                        
                    </li>
                    <li><a href="gundam.php">Gundam Models</a>
                       
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

    <!--Main Banner-->
    <section>
        <div class="mainb">
            <img src="./mainbanner.jpg" alt="">
            <div id="main">
                <h1>New Figure Arrived</h1>
            </div>
        </div>
    </section>

    <!--Banner 2-6 Section-->
    <section>
        <div class="banner">
            <!--Banner234 Start-->
            <div class="banner234">
                <div id="banner2">
                    <h3>Check Out</h3>
                    <p>New Product</p>
                    <a href="./animefigure.php"><button>Check Now</button></a>
                </div>
                <div id="banner3">
                    <h3>New Figures</h3>
                    <p>released....</p>
                    <a href="./animefigure.php"><button>Buy Now</button></a>
                </div>
                <div id="banner4">
                    <h3>Latest Gundam</h3>
                    <p>models</p>
                    <a href="./gundam.php"><button>Buy Now</button></a>
                </div>
            </div>
            <!--Banner56 Start-->
            <div class="banner56">
                <div id="banner5">
                    <h3>More Product</h3>
                    <p>to see</p>
                    <a href="./gundam.php"><button>Check Now</button></a>
                </div>
                <div id="banner6">
                    <h3>Want to know</h3>
                    <p>more about us..?</p>
                    <a href="./aboutus.php"><button>Click Me</button></a>
                </div>
            </div>
        </div>
    </section>

    <!--Popular Product Section-->
    <section>
        <h1>Popular Product</h1>
        <div class="popular-product">
            <div id="popular1">
                <img src="./a1.webp" id="org-image">
                <img src="./a2.webp" class="change-image">
                <p>ALBEDO</p>
                <p id="n_price">20$</p>
                <button><a href="albedo.php">View More</a></button>
            </div>
            <div id="popular1">
                <img src="./rin-1.webp" id="org-image">
                <img src="./rin-2.webp" class="change-image">
                <p>RIN</p>
                <p id="n_price">30$</p>
                <button><a href="rin.php">View More</a></button>
            </div>
            <div id="popular1">
                <img src="./len-1.webp" id="org-image">
                <img src="./len-2.webp" class="change-image">
                <p>LEN</p>
                <p id="n_price">30$</p>
                <button><a href="len.php">View More</a></button>
            </div>
            <div id="popular1">
                <img src="./gundam11.png" id="org-image">
                <img src="./gundam12.png" class="change-image">
                <p>GRADE NU</p>
                <p id="n_price">40$</p>
                <button><a href="./gundam1.php">View More</a></button>
            </div>
            <div id="popular1">
                <img src="./gundam2.1.png" id="org-image">
                <img src="./gundam2.2.png" class="change-image">
                <p>PG 00</p>
                <p id="n_price">40$</p>
                <button><a href="gundam2.php">View More</a></button>
            </div>
            <div id="popular1">
                <img src="./gundam3.1.jpg" id="org-image">
                <img src="./gundam3.2.jpg" class="change-image">
                <p>ENTRY GRADE</p>
                <p id="n_price">40$</p>
                <button><a href="gundam3.php">View More</a></button>
            </div>
        </div>
    </section>

    <footer>
        <div>
            <ul class="icon2">
                <li><a href="https://www.facebook.com"><i class="fa-brands  fa-facebook-f"></i></a></i></li>
                <li><a href="https://www.twitter.com"><i class="fa-brands  fa-twitter"></i></a></li>
                <li><a href="https://www.instagram.com"><i class="fa-brands  fa-instagram"></i></a></li>
            </ul>
        </div>
        <a href="#" id="copyright">&copy; Anime Club</a>
    </footer>
    <script src="./cart.js"></script>
    <script src="./index.js"></script>
    <script>
         document.addEventListener('mouseup', function(e) {
            var searchResult = document.querySelector('.search_result');
            if (!searchResult.contains(e.target)) {
                searchResult.style.display = 'none';
            }
        });
        </script>
</body>

</html>