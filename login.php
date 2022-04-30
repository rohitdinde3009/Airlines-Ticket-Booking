<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "pankaj";

$conn = mysqli_connect($server,$username,$password,$dbname);

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from users where username='$username' AND password='$password'";
    $result = mysqli_query($conn,$sql);
   $num = mysqli_num_rows($result);

    if($num == 1){
          session_start();
          $_SESSION['loggedin']=true;
          $_SESSION['username']=$username;
          header("location: index.php");
    }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed!</strong> Wrong Details.
                    </div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-img {
  /* The image used */
  background-image: url("bg.jpg");
  /*background-color: cyan;*/

  min-height: 380px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Add styles to the form container */
.container {
  position: absolute;
  right: 0;
  margin: 20px;
  max-width: 300px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>
</head>
<body class="bg-img">

<!-- <h2>Form on Hero Image</h2> -->
<div >
  <form action="login.php" method="post" class="container" style=" left: 500px; margin-top: 50px;">
      
  </style>
    <h1>Login</h1>

    <label for="email"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit" class="btn">Login</button>
    <div style=" text-align: center; margin-top: 15px;">
         <a href="sign up.php" style="text-decoration: none;"><i class="fa fa-home"></i>Signup</a>
    </div>
    
  </form>
</div>

</body>
</html>