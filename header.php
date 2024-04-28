<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <p>nouvelle <a href="login.php">connexion</a> | <a href="register.php">S'inscrire</a> </p>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <a href="index.php" class="logo"><img src="photo/mola.png" width="180px"></a>

         <nav class="navbar">
            <a data-active="home" href="index.php">Accueil</a>
            <a data-active="about" href="about.php">Apropos</a>
            <a data-active="shop" href="shop.php">Magasin</a>
            <a data-active="contact" href="contact.php">contact</a>
            <a data-active="orders" href="orders.php">Commandes</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>

         <div class="user-box">
            <p>nom d' utilisateur : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">Se déconnecter</a>
         </div>
      </div>
   </div>

</header>