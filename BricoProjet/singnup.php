<?php 
    require ('actions/users/signupAction.php');
    ?> 
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="stylelog.css">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <!-- <link rel="stylesheet" href="form.css"> -->
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

                <a href="login.php" class="button button__header">Login</a>
            </nav>
        </header>
        <main class="main">
   <!--=============== sign up ===============-->
   
        <div class="wrapper">
                <section class="form signup">
                <header>Sign Up</header>
                <form method="POST" enctype="multipart/form-data" autocomplete="off">
                <?php if(isset($errorMsg)){?> <div class="error-text">
                        <?php echo '<p>'.$errorMsg.'</p>';?>
                    </div> 
                    <?php } ?>
                    <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="firstname" placeholder="First name" >
                        
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lastname" placeholder="Last name" >
                    </div>
                    </div>
                    <div class="field input">
                    <label><i class="fas fa-envelope"></i>Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email" >
                    </div>
                    <div class="name-details">
                    <div class="field input">
                        <label><i class="fas fa-phone"></i>Phone</label>
                        <input type="text" name="phone" placeholder="phone number" >
                    </div>
                    <div class="field input">
                        <label><i class="fas fa-user-hard-hat"></i>Job</label>
                        
                        <input type="text" name="job" placeholder="Enter your job" >
                    </div>
                    </div>
                    <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter new password">
            
                    </div>
                    <div class="field image">
                    <label>Select Image</label>
                    <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
                    </div>
                    <div class="field buttonn">
                    <input type="submit" name="validate" value="Sign Up">
                    </div>
                </form>
                <div class="link">Already signed up? <a href="login.php">Login now</a></div>
                </section>
            </div>

            <script src="javascript/pass-show-hide.js"></script>
            <script src="javascript/signup.js"></script>
            <br><br><br><br>
            <br><br><br>        
            <br>

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
    </body>
</html>