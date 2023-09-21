<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


<link rel="stylesheet" href="css/user.css">
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
  

<div id="mySidenav" class="sidenav">
<a style="font-size:20px;cursor:pointer  color: white; " onclick="closeNav()">&#9776; close</a>
  <a href="userupdate.php">Profile update</a>
  <a href="booking.php">Bookings</a>
  <a href="readinfo.php">Travel related INFO</a>
  <a href="userlogout.php">Logout</a>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

<div id="main">
  <div class="a">
    <h2 class="text-primary">
      <?php
      session_start();

      if ($_SESSION['name']) {
        echo "Welcome: " . $_SESSION['name'] . "!";
        echo "<br>";
        // Display the user's image using an <img> tag
        echo "<br>";
        echo "<img src='uploaded_img/" . $_SESSION['image'] . "' alt='User Image' width='100' style='border-radius: 40%;'>";

    
    } else {
        header('location: user.php');
    }
    
    
      ?>
    </h2>
  </div>

  <br>

  <br>

  <div class="container">
    <div class="row">
      <div class="a">
        <!-- Modify the following code to display user-related statistics from the database -->
      </div>
    </div>
  </div>

</div>
<div class="container-fluid mt-3">
      <h1 class="text-center">Package List</h1>
      <br>
      <br>
   </div>
   <div class="container-fluid pad">
      <div class="row">
         <?php
            $conn = mysqli_connect('localhost', 'root', '', 'travel') or die('connection failed');

            $select = mysqli_query($conn, "SELECT place_name, total_cost, transport_type, day, image FROM package ORDER BY place_name ASC") or die('query failed');

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
               echo '<h3 class="btn btn-primary">Total Cost: '.$row['total_cost'].' TK</h3>';
               echo '<p>Duration: '.$row['day'].' days</p>';
               echo '</div>';
               echo '</div>';
               echo '</div>';
            }

            mysqli_close($conn);
         ?>
      </div>
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
