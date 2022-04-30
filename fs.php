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
$from = Null;
$to = Null;
$date = Null;

if(isset($_POST['submit'])){
  $from = $_POST['from'];
  $to = $_POST['to'];
  $date = $_POST['date'];
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title></title>
  </head>
  <body>

  	<div class="container mt-3">
  		<h3>Search Flight</h3>
  	</div>

<form action="fs.php" method="post" >

    <div class="container mt-3">
  <div class="row">
    <div class="col">
    	<select name="from" class="form-select" aria-label="Default select example">
		  <option selected>Select From</option>
		  <option value="mumbai">Mumbai</option>
      <option value="Hong Kong">Hong Kong</option>
      <option value="India">Delhi</option>
      <option value="Japan">Japan</option>
      <option value="Korea">Korea</option>
      <option value="Laos">Laos</option>
      <option value="Myanmar">Myanmar</option>
      <option value="Singapore">Singapore</option>
      <option value="Thailand">Thailand</option>
      <option value="Vietnam">Vietnam</option>
		</select>
    </div>
    <div class="col">
    		<select name="to" class="form-select" aria-label="Default select example">
		  <option selected>Select To</option>
		  <option value="delhi">Delhi</option>
      <option value="Mumbai">Mumbai</option>
      <option value="Hong Kong">Hong Kong</option>
      <option value="India">Delhi</option>
      <option value="Japan">Japan</option>
      <option value="Korea">Korea</option>
      <option value="Laos">Laos</option>
      <option value="Myanmar">Myanmar</option>
      <option value="Singapore">Singapore</option>
      <option value="Thailand">Thailand</option>
      <option value="Vietnam">Vietnam</option>
		</select>
    </div>
    <div class="col">
    	  <input type="date" id="" name="date" class="form-control">
    </div>
    <div class="col">
    	<button type="submit" name="submit" class="btn btn-info">Search</button>
    </div>
  </div>
</div>
</form>

  <div class="container mt-5">
  <h2>Search Results</h2>
  <p></p>            
  <table class="table ">
    <thead>
      <tr>
        <th>Sr.No</th>
        <th>From</th>
        <th>To</th>
        <th>Date</th>
        <th>Time</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "SELECT * FROM `fi` where fromd= '$from' AND tod='$to' AND dated='$date'";
        $result = mysqli_query($conn,$sql);
        $sno = 0;
        while($row = mysqli_fetch_assoc($result)){
          $sno= $sno + 1;  
          echo "<tr>
            <th scope='row'>".$sno."</th>
            <td class='text-capitalize'>".$row['fromd']."</td>
            <td class='text-capitalize'>".$row['tod']."</td>
            <td>".$row['dated']."</td>
            <td>".$row['time']."</td>
            <td>".$row['price']."</td> 
            <td><a href='fb.php?sel=".$username."&fr=".$row['fromd']."&to=".$row['tod']."&date=".$row['dated']."&time=".$row['time']."&price=".$row['price']."' class='btn btn-danger'>Select</a></td>
           ";

          }
          ?>
  
    </tbody>
  </table>
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>