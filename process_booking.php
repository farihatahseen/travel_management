<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'travel') or die('connection failed');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['id'];
  
    $place_name = mysqli_real_escape_string($conn, $_POST['place_name']);
 

   
    $bkash = mysqli_real_escape_string($conn, $_POST['bkash']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $insert_query = "INSERT INTO booking (user_id, place_name, bkash, phone)
                     VALUES ('$user_id',  '$place_name',   '$bkash', '$phone')";

    if (mysqli_query($conn, $insert_query)) {
        header('Location: booking.php');
    } else {
        header('Location: booking_failed.php');
    }
}

mysqli_close($conn);
?>
