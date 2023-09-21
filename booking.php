

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/user.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
       
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

<span style="font-size:30px;cursor:pointer" onclick="openNav()" class="text-blue-500">&#9776; open</span>

<div id="main">
    <div class="a">
        <h2 class="text-primary">
            <?php
            session_start();
            if ($_SESSION['name'] == true) {
                echo "Welcome :" . " " . $_SESSION['name'] . "!";
                echo "<br>";
                echo "User id :" . " " . $_SESSION['id'];
            } else {
                header('location: user.php');
            }
            ?>
        </h2>
    </div>
    </div><div id="bookingModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeBookingModal()">&times;</span>
        <h2>Book Package</h2>
        <form action="process_booking.php" method="post">
    <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['id']; ?>">
    <input type="hidden" id="place_name" name="place_name" value="<?php echo $row['place_name']; ?>">
    <input type="hidden" id="total_cost" name="total_cost" value="<?php echo $row['total_cost']; ?>">
    <input type="hidden" id="transport_type" name="transport_type" value="<?php echo $row['transport_type']; ?>">
    <input type="hidden" id="day" name="day" value="<?php echo $row['day']; ?>">
    <label for="place_name">place name:</label>
            <input type="text" id="place_name" name="place_name" required>
    <label for="bkash">Bkash/Nogod Trangition ID:</label>
    <input type="text" id="bkash" name="bkash" required>
    
    <label for="phone">Phone Number:</label>
    <input type="text" id="phone" name="phone" required>
    
    <button type="submit" class="btn btn-primary">Confirm Booking</button>
</form>

    </div>
</div>

    <div class="container">
        <p style="text-align:center; color: blue;" class="font-bold text-xl">Our Packages</p>
        <div class="container-fluid pad pt-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
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
                while ($row = mysqli_fetch_assoc($select)) {
                    echo '<div class="col-lg-2 col-md-3 col-sm-4 col-6 pl-8 pr-8">';
                    echo '<div class="card custom-card">';
                    echo '<div class="container">';
                    echo '<a href="reg.php"><img src="uploaded_img/' . $row['image'] . '" alt="Package Image" class="card-img-top"></a>';
                    echo '<div class="middle">';
                    echo '<div class="text">' . $row['place_name'] . '</div>';
                    echo '<p>Transport: ' . $row['transport_type'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="card-body">';
                    echo '<h3 class="btn btn-primary">Total Cost: ' . $row['total_cost'] . ' TK</h3>';
                    echo '<p>Duration: ' . $row['day'] . ' days</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                mysqli_close($conn);
                ?>
            </div>
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

    function openBookingModal(user_id, place_name, total_cost, transport_type, day) {
        document.getElementById("user_id").value = user_id;
        document.getElementById("place_name").value = place_name;
        document.getElementById("total_cost").value = total_cost;
        document.getElementById("transport_type").value = transport_type;
        document.getElementById("day").value = day;
        document.getElementById("bookingModal").style.display = "block";
    }

    function closeBookingModal() {
        document.getElementById("bookingModal").style.display = "none";
    }



</script>
</body>
</html>
