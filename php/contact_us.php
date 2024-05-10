<?php
session_start();
require_once 'databaseinfo.php';
$name = mysqli_real_escape_string($conn, @$_POST['usrname']);
$mail = mysqli_real_escape_string($conn, @$_POST['email']);
$phnum = mysqli_real_escape_string($conn, @$_POST['phnum']);
$address = mysqli_real_escape_string($conn, @$_POST['address']);
$comments = mysqli_real_escape_string($conn, @$_POST['comments']);

if (array_key_exists('submit', $_POST)) {
  $sql_contact = "INSERT INTO contactus (name, email, phoneNumber, address, comments) VALUES ('$name', '$mail', '$phnum', '$address', '$comments')";
  if ($conn->query($sql_contact)) {
    header("location:user_profile.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contact Us</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/966c187d0b.js" crossorigin="anonymous"></script>
  <script src="../bootjs/bootstrap.bundle.js"></script>
  <link rel="stylesheet" href="./css copy/bootstrap.min.css ">
  <link rel="stylesheet" href="./index.css">
  <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
  <link rel="shotcut icon" href="./SiteLogo.png" type="image/x-icon">
</head>

<style>
  * {
    margin: 0%;
    padding: 0%;
  }
  #myform {
    width: 50%;
    margin: auto;
    color: #99aab5;
  }
  .contact-input{
   position:relative !important;
  }

  #myform h1 {
    text-align: center;
    color: #99aab5;
  }

  #myform button {
    padding: 10px;
    margin-top: 10px;
    width: 50%;
    color: white;
    background: linear-gradient(to right, rgb(80, 61, 255), rgb(0, 47, 255));
    border: none;
    border-radius: 10px;
    margin-left: 25%;
  }

  button a {
    font-size: small;
  }
  
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
                    <li><a href="index.php" >Home</a></li>
                    <li><a href="animefigure.php">Anime Figure</a>
                        
                    </li>
                    <li><a href="gundam.php">Gundam Models</a>
                       
                    </li>
                    <li><a href="user_product.php">User Product</a></li>
          <li><a href="aboutus.php">About Us</a></li>
          <li><a href="contact_us.php" class="active">Contact US</a></li>
          <li><a href="login.php"><button id="mobilebutton">Log-in</button></a></li>
                </ul>
            </div>
            <div id="mobile">
                <i class="fa-solid fa-xl fa-cart-shopping"></i>
                <i id="menu" class="fa-solid fa-xl fa-bars"></i>
            </div>
        </header>
  </div>
  <!--
  /**
  * ! Shopping Cart
  */
-->
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

  <section id="contact">
    <form id="myform" name="contact" method="post">
      <h1 class="mb-3">Contact Us</h1>
      <div class="form-floating mb-3 contact-input">
      
        <input type="name" class="form-control" id="floatingInput1" placeholder="Name" name="usrname" required>
        <label for="floatingInput">Name</label>

        <div class="error"></div>
      </div>
      <div class="form-floating mb-3 contact-input">
      

        <input type="email" class="form-control" id="floatingInput2" placeholder="Email" name="email" required>
        <label for="floatingInput">Email</label>
        <div class="error"></div>
      </div>
      <div class="form-floating mb-3 contact-input">
      
        <input type="number" class="form-control" id="floatingInput3" placeholder="Phone" name="phnum" required>
        <label for="floatingInput">PhoneNumber</label>

        <div class="error"></div>
      </div>
      <div class="form-floating mb-3 contact-input">
      
        <textarea class="form-control" placeholder="Address" id="floatingTextarea1" name="address" style="height: 100px" required></textarea>
        <label for="floatingTextarea1">Address</label>

        <div class="error"></div>
      </div>
      <div class="form-floating mb-3 contact-input">
      
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="comments" style="height: 100px" required></textarea>
        <label for="floatingTextarea2">Comments</label>

        <div class="error"></div>
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary" onclick="return thankyou()" name="submit">Send Message</button>
        <!--<button type="submit" class="btn btn-primary" >Send Message</button>-->
      </div>
    </form><br>
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
  <script src="./cart.js"></script>
  <script src="./index.js"></script>

  <script>
    var x = document.getElementById('floatingInput1');
    var y = document.getElementById('floatingInput2');
    var z = document.getElementById('floatingInput3');
    var a = document.getElementById('floatingTextarea1');
    var m = document.getElementById('floatingTextarea2');
    //const y = document.querySelectorAll('#floatingInput');   //for all
    function thankyou() {
      //for each 
      if (x.value == "" || x.value == null) {
        alert("Fill Your Name");
      } else if (y.value == "" || y.value == null) {
        alert("Fill Your Email");
      } else if (z.value == "" || z.value == null) {
        alert("Fill Your Phone");
      } else if (a.value == "" || a.value == null) {
        alert("Fill Your Address");
      } else if (m.value == "" || m.value == null) {
        alert("Fill Your Comment");
      } else {
        alert("Send Message Successfully");
      }
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

</html>