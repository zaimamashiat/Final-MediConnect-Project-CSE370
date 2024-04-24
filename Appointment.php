<?php
require "dbconnect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $name = $_POST['name'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $doctor_id = $_POST['doctor_id'];
  $patient_id = $_POST['patient_id']; 
  $reasons = $_POST['reasons'];

  // Prepare SQL statement
  $sql = "INSERT INTO appointment (name, date, time, doctor_id, patient_id, reasons) VALUES (?, ?, ?, ?, ?, ?)";

  // Prepare and bind parameters
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('sssiis', $name, $date, $time, $doctor_id, $patient_id, $reasons); 

  // Execute the statement
  if ($stmt->execute()) {
    echo "Appointment booked successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close statement and connection
  $stmt->close();
  $conn->close();
}
?>



<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="BOOK APPOINTMENT">
  <meta name="description" content="">
  <title>Appointment</title>
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="Appointment.css" media="screen">
  <script class="u-script" type="text/javascript" src="jquery-1.9.1.min.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 6.8.8, nicepage.com">
  <meta name="referrer" content="origin">
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">



  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "",
      "logo": "images/default-logo.png"
    }
  </script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Appointment">
  <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>

<body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en">
  <header class="u-clearfix u-header u-header" id="sec-a692">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <a href="#" class="u-image u-logo u-image-1">
        <img src="images/default-logo.png" class="u-logo-image u-logo-image-1">
      </a>
      <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
        <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
          <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
            <svg class="u-svg-link" viewBox="0 0 24 24">
              <use xlink:href="#menu-hamburger"></use>
            </svg>
            <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
              <g>
                <rect y="1" width="16" height="2"></rect>
                <rect y="7" width="16" height="2"></rect>
                <rect y="13" width="16" height="2"></rect>
              </g>
            </svg>
          </a>
        </div>
        <div class="u-nav-container">
          <ul class="u-nav u-unstyled u-nav-1">
            <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Home.php" style="padding: 10px 20px;">Home</a>
            </li>
            <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="About.php" style="padding: 10px 20px;">About</a>
            </li>
            <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Page-1.php" style="padding: 10px 20px;">Page 1</a>
            </li>
            <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Appointment.php" style="padding: 10px 20px;">Appointment</a>
            </li>
            <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Home-Doctor.php" style="padding: 10px 20px;">Home Doctor</a>
            </li>
          </ul>
        </div>
        <div class="u-nav-container-collapse">
          <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
            <div class="u-inner-container-layout u-sidenav-overflow">
              <div class="u-menu-close"></div>
              <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.php">Home</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="About.php">About</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Page-1.php">Page 1</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Appointment.php">Appointment</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home-Doctor.php">Home Doctor</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
        </div>
      </nav>
    </div>
  </header>
  <section class="u-clearfix u-image u-shading u-section-1" id="sec-79e6" data-image-width="1657" data-image-height="1000">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h1 class="u-text u-text-1">BOOK APPOINTMENT</h1>
      <div class="u-form u-form-1">
        <form action="Appointment.php" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" method="POST" redirect="true" redirect-address="view_app.php">
          <div class="u-form-group u-form-name">
            <label for="name-5189" class="u-label">Name</label>
            <input type="text" placeholder="Enter your Name" id="name-5189" name="name" class="u-input u-input-rectangle" required="">
          </div>
          <div class="u-form-date u-form-group u-form-group-2">
            <label for="date-5c15" class="u-label">Date</label>
            <input type="text" placeholder="MM/DD/YYYY" id="date-5c15" name="date" class="u-input u-input-rectangle" required="" data-date-format="mm/dd/yyyy">
          </div>
          <div class="u-form-group u-form-time u-form-group-3">
            <label for="time-923d" class="u-label">Booking time</label>
            <input type="time" id="time-923d" name="time" class="u-input u-input-rectangle">
          </div>
          <div class="u-form-group u-form-group-4">
            <label for="text-42ca" class="u-label">Doctor_ID</label>
            <input type="text" placeholder="" id="text-42ca" name="doctor_id" class="u-input u-input-rectangle">
          </div>
          <div class="u-form-group u-form-message">
            <label for="message-5189" class="u-label">Reasons</label>
            <textarea placeholder="Enter your message" rows="4" cols="50" id="message-5189" name="reasons" class="u-input u-input-rectangle" required=""></textarea>
          </div>
          <div class="u-form-group u-form-group-5">
            <label for="patient_id" class="u-label">Patient ID</label>
            <input type="text" placeholder="Enter Patient ID" id="patient_id" name="patient_id" class="u-input u-input-rectangle" required="">
          </div>

          <div class="u-align-left u-form-group u-form-submit">
            <button type="submit" class="u-btn u-btn-submit u-button-style">Submit</button>
          </div>
          <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
          <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
          <input type="hidden" value="" name="recaptchaResponse">
          <input type="hidden" name="formServices" value="991d3264-7970-2e40-1da0-a95cf4788c25">
        </form>

      </div>
    </div>
  </section>



  <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-d430">
    <div class="u-clearfix u-sheet u-sheet-1">
      <p class="u-small-text u-text u-text-variant u-text-1">Sample text. Click to select the Text Element.</p>
    </div>
  </footer>
  <section class="u-backlink u-clearfix u-grey-80">
    <p class="u-text">
      <span>This site was created with the </span>
      <a class="u-link" href="https://nicepage.com/" target="_blank" rel="nofollow">
        <span>Nicepage</span>
      </a>
    </p>
  </section>

</body>

</html>
