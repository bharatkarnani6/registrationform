<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  </head>
  <body style="background:cadetblue;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/1024px-Bootstrap_logo.svg.png" width="30" height="30" alt="">
    </a>
    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/ca/index.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">PortFolio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
    </ul>
    <span class="navbar-text">
      Welcome To Maheswari Kre@tion
    </span>
    </div>
    </nav>

<?php

$host="localhost";
$user="root";
$password="";
$con=mysqli_connect($host,$user,$password);
$dbname=mysqli_select_db($con,"mynew");
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$fname ="";
$lname ="";
$email='';
$pass='';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
}
function filterName($fname){
  $a=$fname;
  if($a[0]==strtolower($a[0])){
      $a[0]=strtoupper($a[0]);
      $fname=$a;
      return $fname;
  }else{
    return $fname;
  }
}
function filterName2($lname){
  $a=$lname;
  if($a[0]==strtolower($a[0])){
      $a[0]=strtoupper($a[0]);
      $lname=$a;
      return $lname;
  }else{
    return $lname;
  }
}

function filterEmail($email){

    $field = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return $email;
    } else{
        return FALSE;
    }
}
$sql="insert into register(fname,lname,email,password) values ('$fname','$lname','$email','$pass')";
if(mysqli_query($con, $sql)){
    echo "<div class='jumbotron shadow-lg p-3 mb-5 rounded' style='margin: 100px; background:aliceblue;'>";
    echo "<h1><center>Welcome " .filterName($fname)." ". filterName2($lname)."</center></h1>";
    echo "<center>";
    echo "<p>You are almost there. Verify your email address to complete your registration with maheswarikreation.com.</p>";
    echo "<button type='button' class='btn btn-primary'>Verify Email</button>";
    echo "<p>Your email ID stays confidential with us. Verifying your email will ensure that you receive all the important emails from your recruiter.
Didn't request this action? Kindly contact us at support@maheswarikreation.com.</p>";
    echo "</center>";
    echo "</div>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
mysqli_close($con);


 ?>
</body>
</html>
