<?php
require_once 'databaseinfo.php';
session_start();
$userId = $_SESSION['id'];
if (isset($_POST['cancel_profile'])) {
    header('location:user_profile.php');
}

if (isset($_POST['update_profile'])) {

    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
    $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);

    mysqli_query($conn, "UPDATE user_profile SET UserName = '$update_name', Email = '$update_email', Address = '$update_address' WHERE id = '$userId'") or die('query failed');

    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($conn, sha1($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($conn, sha1($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn, sha1($_POST['confirm_pass']));

    if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
        if ($update_pass != $old_pass) {
            $message[] = 'Old password not matched!';
        } elseif ($new_pass != $confirm_pass) {
            $message[] = 'Confirm password not matched!';
        } else {
            mysqli_query($conn, "UPDATE user_profile SET Password = '$confirm_pass' WHERE id = '$userId'") or die('query failed');
        }
    }

    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploadimage/' . $update_image;

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'image is too large';
        } else {
            $image_update_query = mysqli_query($conn, "UPDATE user_profile SET image = '$update_image' WHERE id = '$userId'") or die('query failed');
            if ($image_update_query) {
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
                $message[] = 'Image Updated Successfully';
            }
        }
    }
}

?>
<!DOCTYPE <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <script src="https://kit.fontawesome.com/966c187d0b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./index.css">
    <style>
        .btn {
            margin-top: 10px;
            font-size: 15px;
            font-weight: normal;
            display: block;
            width: 100%;
            margin: auto;
            cursor: pointer;
            border-radius: .5rem;
            margin-top: 1rem;
            font-size: 1.7rem;
            padding: 1rem 3rem;
            background: white;
            color: black;
            text-align: center;
        }

        .btn:hover {
            background: black;
            color: white;
        }

        .user {
            color: white;
        }

        .update-profile {
            min-height: 100vh;
            background-color: var(--light-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .update-profile form {
            padding: 20px;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            text-align: center;
            width: 700px;
            text-align: center;
            border-radius: 5px;
        }

        .update-profile form img {
            height: 250px;
            width: 250px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 5px;
        }

        .update-profile form .flex {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 15px;
        }

        .update-profile form .flex .inputBox {
            width: 49%;
        }

        .update-profile form .flex .inputBox span {
            text-align: left;
            display: block;
            margin-top: 15px;
            font-size: 17px;
            color: var(--black);
        }

        .update-profile form .flex .inputBox .box {
            width: 100%;
            border-radius: 5px;
            background-color: var(--light-bg);
            padding: 12px 14px;
            font-size: 17px;
            color: var(--black);
            margin-top: 10px;
        }

        .message {
            margin: 10px 0;
            width: 100%;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            background-color: var(--red);
            color: var(--white);
            font-size: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        @media (max-width:650px) {
            .update-profile form .flex {
                flex-wrap: wrap;
                gap: 0;
            }

            .update-profile form .flex .inputBox {
                width: 100%;
            }
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

    <!-- /**
* ! Update Profile 
**/ -->
    <div class="update-profile">

        <?php
        $select = mysqli_query($conn, "SELECT * FROM user_profile WHERE id = '$userId'") or die('query failed');
        if (mysqli_num_rows($select) > 0) {
            $fetch = mysqli_fetch_assoc($select);
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <?php
            if ($fetch['image'] == '') {
                echo '<img src="AvatarImage/default-avatar.png">';
            } else {
                echo '<img src="uploadimage/' . $fetch['image'] . '">';
            }
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class="message">' . $message . '</div>';
                }
            }
            ?>
            <div class="flex">
                <div class="inputBox">
                    <span>username :</span>
                    <input type="text" name="update_name" value="<?php echo $fetch['UserName']; ?>">
                    <span>your email :</span>
                    <input type="email" name="update_email" value="<?php echo $fetch['Email']; ?>">
                    <span>update your pic :</span>
                    <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png">
                    <span>Address</span>
                    <input type="text" name="update_address" value="<?php echo $fetch['Address']; ?>">
                </div>
                <div class="inputBox">
                    <input type="hidden" name="old_pass" value="<?php echo $fetch['Password']; ?>">
                    <span>old password :</span>
                    <input type="password" name="update_pass" placeholder="enter previous password">
                    <span>new password :</span>
                    <input type="password" name="new_pass" placeholder="enter new password">
                    <span>confirm password :</span>
                    <input type="password" name="confirm_pass" placeholder="confirm new password">
                </div>
            </div>
            <input type="submit" value="Update Profile" name="update_profile" class="btn">
            <input type="submit" value="Go Back" name="cancel_profile" class="btn">
        </form>

    </div>

    <footer>
        <div>
            <ul class="icon2">
                <li><a href="https://www.facebook.com"><i class="fa-brands fa-lg fa-facebook-f"></i></a></i></li>
                <li><a href="https://www.twitter.com"><i class="fa-brands fa-lg fa-twitter"></i></a></li>
                <li><a href="https://www.instagram.com"><i class="fa-brands fa-lg fa-instagram"></i></a></li>
            </ul>
        </div>
        <a href="#" id="copyright">&copy; Anime Club</a>
    </footer>
    <script src="./cart.js"></script>
</body>

</html>