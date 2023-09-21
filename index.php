<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TripGo</title>
    <link rel="icon" href="images/fab.png">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">

      <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
    <style>

.slide{
color:White;

}
    .dropbtn {
    background-color: #04AA6D;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {background-color: #ddd;}

  .dropdown:hover .dropdown-content {display: block;}

  .dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>
</head>
<body class="bg-white">
    <nav class="bg-transparent">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7 items-center">
                    <div>

                            <img src="logo.png" alt="Logo" class="h-16 w-24">
                        </a>
                    </div>
                    <div class="hidden md:flex items-center space-x-1">
                        <a href="index.php" class="py-4 px-2 text-green-500 border-b-4 border-green-500 font-semibold">Home</a>
                       
                        <a href="about.php" class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300">Contact Us</a>
                        <div class="relative">

  <div class="dropdown">
      <button class="py-2 px-2 font-medium text-white bg-green-500 rounded hover:bg-green-400 transition duration-300">Services</button>
    <div class="dropdown-content">
      <a href="readpkg.php">Packages</a>
      <a href="readinfo.php">importent info</a>
     
    </div>
  </div>
                        </div>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-3">
                    <a href="adminlogin.php" class="py-2 px-2 font-medium text-red-300 rounded hover:bg-red-900 hover:text-white transition duration-300">Admin</a>
                    <a href="userlogin.php" class="py-2 px-2 font-medium text-white bg-green-500 rounded hover:bg-green-400 transition duration-300">Log In/Sign Up</a>
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
                <li><a href="#services" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Services</a></li>
                <li><a href="#about" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">About</a></li>
                <li><a href="#contact" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Contact Us</a></li>
            </ul>
        </div>
          </nav>
        <marquee class="my-4">
            <p class="slide">
                "As a trusted trip management company, we are dedicated to providing reliable services and ensuring an unforgettable travel experience. With our expertise, we offer you the best deals and a wide range of facilities tailored to meet your needs. From seamless bookings to personalized itineraries, our goal is to make your journey stress-free and filled with delightful moments. Choose us as your travel partner and embark on an adventure where exceptional service and remarkable experiences await you."
            </p>
        </marquee>
        <div class="top ">
            <div class="left text-justify  text-xl slide">
                <h2 >Enjoy life at your own</h2>
                <h2>Your <span class="c">pace</span></h2>
                <h2>and savor every moment.</h2>
            </div>

            <div class="right">
              <div class="map-responsive map">
                  <h1 class="slide">          Our Office Location</h1>
                  <div class="mapouter"><div class="gmap_canvas">
                    <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=Motijheel&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                  </div><style>.mapouter{position:relative;text-align:right;width:600px;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:600px;height:400px;}.gmap_iframe {width:300px!important;height:200px!important;}</style></div>
              </div>
            </div>
        </div>
<div class="a">
        <form class="form-inline justify-content-center mt-3" method="GET">
         <input type="text" class="form-control mb-2 mr-sm-2" id="search" name="search" placeholder="Search by place name">
         <button type="submit" class="btn btn-primary mb-2">Search</button>
      </form>

      </div>
        </div>
        
        <p style="text-align:center; color: blue;" class="font-bold text-xl">Our Pacages</p>
        <div class="container-fluid pad pt-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <!-- PHP Loop to display packages -->


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
         echo '<div class="col-lg-2 col-md-3 col-sm-4 col-6 pl-8 pr-8">';
         echo '<div class="card custom-card">';
         echo '<div class="container">';
         echo '<img src="uploaded_img/'.$row['image'].'" alt="Package Image" class="card-img-top">';
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
                <!-- Replace this part with your PHP loop -->
            </div>
        </div>


        <script>
            const btn = document.querySelector("button.mobile-menu-button");
            const menu = document.querySelector(".mobile-menu");

            btn.addEventListener("click", () => {
                menu.classList.toggle("hidden");
            });


     // map

            function initMap() {
           var motijheelLocation = { lat: 23.7362, lng: 90.4144 }; // Coordinates for Motijheel

           var map = new google.maps.Map(document.getElementById('map'), {
               center: motijheelLocation,
               zoom: 15
           });

           var marker = new google.maps.Marker({
               position: motijheelLocation,
               map: map,
               title: 'Motijheel'
           });
       }

       // Call the initMap function to initialize the map
       initMap();
        </script>
        <script src="//code.tidio.co/ct3tuw0igjuq6yabhz16dkifttepqn4f.js" async></script>

</body>
</html>
