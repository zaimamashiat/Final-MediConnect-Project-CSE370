<?php
require_once('dbconnect.php');

if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

  $result = mysqli_query($conn, $sql);

  // empty set
  if (mysqli_num_rows($result) != 0) {
    echo "User logged in";
    echo "<script> localStorage.setItem('mediconnectusername', '" . $username . "');</script>";




    header("Location: Doctor-or-Patient.php");
  } else {
    echo "<script> alert('Username or Password is wrong'); </script>";
    // showWrongPasswordAlert();
    // header("Location: Create-an-Account.php");
  }
}


?>



<!DOCTYPE html>
<html lang="en" style="font-size: 16px;">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="MediConnect">
  <meta name="description" content="">
  <title>Login</title>
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="Login.css" media="screen">
  <meta name="generator" content="Nicepage 6.7.6, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
</head>

<body class="u-body u-xl-mode" data-lang="en">
  <section class="skrollable u-clearfix u-image u-shading u-section-1" id="sec-7deb" data-image-width="1100" data-image-height="731">
    <div class="u-clearfix u-sheet u-sheet-1">
      <img class="u-image u-image-default u-preserve-proportions u-image-1" src="images/7192.png_1200.png" alt="" data-image-width="2020" data-image-height="2020">
      <h1 class="u-text u-text-default u-text-palette-1-base u-text-1">MediConnect</h1>
      <p class="u-text u-text-default u-text-palette-4-light-2 u-text-2">Login</p>
      <div class="u-form u-login-control u-form-1">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" method="post" redirect="true" redirect-address="Doctor-or-Patient.php">
          <div class="u-form-group u-form-name">


            <div class="u-form-group u-form-name">
              <label for="username" class="u-label">Username *</label>
              <input type="text" placeholder="Enter your Username" id="username" name="username" class="u-input u-input-rectangle u-none u-input-1" required>
            </div>
            <div class="u-form-group u-form-password">
              <label for="password" class="u-label">Password *</label>
              <input type="password" placeholder="Enter your Password" id="password" name="password" class="u-input u-input-rectangle u-none u-input-2" required>
            </div>
            <div class="u-form-checkbox u-form-group">
              <input type="checkbox" id="remember" name="remember" value="On" class="u-field-input">
              <label for="remember" class="u-field-label" style="">Remember me</label>
            </div>
            <div class="u-align-left u-form-group u-form-submit">
              <button type="submit" class="u-btn u-btn-submit u-button-style u-btn-1">Login</button>
            </div>
            <input type="hidden" value="" name="recaptchaResponse">
        </form>
      </div>
      <a href="Create-an-Account.php" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-btn u-button-style u-none u-text-palette-1-light-2 u-btn-2"> New here? Create an Account</a>
      <a href="forgot.php" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-btn u-button-style u-none u-text-palette-1-light-2 u-btn-2">Forgot password?</a>

    </div>
  </section>

  <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-2f1d">
    <div class="u-clearfix u-sheet u-sheet-1"></div>
  </footer>
  <section class="u-backlink u-clearfix u-grey-80">
    <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
      <span>Website Templates</span>
    </a>
    <p class="u-text">
      <span>created with</span>
    </p>
    <a class="u-link" href="" target="_blank">
      <span>Website Builder Software</span>
    </a>.
  </section>
  <!-- <script>
    // JavaScript function to display dialog box when the password is wrong
    function showWrongPasswordAlert() {
      alert("Username or Password is wrong");
    }
  </script> -->
</body>

</html>