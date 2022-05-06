<?php 
  session_start();
  require('actions/database.php');
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
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
        <link rel="stylesheet" href="stylelog.css">
        <link rel="stylesheet" href="stylemenu.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>chat brico</title>
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
   <!--=============== mon chat===============-->
  <div class="wrapper">
    <section class="chat-area">
      <header>
      <?php 
          $sql= $bdd->prepare("SELECT * FROM user WHERE unique_id = {$_GET['id']}");
          $sql->execute(array());

          if($sql->rowCount()>0){
              $row = $sql->fetch();
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="img/<?= $row['image']; ?>">
        <div class="details">
        <span><?= $row['nome']. " " . $row['prenom']?></span>
          <p><?= $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?= $_GET['id']; ?>" hidden>
        <input type="text" class="input-field" name="message" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>
</html>
