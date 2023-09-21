<?php
// Assuming you've already established a database connection
$conn = mysqli_connect('localhost', 'root', '', 'travel') or die('connection failed');

// Fetch all booking data from the database
$select_query = "SELECT user_id, place_name, booking_date, bkash FROM booking";
$result = mysqli_query($conn, $select_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">All Booking Data</h1>
        
        <table class="w-full border bg-white">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4">User ID</th>
                    <th class="py-2 px-4">Place Name</th>
                    <th class="py-2 px-4">Booking Date</th>
                    <th class="py-2 px-4">Bkash</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td class="py-2 px-4 border"><?php echo $row['user_id']; ?></td>
                        <td class="py-2 px-4 border"><?php echo $row['place_name']; ?></td>
                        <td class="py-2 px-4 border"><?php echo $row['booking_date']; ?></td>
                        <td class="py-2 px-4 border"><?php echo $row['bkash']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
