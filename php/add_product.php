<?php
session_start();
require_once 'databaseinfo.php';
$userId = $_SESSION['id'];

$product_name = @$_POST['product_name'];
$product_price = @$_POST['product_price'];
$product_type = @$_POST['product_type'];
$product_image1 = basename(@$_FILES['product_image1']['name']);
$product_image2 = basename(@$_FILES['product_image2']['name']);
$product_image3 = basename(@$_FILES['product_image3']['name']);
$product_image4 = basename(@$_FILES['product_image4']['name']);
$product_image_tmp_name1 = @$_FILES['product_image1']['tmp_name'];
$product_image_tmp_name2 = @$_FILES['product_image2']['tmp_name'];
$product_image_tmp_name3 = @$_FILES['product_image3']['tmp_name'];
$product_image_tmp_name4 = @$_FILES['product_image4']['tmp_name'];
$product_image_folder1 = './uploadimage/' . $product_image1;
$product_image_folder2 = './uploadimage/' . $product_image2;
$product_image_folder3 = './uploadimage/' . $product_image3;
$product_image_folder4 = './uploadimage/' . $product_image4;
$product_series = @$_POST['product_series'];
$product_category = @$_POST['product_category'];
$product_manufacturer = @$_POST['product_manufacturer'];
$product_date = date('Y-m-d', strtotime(@$_POST['product_date']));
$product_specification = @$_POST['product_specification'];
$product_reminder = @$_POST['product_reminder'];

$product_user_id = $userId;

if (array_key_exists('add_product', $_POST)) {
   if (empty($product_name) || empty($product_price) || empty($product_type) || empty($product_image1) || empty($product_image2) || empty($product_image3) || empty($product_image4) || empty($product_series) || empty($product_category)
   || empty($product_manufacturer)|| empty($product_date)|| empty($product_specification)|| empty($product_reminder)) {
      $message[] = 'please fill out all information';
   } else {
      $insert = "INSERT INTO product(productName, productPrice, productImage, productImage2, productImage3, productImage4, seriesName, categoryType, manufacturerName, releaseDate, specifications, reminder, productType, userId) VALUES('$product_name', '$product_price', '$product_image1', '$product_image2', '$product_image3', '$product_image4', '$product_series', '$product_category', '$product_manufacturer', '$product_date', '$product_specification', '$product_reminder', '$product_type', '$product_user_id')";
      if (mysqli_query($conn, $insert)) {
         move_uploaded_file($product_image_tmp_name1, $product_image_folder1);
         move_uploaded_file($product_image_tmp_name2, $product_image_folder2);
         move_uploaded_file($product_image_tmp_name3, $product_image_folder3);
         move_uploaded_file($product_image_tmp_name4, $product_image_folder4);
         $message[] = 'New Product Added Successfully';
      } else {
         $message[] = 'could not add the product';
      }
   }
};

if (isset($_GET['delete'])) {
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM product WHERE id = $id");
   // header('location:add_product.php');
};
if (isset($_POST['user_profile'])) {
   header('location:user_profile.php');
}
if ($userId != 1) {
   echo "<style>.adminonly { display : none; }</style>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sell Product</title>
   <script src="https://kit.fontawesome.com/966c187d0b.js" crossorigin="anonymous"></script>
   <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="./index.css">
   <style>
      h4 {
         font-size: 15px;
         color: #F2AA4CFF;
         font-weight: normal;
      }

      td>img {
         box-shadow: rgba(255, 255, 255, 0.4) 0px 8px 24px;
      }

      .display_table {
         box-shadow: rgba(255, 255, 255, 0.4) 0px 8px 24px;
         margin: auto;
         width: 90%;
         text-align: center;
         font-size:1.25vw;
      }
      h1{
         margin-top: 2rem;
      }
      th {
         font-size: 1.25vw;
      }

      td {
         color: #F2AA4CFF;
      }

      /* .product_display .display_table .btn:last-child {
         background: crimson;
         color: black;
      } */

      .message {
         display: block;
         background: var(--bg-color);
         padding: 1.5rem 1rem;
         font-size: 2rem;
         color: var(--black);
         margin-bottom: 2rem;
         text-align: center;
      }

      .product_upload {
         max-width: 1200px;
         padding: 2rem;
         margin: 0 auto;
         text-transform: capitalize;
      }

      .product_upload_form.centered {
         display: flex;
         align-items: center;
         justify-content: center;
         min-height: 100vh;

      }

      .product_upload_form>form {
         max-width: 50rem;
         margin: 0 auto;
         padding: 2rem;
         border-radius: .5rem;
         box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
      }

      .product_upload_form form h3 {
         text-transform: uppercase;
         color: #F2AA4CFF;
         margin-bottom: 1rem;
         text-align: center;
         font-size: 2.5rem;
      }

      .product_upload_form form .box {
         width: 100%;
         border-radius: .5rem;
         padding: 1rem;
         font-size: 1.25rem;
         margin: 1rem 0;
         background: var(--white);
         text-transform: none;
      }

      .btn {
         margin-top: 10px;
         font-size: 15px;
         font-weight: normal;
         display: block;
         width: 70%;
         margin: auto;
         cursor: pointer;
         border-radius: .5rem;
         margin-top: 1rem;
         font-size: 1rem;
         padding: 1rem;
         background: white;
         color: black;
         text-align: center;
         text-decoration: none;
      }

      .btn:hover {
         background: black;
         color: white;
      }

      p {
         font-size: 1.25vw;
         text-align: center;
         color: #F2AA4CFF;
      }

      #image {
         width: 20%;
         position: absolute;
      }

      #image1 {
         width: 50%;
         margin-left: 50%;
      }

      ::placeholder {
         color: black;
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


      /* .form_style {
         max-width: 50rem;
         margin: 0 auto;
      } */
   </style>
</head>

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
               <li><a href="index.php">Home</a></li>
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

   <div class="form_style">
      <?php
      if (isset($message)) {
         foreach ($message as $message) {
            echo '<span class="message">' . $message . '</span>';
         }
      }
      ?>
      <div class="product_upload">

         <div class="product_upload_form">

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
               <h3>add a new product</h3>
               <span>Product Name</span>
               <input type="text" name="product_name" class="box" value="<?php echo $product_name ?>">
               <span>Product Price</span>
               <input type="number" name="product_price" class="box" value="<?php echo $product_price ?>">
               <div class="adminonly">
                  <h4><input type="radio" id="animefiture" name="product_type" value="animefigure" value="<?php echo $product_type ?>"> : Anime Figure</h4>
                  <h4><input type="radio" id="gundam" name="product_type" value="gundam" value="<?php echo $product_type ?>"> : Gundam</h4>
               </div>
               <h4></span><input type="radio" id="user_product" name="product_type" value="other" value="<?php echo $product_type ?>"> : Other</h4>
               <p>Choose Photo to Display</p>
               <input type="file"  id="image" name="product_image1" class="box" >
               <input type="file"  id="image1" name="product_image2" class="box" >
               <input type="file"  id="image" name="product_image3" class="box" >
               <input type="file"  id="image1" name="product_image4" class="box" >
               <span>Product Series</span>
               <input type="text"  name="product_series" class="box" value="<?php echo $product_series ?>">
               <span>Product Category</span>
               <input type="text"  name="product_category" class="box" value="<?php echo $product_category ?>">
               <span>Product Manufacturer</span>
               <input type="text"  name="product_manufacturer" class="box" value="<?php echo $product_manufacturer ?>">
               <p>Release Date</p>
               <input type="date" name="product_date" class="box" value="<?php echo $product_date ?>">
               <span>Product Specification</span>
               <input type="text"  name="product_specification" class="box" value="<?php echo $product_specification ?>">
               <span>Product Reminder</span>
               <input type="text"  name="product_reminder" class="box" value="<?php echo $product_reminder ?>">
               <input type="submit" class="btn" name="add_product" value="Add Product">
               <input type="submit" class="btn" name="user_profile" value="Go Back">
            </form>
         </div>

         <div class="product_display">
            <h1>Products</h1>
            <table class="display_table">
               <thead>
                  <tr>
                     <th>Product</th>
                     <th>name</th>
                     <th>price</th>
                     <th>Type</th>
                  </tr>
               </thead>
               <?php if ($userId == 1) {
                  $select = mysqli_query($conn, "SELECT * FROM product");
                  while ($row = mysqli_fetch_assoc($select)) { ?>
                     <tr>
                        <td><img src="./uploadimage/<?php echo $row['productImage']; ?>" height="100" alt=""></td>
                        <td><?php echo $row['productName']; ?></td>
                        <td>$<?php echo $row['productPrice']; ?>/-</td>
                        <td><?php echo $row['productType'] ?></td>
                        <td id="action-btn">
                           <a href="product_update.php?edit=<?php echo $row['id']; ?>" class="btn edit-btn"> <i class="fas fa-edit"></i> edit </a>
                           <a href="add_product.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fa-solid fa-trash-can"></i>delete </a>
                        </td>
                     </tr>
                  <?php }
               } else if ($userId != 1) {
                  $select = mysqli_query($conn, "SELECT * FROM product WHERE productType = 'other'");
                  while ($row = mysqli_fetch_assoc($select)) { ?>
                     <tr>
                        <td><img src="./uploadimage/<?php echo $row['productImage']; ?>" height="100" alt=""></td>
                        <td><?php echo $row['productName']; ?></td>
                        <td>$<?php echo $row['productPrice']; ?>/-</td>
                        <td><?php echo $row['productType'] ?></td>
                        <td id="action-btn">
                           <a href="product_update.php?edit=<?php echo $row['id']; ?>" class="btn edit-btn"> <i class="fas fa-edit"></i> edit </a>
                           <a href="add_product.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
                        </td>
                     </tr>
               <?php }
               } ?>
            </table>
         </div>
      </div>
   </div>
   <footer>
      <div>
         <ul class="icon2">
            <li><a href="https://www.facebook.com"><i class="fa-brands fa-lg fa-facebook-f"></i></a></i></li>
            <li><a href="https://www.twitter.com"><i class="fa-brands fa-lg fa-twitter"></i></a></li>
            <li><a href="https://www.instagram.com"><i class="fa-brands fa-lg fa-instagram"></i></a></li>
         </ul>
      </div>
      <a href="index.php" id="copyright">&copy; Anime Club</a>
   </footer>
   <script src="./cart.js"></script>
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