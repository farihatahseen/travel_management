<?php
$conn = mysqli_connect('localhost', 'root', '', 'travel') or die('connection failed');

if (isset($_GET['delete'])) {
   $packageId = $_GET['delete'];

   // Delete the package from the database
   $deleteQuery = "DELETE FROM package WHERE id = '$packageId'";
   $deleteResult = mysqli_query($conn, $deleteQuery);

   if ($deleteResult) {
      $message = "Package deleted successfully!";
   } else {
      $message = "Failed to delete the package. Please try again.";
   }
}

$select = mysqli_query($conn, "SELECT id, place_name, total_cost, transport_type, day, image FROM package ORDER BY place_name ASC") or die('query failed');

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Package List</title>
   <!-- Add Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

   <style media="screen">
      body {
         background-color: #FAF9D0;
      }

      .card-img-top {
         width: 100%;
         height: auto;
      }

      .custom-card {
         margin-bottom: 20px;
      }
   </style>
</head>
<body>
  <nav class="navbar navbar-expand-sm  ">
      <!-- Brand/logo -->
      <a class="navbar-brand" href="#"></a>
      <ul class="navbar-nav">
          <h1 class="navbar-brand" href="#">TripGo</h1>
      </ul>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item text-white">
                  <a class="nav-link active" aria-current="page" href="index.php">Home </a>
              </li>
          </ul>
      </div>
  </nav>
   <div class="container-fluid mt-3">
      <h1 class="text-center">Package List</h1>
   </div>
   <div class="container-fluid pad">
      <div class="row">
         <?php
         if (isset($message)) {
            echo '<div class="col-12">';
            echo '<div class="alert alert-success" role="alert">';
            echo $message;
            echo '</div>';
            echo '</div>';
         }

         while($row = mysqli_fetch_assoc($select)){
            echo '<div class="col-lg-2 col-md-3 col-sm-4 col-6">';
            echo '<div class="card custom-card">';
            echo '<div class="container">';
            echo '<a href="reg.php"><img src="uploaded_img/'.$row['image'].'" alt="Package Image" class="card-img-top"></a>';
            echo '<div class="middle">';
            echo '<p>Transport: '.$row['transport_type'].'</p>';
            echo '<div class="text">'.$row['place_name'].'</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="card-body">';
            echo '<h3 class="btn btn-primary">Total Cost: $'.$row['total_cost'].'</h3>';
            echo '<p>Duration: '.$row['day'].' days</p>';
            echo '</div>';
            echo '<div class="card-footer">';
            echo '<a href="?delete='.$row['id'].'" class="btn btn-danger">Delete</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
         }

         mysqli_close($conn);
         ?>
      </div>
   </div>

   <!-- Add Bootstrap JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
