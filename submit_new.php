<?php
 include "connect.php";

if(isset($_POST['submit_password']) && $_POST['mail'])
{
  $email = $_POST['mail'];
  $pass = $_POST['password'];
  
  $query = "update user set password='$pass' where mail='$email'";

  print_r($query);
  $data = mysqli_query($scon, $query);
  if($data == true)
  {
    echo "Thành công!!!";
  }
}
?>