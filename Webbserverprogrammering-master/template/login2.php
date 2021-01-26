<?php

if(empty($_POST['username'])||empty($POST['password'])){
   // header("Location:login.php");
   echo "tomt fält";
}

require "../includes/connect.php";

$username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

$sql="SELECT password, status FROM users WHERE username=?";
$res=$dbh->prepare($sql);
$res->bind_param("s", $username);
$res->execute();

$result=$res->get_result();
$row=$result->fetch_assoc();

if(!$row){
  //  header("Location:../html/login.php?status=1");
  echo "användare saknas";
}
else{
    if($password === $row['password']){
        session_start();
        $_SESSION['username']=$username;
        $_SESSION['status']=$row['status'];
       // header("Location:../html/admin.php");
       echo "användare inloggad";
    }
    elseif{
      //  header("Location:../html/login.php?status=2");
      echo "feelaktigt lösenord";
    }
}





if(!isset($_SESSION['username']))
{
  echo<<<NAV
  <nav>
    <ul>
      <li><a href="index.php">Start</a></li>
      <li><a href="products.php">Produkter</a></li>
      <li><a href="sida3.php">Varusida 2</a></li>
      <li><a href="login.php">Logga in</a></li>
    </ul>
  </nav>
NAV;
}

else
{
  if($_SESSION['status']==1)
  {
  echo<<<NAV
  <nav>
    <ul>
      <li><a href="index.php">Start</a></li>
      <li><a href="products.php">Produkter</a></li>
      <li><a href="sida3.php">Varusida 2</a></li>
      <li><a href="admin.php">Admin in</a></li>
    </ul>
  </nav>
NAV;
  }
}

elseif
{
  if($_SESSION['status']==2)
  {
  echo<<<NAV
  <nav id="admin">
    <ul>
      <li><a href="index.php">Start</a></li>
      <li><a href="createProducts.php">Lägga till produkter</a></li>
      <li><a href="sida3.php">ändra produkter </a></li>
      <li><a href="#">ta bort produkter </a></li>
      <li><a href="admin.php">Admin in</a></li>
    </ul>
  </nav>
NAV;
  }
}




echo $username;
echo "<br>";
echo $password;
?>