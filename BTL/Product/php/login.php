
<?php
session_start();
if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {

  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];

  $conn = mysqli_connect('localhost', 'root', '', 'web_mysqli');

  $sql = "
            SELECT * 
            FROM users
            WHERE username = '$username' AND password = '$password'
    ";

  $result = mysqli_query($conn, $sql);
  $total = mysqli_num_rows($result);

  $row = mysqli_fetch_array($result);

  if ($total == 1) {
    $_SESSION['id'] = $row['ID'];
    header("Location: ../../Home/BTLN2/trangchu.html");
  } else {
    if ($total == 0) {
      header("Location: ?error=User Name is required");
    } else {
      if ($password != $row['password']) {
        header("Location: ?error=incorrect password");
      }
    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Login</title>
</head>
<style>
  body {
    width: 900px;
    height: 500px;
    border: 1px solid grey;
    border-radius: 10px;
    margin-left: 200px;

  }

  h1 {
    color: #868787;
    font-family: sans-serif;

  }

  input[type=text],
  input[type=password] {
    width: 400px;
    height: 40px;
    margin-bottom: 30px;
    border-radius: 10px;
    border: 3px solid grey;
    padding-left: 40px;
  }

  button {
    width: 450px;
    height: 40px;
    margin-bottom: 20px;
    border-radius: 10px;
    background-color: #45a049;
    color: white;
  }

  button:hover {
    opacity: 0.8;
  }

  .cancelbtn {
    width: auto;
    background-color: #363636;
  }

  .container {
    padding: 10px;
    margin-left: 240px;
    margin-right: 300px;

  }

  .ppp {
    padding: 16px;
    width: 400px;
    height: 40px;
    margin-left: 240px;
    margin-right: 300px;

    padding-left: 40px;
  }

  span.psw {
    float: right;
    padding-top: 16px;
  }

  .error {
    background-color: pink;
    color: red;
    height: 20px;
    width: 450px;
    font-weight: bold;
  }

  .success {
    background-color: green;
    color: white;
    height: 30px;
    width: 450px;
    border-radius: 10px;
    padding-left: 10px;
  }

  background {
    background-image: linear-gradient(0, #000000, #3C3C3C);
  }

  /* Change styles for span and cancel button on extra small screens */

  @media screen and (max-width:600px) {
    span.psw {
      display: block;
      float: none;
    }

    .cancelbtn {
      width: 100%;
    }
  }
</style>


<body>
  <div class="form">
    <h1 align="center"><b><i>Sign in</i></b></h1>
    <form action="login.php" method="post">
      <div class="container">
        <!--  

 -->
        <?php
        if (isset($_GET['error'])) {
        ?>
          <p class="error">
            <?php
            echo $_GET['error'];
            ?>
          </p>
        <?php
        }
        ?>

        <?php if (isset($_GET['success'])) { ?>
          <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <!-- 

 -->
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
        <button type="submit">Login</button>

      </div>

      <div class="ppp" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
      </div>

      <center>
        <p>Not registered yet? <a href='register.php'>Register Here</a></p>
      </center>

</body>

</html><br>
<div>
        <a href="../pages/product.php">Trang sản phẩm</a>
        </div>    