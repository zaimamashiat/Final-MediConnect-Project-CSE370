<?php
require "dbconnect.php";
function sanitize_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

// Signup
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Create_An_Account'])) {
    $name = sanitize_input($_POST['Name']);
    $username = sanitize_input($_POST['Username']);
    $password = sanitize_input($_POST['Password']); 
    $date_of_birth = sanitize_input($_POST['date_of_birth']);

    $check_query = "SELECT * FROM users WHERE Username='$username'";
    $result = $conn->query($check_query);
    if ($result->num_rows > 0) {
        echo "Username already exists";
    } else {
        $signup_query = "INSERT INTO users (Name, Username, Password, date_of_birth) VALUES ('$name', '$username', '$password', '$date_of_birth')";
        if ($conn->query($signup_query) === TRUE) {
        
            header("Location:Doctor-or-Patient.php");
            exit();
        } else {
            echo "Error: " . $signup_query . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="MediConnect">
    <meta name="description" content="">
    <title>Create an Account</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Create-an-Account.css" media="screen">
    <!-- <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script> -->
    <meta name="generator" content="Nicepage 6.7.6, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": ""
        }
    </script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Create an Account">
    <meta property="og:type" content="website">
    <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>

<body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en">
    <section class="u-clearfix u-image u-shading u-section-1" id="sec-899a" data-image-width="1100" data-image-height="731">
        <div class="u-clearfix u-sheet u-sheet-1">
            <img class="u-image u-image-default u-preserve-proportions u-image-1" src="images/7192.png_1200.png" alt="" data-image-width="2020" data-image-height="2020">
            <h1 class="u-text u-text-default u-text-palette-1-base u-text-1">MediConnect</h1>
            <div class="u-form u-form-1">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" method="post" redirect="true" redirect-address="Doctor-or-Patient.php">
                    <div class="u-form-group u-form-name">
                        <label for="name-705e" class="u-label">Name</label>
                        <input type="text" placeholder="Enter your Name" id="name-705e" name="Name" class="u-input u-input-rectangle" required="">
                    </div>
                    <div class="u-form-group u-form-partition-factor-2">
                        <label for="email-705e" class="u-label">Username</label>
                        <input type="text" placeholder="Enter a Username" id="email-705e" name="Username" class="u-input u-input-rectangle" required="required">
                    </div>
                    <div class="u-form-group u-form-partition-factor-2 u-form-group-3">
                        <label for="text-591b" class="u-label">Password</label>
                        <input type="password" placeholder="Enter your Password" id="text-591b" name="Password" class="u-input u-input-rectangle" required>
                    </div>
                    <div class="u-form-date u-form-group u-form-group-4">
                        <label for="date-5340" class="u-label">Date of Birth</label>
                        <input type="date" placeholder="MM/DD/YYYY" id="date-5340" name="date_of_birth" class="u-input u-input-rectangle" required="">
                    </div>
                    <div class="u-align-center u-form-group u-form-submit">
                        <button type="submit" class="u-btn u-btn-submit u-button-style u-btn-1" name="Create_An_Account">Create Account</button>
                    </div>
                    <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
                    <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
                    <input type="hidden" value="" name="recaptchaResponse">
                    <input type="hidden" name="formServices" value="991d3264-7970-2e40-1da0-a95cf4788c25">
                </form>
            </div>
            <p style="text-align: center; margin-top: 20px;">Already a user? <a href="index.php">Login here</a></p>
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
</body>

</html>
