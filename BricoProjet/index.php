<?php
    session_start();
    // require('actions/users/securityAction.php');
    require('actions/emplois/showAllEmplois.php');

    
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
        <link rel="stylesheet" href="stylemenu.css">
        <link rel="stylesheet" href="stylelog.css">
        <link rel="stylesheet" href="stylesearch.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <title>bricole</title>
    </head>
    <body>
        <!--=============== HEADER ===============-->
        <header class="header" id="header">
            <nav class="nav container">
                
                <a href="index.php" class="nav__logo"><img class="iiiii" src="idea.png" alt="brico">Brico</a>
                
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="#home" class="nav__link active-link">Home</a></li>
                        <li class="nav__item"><a href="#services" class="nav__link">Services</a></li>        
                        <li class="nav__item"><a href="#about" class="nav__link">About Us</a> </li>
                        <li class="nav__item"><a href="#contact" class="nav__link">Contact us</a></li>
                        <i class='bx bx-toggle-left change-theme' id="theme-button"></i>
                    
                    <?php
                        if(isset($_SESSION['auth'])){                            
                            $image =$_SESSION['image'];
                        ?>
                        <div class="action">
                            <div class="profile" onclick="menuToggle();">
                                <img src="img/<?= $image;?>" alt="">
                            </div>
                            <div class="menu">
                                <h3><?= $_SESSION['firstname'];?> <?= $_SESSION['lastname']; ?><br><span><?= $_SESSION['status']; ?> </span></h3>
                                <ul>
                                    <li><img src="user.png"><a href="profile.php?id=<?= $_SESSION['id']; ?>">My Profile</a></li>
                                    <li><img src="paper-plane.png"><a href="publieremploi.php">Publish</a></li>
                                    <li><img src="envelope.png"><a href="users.php">Inbox</a></li>
                                    <li><img src="offer.png"><a href="mes-offres.php">My offres</a></li>
                                    <!-- <li><img src="settings.png" alt=""><a href="">Settings</a></li> -->
                                    <li><img src="log-out.png"><a href="actions/users/logoutAction.php">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                        <script>
                            function menuToggle(){
                                const toggleMenu = document.querySelector('.menu');
                                toggleMenu.classList.toggle('active')
                            
                                // $(document).on("click", function(event){
                                // if(!$(event.target).closest(".menu").length){
                                //     $(".menu").removeClass("active");
                                // });
                            }

                        </script>
                <?php }
                if(!isset($_SESSION['auth'])){
                            ?>
                                <a href="login.php" class="button button__header">Login</a>
                                <a href="singnup.php" class="button button__header">Sign Up</a>
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
        <!-- <main class="main"> -->
            <!--=============== HOME ===============-->
            <section class="home section" id="home">
            <div class="home__container container grid">
                    <div class="home__data">
                        <h1 class="home__title">
                         BRICO: Free Recruitment <br> Site in Morocco</h1>
                        <p class="home__description">BRICO is a recruitment site in Morocco dedicated to employment
                            <br>
                            An open and free social network for all job offers in Morocco</p>

                        <a href="login.php" class="button">Get Started</a>

                    </div>
                    <img src="person2.png" id="imagechange">
                </div>
                <!-- <script type="text/javascript">
                    let image = document.getElementById('imagechange');
                    let images = ['person2.png','face.png','person3.png','person4.png']
                    setInterval(function(){
                        let random = Math.floor(Math.random() * 4);
                        image.src = images[random];
                    }, 800);
                </script> -->
            </section>
    <!--=============== SERVICES ===============-->
                <section class="services section container" id="services">
                    
                <h2 class="section__title">Some Services We <br> Offer</h2>
                
                <section class="form signup">

                    
                        

                    <form method='GET'>
                                <div class="containersearch">
                                <div class="formsearch-groupsearch">
                                    <div class="dropdownsearch">
                                        <div class="defaultsearch-optionsearch">Category</div>
                                        <div class="dropdownsearch-listsearch">
                                            <ul><i class="fa-light fa-circle-info"></i>
                                                <li><i class="fas fa-wrench">&nbsp;</i>All</li>
                                                <li><i class="fas fa-heart">&nbsp;</i>Offre</li>
                                                <li><i class="fas fa-lightbulb">&nbsp;</i>Projet</li>
                                                <li><i class="fas fa-info">&nbsp;</i>Assistance</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="search">
                                        <input name="search" type="text" class="search-input" placeholder="Enter name to search...">
                                    </div>
                                    <button class="btnsearch" type="submit" ><i class="fas fa-search"></i></button>
                                </div>
                                </div>
                                
                    <!-- <div class="field input">
                        <label>Search:
                            <i class="fas fa-search"><button type="submit" style="display:none"></button></i>                               
                        </label>
                        <input name="search" placeholder="Enter name to search...">
                    </div>  -->
                </form>
                <p class="dawsearch"><span>Top searches:</span>  stage, work, emploi, offre, bricole</p>
                <br><br>
                <br><br>
                <br>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $(".defaultsearch-optionsearch").click(function(){
                            $(".dropdownsearch-listsearch ul").toggleClass("active");
                        });
                        $(".dropdownsearch-listsearch ul li").click(function(){
                            var icon_text = $(this).text();
                            $(".defaultsearch-optionsearch").text(icon_text);
                            
                        });
                            $(document).on("click", function(event){
                                if(!$(event.target).closest(".dropdownsearch").length){
                                    $(".dropdownsearch-listsearch ul").removeClass("active");
                            }
                            });
                    });
                </script>
                
            </section> 
                <!-- 
                <section class="users">
                <div class="search">
                    <span class="text">Enter name to search...</span>
                    <input type="search" name="search" placeholder="Enter name to search...">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </div>
                </section>
            </div>
                    <br> -->
                <div class="services__container grid">
                       
                    <?php while ($emploi = $getAllEmploi->fetch()){
                            if(isset($_SESSION['auth'])){
                                ?>
                                <div class="services__data">
                                    <h3 class="services__subtitle"><a href="article.php?id=<?= $emploi['id']; ?>" class="button button-link"><?= $emploi['titre']; ?></a></h3>
                                    <img src="imgOffer/<?= $emploi['image']; ?>" alt="">
                                    <p class="services__description"><?=$emploi['description']; ?></p>
                                <div>
                                 Publier par <a href="profileacceder.php?id=<?= $emploi['id_auteur']; ?>" class="button button-link"><?= $emploi['nom_auteur']; ?> <?= $emploi['prenom_auteur'];?></a>
                                <?php
                                }
                                ?>
                            <?php
                            if(!isset($_SESSION['auth'])){
                            ?>   
                                <div class="services__data">
                                    <h3 class="services__subtitle"><a href="login.php" class="button button-link"><?= $emploi['titre']; ?></a></h3>
                                    <img src="imgOffer/<?= $emploi['image']; ?>" alt="">
                                    <p class="services__description"><?=$emploi['description']; ?></p>
                                <div>
                                 Publier par <a href="login.php" class="button button-link"><?= $emploi['nom_auteur']; ?> <?= $emploi['prenom_auteur'];?></a>
                                <?php
                                }
                                ?>
                              
                            </div>
                        </div>
                    
                        <!-- <div class="services__data">
                            <h3 class="services__subtitle">Find Your Product</h3>
                            <img src="2.png" alt="">
                            <p class="services__description">We offer sale of products through the Internet.</p>
                            <div>
                             <a href="#" class="button button-link"><?= $emploi['nom_auteur']; ?> <?= $emploi['prenom_auteur'];?></a>
                            </div>
                        </div>

                        <div class="services__data">
                            
                            <h3 class="services__subtitle">Product Received</h3>
                            <img src="3.png" alt="">
                            <p class="services__description">In our app you can see the delay time of your order.</p>
                            <div>
                                <a href="#" class="button button-link">Learn More</a>
                            </div>
                        </div> -->
                        <?php
                            }
                            ?>
                    </div>
                </section>
            <!--=============== ABOUT ===============-->
            <section class="about section container" id="about">
                <div class="about__container grid">
                    <img src="uy.png" alt="">
                    <div class="about__data">
                        <h2 class="section__title-center">Find Out A Little More <br> About Us</h2>
                        <p class="about__description">BRICO is a recruitment site in Morocco dedicated to employment
                        An open and free social network for all for job offers in Morocco
                        </p>
                    </div>
                    
                </div>
            </section>
            <!--=============== SECURITY ===============-->
            <section class="security section container">
                <div class="security__container grid">
                    <div class="security__data">
                        <h2 class="section__title-center">Your Safety Is <br> Important</h2>
                        <p class="security__description">When your order reaches you, we have the health safety protocols, 
                            so that you are protected from any disease. Watch the video of how the delivery is made.
                        </p>
                    </div>
                    <img src="5.png" alt="">
                </div>
            </section>
            <!--=============== APP ===============-->
            <section class="app section container">
                <div class="app__container grid">
                    <img src="6.png" alt="">
                    <div class="app__data">
                        <h2 class="section__title-center">Watch Your Delivery <br> At Any Time</h2>
                        <p class="app__description">With our app you can view the route of your order, from our local headquarters to the 
                            place where you are. Look for the app now!</p>
                        <div class="app__buttons">
                            <a href="#" class="button button-flex">
                                <i class='bx bxl-apple button__icon'></i> App Store
                            </a>
                            <a href="#" class="button button-flex">
                                <i class='bx bxl-play-store button__icon' ></i> Google Play
                            </a>
                        </div>
                    </div>

        
                </div>
            </section>

            <!--=============== CONTACT US ===============-->
            <section class="contact section container" id="contact">
                <div class="contact__container grid">
                    <div class="contact__content">
                        <h2 class="section__title-center">Contact Us From <br> Here</h2>
                        <p class="contact__description">You can contact us from here, you can write to us, 
                            call us or visit our service center, we will gladly assist you.</p>
                    </div>

                    <ul class="contact__content grid">
                        <li class="contact__address">Telephone: <span class="contact__information">+212 - 728 - 678 - 717</span></li>
                        <li class="contact__address">Email:  <span class="contact__information">brico2022@email.com</span></li>
                        <li class="contact__address">Location: <span class="contact__information">Safi - Morocco</span></li>
                    </ul>

                    <div class="contact__content">
                        <a href="contact-us.php" class="button">Contact Us</a>
                    </div>
                </div>
            </section>
        </main>

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
        <script src="javascript/users.js"></script>
    </body>
</html>