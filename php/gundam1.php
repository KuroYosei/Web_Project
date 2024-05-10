<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/966c187d0b.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./detail.css">
</head>

<body>
  <div class="justbg">
    <section class="Socialicon">
        <div>
            <ul class="icon">
                <li><a href="#"><i class="fa-brands fa-lg fa-facebook-f"></i></a></i></li>
                <li><a href="#"><i class="fa-brands fa-lg fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-lg fa-instagram"></i></a></li>
            </ul>
        </div>
        <div>
                    <ul class="login">
                        <li><input type="text" placeholder="Search Anything" id="searchtxt"></li>
                        <li><i class="fa-solid fa-magnifying-glass" id="search-icon"></i></li>
                    <li><a href="user_profile.php"><i class="fa-solid fa-lg fa-user user"></i></a></li>
                        <li><a href="shopping_cart.php" id="cart_counter"><i class="fa-solid fa-lg fa-bag-shopping cart"></i></a></li>
                        <li><a href="login.php"><button id="signin">Login</button></a></li>
                    </ul>
                </div>
    </section>
    <header class="header">
      <a href="index.php"><img src="./SiteLogo.png" width="100px" alt=""></a>
      <div>
          <ul id="navbar">
              <li><i id="back" class="fa-solid fa-angle-left"></i></li>
              <li><a href="index.php" >Home</a></li>
              <li><a href="animefig.php" >Anime Figure</a>
                
          </li>
          <li><a href="gundam.php">Gundam Models</a>
             
          </li>
              <li><a href="#">About Us</a></li>
                    <li><a href="cc1.php">Contact US</a></li>
                    <li><a href="#"><button id="mobilebutton">Log-in</button></a></li>
              <li><a href="#"><button id="mobilebutton">Log-in</button></a></li>
              <li><a href="#"><button id="mobilebutton">Register</button></a></li>
          </ul>
      </div>
      <div id="mobile">
          <i class="fa-solid fa-xl fa-cart-shopping"></i>
          <i id="menu" class="fa-solid fa-xl fa-bars"></i>
      </div>
  </header>
</div>

  <div>
    <div class="container">
      <span onclick="this.parentElement.style.display='none'" class="closebtn"></span>
      <img id="expandedImg">
    </div>
    <!-- The four columns -->
    <div class="row">
      <div class="column">
        <img src="./gundam12.png" alt="Nature" style="width:100%" onclick="myFunction(this);">
      </div>
      <div class="column">
        <img src="./gundam11.png" alt="Snow" style="width:100%" onclick="myFunction(this);">
      </div>
      <div class="column">
        <img src="./gundam13.png" alt="Mountains" style="width:100%" onclick="myFunction(this);">
      </div>
      <div class="column">
        <img src="./gundam14.png" alt="Lights" style="width:100%" onclick="myFunction(this);">
      </div>
    </div>


    
    <div class="detail">
      <h2 class="pro_detail">product detail</h2>
      <dl>
        <dt>product name</dt>
        <dd>GRADE NU Gundam</dd>

        <dt>series</dt>
        <dd> Char's Counterattack</dd>

        <dt>Category</dt>
        <dd>Gundam</dd>

        <dt>Manufacturer</dt>
        <dd>Bandai</dd>

        <dt>Release Date</dt>
        <dd>2022/04/07</dd>

        <dt>Specifications</dt>
        <dd>This is a posable, injection-plastic kit of a character or mobile suit<br>
         from the Gundam universe.</dd>
      </dl>
    </div>
    <div class="reminder">
      <ul>
        <li>
            Please note that the first release of this item may be limited.
        </li>
        <li>
          Please note that images shown may differ from the final product.
        </li>
        <li>
          Paintwork is done partially by hand and therefore final products may vary.
        </li>
      </ul>
      <!--&copy; 丸山くがね・KADOKAWA刊／オーバーロード製作委員会-->
    </div>
    
  </div>
  <section>
    <h1>Popular Product</h1>    
        <div class="popular-product">
          <div id="popular1">
            <img src="./albedo-3.jpg" id="org-image">
            <img src="./albedo-1.jpg" class="change-image">
            <a href="./albedo.php">albedo</a>
        </div>
        <div id="popular1">
          <img src="./rin-1.webp" id="org-image">
          <img src="./rin-3.webp" class="change-image">
          <a href="./rin.php">Kagamine rin</a>
      </div>
            <div id="popular1">
                <img src="./len-1.webp" id="org-image">
                <img src="./rin-3.webp" class="change-image">
                <a href="./len.php">Kagamine len</a>
            </div>
            
            <div id="popular1">
                <img src="./gundam2.1.png" id="org-image">
                <img src="./gundam2.2.png" class="change-image">
                <a href="./gundam2.php">PG 00 Gundam Seven Sword/G</a>
            </div>
            <div id="popular1">
                <img src="./gundam3.2.jpg" id="org-image">
                <img src="./gundam3.1.jpg" class="change-image">
                <a href="./gundam3.php">ENTRY GRADE Strike Gundam/a>
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
  <script>
    function myFunction(imgs) {
      var expandImg = document.getElementById("expandedImg");
      expandImg.src = imgs.src;
      expandImg.parentElement.style.display = "block";
    }
  </script>


</body>

</html>