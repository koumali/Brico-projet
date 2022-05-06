<?php
    session_start();
    require('actions/users/showOneusersProfileAction.php');

    // require 'connection.php';
    //$_SESSION["id"] = 1; user's session
    $sessionId = $_SESSION["id"];
    // $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id, nome ,image FROM user WHERE id = $sessionId"));

    $userinfos = $bdd->prepare("SELECT id, nome, image FROM user WHERE id = $sessionId");
    $userinfos->execute(array($user_nom, $user_image));
            
    $user = $userinfos->fetch();
            // authenification sur le  site et récuperer ses donnees dans des variables globales session
            $id = $user["id"];
            $name = $user["nome"];
            $imagee = $user["image"];
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--=============== BOXICONS ===============-->
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="stylep.css">
        <link rel="stylesheet" href="styleuplo.css">
        <link rel="stylesheet" href="stylemenu.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                                <img src="img/<?php echo $imagee;?>" alt="">
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
   <!--=============== mon profile ===============-->
    <br>
   <br>
   <br>
  <?php
        
        if(isset($errorMsg)){
        echo $errorMsg;
    }
    if(isset($getHisEmplois)){
        ?>
        
        <div class="containerP">
            <div class="card">
                <div class="headerP">
                    
                    <div class="hamburgerP-menuP">
                            <a href="#" ><div class="center"></div>
                        </a>
                    </div>
                    
                    <div class="main">
                            
                    
                    <form id="form" class="form" enctype="multipart/form-data" action="" method="post">
                        <div class="upload">
                            <img src="img/<?php echo $imagee;?>" class="image" title ="<?php echo $image; ?>">
                            <div class="round">
                                <input type = "hidden" name = "id" value="<?php echo $id;?>">
                                <input type = "hidden" name = "name" value="<?php echo $name;?>">
                                <input type = "file" name = "image" id = "image" accept = ".jpg, .jpeg, .png">
                                <i class="fa fa-camera"></i>
                                
                            </div>
                        </div>
                    </form>
                    <script type="text/javascript">
        document.getElementById("image").onchange = function(){
            document.getElementById('form').submit();
        }
    </script>
    <?php
    if(isset($_FILES["image"]["name"])){
        $id = $_POST["id"];
        $name = $_POST["name"];

        $imageName = $_FILES["image"]["name"];
        $imageSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validaImaeExtension = ['jpg','jpeg','png'];
        $imageExtension = explode('.', $imageName);
        $imageExtension = strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validaImaeExtension)){
            echo "
            <script>
                alert('Invalid Image Extension');
                doucment.location.href = '../updateimageprofile';
            </script>";
        }elseif($imageSize > 1200000){
            echo "
            <script>
                alert('image size is too large');
                doucment.location.href = '../updateimageprofile';
            </script>";
        }else{
            $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa");
            $newImageName .= "." . $imageExtension;
            $query = "UPDATE user SET image = '$newImageName' WHERE id = $id";
            
            $editEmploiOnWebsite = $bdd->prepare("UPDATE user SET image = '$newImageName' WHERE id = $id");
            $editEmploiOnWebsite->execute(array($tmpName));
            
            
            // mysqli_query($conn, $query);
            move_uploaded_file($tmpName, 'img/' . $newImageName);
            echo "
            <script>
                doucment.location.href = '../test3';
            </script>";
        }
    }
    ?>



                        <!-- <img class="image" src="face.png" alt=""> -->



                        <h3 class="nameP"><?= $user_nom . ' ' .$user_prenom;?></h3>
                        <h3 class="subP-nameP">@<?= $user_prenom;?>_<?= $user_nom;?></h3>
                    </div>
                </div>
            

                <div class="contentP">
                    <div class="leftP">
                        <div class="aboutP-containerP">
                            <h3 class="titleP">About</h3>
                            <p class="textP">Job: <?= $user_job;?></p>
                            <p class="textP">E-mail: <?= $user_email;?></p>
                            <p class="textP">Phone: <?= $user_phone;?></</p>

                        </div>
                        <a href="mes-offres.php" class="button">les offres publieés</a>
                    </div>
                    <div class="rightP">
                        <div>
                            <h3 class="numberP">5</h3>
                            <h3 class="numberP-titleP">Offres</h3>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        <?php
        }
    ?>
    
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
        <!-- <script src="approfile.js"></script> -->
    </body>
</html>