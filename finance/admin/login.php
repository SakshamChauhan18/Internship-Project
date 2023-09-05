<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=800, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./login_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Admin Login</title>
</head>
<?php
  session_start();
  include('connection.php');
  if(isset($_REQUEST['login']))
    {
      $username = $_REQUEST['username'];
      $password = $_REQUEST['password'];
      $select_query = mysqli_query($connection, "select * from administrator where username ='$username' and password='$password'");
      $res = mysqli_num_rows($select_query);
      if($res>0)
      {
        $data = mysqli_fetch_array($select_query);
        $name = $data['username'];
        $_SESSION['username'] = $username;
        header('location:index.php');
      }
      else
      {
        $msg = "Please enter valid Username or Password";
      }
    }
?>

  <body>
    <div class="center">
      <h1>Admin Login</h1>
      <form method="post">
        <div class="form-group txt_field">
          <input type="text" name="username" class="form-control" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="form-group txt_field">
          <input type="password" name="password" class="form-control" required>
          <span></span>
          <label>Password</label>
        </div>      
        <div class="form-group">
          <input type="submit" id="login" name="login" value="Sign In" class="btn btn-primary btn-large">
        </div>        
        <div class="home_link">
          To return to home, click <a href="../index.php">here</a>
        </div>
      </form>
    </div>
  </body>
</html>
