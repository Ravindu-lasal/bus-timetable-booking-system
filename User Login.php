<!DOCTYPE html>

<head>
    <title>User Login/Sigin</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/User Login Style.css" />
    <script src="./assets/js/Ulogin.js"></script>

</head>

<body>

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <img class="backimg" src="assets/img/hero-bg1.jpg" alt="" data-aos="fade-in">

        <!------------------- 
            sign up form 
            ------------------->

        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form method="post" action="include/signup.inc.php">
                    <h1>Create Account</h1>
                    <div class="social-media-icon">
                        <ul class="sci">
                            <li class="fb">
                                <a href="#"><img src="./assets/img/Icon/FB.gif" alt=""></a>
                            </li>
                            <li class="google">
                                <a href="#"><img src="./assets/img/Icon/G.png" alt=""></i></a>
                            </li>
                            <li class="gest">
                                <a href="#"><img src="./assets/img/Icon/Gest.gif" alt=""></i></a>
                            </li>
                        </ul>
                    </div>
                    <span>or use your email for registration</span>
                    <input type="text" placeholder="User Name" name="name" id="Uname" required="true" />
                    <input type="email" placeholder="Email" name="email" id="Email" required="true" />
                    <input type="password" placeholder="Password" name="pwd" id="Password" required="true" />
                    <button type="submit" name="signup">Sign Up</button>
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "invalidUid") {
                            echo '<h5 style="color:red;padding-top:10px;">Invalid users name</h5>';
                        } elseif ($_GET["error"] == "invalidEmail") {
                            echo '<h5 style="color:red;padding-top:10px;">invalid users email</h5>';
                        } elseif ($_GET["error"] == "usernameoremailtaken") {
                            echo '<h5 style="color:red;padding-top:10px;">username or email is already taken</h5>';
                        } elseif ($_GET["error"] == "stmtfailed") {
                            echo '<h5 style="color:red;padding-top:10px;">something went wrong</h5>';
                        } 
                    }


                    ?>
                </form>
            </div>


            <!------------------- 
            sign in form 
            ------------------->
            <div class="form-container sign-in-container">
                <form method="post" action="include/login.inc.php">
                    <h1>Sign in</h1>
                    <div class="social-media-icon">
                        <ul class="sci">
                            <li class="gest">
                                <a href="#"><img src="./assets/img/Icon/Gest.gif" alt=""></a>
                            </li>
                            <li class="google">
                                <a href="#"><img src="./assets/img/Icon/G.png" alt=""></i></a>
                            </li>
                            <li class="fb">
                                <a href="#"><img src="./assets/img/Icon/FB.gif" alt=""></i></a>
                            </li>
                        </ul>
                    </div>
                    <span>or use your account</span>
                    <input type="text" name="uid" placeholder="Email/user name" />
                    <input type="password" name="pwd" placeholder="Password" />
                    <a href="#">Forgot your password?</a>

                    <?php
                    // Error handling messages
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "wrongpassword") {
                            echo '<h5 style="color:red;padding-bottom:10px;">Password is wrong</h5>';
                        } elseif ($_GET["error"] == "emptyinput") {
                            echo '<h5 style="color:red;padding-bottom:10px;">Please fill out the form</h5>';
                        } elseif ($_GET["error"] == "wrongusernameoremail") {
                            echo '<h5 style="color:red;padding-bottom:10px;">Wrong username or email</h5>';
                        } elseif ($_GET["error"] == "stmtfailed") {
                            echo '<h5 style="color:red;padding-bottom:10px;">Something went wrong</h5>';
                        }
                    }

                    // Check if 'created' is set and handle it separately
                    if (isset($_GET["created"]) && $_GET["created"] == "none") {
                        echo '<h5 style="color:green;padding-bottom:10px;">Account created,check your email</h5>';
                    }
                    ?>


                    <button type="submit" name="signin">Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Hello!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost" id="signIn">Sign In</button>
                        <h4>or</h4>
                        <button class="ghost" id="signIn"><a class="bhome" href="./index.php">back to home</a></button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Welcome Back !</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                        <h4>or</h4>
                        <button class="ghost" id="signIn"><a class="bhome" href="./index.php">back to home</a></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Hero Section -->






    <footer>
        <div class="ftext">

        </div>
    </footer>

    <script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
    </script>
</body>