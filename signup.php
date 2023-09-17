<?php
session_start();
include 'config.php';
// var_dump($_SESSION['cart']);
if (isset($_SESSION['login-customer'])) {
    header('Location: index.php');
}
// ... (existing code)

// ... (existing code)

// ... (existing code)

if (isset($_POST['siginup'])) {
    $email = $_POST['email_id'];
    $name = $_POST['name'];
    $companyName = $_POST['company_name'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // You may want to add additional validation and sanitization here for the form data.

    // Check if the password and confirm password match
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
        // You can also add logic to clear the passwords from the form if needed.
    } else {
        try {
            // Check if the email already exists in the database
            $checkEmailQuery = "SELECT * FROM tbl_customer WHERE email_id = '$email'";
            $stmt = $db->query($checkEmailQuery);

            if ($stmt->rowCount() > 0) {
                // Email already exists
                echo "<script>alert('Email already exists. Please use a different email.');</script>";
            } else {
                // Email does not exist, proceed with the registration

                // Prepare the SQL query to insert the data into the database
                $insertQuery = "INSERT INTO tbl_customer (name,email_id,password,company_name) VALUES ('$name','$email', '$password', '$companyName')";

                // Execute the query
                if ($db->query($insertQuery)) {
                    // Registration successful, set the user's session

                    echo "<script>alert('Registration successful. You can now login with your credentials.');</script>";
                    header('Location: login.php'); // Redirect to the desired page after registration

                } else {
                    // Registration failed
                    echo "<script>alert('Registration failed. Please try again.');</script>";
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

// ... (existing code)



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login & Registration</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <input type="checkbox" id="check">
        <div class="login form">
            <header>Signup</header>
            <form method="post">
                <input type="email" placeholder="Enter your email" name="email_id" required>
                <input type="text" placeholder="Enter your name" name="name" id="name" required>
                <input type="text" placeholder="Enter your Company" name="company_name" required>
                <input type="password" placeholder="Create a password" name="password" required>
                <input type="password" placeholder="Confirm your password" name="confirm_password" required>
                <input type="submit" class="button" value="Signup" name="siginup" required>
            </form>
            <div class="signup">
                <span class="signup">Already have an account?
                    <label><a href="login.php">Login</a></label>
                </span>
            </div>
        </div>
    </div>
</body>

</html>