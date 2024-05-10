<?php
session_start();
include 'databaseinfo.php';
$userId = $_SESSION['id'];

if (isset($_POST['update_profile'])) {
    header('location:update_profile.php');
}
if (isset($_POST['add_product'])) {
    header('location:add_product.php');
}
if (isset($_POST["logout"])) {
    session_destroy();
    header("location:login.php");
}

if ($userId != 1) {
    echo "<style>.adminonly { display : none; }</style>";
}

if($userId == ""){
    header("location:login.php");
}

$sql_userData = "SELECT * FROM user_profile";
$result = $conn->query($sql_userData);
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
        .user {
            color: white;
        }

        h2 {
            margin-top: 2rem;
        }

        table {
            margin: auto;
            margin-top: 1rem;
            background-color: white;
        }
        tbody{
            display: block;
        }
        tr {
            padding: 1%;
            font-size: 1.5rem;
        }

        th {
            font-weight: normal;
            text-transform: uppercase;
        }

        td {
            /* width: 50px; */
            padding: 0 1rem;
        }

        .profile_container {
            min-height: 30vh;
            background-color: var(--light-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .profile_container .profile {
            padding: 20px;
            /* background-color: var(--white); */
            box-shadow: var(--box-shadow);
            text-align: center;
            width: 400px;
            border-radius: 5px;
        }

        .profile_container .profile img {
            height: 250px;
            width: 250px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 5px;
        }

        .profile_container .profile h3 {
            margin: 5px 0;
            font-size: 20px;
            color: var(--black);
        }

        .btn {
            font-size: 15px;
            font-weight: normal;
            display: block;
            width: 20%;
            margin: 2rem auto;
            cursor: pointer;
            border-radius: .5rem;
            margin-top: 1rem;
            font-size: 1.25rem;
            padding: .5rem .7rem;
            background: white;
            color: black;
            text-align: center;
        }

        .btn:hover {
            background: black;
            color: white;
        }

        .adminonly {
            overflow: auto;
        }

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
                    <div class="Search">
                        <form method="get" class="search" >
                            <li><input type="text" value="<?php if (isset($_GET['search'])) {
                                                                echo $_GET['search'];
                                                            } ?>" id="searchtxt" name="search"></li>
                            <li><input type="submit" value="Search" id="search"></li>
                        </form>
                        <li>
                            <div class="search_result">
                                <ul>
                                    <?php
                                    if (isset($_GET['search'])) {
                                        $search = $_GET['search'];
                                        $search_query = "SELECT * from product WHERE productName LIKE '%$search%'";
                                        $query = mysqli_query($conn, $search_query);
                                        if (mysqli_num_rows($query) > 0) {
                                            foreach ($query as $rows) {
                                    ?>
                                                <li><a href="detail.php?product_id=<?php echo $rows['id']; ?>"><?= $rows['productName']; ?></a></li>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <li>There is 0 result!</li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </div>
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


    <!--User Profile-->
    <section>
        <div class="userprofile">
            <div class="profile_container">
                <div class="profile">
                    <?php
                    $select = mysqli_query($conn, "SELECT * FROM user_profile WHERE id = $userId");
                    if (mysqli_num_rows($select) > 0) {
                        $fetch = mysqli_fetch_assoc($select);
                    }
                    if ($fetch['image'] == '') {
                        echo '<img src="AvatarImage/default-avatar.png">';
                    } else {
                        echo '<img src= "uploadimage/' . $fetch['image'] . '">';
                    }
                    ?>
                    <h3> User Name : <?php echo $fetch['UserName']; ?></h3>
                </div>
            </div>
            <?php
            echo "<table class='adminonly'>";
            echo "<tr>";
            echo "<th>id</th>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>User Name</th>";
            echo "<th>Email</th>";
            echo "<th>Password</th>";
            echo "<th>User Type</th>";
            echo "<th>Image</th>";
            echo "<th>Address</th>";
            echo "<tr>";
            while ($row = $result->fetch_row()) {
                foreach ($row as $value)
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                echo "</tr>\n";
            }
            echo "</table>\n";
            ?>
            <form method="post">
                <input type="submit" value="Want to Sell something?" name="add_product" class="btn">
                <input type="submit" value="Logout" name="logout" class="btn">
                <input type="submit" value="Update Profile" name="update_profile" class="btn">
            </form>
        </div>
    </section>


    <!-- <footer>
        <div>
            <ul class="icon2">
                <li><a href="https://www.facebook.com"><i class="fa-brands fa-lg fa-facebook-f"></i></a></i></li>
                <li><a href="https://www.twitter.com"><i class="fa-brands fa-lg fa-twitter"></i></a></li>
                <li><a href="https://www.instagram.com"><i class="fa-brands fa-lg fa-instagram"></i></a></li>
            </ul>
        </div>
        <a href="#" id="copyright">&copy; Anime Club</a>
    </footer> -->

    <script src="./cart.js"></script>
</body>

</html>