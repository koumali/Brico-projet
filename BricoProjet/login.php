<?php 
    require('actions/users/loginAction.php');
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!--=============== CSS ===============-->
        <link href="https://fonts.googleapis.com/css?family=Poppins:6008display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
                <link rel="stylesheet" href="style.css">
                <link rel="stylesheet" href="stylelog.css">
                <!-- <link rel="stylesheet" href=".css"> -->
        <title>bricole</title>
    </head>
    <body>
        <!--=============== HEADER ===============-->
        <header class="header" id="header">
            <nav class="nav container">
            <a href="index.php" class="nav__logo"><img class="iiiii" src="idea.png" alt="brico">Brico</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="index.php" class="nav__link">Home</a></li>
                        <li class="nav__item"><a href="index.php#services" class="nav__link">Services</a></li>
                        <li class="nav__item"><a href="index.php#about" class="nav__link">About Us</a> </li>
                        <li class="nav__item"><a href="index.php#contact" class="nav__link">Contact us</a></li>
                        <i class='bx bx-toggle-left change-theme' id="theme-button"></i>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>
                <a href="singnup.php" class="button button__header">Sing Up</a>
            </nav>
        </header>
        <main class="main">
<!--=============== new ===============-->
        <!-- <section class="home section" id="home">
        <div class="home__container container grid">
            <form method="POST">
                    <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
                    <div class="corps-formulaire"> 
                        <div class="gauche">
                            <div class="logoL">
                                <img  src="face.png" alt="">
                            </div>
                            <div class="titreL">
                                <h1 class="titleL">Se connecter à Brico</h1>
                            </div>
                            <div class="separationL"></div>
                            <div class="boiteL">
                                <input class="input" type="email" placeholder="Email" name="email">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="boiteL">
                                <input class="input" type="password" placeholder="Mot de passe" name="password">
                                <i class="fas fa-lock"></i>
                            </div>
                </form>
            <button class="buttonn" type="submit" name="validate">Se connecter</button>
                        <div class="linkL">
                        <p>mot de passe oublier <a class="linkL" href="mdpoublier.php">Click içi</a></p>
                    <p>Si vous n'avez pas un compte <a class="linkL" href="singnup.php">Click içi</a></p>
                </div>
                </div>
            
                    </div>
                    <img src="11.png" alt="">
                </div> 
            </section> -->

            <div class="wrapper">
                <section class="form login">
                <div class="logoL">
                     <img  src="face.png" alt="">
                 </div>
                <header>Login to Your Account</header>
                <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                <?php if(isset($errorMsg)){?> <div class="error-text">
                        <?php echo '<p>'.$errorMsg.'</p>';?>
                    </div> 
                    <?php } ?>
                    <div class="field input">
                    <label><i class="fas fa-user"></i>Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email">
                    </div>
                    <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                    <i class="fas fa-eye"></i>
                    </div>
                    <div class="field buttonn">
                    <input type="submit" name="validate" value="Login">
                    </div>
                </form>
                <div class="link"><a href="mdpoublier.php">Forgot your Password?</a></div>
                <div class="link">Don't Have an account? <a href="singnup.php">Signup now</a></div>
                
               
            </section>
            </div>
            
            <br>
<br><br><br><br>
<br><br><br>        
<br>
<br><br><br>

    <!--=============== FOOTER ===============-->
        <footer class="footer section">
            <div class="footer__container container grid">
                <div class="footer__content">
                    <a href="#" class="footer__logo">Delivery</a>
                    <p class="footer__description">Order Products Faster <br> Easier</p>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Our Services</h3>
                    <ul class="footer__links">
                        <li><a href="#" class="footer__link">Pricing </a></li>
                        <li><a href="#" class="footer__link">Discounts</a></li>
                        <li><a href="#" class="footer__link">Report a bug</a></li>
                        <li><a href="#" class="footer__link">Terms of Service</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Our Company</h3>
                    <ul class="footer__links">
                        <li><a href="#" class="footer__link">Blog</a></li>
                        <li><a href="#" class="footer__link">Our mision</a></li>
                        <li><a href="#" class="footer__link">Get in touch</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Community</h3>
                    <ul class="footer__links">
                        <li><a href="#" class="footer__link">Support</a></li>
                        <li><a href="#" class="footer__link">Questions</a></li>
                        <li><a href="#" class="footer__link">Customer help</a></li>
                    </ul>
                </div>

                <div class="footer__social">
                    <a href="#" class="footer__social-link"><i class='bx bxl-facebook-circle '></i></a>
                    <a href="#" class="footer__social-link"><i class='bx bxl-twitter'></i></a>
                    <a href="#" class="footer__social-link"><i class='bx bxl-instagram-alt'></i></a>
                </div>
            </div>

            <p class="footer__copy">&#169; Bricocode. All right reserved</p>
        </footer>

        <!--=============== SCROLL UP ===============-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class='bx bx-up-arrow-alt scrollup__icon'></i>
        </a>

        <!--=============== MAIN JS ===============-->
        <script src="app.js"></script>



    <style>
.logoL{
    display: block;

    text-align: center;
    padding: 0;
    margin: 0;
}
.logoL img{
    width: 60px;
    height: 60px;
    border: 2px solid black;
    border-radius: 50%;
}

        </style>
    </body>
</html>