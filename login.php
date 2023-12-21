<!-- switched session.php for conn.php in the include -->
<?php
///if(isset($_SESSION['user'])){
///header('location: cart_view.php');
///}
?>
<?php ///include 'includes/header.php'; 
?>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="Assets/css/login.css">

</head>

<body>
<div class="container-fluid bg-image" style="background-image: url('Assets/images/background.jpg'); height: 100vh;">
  <?php
  if (isset($_SESSION['error'])) {
    echo "
          <div class='callout callout-danger text-center'>
            <p>" . $_SESSION['error'] . "</p> 
          </div>
        ";
    unset($_SESSION['error']);
  }
  if (isset($_SESSION['success'])) {
    echo "
          <div class='callout callout-success text-center'>
            <p>" . $_SESSION['success'] . "</p> 
          </div>
        ";
    unset($_SESSION['success']);
  }
  ?>
  <div class="row">
    <div class="col"></div>
    <div class="col text-center">
      <p id="head">Sign in to start your session</p>
    </div>
    <div class="col"></div>
  </div>
  <div class="row"></div>
  <div class="row">
    <div class="col"></div>
    <div class="col">
      <form action="conn.php" method="POST">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="user" placeholder="Username" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="">
          <div class="">
            <button type="submit" class="" name="login"><i class=""></i> Sign In</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col"></div>
  </div>
  <div class="row">
    <div class="col"></div>
    <div class="col"><a href="register.php" class="text-center">Register a new membership</a><br></div>
    <div class="col"></div>
  </div>
  <div class="row"></div>
  
  </div>

  <?php ///include 'includes/scripts.php' 
  ?>
  </div>
</body>

</html>