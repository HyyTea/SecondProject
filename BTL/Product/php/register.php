<!DOCTYPE html>
<html lang="en">

<head>
  <title>PHP Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--bootstrap4 library linked-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <!--custom style Khu này á Biết gì đâu-->
  <style type="text/css">
    body {
      width: 900px;
      height: 600px;
      border: 1px solid grey;
      border-radius: 10px;
      margin-left: 200px;
    }


    /* Full-width input fields */
    input[type=text],
    input[type=password],
    input[type=email] {
      width: 400px;
      height: 40px;
      margin-bottom: 0px;
      border-radius: 10px;
      border: 3px solid grey;
      padding-left: 10px;
    }

    button:hover {
      opacity: 0.8;
    }

    .container {
      padding: 16px;
      margin-left: 250px;
      margin-right: 250px;

    }

    .error {
      background-color: pink;
      color: red;
      height: 30px;
      width: 450px;
      font-weight: bold;
      border-radius: 10px;
      padding-left: 10px;
    }

    .success {
      background-color: green;
      color: white;
      height: 30px;
      width: 450px;
      border-radius: 10px;
      padding-left: 10px;
    }
  </style>
</head>

<body>
  <div class="registration-form">
    <center>
      <h2 class="text-center"><b><i>Sign Up</i></b></h2>
    </center>
    <div class="form">
      <form action="dang-ky.php" method="POST" style="border:3px  solid #ccc">
        <div class="container">

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

          <label><b>Username</b< /label>
              <input type="text" class="form-control" name="username" placeholder="Username" required /> </br>

              <label><b>Email</b< /label>
                  <input type="email" class="form-control" name="email" placeholder="Email" required /> </br>

                  <label><b>Phone</b< /label>
                      <input type="text" class="form-control" name="phone" placeholder="Phone" require> </br>

                      <label><b>Password</b< /label>
                          <input type="password" class="form-control" name="password" placeholder="Password" required /></br>

                          <label><b>Confirm Password</b< /label>
                              <input type="password" class="form-control" name="cpassword" placeholder="Enter Confirm password" require> </br>
                              <label>
                                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                              </label>
                              <input type="submit" name="submit" value="Sign Up" /></br>
        </div>
      </form>
    </div>
  </div>

</body>

</html>