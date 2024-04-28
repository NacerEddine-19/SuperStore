<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">

</head>

<body id="about">

   <?php include 'header.php'; ?>

   <div class="heading">
      <h3>Aproros de Nous</h3>
      <p> <a href="index.php">Acceuil</a> / Apropos </p>
   </div>

   <section class="about">

      <div class="flex">

         <div class="image">
            <img src="images/about-img1.jpg">
         </div>

         <div class="content">
            <h3>Pourquoi de Nous?</h3>
            <p>Histoire de la fondation
               Fondée par trois associés d'origine française en 1988, super shop a commencé sa vie commerciale en tant que marque de grossiste. Établie et enregistrée à Paris, la super boutique a attiré l'attention avec ses créations de t-shirts et de sweat-shirts en premier lieu. Avec la séparation des deux associés fondateurs de la marque dans le temps, la super boutique est passée à George Amouyal en tant qu'unique actionnaire. Tema Tekstil, qui est lié au groupe Taha et est le producteur ainsi que le concédant de licence du super magasin au Maroc, a acheté les droits mondiaux de la marque du super magasin en 1997.</p>
            <a href="contact.php" class="btn">découvrez Maintenant</a>
         </div>

      </div>

   </section>

   <?php include_once 'footer.php'; ?>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>