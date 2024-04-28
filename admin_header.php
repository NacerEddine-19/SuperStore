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

   <div class="flex">

      <a href="admin_page.php" class="logo"><img src="photo/mola.png" width="180px"></a>

      <nav class="navbar">
         <a href="admin_page.php">Accueil</a>
         <a href="admin_products.php">Produits</a>
         <a href="admin_orders.php">Commandes</a>
         <a href="admin_users.php">Utilisateurs </a>
         <a href="admin_contacts.php">messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">Se déconnecter</a>
         <div>nouvelle <a href="login.php">connexion</a> | <a href="register.php">S'inscrire</a></div>
      </div>

   </div>

</header>