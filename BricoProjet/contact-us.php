<?php
if(isset($_POST['mailform']))
{
	if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']) AND !empty($_POST['phone']))
	{
        $user_email = htmlspecialchars($_POST['mail']);
        $user_phone = htmlspecialchars($_POST['phone']);
        if (filter_var($user_email,FILTER_VALIDATE_EMAIL)){
            $header="MIME-Version: 1.0\r\n";
            $header.='From:"PrimFx.com"<support@primfx.com>'."\n";
            $header.='Content-Type:text/html; charset="uft-8"'."\n";
            $header.='Content-Transfer-Encoding: 8bit';

            $message='
            <html>
                <body>
                    <div align="center">
                        <u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
                        <u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
                        <u>Phone de l\'expéditeur :</u>'.$_POST['phone'].'<br />
                        <br />
                        '.nl2br($_POST['message']).'
                    </div>
                </body>
            </html>
            ';

            mail("koumali2310@gmail.com", "CONTACT - BRICO.com", $message, $header);
            header('Location: index.php');
        }else{
            $msg="Adresse mail invalide.";
        }
		
	}
	else
	{
		$msg="Tous les champs doivent être complétés !";
	}
}
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet"/>
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="stylelog.css">
        <link rel="stylesheet" href="stylemenu.css"> 
        <!-- <link rel="stylesheet" href="stylelog.css"> -->
                   
        <title>contact brico</title>
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
                        <li class="nav__item"><a href="index.php#contact" class="nav__link active-link">Contact us</a></li>
                        <i class='bx bx-toggle-left change-theme' id="theme-button"></i>
                    
                        <?php if(isset($_SESSION['auth'])){                            
                            $image =$_SESSION['image'];
                        ?>
                        <div class="action">
                            <div class="profile" onclick="menuToggle();">
                                <img src="img/<?php echo $image;?>" alt="">
                            </div>
                            <div class="menu">
                                <h3><?= $_SESSION['firstname'];?> <?= $_SESSION['lastname']; ?><br><span><?= $_SESSION['status'] ?></span></h3>
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
                            }
                        </script>
                    </ul>
                  </div>
                <?php
                }
                if(!isset($_SESSION['auth'])){
                            ?>
                                <a href="login.php" class="button button__header">Login</a>
                                <a href="singnup.php" class="button button__header">Sign Up</a>
                            <?php
                            }
                            ?>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div> 
                </nav>
        </header>
<!-- ===================================== -->
<div class="wrapper">
    <section class="form login">
      <header>Contactez-nous</header>
      <form method="POST">
          <?php
              if(isset($msg)){?>
              <div class="error-text">
                <?php echo $msg;?>
              </div>
              <?php
              }
          ?>
            
            <div class="field input">
              <label><i class="fas fa-user"></i>First Name</label>
              <input type="text" name="nom" placeholder="Your name" autocomplete="off" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>">
            </div>
            <div class="field input">
              <label><i class="fas fa-envelope"></i>Votre adresse E-mail</label>
              <input type="email" name="mail" placeholder="Your Email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>">
            </div>
            <div class="field input">
              <label><i class="fas fa-mobile"></i>Votre téléphone</label>
              <input type="text" name="phone" autocomplete="off" placeholder="Your phone" value="<?php if(isset($_POST['phone'])) { echo $_POST['phone']; } ?>">
            </div>
            <div class="field textarea2">
                <label>Message</label>
                <textarea name="message" placeholder="Saisissez ici..."><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea>
            </div>
            <div class="field buttonn">
              <input type="submit" name="mailform" value="Envoyer le message">
            </div>
      </form>
    </sectin>
  </div>
  <br><br><br><br><br><br><br><br>
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