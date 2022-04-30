<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "pankaj";

$conn = mysqli_connect($server,$username,$password,$dbname);

        if($_SERVER['REQUEST_METHOD']=="POST"){
           
                $username=$_POST['username'];
                $fname=$_POST['firstname'];
                $lname=$_POST['lastname'];
                $password=$_POST['password'];
                $cpassword=$_POST['cpassword'];
                $email=$_POST['email'];

                $existsql = "select * from users where username='$username'";
                $result = mysqli_query($conn,$existsql);
                $numexistrow = mysqli_num_rows($result);

                if($numexistrow > 0){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed!</strong> User Already Exist.
                    </div>';
                }else{
                        if($password == $cpassword){
                        $sql = "INSERT INTO `users` (`username`, `firstn`, `lastn`, `email`, `password`) VALUES ('$username','$fname','$lname','$email','$password')";
                        $result = mysqli_query($conn,$sql);
                        
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Regestration Successfully.
                        </div>';
                        }else{
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Failed!</strong> Password Do Not Match.
                    </div>';
                        }
                    
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
input[type=text],input[type=email], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus,input[type=email]:focus, input[type=password]:focus {
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

<div >
  <form action="sign up.php" method="post" class="container" style=" left: 500px; margin-top: 50px; margin-bottom: 100px;">
      
  </style>
    <h1>Login</h1>

       <div class="form-group">
                        <label for="name">Username: </label>
                        <input type="text" name="username" id="name" placeholder="Enter Username " required>
                    </div>

                    <div class="form-group">
                        <label for="name">Firstname: </label>
                        <input type="text" name="firstname" id="name" placeholder="Enter first name" required>
                    </div>

                    <div class="form-group">
                        <label for="name">lastname: </label>
                        <input type="text" name="lastname" id="name" placeholder="Enter last name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="email" name="email" id="email" placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Password: </label>
                        <input type="password" name="password" id="phone" placeholder="Enter password" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">comferm password: </label>
                        <input type="password" name="cpassword" id="phone" placeholder="Enter password" required>
                    </div>


    <button type="submit" class="btn">Sign in</button>
    <div style=" text-align: center; margin-top: 15px;">
         <a href="login.php" style="text-decoration: none;"><i class="fa fa-home"></i>Login</a>
    </div>
    
  </form>
</div>

</body>
</html>