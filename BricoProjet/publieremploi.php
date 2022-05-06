<?php
    require ('actions/emplois/publieremploiAction.php');
    require ('actions/users/securityAction.php'); 
    ?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="publier.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="stylemenu.css">
        <link rel="stylesheet" href="stylelog.css">
        <title>Brico</title>
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
                    
                        <?php
                        if(isset($_SESSION['auth'])){                            
                            $image =$_SESSION['image'];
                            ?>
                        <div class="action">
                            <div class="profile" onclick="menuToggle();">
                                <img src="img/<?php echo $image;?>" alt="">
                            </div>
                            <div class="menu">
                                <h3><?= $_SESSION['firstname'];?> <?= $_SESSION['lastname']; ?><br><span>active now</span></h3>
                                <ul>
                                    <li><img src="user.png" alt=""><a href="profile.php?id=<?= $_SESSION['id']; ?> ">My Profile</a></li>
                                    <li><img src="paper-plane.png" alt=""><a href="publieremploi.php">Publish</a></li>
                                    <li><img src="envelope.png" alt=""><a href="users.php">Inbox</a></li>
                                    <li><img src="offer.png" alt=""><a href="mes-offres.php">My offres</a></li>
                                    <!-- <li><img src="settings.png" alt=""><a href="">Settings</a></li> -->
                                    <li><img src="log-out.png" alt=""><a href="actions/users/logoutAction.php">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                        <script>
                            function menuToggle(){
                                const toggleMenu = document.querySelector('.menu');
                                toggleMenu.classList.toggle('active')
                            }
                        </script>
                            </ul>
                        </div>
                <?php
                }
                ?>
                    
                    
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>
            </nav>
        </header>
        <main class="main">
   <!--=============== pub emploi ===============-->

<!-- <div>
   
            <?php
                if(isset($errorMsg)){
                    echo '<p>'.$errorMsg.'</p>';
                }elseif(isset($successMsg)){
                    echo '<p>'.$successMsg.'</p>';
                }

            ?>
        <form method="POST">
            
            <h1 class="text-center" align='center'>Publish a Job Offer</h1>
            <div class="separation"></div>
            <div class="corps-formulaire">
                <div class="gauche">
                    <div class="boite">
                        <label for="nom">Titre de l'emploi</label>
                        <input type="text" name="title"/>
                        <i class="fas fa-user-hard-hat"></i>
                    </div>                   
                    <div class="boite">
                         <label for="prenom">Description de l'emploi</label>
                        <textarea type="text" name="description"></textarea>
                    </div>
                    <div class="boite">
                        <label for="phone">Contenu de l'emploi</label>
                        <textarea type="text" name="content"></textarea>
                    </div>
                </div>
            </div>   
            <div class="pied">
                <button class="button" type="submit" name="validate">PUBLIER</button>
            </div>
        </form>
            </div> -->

            <div class="wrapper">
                <section class="form login">
                <header>Publish a Job Offer</header>
                <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?php if(isset($errorMsg)){?> <div class="error-text">
                        <?php echo '<p>'.$errorMsg.'</p>';?> 
                    </div> 
                    <?php }elseif(isset($successMsg)){?> <div class="success-text">
                        <?php echo '<p>'.$successMsg.'</p>';?> 
                    </div> 
                    <?php } ?>
                    <div class="field input">
                    <label>Title</label>
                    <input type="text" name="title" placeholder="Enter a title of your Offer">
                    </div>

                    <div class="field textarea1">
                    <label>Description</label>
                    <textarea name="description" placeholder="Description of your offer"></textarea>
                    </div>

                    <div class="field textarea2">
                    <label>Contents</label>
                    <textarea name="content" placeholder="Contents of your offer" ></textarea>
                    </div>

                    <div class="field image">
                    <label>Select Image</label>
                    <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
                    </div>

                    <div class="field buttonn">
                    <input type="submit" name="validate" value="Publish">
                    </div>
                </form> 
            </section>
            </div>
            <br><br><br><br><br><br>
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