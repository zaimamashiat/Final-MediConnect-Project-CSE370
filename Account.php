<?php
require "dbconnect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $name = $_POST['name'];
    $date_of_birth = $_POST['date_of_birth']; 
    $blood_group = $_POST['select'];
    $contact_no = $_POST['phone'];
    $street = $_POST['text'];
    $area = $_POST['text-1'];


    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into database
    $sql = "INSERT INTO users(name, date_of_birth, blood_group, contact_no, street, area) 
    VALUES ('$name', '$date_of_birth', '$blood_group', '$contact_no', '$street', '$area' )";

   // Prepare and bind parameters
   $stmt = $conn->prepare($sql);
   $stmt->bind_param('sssiis', $name ,$date_of_birth, $blood_group, $contact_no, $street, $area); 
 
   // Execute the statement
   if ($stmt->execute()) {
     echo "New User!";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
 
   // Close statement and connection
   $stmt->close();
   $conn->close();
    
}
?>

<!DOCTYPE html>
<html style="font-size: 16px;"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​Meet Our Dentists, Why choose Us, Our Tea​m">
    <meta name="description" content="">
    <title>MY ACCOUNT</title>
    <link rel="stylesheet" href="//capp.nicepage.com/f6e1082af664a338ece51958168cb77dda7f2618/nicepage.css" media="screen" class="u-static-style">
    <link rel="stylesheet" href="/nicepage.css" media="screen">
    <script class="u-script" type="text/javascript" src="//capp.nicepage.com/assets/jquery-1.9.1.min.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="//capp.nicepage.com/f6e1082af664a338ece51958168cb77dda7f2618/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.8.12, nicepage.com">
    <meta name="referrer" content="origin">
</head>
<body class="u-body u-overlap u-xl-mode" data-style="blank" data-posts="" data-global-section-properties="{&quot;colorings&quot;:{&quot;light&quot;:[&quot;clean&quot;],&quot;colored&quot;:[&quot;clean&quot;],&quot;dark&quot;:[&quot;dark&quot;]}}" data-source="fix" data-template-id="6216596" data-lang="en" data-page-sections-style="" data-page-coloring-types="{&quot;light&quot;:[&quot;clean&quot;],&quot;colored&quot;:[&quot;clean&quot;],&quot;dark&quot;:[&quot;dark&quot;]}" data-page-category="&quot;Basic&quot;" data-back-link="https://nicepage.com/css-templates" data-back-link-title="CSS Templates" data-wp-back-link="https://nicepage.com/wordpress-themes" data-wp-back-link-title="WordPress Themes" data-jm-back-link="https://nicepage.com/joomla-templates" data-jm-back-link-title="Joomla Templates" data-created-with-link="https://nicepage.com/wysiwyg-html-editor" data-created-with-title="Free WYSIWYG HTML Editor" data-wp-created-with-link="https://nicepage.com/wordpress-website-builder" data-wp-created-with-title="WordPress Website Builder" data-jm-created-with-link="https://nicepage.com/joomla-page-builder" data-jm-created-with-title="Joomla Editor">
    <section class="u-clearfix u-image u-block-7193-1" custom-posts-hash="[]" data-style="blank" data-section-properties="{&quot;margin&quot;:&quot;none&quot;,&quot;stretch&quot;:true}" id="sec-249d" data-source="Blank" data-id="7193" data-image-width="5472" data-image-height="3648">
        <div class="u-clearfix u-sheet u-block-7193-2" data-quillbot-parent="FiVVXZFNkqwoKkGhb_1P5">
            <quillbot-extension-highlights data-element-id="DCK6YhMDTIFCZizqrdYaf" data-element-type="html" style="display: initial; visibility: initial; opacity: initial; clip-path: initial; position: relative; float: left; top: 0px; left: 0px; z-index: 1 !important; pointer-events: none;"></quillbot-extension-highlights>
            <quillbot-extension-highlights data-element-id="FiVVXZFNkqwoKkGhb_1P5" data-element-type="html" style="display: initial; visibility: initial; opacity: initial; clip-path: initial; position: relative; float: left; top: 0px; left: 0px; z-index: 1 !important; pointer-events: none;"></quillbot-extension-highlights>
            <h2 class="u-custom-font u-font-georgia u-text u-text-default u-block-7193-16" data-gramm="false" wt-ignore-input="true" data-quillbot-element="FiVVXZFNkqwoKkGhb_1P5">MY ACCOUNT​</h2>
            <div class="u-form u-block-7193-4">
            <form action="process_form.php" method="POST" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="email" data-services="9ac3536ed3a7e7ff84fec97f5e5307c7" name="form" style="padding: 10px;">
                    <input type="hidden" id="siteId" name="siteId" value="6236010">
                    <input type="hidden" id="pageId" name="pageId" value="171844138">
                    <div class="u-form-group u-form-name u-block-7193-5">
                        <label for="name" class="u-custom-font u-font-georgia u-label u-block-7193-6">Name</label>
                        <input type="text" placeholder="Enter your Name" id="name" name="name" class="u-input u-input-rectangle u-block-7193-7" required="" fdprocessedid="qwunud" data-gramm="false" wt-ignore-input="true">
                    </div>
                    <div class="u-form-date u-form-group u-block-7193-8" data-quillbot-parent="hkH3RswuIwNnBSI3wTbNN">
                        <label for="email" class="u-custom-font u-font-georgia u-label u-block-7193-9">Date Of Birth</label>
                        <quillbot-extension-highlights data-element-id="hkH3RswuIwNnBSI3wTbNN" data-element-type="text" style="display: initial; visibility: initial; opacity: initial; clip-path: initial; position: relative; float: left; top: 0px; left: 0px; z-index: 1 !important; pointer-events: none;"></quillbot-extension-highlights>
                        <input type="text" placeholder="DD/MM/YYYY" id="email" name="email" class="u-input u-input-rectangle u-block-7193-10" required="required" fdprocessedid="oys1hl" data-gramm="false" wt-ignore-input="true" data-quillbot-element="hkH3RswuIwNnBSI3wTbNN" data-date-format="dd/mm/yyyy">
                    </div>
                    <div class="u-form-group u-form-select u-block-7193-20">
                        <label for="select-4d11" class="u-custom-font u-font-georgia u-label u-block-7193-21">Blood Group </label>
                        <div class="u-form-select-wrapper">
                            <select id="select" name="select" class="u-input u-input-rectangle u-block-7193-22" fdprocessedid="xss7br">
                                <option value="A+" data-calc="">A+</option>
                                <option value="A-" data-calc="">A-</option>
                                <option value="AB+" data-calc="">AB+</option>
                                <option value="AB-" data-calc="">AB-</option>
                                <option value="B+" data-calc="">B+</option>
                                <option value="B-" data-calc="">B-</option>
                                <option value="O+" data-calc="">O+</option>
                                <option value="O-" data-calc="">O-</option>
                            </select>
                            <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
                        </div>
                    </div>
                    <div class="u-form-group u-form-phone u-block-7193-23">
                        <label for="phone" class="u-custom-font u-font-georgia u-label u-block-7193-24">Contact No</label>
                        <input type="tel" pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})" placeholder="Enter your phone (e.g. +14155552675)" id="phone" name="phone" class="u-input u-input-rectangle u-block-7193-25" required="" fdprocessedid="jo7vao">
                    </div>
                    <div class="u-form-group u-block-7193-17">
                        <label for="text" class="u-custom-font u-font-georgia u-label u-block-7193-18">Street</label>
                        <input type="text" placeholder="" id="text" name="text" class="u-input u-input-rectangle u-block-7193-19" fdprocessedid="fzelzf" data-gramm="false" wt-ignore-input="true">
                    </div>
                    <div class="u-form-group u-block-7193-26">
                        <label for="text" class="u-custom-font u-font-georgia u-label u-block-7193-27">Area</label>
                        <input type="text" placeholder="" id="text" name="text-1" class="u-input u-input-rectangle u-block-7193-28" fdprocessedid="qi038r">
                    </div>
                    <div class="u-form-group u-form-message u-block-7193-11">
                        <label for="message" class="u-custom-font u-font-georgia u-label u-block-7193-12">Medical History</label>
                        <textarea placeholder="Enter your message" rows="4" cols="50" id="message" name="message" class="u-input u-input-rectangle u-block-7193-13" required="" data-gramm="false" wt-ignore-input="true"></textarea>
                    </div>
                    <div class="u-align-left u-form-group u-form-submit">
            <button type="submit" class="u-btn u-btn-submit u-button-style">Submit</button>
          </div>
                    <div class="u-form-send-message u-form-send-success">
                        Thank you! Your message has been sent.
                    </div>
                    <div class="u-form-send-error u-form-send-message">
                        Unable to send your message. Please fix errors then try again.
                    </div>
                    <input type="hidden" value="" name="recaptchaResponse">
                </form>
            </div>
        </div>
    </section>
</body></html>
