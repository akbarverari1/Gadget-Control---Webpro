<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
  header("Location: index.html");
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $sql = "SELECT * FROM users WHERE email='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    if (!empty($_POST["remember"])) {
      setcookie("username", $_POST["username"], time() + 3600);
      setcookie("password", $_POST["password"], time() + 3600);
      echo "Cookies Set Successfuly";
      $row = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $row['username'];
      header("Location: index.html");
    } else {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $row['username'];
      header("Location: index.html");
    }
  } else {
    echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <title></title>
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.html"><img src="assets/logo.png" alt="Logo" class="img" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mob-navbar" aria-label="Toggle">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mob-navbar">
          <ul class="navbar-nav mb-2 mb-lg-0 mx-auto">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Device</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="forum.html" type="submit">Forum</a>
            </li>
          </ul>
          <form class="d-flex">
            <button class="btn btn-warning" type="submit">Login</button>
          </form>
        </div>
      </div>
    </nav>
  </header>
  <div class="container-fluid">
    <div class="row">
      <div class="col-6 pt-5 text-center bg-secondary">
        <div class="pt-5 container-fluid">
          <img src="assets/mockup2.png" class="pt-5 img-fluid" alt="Responsive image">
        </div>
        <div class="container-fluid">
          <p class="pt-5 Card-text font-weight-bold">Totally limiting access to mobile phones <br> and provide suggestions for applications <br>that you should limit.</p>
        </div>
        <div class="row">
          <div class="col-6 text-center bg-secondary">
            <div class="container-fluid">
              <img src="assets/appstore.png" class="pt-5 img-fluid" alt="Responsive image">
            </div>
          </div>
          <div class="col-6 text-center bg-secondary">
            <div class="container-fluid">
              <img src="assets/googleplay.png" class="pt-5 img-fluid" alt="Responsive image">
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 text-center bg-white">
        <h1 class="pt-5 Card-text font-weight-bold">Log In To Shaumgram</h1>
        <div class="col-9 container-fluid text-left">
          <h2 class="pt-5 font-light">Welcome Back! Please<br>fill in your username and password below</h2>
        </div>
        <div class="pt-5 container-fluid">
          <button type="button" class=" btn btn-secondary col-8">Google</button>
        </div>
        <div class="pt-5 container-fluid">
          <button type="button" class=" btn btn-secondary col-8">Email</button>
        </div>
        <div class="pt-5 container-fluid">
          <p>----------------------------- OR ------------------------------</p>
        </div>
        <form>
          <div class="text-left mb-3 mt-3">
            <label for="username" class="form-label col-4">Username</label>
            <input type="username" class="form-control bg-secondary" id="username" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
          </div>
          <div class="text-left mb-3 mt-3">
            <label for="password" class="form-label col-4">Password:</label>
            <input type="password" class="form-control bg-secondary" id="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="myCheck" name="remember" required>
                <label class="form-check-label" for="myCheck">Remember Me</label>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Check this checkbox to continue.</div>
              </div>
            </div>
            <div class="col-6">
              <button type="button" class="btn btn-link">Forgot Your Password?</button>
            </div>
          </div>
          <div class="pt-5 container-fluid">
            <button name="submit" type="button" class=" btn btn-secondary col-8">Login</button>
          </div>
          <div class="container">
            <p>Dont Have An Account?<a type="button" class="btn btn-link" href="register.html">Register</a></p>
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>
  </div>
  </div>
  <footer class="bg-light text-center text-lg-start">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      2021 @Shaumgram -- Terms & Policy
    </div>
  </footer>
</body>

</html>