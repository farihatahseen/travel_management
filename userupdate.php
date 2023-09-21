<?php

$conn = mysqli_connect('localhost', 'root', '', 'travel') or die('connection failed');

session_start();
$user_id = $_SESSION['id']; // Assuming the user_id is stored in the session

if (isset($_POST['update_profile'])) {

    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

    mysqli_query($conn, "UPDATE `user` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');

    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

    if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
        if ($update_pass != $old_pass) {
            $message[] = 'old password not matched!';
        } elseif ($new_pass != $confirm_pass) {
            $message[] = 'confirm password not matched!';
        } else {
            mysqli_query($conn, "UPDATE `user` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
            $message[] = 'password updated successfully!';
        }
    }

    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/' . $update_image;

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'image is too large';
        } else {
            $image_update_query = mysqli_query($conn, "UPDATE `user` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
            if ($image_update_query) {
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = 'image updated successfully!';
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/user.css">

<style media="screen">
  body{
  background-image: url(images/jsup.jpg);
 
 


       
            background-color: #FAF9D0;
        }
        .card-img-top {
            width: 100%;
            height: 200px;
        }
        .custom-card {
            margin-bottom: 20px;
        }
        .text {
            text-align: center;
            font-weight: bold;
        }
    




</style> <!-- Rest of the head section remains the same -->
</head>
<body>
<div id="mySidenav" class="sidenav">
<a style="font-size:30px;cursor:pointer" onclick="closeNav()" class="text-blue-500">&#9776; Closed</a>
    <a href="userupdate.php">Profile update</a>
    <a href="booking.php">Bookings</a>
    <a href="readinfo.php">Travel related INFO</a>
    <a href="userlogout.php">Logout</a>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()" class="text-blue-500">&#9776; open</span>
<div class="update-profile">
   <?php
      $select = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed');
      if (mysqli_num_rows($select) > 0) {
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <!-- Rest of the form and HTML code remains the same -->

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">

      <a href="user.php" class="delete-btn">go back</a>
   </form>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
</body>
</html>
