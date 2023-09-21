

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<body>


<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
  background-image: url(images/admin.jpg);
  background-size: cover;
}

.sidebar .side-header{
      margin-left: 30px;
      margin-bottom: 8px;
      color: #fff;
  }

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width:100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}
.fa-caret-down {
  float: right;
  padding-right: 8px;
}
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}
.active {
  background-color: green;
  color: white;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

.a{
  text-align: center;
  padding-top: 200px;

.h3{
  color: white;
  padding-left: 20px;
}
.link{

  color: white;
}
.link2{

  color: #e187f5;
  font-weight: bold;
}
</style>
</head>
<body>

<div id="mySidebar" class="sidebar">

  <div class="side-header">
      <img src="uploaded_img/admin1.jpg" width="120" height="120" >
      <h5 style="margin-top:10px;">Hello, Admin</h5>
  </div>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <div class="sidenav">
    <a href="adminpage.php"><i class="fa fa-dashboard" style="font-size:23px"></i> DASHBOARD</a>
    <a href="addpkg.php"> <i class="fa fa-telegram" style="font-size:24px"></i>Package POST</a>
    <a href="delete.php"><i class="fa fa-user" style="font-size:24px"></i>delete package</a>
    <a href="traveler.php"> <i class="fa fa-telegram" style="font-size:24px"></i>Enroll tourist</a>
    <a href="addinfo.php"> <i class="fa fa-telegram" style="font-size:24px"></i>Information POST</a>
    <a href="readfeedback.php"> <i class="fa fa-telegram" style="font-size:24px"></i>Feedback</a>
    

  </div>
</div>

<div id="main">


  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button class="openbtn" onclick="openNav()">☰</button>
      </div>


      <a class="navbar-brand" href="#">TripGo</a>

      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="index.php">Home</a></li>

      <a href="adminlogout.php" class="btn btn-danger navbar-btn" role="button">Logout</a>

    </ul>
    </div>
  </nav>

  <script>

  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;

  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }
  </script>


  <h3 class="h3">Admin Dashboard</h3>

  <br>
</br>


  <div class="container">
  <div class="row">

    <div class="a">




    <div class="col-sm-6">
      <div class="panel panel-danger">
        <div class="panel-heading"><a href="cownerread.php" class="link2">TOTAL Packages</a></div>
        <div class="panel-body">

          <h3 class="text-center"><b>

        6

              </b></h3>



        </div>
      </div>
    </div>


    <div class="col-sm-6">
      <div class="panel panel-success">
        <div class="panel-heading">  <a href="readjob.php" class="link2">Total Users</a></div>
        <div class="panel-body">


                    <h3 class="text-center"><b>

              5

                    </b></h3>



        </div>
      </div>
    </div>

      </div>
  </div>
</div>


<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>


</body>
</html>
