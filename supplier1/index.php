<?php  
include 'includes/header.php';
if (isset($_POST['login'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];

     $query = "SELECT * FROM tbl_supplier WHERE email = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
      
        $_SESSION['supplier_data'] = $row;
        
        mysqli_close($conn);
        header('Location: home.php');
        exit();
    } else {
        mysqli_close($conn);
        echo "<script type='text/javascript'>alert('Invalid Credentials')</script>";
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
        <input type="submit" class="button" value="Login" name="login">
      </form>
     
    </div>
  </div>
</body>
</html>