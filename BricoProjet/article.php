<?php
    session_start();
    require('actions/emplois/showArticleContentAction.php');
    require('actions/emplois/postanswerAction.php');
    require('actions/emplois/showAllAnswersOfEmploiAction.php');
    require('actions/users/showOneusersProfileAction.php');
    
    require('class/Vote.php');
    $userinfos = $bdd->prepare("SELECT id, image FROM user WHERE id = $emploi_id");
    $userinfos->execute(array());
    $user = $userinfos->fetch();
            $imagee = $user["image"];
    $vote = false;
    if (isset($_SESSION['id'])){
        $req = $bdd->prepare('SELECT *  FROM votes WHERE ref=? AND ref_id=? AND user_id=?');
        $req->execute(array('emplois',$_GET['id'],$_SESSION['id']));
        $vote=$req->fetch();       
    }
    $vote2 = new Vote($bdd);
    $vote2->updateCount('emplois',$_GET['id']);


?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!--=============== CSS ===============-->
        
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="style-like.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="stylemenu.css">
        <link rel="stylesheet" href="stylelog.css">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
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
                        
                        
                        <?php
                        if(isset($_SESSION['auth'])){                            
                            $image =$_SESSION['image'];
                            ?>
                        <div class="action">
                            <div class="profile" onclick="menuToggle();">
                                <img src="img/<?php echo $image;?>" alt="">
                            </div>
                            <div class="menu">
                                <h3><?= $_SESSION['firstname'];?> <?= $_SESSION['lastname']; ?><br><span><?= $_SESSION['status'] ?></span></h3>
                                <ul>
                                    <li><img src="user.png" alt=""><a href="profile.php?id=<?= $_SESSION['id']; ?> ">My Profile</a></li>
                                    <li><img src="paper-plane.png" alt=""><a href="publieremploi.php">Publish</a></li>
                                    <li><img src="envelope.png" alt=""><a href="">Inbox</a></li>
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
   <!--=============== article ===============-->
   <section class="services section container">
       <?php

        // if(isset($errorMsg)){
        //     echo $errorMsg;
        // }
        if(isset($emploi_date)){
            ?>
        <div class="services__container grid">
            <div class="services__data">
                <h3 class="services__subtitle"><?= $emploi_title;?></h3>
                <img src="imgOffer/<?= $emploi_image; ?>" alt="">

                <div class="vote <?=Vote::getClass($vote);?>" id="vote" data-ref="emplois" data-ref_id="<?=$_GET['id'];?>" data-user_id="<?=$_SESSION['id'];?>">
                    <div class="vote_bar">
                        <div class="vote_progress" style="width:<?= ( $like +  $dislike )==0 ? 100 :round( 100*($like /($like +  $dislike  ))); ?>%;"></div>
                    </div>
                    <div class="vote_btns">
                        <button class="vote_btn vote_like"><i class="far fa-solid fa-thumbs-up" style="font-size: 20px;"></i><span id="like_count" style=" font-size:16px;"><?= $like?></span></button>
                        <button class="vote_btn vote_dislike"><i class="far fa-solid fa-thumbs-down" style="font-size: 20px;"></i><span id="dislike_count" style=" font-size:16px;"><?= $dislike ?></span></button>
                        <button class="vote_btn a1"><i class="far fa-comment" style="font-size: 20px;"></i><span id="like_count" style=" font-size:16px;"><?= $like?></span></button>
                        <button class="vote_btn a1"><i class="fa fa-share" style="font-size: 20px;"></i><span id="like_count" style=" font-size:16px;">0</span></button>
                    </div>
                </div>
            </div>

            <div class="services__data">
                <h3 class="services__subtitle">Discription:</h3>
                <p class="services__description"><?= $emploi_discription;?></p>  
                <h3 class="services__subtitle">Content:</h3>
                <p class="services__description"><?= $emploi_content;?></p>
             </div>
             <div class="services__data">
                <?php if(isset($_SESSION['auth'])){
                    ?>
                       Publish By <a href="profile.php?id=<?= $emploisInfos['id_auteur']; ?>" class="button button-link"><?= $emploi_nom . ' ' . $emploi_prenom;?></a>
                      <div class="profile">
                          <img src="img/<?php echo $imagee;?>"  title ="<?php echo $imagee; ?>" style="width: 60px; height: 60px; border-radius: 50%;">
                      </div> 
                       <p><?=$emploi_email?></p>
                        On <?= $emploi_date;
                        }if(!isset($_SESSION['auth'])){
                    ?>
                         Publish By <a href="login.php" class="button button-link"><?= $emploi_nom . ' ' . $emploi_prenom;?></a>
                         On <?= $emploi_date;
                        }
                    ?>
             </div>
        </div>
            <form action="#" method="POST" class="typing-area">
                <input type="text" name="answer" class="input-field" placeholder="Type a message here..." autocomplete="off">
                <button type="submit" name="validate"><i class="fab fa-telegram-plane"></i></button>
            </form>
                <?php
                    while($answer = $getAllAnswersOfEmploi->fetch()){
                        ?>
                        <div class="llcomment">
                            <div class="kk">
                                <a href="profile.php?id=<?= $answer['id_auteur']; ?>" class="button button-link"><?= $answer['nom_auteur'];?> <?= $answer['prenom_auteur'];?></a>
                                <br>
                                <p><?= $answer['content'];?></p>
                            </div>
                        </div>
                        <br>
                        <?php
                    } }
?>
</section>
    
                            


               
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

            <p class="footer__copy">&#169; BRICO. All right reserved</p>
        </footer>

        <!--=============== SCROLL UP ===============-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class='bx bx-up-arrow-alt scrollup__icon'></i>
        </a>

        <!--=============== MAIN JS ===============-->
        <script src="app.js"></script>
        <script src="javascript/chat.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="apps.js"></script>
    </body>
</html>