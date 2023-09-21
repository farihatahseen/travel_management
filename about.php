

<?php
// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Database connection settings
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "travel";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $cname = $_POST["cname"];
    $cemail = $_POST["cemail"];
    $cmessage = $_POST["cmessage"];

    // Prepare and execute SQL query
    $sql = "INSERT INTO feedback (cname, cemail, cmessage) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $cname, $cemail, $cmessage);

    if ($stmt->execute()) {
        $message = "Feedback submitted successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
    echo "<script>alert('$message');</script>"; // Display an alert with the message
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Include the Tailwind CSS stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
   
    </style>
</head>
<body class="bg-gray-100 aa">

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
    <div id="contact" class="bg-white py-10">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h2 class="text-2xl font-semibold mb-4">Contact Information</h2>
                <p class="text-gray-600">Don't hesitate to give us a call or send us a contact form message</p>
            </div>
            <div class="flex flex-col md:flex-row justify-between mt-8">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <ul class="list-none">
                        <li class="mb-2"><i class="fas fa-map-marker-alt text-blue-500 mr-2"></i>Dhaka, Bangladesh</li>
                        <li class="mb-2"><i class="fas fa-phone text-blue-500 mr-2"></i><a class="text-blue-500" href="tel:003024630820">+880 1521760638</a></li>
                        <li><i class="fas fa-envelope text-blue-500 mr-2"></i><a class="text-blue-500" href="mailto:nawalaurna55@gmail.com">clubconnect@gmail.com</a></li>
                    </ul>
                </div>
                <div class="md:w-1/2">
                    <div class="mb-4">
                        <!-- Embed Google Map -->
                        <div class="w-full h-64">
                            <iframe class="w-full h-full" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=United%20International%20university&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                        </div>
                    </div>
                    <div>
                        <h3>USER Feedback</h3>
                        <!-- Contact Form -->
                        <form id="contactForm" class="bg-white rounded p-6 shadow-md" method="POST">
                            <div class="mb-4">
                                <label for="cname" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" id="cname" name="cname" class="mt-1 p-2 w-full border rounded" required>
                            </div>
                            <div class="mb-4">
                                <label for="cemail" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="cemail" name="cemail" class="mt-1 p-2 w-full border rounded" required>
                            </div>
                            <div class="mb-4">
                                <label for="cmessage" class="block text-sm font-medium text-gray-700">Your message</label>
                                <textarea id="cmessage" name="cmessage" class="mt-1 p-2 w-full border rounded h-24" required></textarea>
                            </div>
                            <div>
                                <button type="submit" name="submit" class="bg-blue-500 text-white py-2 px-4 rounded">SUBMIT MESSAGE</button>
                            </div>
                        </form>
                        <!-- end of contact form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
