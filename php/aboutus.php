<!DOCTYPE html>
<html lang="en">

<head>
    <title>about us</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/966c187d0b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="shotcut icon" href="./SiteLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="./index.css">
</head>
<style>
    * {
        margin: 0%;
        padding: 0%;
    }

    h1 {
        font-size: 50px;
        color: #AD5A02;
    }

    .para {
        width: 80%;
        margin: auto;
        padding-bottom: 35px;
    }

    p {
        text-align: center;
        font-size: 25px;
        color: #AD5A02;
        width: 100%;
        margin: auto;
    } .search {
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
                <li><a href="index.php">Home</a></li>
                <li><a href="animefigure.php">Anime Figure</a>
                    
                </li>
                <li><a href="gundam.php">Gundam Models</a>
                    
                </li>
                <li><a href="user_product.php">User Product</a></li>
                <li><a href="aboutus.php" class="active">About Us</a></li>
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
<section>
    <div class="aboutus">
        <h1>About Anime Club</h1>
        <img src="./uploadimage/245167742_669669830664639_7892532204352435429_n.jpg" alt="">
        <div class="para">
            <p>
                We created Anime Collective to form a community centered around not just anime and gundam, but collecting
                as well. With that said, you can expect everything from anime and gundam news to statue and figure
                announcements on the site. In addition, we try our best to review all of the products that we receive
                for you guys on the website as well.
                <br>
                We are fans of everything we write about and want to create a site that celebrates all aspects of the
                anime and gundam industries. Collecting is not as readily written about on major sites, especially when
                it comes to anime statues, so we wanted to represent it in addition to anime and gundam as well!
                <br>
                To all of our viewers and readers, thank you so much for all of your support so far. We are just two
                collectors who write about what we are passionate about, so it really means a lot to us!
            </p>
        </div>
    </div>
</section>
<footer>
    <div>
        <ul class="icon2">
            <li><a href="https://www.facebook.com"><i class="fa-brands fa-lg fa-facebook-f"></i></a></i></li>
            <li><a href="https://www.twitter.com"><i class="fa-brands fa-lg fa-twitter"></i></a></li>
            <li><a href="https://www.instagram.com"><i class="fa-brands fa-lg fa-instagram"></i></a></li>
        </ul>
    </div>
    <a href="#" id="copyright">&copy;Website Name</a>
</footer>

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