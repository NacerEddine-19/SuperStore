<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:login.php');
}

if (isset($_POST['add_user'])) {
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));

   $check_email = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

   if (mysqli_num_rows($check_email) > 0) {
      $message[] = 'L\'email est déjà utilisé!';
   } else {
      mysqli_query($conn, "INSERT INTO `users` (name, email, user_type, password) VALUES ('$name', '$email', '$user_type', '$password')") or die('query failed');
      $message[] = 'Utilisateur ajouté avec succès!';
   }
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_users.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Utilisateurs</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css?v=<?php echo time(); ?>">

</head>

<body>

   <?php include 'admin_header.php'; ?>

   <section class="users">

      <h1 class="title">COMPTES UTILISATEUR </h1>

      <div class="box-container">
         <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
         while ($fetch_users = mysqli_fetch_assoc($select_users)) {
            ?>
            <div class="box">
               <p> identifiant utilisateur 'id' : <span><?php echo $fetch_users['id']; ?></span> </p>
               <p> nom d' utilisateur : <span><?php echo $fetch_users['name']; ?></span> </p>
               <p> email : <span><?php echo $fetch_users['email']; ?></span> </p>
               <p> type d'utilisateur : <span style="color:<?php if ($fetch_users['user_type'] == 'admin') {
                  echo 'var(--orange)';
               } ?>"><?php echo $fetch_users['user_type']; ?></span>
               </p>
               <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>"
                  onclick="return confirm('Supprimer ce l\'utilisateur?');" class="delete-btn">Supprimer l'utilisateur</a>
            </div>
            <?php
         }
         ;
         ?>
      </div>

   </section>

   <section class="users">

      <h1 class="title">Ajouter un utilisateur</h1>
      
      <div class="box-container">
      <form action="" method="post">
            <input type="text" name="name" required placeholder="Nom d'utilisateur" class="box">
            <input type="email" name="email" required placeholder="Email" class="box">
            <input type="password" name="password" required placeholder="Mot de passe" class="box">
            <select name="user_type" class="box">
               <option value="user">Utilisateur</option>
               <option value="admin">Admin</option>
            </select>
            <input type="submit" name="add_user" value="Ajouter un utilisateur" class="btn">
         </form>
      </div>

   </section>








   <!-- custom admin js file link  -->
   <script src="js/admin_script.js"></script>

</body>

</html>