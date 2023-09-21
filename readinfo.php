<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Read Info</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="css/user.css">
   <style media="screen">
      body {
         background-color: #ffe4c4;
         color: black;
      }

   </style>
</head>
<body>

<div id="mySidenav" class="sidenav">
<a style="font-size:30px;cursor:pointer" onclick="closeNav()" class="text-blue-500">&#9776; Closed</a>
   <a href="userupdate.php">Profile update</a>
   <a href="booking.php">Bookings</a>
   <a href="readinfo.php">Travel related INFO</a>
   <a href="userlogout.php">Logout</a>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

<div id="main">
   <div class="container mt-5">
      <h2 class="text-center">Travel Guide Information</h2>
      <table class="table table-bordered">
         <thead>
            <tr>
               <th>Area Name</th>
               <th>Spot Name</th>
               <th>Guide Name</th>
               <th>Guide Phone Number</th>
               <th>NID Image</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'travel') or die('Connection failed: ' . mysqli_connect_error());

            $select = "SELECT * FROM `info`";
            $result = mysqli_query($conn, $select);

            while ($row = mysqli_fetch_assoc($result)) {
               echo '<tr>';
               echo '<td>' . $row['aname'] . '</td>';
               echo '<td>' . $row['sname'] . '</td>';
               echo '<td>' . $row['gname'] . '</td>';
               echo '<td>' . $row['gphn'] . '</td>';
               echo '<td><img src="uploaded_img/' . $row['nidimage'] . '" width="100"></td>';
               echo '</tr>';
            }

            mysqli_close($conn);
            ?>
         </tbody>
      </table>
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
      document.body.style.backgroundColor = "#ffe4c4";
   }
</script>

</body>
</html>
