<?php

$conn = mysqli_connect('localhost', 'root', '', 'travel') or die('connection failed');

session_start();

if (isset($_POST['submit'])) {

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$pass'") or die('query failed');
   if (mysqli_num_rows($select) > 0) {
    $row = mysqli_fetch_assoc($select);
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row["name"];
    $_SESSION['email'] = $row["email"];
    $_SESSION['image'] = $row["image"]; // Add this line to store the user's image in the session
    header('location: user.php'); // Change to the appropriate destination page
} else {
    $message[] = 'Incorrect email or password!';
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
   <link rel="stylesheet" href="css/style2.css">
<style>
    .form-container{
        
        height: 600px!important;
    }
</style>
</head>
<body>

<nav class="bg-transparent">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7 items-center">
                    <div>

                            <img src="logo.png" alt="Logo" class="h-16 w-24">
                        </a>
                    </div>
                    <div class="hidden md:flex items-center space-x-1">
                        <a href="index.php" class="py-4 px-2 text-blue-500 border-b-4 border-blue-900 font-semibold">Home</a>
                       
                        <a href="" class="py-4 px-2 text-white-500 font-semibold hover:text-green-500 transition duration-300">About</a>
                        <a href="" class="py-4 px-2 text-white-500 font-semibold hover:text-green-500 transition duration-300">Contact Us</a>
                        <div class="relative">

                        </div>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-3">
                    <a href="adminlogin.php" class="py-2 px-2 font-medium text-red-300 rounded hover:bg-red-900 hover:text-white transition duration-300">Admin</a>

                </div>
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <svg class="w-6 h-6 text-gray-500 hover:text-green-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="hidden mobile-menu">
            <ul class="">
                <li class="active"><a href="index.html" class="block text-sm px-2 py-4 text-white bg-green-500 font-semibold">Home</a></li>
       
                <li><a href="#about" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">About</a></li>

            </ul>
        </div>
          </nav>

<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Login for a User</h3>
      <?php
      if (isset($message)) {
         foreach ($message as $msg) {
            echo '<div class="message">' . $msg . '</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="Enter email" class="box" required>
      <input type="password" name="password" placeholder="Enter password" class="box" required>
      <input type="submit" name="submit" value="Login Now" class="btn">
      <p>Don't have an account? <a href="userReg.php">Register now</a></p>
   </form>

</div>

</body>
</html>
