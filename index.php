<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

$server = "localhost";
$username = "root";
$password = "";
$dbname = "pankaj";
$conn = mysqli_connect($server,$username,$password,$dbname);

?>

<!DOCTYPE html>
<html>

<head>
    <title> online Air tickect booking</title>
    <link rel="stylesheet" href="style.css">
  
  <style>
      .centered {
  position: absolute;
  top: 20%;
  left: 50%;
  transform: translate(-50%, -50%);
}
  </style>
</head>

<body>
    <section class="banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="left-side">
                        <div class="tabs-content">

                            <div class="page-direction-button">
                                <a href="Mybook.php"><i class="fa-fa-phone"></i>My Booking</a>
                            </div>

                            <div class="page-direction-button">
                                <a href="contact.php"><i class="fa fa-phone"></i>Contact Us Now</a>
                            </div>

                            <div class="page-direction-button">
                                <a href="HOTEL.html"><i class="fa fa-phone"></i>Hotels</a>
                            </div>

                            <div class="page-direction-button">
                                <a href="Travel Blog.html"><i class="fa fa-phone"></i>Blogs</a>
                            </div>

                            <div class="page-direction-button">
                            <a href="fs.php"><i class="fa fa-phone"></i>Flight Search</a>
                        </div>

                            <div class="page-direction-button">
                                <a href="logout.php"><i class="fa fa-phone"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                    <div>
        
                    </div>

                    
             <div>
                        <img src="bg.jpg" alt="" style="width:1363px; height: 533px;">
                    <div class="centered text-center">
                        <h1 class="h1" style=" color: orangered;">About Us</h1>
                        <p style="color: darkviolet;">This is Pankaj</p>
                    </div>
             </div>


    <div class="tabs-content" id="recommended-hotel">
        <div class="container">
            <div class="row">
                <div class="col-md-12">





                    <footer>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- <div class="primary-button">
                                        <a href="#" class="scroll-top">Back To Top</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </footer>




</body>

</html>