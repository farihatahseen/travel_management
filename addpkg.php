<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Travel Package Post</title>

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
       <h3>Post a Travel Package</h3>
     </div>

      <?php
      if (isset($message)) {
         echo '<div class="message">' . $message . '</div>';
      }
      ?>
      <input type="text" name="place_name" placeholder="Enter Place Name" class="box" required>
      <input type="text" name="total_cost" placeholder="Enter Total Cost" class="box" required>
      <input type="text" name="transport_type" placeholder="Enter Transport Type" class="box" required>
      <input type="text" name="day" placeholder="Enter Number of Days" class="box" required>
      <input type="file" name="image"><br>

      <input type="submit" name="submit" value="Post This Package" class="btn">
   </form>
</div>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'travel') or die('Connection failed: ' . mysqli_connect_error());

if (isset($_POST['submit'])) {
   $place_name = mysqli_real_escape_string($conn, $_POST['place_name']);
   $total_cost = mysqli_real_escape_string($conn, $_POST['total_cost']);
   $transport_type = mysqli_real_escape_string($conn, $_POST['transport_type']);
   $day = mysqli_real_escape_string($conn, $_POST['day']);

   // Uploading image
   $image = $_FILES['image']['name'];
   $tmpname = $_FILES['image']['tmp_name'];
   $uploc = 'uploaded_img/'.$image;

   $insert = "INSERT INTO `package` (place_name, total_cost, transport_type, day, image) VALUES ('$place_name', '$total_cost', '$transport_type', '$day', '$image')";

   if (mysqli_query($conn, $insert)) {
      move_uploaded_file($tmpname, $uploc);
      $message = "Travel package posted successfully!";
   } else {
      $message = "Failed to post the travel package. Please try again.";
   }
}

mysqli_close($conn);
?>
</body>
</html>
