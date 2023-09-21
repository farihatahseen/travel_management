<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Travel information post</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="css/addpkg.css">
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <!-- Brand/logo -->
      <a class="navbar-brand" href="#"></a>
      <ul class="navbar-nav">
          <h1 class="navbar-brand" href="index.php">TripGO</h1>
      </ul>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item text-white">
                  <a class="nav-link active" aria-current="page" href="index.php">Home </a>
              </li>
          </ul>
      </div>
  </nav>

<div class="form-container">
   <form action="" method="post" enctype="multipart/form-data">
     <div class="a">
       <h3>Post an Information for Help Turist</h3>
     </div>

      <?php
      if (isset($message)) {
         echo '<div class="message">' . $message . '</div>';
      }
      ?>
      <input type="text" name="aname" placeholder="Enter Area Name" class="box" required>
      <input type="text" name="sname" placeholder="Enter Spot Name" class="box" required>
      <input type="text" name="gname" placeholder="Enter Guide Name" class="box" required>
      <input type="text" name="gphn" placeholder="Enter Guide Phone Number" class="box" required>
      <input type="file" name="nidimage"><br>

      <input type="submit" name="submit" value="Post This Package" class="btn">
   </form>
</div>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'travel') or die('Connection failed: ' . mysqli_connect_error());

if (isset($_POST['submit'])) {
   $aname = mysqli_real_escape_string($conn, $_POST['aname']);
   $sname = mysqli_real_escape_string($conn, $_POST['sname']);
   $gname = mysqli_real_escape_string($conn, $_POST['gname']);
   $gphn = mysqli_real_escape_string($conn, $_POST['gphn']);

   // Uploading image
   $nidimage = $_FILES['nidimage']['name'];
   $tmpname = $_FILES['nidimage']['tmp_name'];
   $uploc = 'uploaded_img/'.$nidimage;

   $insert = "INSERT INTO `info` (aname, sname, gname, gphn, nidimage) VALUES ('$aname', '$sname', '$gname', '$gphn', '$nidimage')";

   if (mysqli_query($conn, $insert)) {
      move_uploaded_file($tmpname, $uploc);
      $message = "Information posted successfully!";
   } else {
      $message = "Failed to post the information. Please try again.";
   }
}

mysqli_close($conn);
?>
</body>
</html>
