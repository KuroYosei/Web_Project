<?php
session_start();
require_once 'databaseinfo.php';
$fname = mysqli_real_escape_string($conn, @$_POST['fname']);
$lname = mysqli_real_escape_string($conn, @$_POST['lname']);
$alias = mysqli_real_escape_string($conn, @$_POST['alias']);
$email = mysqli_real_escape_string($conn, @$_POST['email']);
$profileImage = mysqli_real_escape_string($conn, @$_POST['profile_image']);
$haddress = mysqli_real_escape_string($conn, @$_POST['haddress']);
$pass = mysqli_real_escape_string($conn, sha1(@$_POST['psw1']));
$loginEmail = mysqli_real_escape_string($conn, @$_POST['mail']);
$loginPass = mysqli_real_escape_string($conn, sha1(@$_POST['pass']));


if (array_key_exists('register', $_POST)) {
    $select_alias = mysqli_query($conn, "SELECT * FROM user_profile WHERE UserName = '$alias'");
    $select_email = mysqli_query($conn, "SELECT * FROM user_profile WHERE Email = '$email'");

    if (mysqli_num_rows($select_alias) > 0) {
        @$message = "User Name Already Exist";
    } else if (mysqli_num_rows($select_email)) {
        @$message = "Email Already has An Account";
    } else {
    $sql_data = "INSERT INTO user_profile (FirstName, LastName, UserName, Email, Password, image, Address) VALUES ('$fname', '$lname', '$alias',  '$email', '$pass', '$profileImage', '$haddress')";
    if ($conn->query($sql_data) === true) {
    }}
}

if (array_key_exists('login', $_POST)) {
    $sql_check = "SELECT * FROM user_profile WHERE Email='$loginEmail' AND Password='$loginPass'";
    $result = $conn->query($sql_check);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $row['id'];
    if ($row['Email'] != $loginEmail && $row['Password'] != $loginPass) {
        header("Location: login.php");
    } else if ($row['Type'] == 'admin') {
        header("Location: user_profile.php");
    } else {
        header("location:user_profile.php");
    }
}
?>

<!DOCTYPE <!DOCTYPE html>
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
    <style>
        .user {
            color: white;
        }

        #fname,
        #psw1,
        .username,
        .email {
            width: 48%;
            position: absolute;
        }

        #lname,
        #haddress,
        #psw2,
        .image {
            width: 50%;
            margin-left: 140px;
        }

        .input-field {
            padding: 10px 0;
        }

        .errorMessage>p {
            text-align: center;
            color: red !important;
            font-size: 2vw;
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
    <div class="errorMessage">
        <p>
            <?php
            if (@$message != "") {
                echo $message;
            }
            ?></p>
    </div>
    <div class="full-page">
        <div id="login-form" class="login-page">
            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" onclick="login()" class="toggle-btn">Sign In</button>
                    <button type="button" onclick="register()" class="toggle-btn">Register</button>
                </div>
                <form id="login" class="input-group-login" method="post">
                    <input type="text" class="input-field" placeholder="Email" name="mail" required>
                    <input type="password" id="psw" class="input-field" placeholder="Password" name="pass" required>

                    <input type="checkbox" class="check-box"><span class="loginremember">Remember Me</span><br>
                    <a href="" class="forgot-password">Forgot Password?</a>
                    <button type="submit" class="submit-btn" name="login">Sign In</button>
                    <span id="signinlabel">Or Sign in using</span>
                    <div class="signinmethod">
                        <a href=""><i class=""></i></a>
                        <a href=""><i class=""></i></a>
                        <a href=""><i class=""></i></i></a>
                    </div>
                </form>
                <form id="register" class="input-group-register" method="post" name="registerform" onsubmit="return pswcheck()">
                    <input type="text" class="input-field fname" id="fname" placeholder="First Name" name="fname" required>
                    <input type="text" class="input-field lname" id="lname" placeholder="Last Name" name="lname" required>
                    <input type="text" class="input-field username" id="username" placeholder="User Name" name="alias" required>
                    <input type="text" class="input-field haddress" id="haddress" placeholder="Address" name="haddress" required>
                    <input type="email" class="input-field email" placeholder="Email" name="email" required>
                    <input type="file" class="input-field image" name="profile_image" id="profile_image" placeholder="Upload Profile" accept="image/jpg, image/jpeg, image/png">
                    <input type="password" class="input-field psw1" name="psw1" placeholder="Password" id="psw1" required>
                    <span id="pswerror"></span>
                    <input type="password" class="input-field psw2" name="psw2" placeholder="Confirm Password" id="psw2" required>
                    <span id="pswcheckerror" class="pswcheckerror"></span><br>
                    <input type="checkbox" class="check-box" required>
                    <span class="privacy">I accept the<a href="" id="privacy-policy"> Terms of Use</a> & <a href="" id="privacy-policy">Privacy Policy</a></span>
                    <button type="submit" class="submit-btn" name="register">Register</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        var x = document.getElementById('login');
        var y = document.getElementById('register');
        var z = document.getElementById('btn');

        function register() {
            x.style.left = "-450px";
            y.style.left = "50px";
            y.style.transition = "1s";
            z.style.left = "154px";
        }

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
        document.addEventListener('mouseup', function(e) {
            var searchResult = document.querySelector('.search_result');
            if (!searchResult.contains(e.target)) {
                searchResult.style.display = 'none';
            }
        });
    </script>
</body>

</html>