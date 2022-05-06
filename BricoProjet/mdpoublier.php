<?php 
    require('actions/users/mdpoublierAction.php');
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
                        <li class="nav__item"><a href="index.php" class="nav__link active-link">Home</a></li>
                        <li class="nav__item"><a href="index.php#services" class="nav__link">Services</a></li>
                        <?php
                        if(isset($_SESSION['auth'])){
                            ?>                       
                        <li class="nav__item"><a href="publieremploi.php" class="nav__link">Publish</a> </li>
                        <li class="nav__item"><a href="mes-offres.php" class="nav__link">My Offers</a> </li>
                        <?php
                                }
                                ?>
                        <li class="nav__item"><a href="index.php#about" class="nav__link">About Us</a> </li>
                        <li class="nav__item"><a href="index.php#contact" class="nav__link">Contact us</a></li>
                        <?php
                        if(isset($_SESSION['auth'])){
                            ?>
                                <li class="nav__item"><a href="profile.php?id=<?= $_SESSION['id']; ?>">My Profile</a></li>
                                <li class="nav__item"><a href="actions/users/logoutAction.php">Logout</a></li>
                                <?php
                                }
                                ?>
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
<!--=============== mdpoublier ===============-->
       
<br><br>
<div class="wrapper">
                <section class="form login">   
        <?php if($section == 'code') { ?>
            <header>Enter the code</header>
                <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="success-text">
                Verification code has been sent to you by Email: <?= $_SESSION['recup_mail'] ?> 
                </div> 
                <?php if(isset($errorMsg)){?> <div class="error-text">
                        <?php echo '<p>'.$errorMsg.'</p>';?>
                    </div> 
                    <?php } ?>
                    <div class="field input">
                    <label><i class="fas fa-verif"></i>Code:</label>
                    <input type="text" name="verif-cade" placeholder="Code Verification">
                    </div>
                    
                    <div class="field buttonn">
                    <input type="submit" name="verif-submit" value="Next">
                    </div>
                </form>

                <?php }else if ($section=='changemdb'){?>
                
                    <header>Reset Password</header>
                <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                <?php if(isset($errorMsg)){?> <div class="error-text">
                        <?php echo '<p>'.$errorMsg.'</p>';?>
                    </div> 
                    <?php } ?>
                    <div class="field input">
                    <label> New Password</label>
                    <input type="password" name="change_mdb" placeholder="New password">
                    <i class="fas fa-eye"></i>
                    </div>
                    <div class="field input">
                    <label>Confirm Password</label>
                    <input type="password" name="change_mdbc" placeholder="Confirm password">
                    <i class="fas fa-eye"></i>
                    </div>
                    <div class="field buttonn">
                    <input type="submit" name="change_submit" value="Reset Password">
                    </div>
                </form>

            <?php }else{ ?>
                <div class="logoL">
                     <img  src="face.png" alt="">
                 </div>
                <header>Forgot Your Password</header>
                <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                <?php if(isset($errorMsg)){?> <div class="error-text">
                        <?php echo '<p>'.$errorMsg.'</p>';?>
                    </div> 
                    <?php } ?>
                    <div class="field input">
                    <label><i class="fas fa-user"></i>Email Address</label>
                    <input type="text" name="Email" placeholder="Enter your email">
                    </div>
                    <div class="field buttonn">
                    <input type="submit" name="validate" value="Next">
                    </div>
                </form>
                <div class="link">Don't Have an account? <a href="singnup.php">Sign up</a></div>

                <?php } ?>
                
                
            </section>
            </div>
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