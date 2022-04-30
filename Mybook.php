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
$username=$_SESSION['username'];

if(isset($_GET['del'])){
    $del = $_GET['del'];
    $fr = $_GET['fr'];
    $to = $_GET['to'];
    $dedate = $_GET['dedate'];
    $redate = $_GET['redate'];
    $trip = $_GET['trip'];

    $sql = "DELETE FROM `usersacc` WHERE username='$del' AND fromd='$fr' AND tod='$to' AND depardate='$dedate' AND returndate='$redate' AND ro='$trip'";
    $resultt = mysqli_query($conn,$sql);
  
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chro
    	<title>Flight - Contact Page</title>
        <meta name=" description" content="">
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;

        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <div class="col-md-6">
        <div class="page-direction-button">
            <a href="index.php"><i class="fa fa-home"></i>Go Back Home</a>
        </div>
    </div>

    <div style=" overflow-x: auto;">
        <table>
            <h2 style="text-align: center;">My Booking</h2>
            <thead>
                <tr>
                    <th>SR.NO</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Departure Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <?php
        $sql = "SELECT * FROM `usersacc` where username = '$username'";
        $result = mysqli_query($conn,$sql);
        $sno = 0;
        while($row = mysqli_fetch_assoc($result)){
          $sno= $sno + 1;  
          echo "<tr>
            <th scope='row'>".$sno."</th>
            <td>".$row['fromd']."</td>
            <td>".$row['tod']."</td>
            <td>".$row['depardate']."</td>
            <td><a href='Mybook.php?del=".$row['username']."&fr=".$row['fromd']."&to=".$row['tod']."&dedate=".$row['depardate']."&redate=".$row['returndate']."&trip=".$row['ro']."'>Cancel Booking</a></td>
            </tr>";
          } 
          ?>

                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>