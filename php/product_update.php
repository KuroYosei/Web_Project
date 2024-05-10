<?php

require_once 'databaseinfo.php';

$id = $_GET['edit'];
$product_name = @$_POST['product_name'];
$product_price = @$_POST['product_price'];
$product_image1 = @$_FILES['product_image1']['name'];
$product_image2 = @$_FILES['product_image2']['name'];
$product_image3 = @$_FILES['product_image3']['name'];
$product_image4 = @$_FILES['product_image4']['name'];
$product_image_tmp_name = @$_FILES['product_image1']['product_image2']['product_image3']['product_image4']['tmp_name'];
$product_image_folder = 'uploadimage/' . $product_image1 . $product_image2 . $product_image3 . $product_image4;
$product_series = @$_POST['product_series'];
$product_category = @$_POST['product_category'];
$product_manufacturer = @$_POST['product_manufacturer'];
$product_specification = @$_POST['product_specification'];

if (isset($_POST['update_product'])) {

    if (empty($product_name) || empty($product_price) || empty($product_image)) {
        $message[] = 'please fill out all!';
    } else {

        $update_data = "UPDATE product SET productName='$product_name', productPrice='$product_price', productImage='$product_image1', productImage='$product_image2', productImage='$product_image3', productImage='$product_image4',seriesName='$product_series', categoryType='$product_category', manufacturerName='$product_manufacturer', specifications='$product_specification'  WHERE id = '$id'";
        $upload = mysqli_query($conn, $update_data);

        if ($upload) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            header('location:add_product.php');
        } else {
            $$message[] = 'please fill out all!';
        }
    }
};

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <script src="https://kit.fontawesome.com/966c187d0b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./index.css">
    <style>
        .product_upload_form.centered {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .product_upload {
            text-transform: capitalize;
        }

        .product_upload_form>form {
            max-width: 50rem;
            margin: 5rem auto;

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
    </style>
</head>

<body>
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
            <a href="index.html"><img src="./SiteLogo.png" width="100px" alt=""></a>
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
    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '<span class="message">' . $message . '</span>';
        }
    }
    ?>

    <div class="product_upload">


        <div class="product_upload_form">

            <?php

            $select = mysqli_query($conn, "SELECT * FROM product WHERE id = '$id'");
            while ($row = mysqli_fetch_assoc($select)) {

            ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <h3 class="title">update the product</h3>
                    <span>Product Name</span>
                    <input type="text" name="product_name" class="box" value="<?php echo $row['productName'] ?>">
                    <span>Product Price</span>
                    <input type="number" name="product_price" class="box" value="<?php echo $row['productPrice'] ?>">
                    <p>Choose Photo to Display</p>
                    <input type="file" accept="image/png, image/jpeg, image/jpg" id="image" name="product_image1" class="box">
                    <input type="file" accept="image/png, image/jpeg, image/jpg" id="image1" name="product_image2" class="box">
                    <input type="file" accept="image/png, image/jpeg, image/jpg" id="image" name="product_image3" class="box">
                    <input type="file" accept="image/png, image/jpeg, image/jpg" id="image1" name="product_image4" class="box">
                    <span>Product Series</span>
                    <input type="text" name="product_series" class="box" value="<?php echo $row['seriesName'] ?>">
                    <span>Product Category</span>
                    <input type="text" name="product_category" class="box" value="<?php echo $row['categoryType'] ?>">
                    <span>Product Manufacturer</span>
                    <input type="text" name="product_manufacturer" class="box" value="<?php echo $row['manufacturerName'] ?>">
                    <p>Release Date</p>
                    <input type="date" name="product_date" class="box" value="<?php echo $product_date ?>">
                    <span>Product Specification</span>
                    <input type="text" name="product_specification" class="box" value="<?php echo $row['specifications'] ?>">
                    <span>Product Reminder</span>
                    <input type="text" name="product_reminder" class="box" value="<?php echo $row['reminder'] ?>">
                    <input type="submit" value="Update Product" name="update_product" class="btn">
                    <a href="add_product.php" class="btn">Go Back!</a>
                </form>



            <?php }; ?>



        </div>

    </div>
    <script src="./cart.js"></script>
</body>

</html>