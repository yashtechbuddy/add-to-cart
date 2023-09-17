<?php  
session_start();
include 'config.php';
// include 'head.php';
// var_dump($_SESSION['cart']);
error_reporting(E_ALL);
ini_set('display_error',1);
// if(isset($_SESSION['login-customer'])){
//     header('Location: index.php');
// }
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];


    $stmt = $db->prepare("SELECT * FROM tbl_customer WHERE email_id = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // 3. Compare the hashed password
        if ($password == $user['password']) {
            // Password is correct, set the user's session
            $_SESSION['login-customer'] = $user;
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
               header('Location:cart.php'); // Redirect to the desired page after login
               exit();
            }else{
                  header('Location:index.php'); 
            }
           
        } else {
            // Password is incorrect
            echo "<script>alert('Incorrect password. Please try again.');</script>";
        }
    } else {
        // User not found
        echo "<script>alert('User not found. Please check your email or signup.');</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form method="post">
        <input type="email" placeholder="Enter your email" name="email" required>
        <input type="password" placeholder="Enter your password" name="password" required>
        <a href="#">Forgot password?</a>
        <input type="submit" class="button" value="Login" name="login">
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <label><a href="signup.php">Signup</a></label>
        </span>
      </div>
    </div>
  </div>
</body>
</html>
