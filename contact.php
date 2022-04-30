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

        if($_SERVER['REQUEST_METHOD']=="POST"){
           
                $name=$_POST['name'];
                $email=$_POST['email'];
                $msg=$_POST['message'];
                
                 $sql = "INSERT INTO `contact` (`name`, `email`, `msg`) VALUES ('$name','$email','$msg')";
                        $result = mysqli_query($conn,$sql);

                        if($result){
                             echo '<div class="alert  alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Submit Successfully.
                        </div>';
                    }
                    else
                    {
                         echo '<div class="alert  alert-dismissible fade show" role="alert">
                        <strong>Failed!</strong> Failed.
                        </div>';
                    }

          }      
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chro
    	<title>Flight - Contact Page</title>
        <meta name=" description" content="">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <section>
        <div class="col-md-6">
            <div class="page-direction-button">
                <a href="index.php" style="color:black"><i class="fa fa-home"></i>Go Back Home</a>
            </div>
        </div>
    </section>
    <section class="contact-us">
        <div class="container">
            <div class="
                <div class=" col-md-6">


                <section class="contact-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-heading">
                                    <h2>Leave us a message</h2>
                                </div>
                            </div>
                            <div class="col-md-6 col-md-offset-3">
                                <form id="contact" action="contact.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <input name="name" type="text" class="form-control" id="name"
                                                    placeholder="Your name..." required=""
                                                    style="margin: 0px;width: 1174px;height:31px;align-item:center"
                                                    required>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <input name="email" type="text" class="form-control" id="email"
                                                    placeholder="Your email..." required=""
                                                    style="margin: 0px;width: 1174px;height:31px;" required>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset>
                                                <textarea name="message" rows="6" class="form-control" id="message"
                                                    placeholder="Your message..." required=""
                                                    style="margin: 0px;width: 1174px;height: 104px;"
                                                    required></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="btn"
                                                    style="color:black;">Submit Your Message</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="primary-button">
                                <a href="#" class="scroll-top" style="color:black">Back To Top</a>
                            </div>
                        </div>


                        </ul>
                    </div>
                    <div class="col-md-12">


                        | Design: <a href="#" target="_parent"><em>SE4</em></a></p>
                    </div>
                </div>
            </div>
            </footer>




</body>

</html>