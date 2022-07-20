<?php

include 'config.php';

session_start();

if (isset($_POST['submit'])) {

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $role = $_POST['role'];
   $role = filter_var($role, FILTER_SANITIZE_STRING);
   if ($role == "admin")
      $pass = $_POST['pass'];
   $select = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? AND user_type=?");
   $select->execute([$email, $pass, $role]);
   $row = $select->fetch(PDO::FETCH_ASSOC);

   if ($select->rowCount() > 0) {

      if ($row['user_type'] == 'admin') {

         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');
      } elseif ($row['user_type'] == 'user') {

         $_SESSION['user_id'] = $row['id'];
         header('location:user_page.php');
      } else {
         $message[] = 'No user found!';
      }
   } else {
      $message[] = "Invalid Credentials!";
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '
         <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
   ?>

   <section class="form-container">

      <form action="" method="post" enctype="multipart/form-data">
         <h3>login now</h3>
         <input type="email" required placeholder="Enter email" class="box" name="email">
         <input type="password" required placeholder="Enter Password" class="box" name="pass">
         <br><br><br>
         <label class="box" style="font-size: 1.5rem;
   color:var(--blue);
   text-transform: uppercase;">Select User Type</label>
         <select class="box" name="role">
            <option value="None" style="font-size: 2rem;
   color:var(--blue);
   text-transform: uppercase;">------</option>
            <option value="user" style="font-size: 1.5rem;
   color:var(--white);
   text-transform: uppercase;">user</option>
            <option value="admin" style="font-size: 1.5rem;
   color:var(--white);
   text-transform: uppercase;">admin</option>
         </select>
         <br>
         <br><br><br>
         <input type="submit" value="Login Now" class="btn" name="submit">
      </form>

   </section>

</body>

</html>