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
         height: 200px;
      }

      .custom-card {
         margin-bottom: 20px;
      }
      .text{
        text-align: center;
        font-weight: bold;
      }
   </style>


</head>
<body>
   <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <!-- ... Previous navigation ... -->
           <a class="navbar-brand" href="#"></a>
      <ul class="navbar-nav">
          <h1 class="navbar-brand" href="#">TripGO</h1>
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
      <br>
      <br>
      <form class="form-inline justify-content-center mt-3" method="GET">
         <input type="text" class="form-control mb-2 mr-sm-2" id="search" name="search" placeholder="Search by place name">
         <button type="submit" class="btn btn-primary mb-2">Search</button>
      </form>
   </div>

   <div class="container-fluid pad">
      <div class="row">
         <?php
            $conn = mysqli_connect('localhost', 'root', '', 'travel') or die('connection failed');

            $search_query = "";
            if (isset($_GET['search'])) {
               $search_query = mysqli_real_escape_string($conn, $_GET['search']);
               $search_query = trim($search_query);
            }

            $where_clause = "";
            if (!empty($search_query)) {
               $where_clause = "WHERE place_name LIKE '%$search_query%'";
            }

            $select = mysqli_query($conn, "SELECT place_name, total_cost, transport_type, day, image FROM package $where_clause ORDER BY place_name ASC") or die('query failed');

            while($row = mysqli_fetch_assoc($select)){
               echo '<div class="col-lg-2 col-md-3 col-sm-4 col-6">';
               echo '<div class="card custom-card">';
               echo '<div class="container">';
               echo '<a href="reg.php"><img src="uploaded_img/'.$row['image'].'" alt="Package Image" class="card-img-top"></a>';
               echo '<div class="middle">';
               echo '<div class="text">'.$row['place_name'].'</div>';
               echo '<p>Transport: '.$row['transport_type'].'</p>';
               echo '</div>';
               echo '</div>';
               echo '<div class="card-body">';
               echo '<h3 class="btn btn-primary">Total Cost: $'.$row['total_cost'].'</h3>';
               echo '<p>Duration: '.$row['day'].' days</p>';
               echo '</div>';
               echo '</div>';
               echo '</div>';
            }

            mysqli_close($conn);
         ?>
      </div>
   </div>


   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</body>
</html>
