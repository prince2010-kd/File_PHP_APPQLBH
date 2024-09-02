<?php
 include "connect.php";
 
if($_GET['key'] && $_GET['reset'])
{
  $email = $_GET['key'];
  $pass = $_GET['reset'];

  $query = "select mail, password from user where mail='$email' and password='$pass'";
  print_r($query);
  $data = mysqli_query($scon, $query);

 
  if($data == true)
  {
    ?>
    <form method="post" action="submit_new.php">
    <input type="hidden" name="mail" value="<?php echo $email;?>">
    <p>Enter New password</p>
    <input type="password" name='password'>
    <input type="submit" name="submit_password">
    </form>
    <?php
  }
}
?>