<?php
include('comman_function.php');
@session_start();
// Establish connection to your database (replace these variables with your database credentials)
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "registration_form_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$user_ip=getIPAddress();
$select_cart_item = "Select * from cart_details where ip_address='$user_ip'";
$result_cart = mysqli_query($con,$select_cart_item);
$rows_count_item = mysqli_num_rows($result_cart);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are set
    if (isset($_POST["user_email"]) && isset($_POST["user_password"])) {
        // Retrieve the username from the form
        $user_email = $_POST["user_email"];

        // Prepare a statement to fetch the hashed password from the database
        // Prepare a statement to fetch the hashed password from the database
$stmt = $conn->prepare("SELECT user_password FROM user_info WHERE user_email = ?");
if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}
$stmt->bind_param("s", $user_email);
$stmt->execute();
$stmt->store_result();


        // Check if the user exists
        if ($stmt->num_rows > 0) {
            $_SESSION['user_email']=$user_email;
            
            // Bind the result variable
            $stmt->bind_result($user_password);
            $stmt->fetch();

            // Retrieve the password from the form
            $password = $_POST["user_password"];

            // Verify the password
            if (password_verify($password, $user_password)) {
                // Login successful
                if($stmt->num_rows==1 and $rows_count_item==0){
                    $_SESSION['user_email']=$user_email;
                    

                    echo "<script>alert('You have logged in Successfully $user_email')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                }
                else
                {
                    $_SESSION['user_email']=$user_email;

                    echo "<script>alert('You have logged in Successfully $user_email')</script>";
                    echo "<script>window.open('checkout.php','_self')</script>";
                    
                }
            } else {
                // Login failed
                echo "<script>alert('Invalid username or password!')</script>";
            }
        } else {
            // User does not exist
            echo "<script>alert('Invalid username or password!')</script>";

        }

        // Close statement
        $stmt->close();
    } else {
        // Username or password not set
        // echo "<script>alert('Please enter both username and password.')</script>";

    }
}

// Close connection
// $conn->close();

?>
