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
                <li><a href="#"><i class="fa-solid fa-lg fa-bag-shopping cart"></i></a></li>
                <li><a href="#"><button id="register">Log in</button></a></li>
                <li><a href="#"><button id="register">Create Account</button></a></li>
            </ul>
        </div>
    </section>
    <header class="header">
      <a href="index.php"><img src="./SiteLogo.png" width="100px" alt=""></a>
      <div>
          <ul id="navbar">
              <li><i id="back" class="fa-solid fa-angle-left"></i></li>
              <li><a href="index.php" >Home</a></li>
              <li><a href="animefig.php" class="active">Anime Figure</a>
                  
              </li>
              <li><a href="#">Gundam Models</a>
                  
              </li>
              <li><a href="#">About Us</a>
                  
              </li>
              <li><a href="#">Contact US</a>
                  
              </li>
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
        <img src="./rin-1.webp" alt="Nature" style="width:100%" onclick="myFunction(this);">
      </div>
      <div class="column">
        <img src="./rin-2.webp" alt="Snow" style="width:100%" onclick="myFunction(this);">
      </div>
      <div class="column">
        <img src="./rin-3.webp" alt="Mountains" style="width:100%" onclick="myFunction(this);">
      </div>
      <div class="column">
        <img src="./rin-4.webp" alt="Lights" style="width:100%" onclick="myFunction(this);">
      </div>
    </div>


    
    <div class="detail">
      <h2 class="pro_detail">product detail</h2>
      <dl>
        <dt>product name</dt>
        <dd>Nendoroid Kagamine Rin: Harvest Moon Ver.</dd>

        <dt>series</dt>
        <dd>Character Vocal Series 02: Kagamine Rin/Len</dd>

        <dt>Category</dt>
        <dd>Nendoroid</dd>

        <dt>Manufacturer</dt>
        <dd>Good Smile Company</dd>

        <dt>Release Date</dt>
        <dd>2023/01</dd>

        <dt>Specifications</dt>
        <dd>Painted plastic non-scale articulated figure with stand included.<br>
         Approximately 100mm in height.</dd>
      </dl>
    </div>
    <div class="reminder">
      <ul>
        <li>
          This product does not balance on its own. Please use the included stand.
        </li>
        <li>
          Please note that images shown may differ from the final product.
        </li>
        <li>
          Paintwork is done partially by hand and therefore final products may vary.
        </li>
      </ul>
      Art by Rella &copy; Crypton Future Media, INC. www.piapro.net
    </div>
    
  </div>
  <section>
    <h1>Popular Product</h1>    
        <div class="popular-product">
            <div id="popular1">
                <img src="./len-1.webp" id="org-image">
                <img src="./rin-3.webp" class="change-image">
                <a href="./len.php">Kagamine len</a>
            </div>
            <div id="popular1">
                <img src="./albedo-3.jpg" id="org-image">
                <img src="./albedo-1.jpg" class="change-image">
                <a href="./albedo.php">albedo</a>
            </div>
            <div id="popular1">
                <img src="./gundam1.2.png" id="org-image">
                <img src="./gundam1.1.png" class="change-image">
                <a href="./gundam.php">GRADE NU Gundam</a>
            </div>
            <div id="popular1">
              <img src="./gundam2.1.png" id="org-image">
              <img src="./gundam2.2.png" class="change-image">
              <a href="./gundam2.php">PG 00 Gundam Seven Sword/G</a>
          </div>
            <div id="popular1">
                <img src="./gundam3.2.jpg" id="org-image">
                <img src="./gundam3.1.jpg" class="change-image">
                <a href="./gundam3.php">ENTRY GRADE Strike Gundam</a>
            </div>
        </div>
    </section>
  
  <footer>
    <div>
        <ul class="icon2">
            <li><a href="#"><i class="fa-brands fa-lg fa-facebook-f"></i></a></i></li>
            <li><a href="#"><i class="fa-brands fa-lg fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-lg fa-instagram"></i></a></li>
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