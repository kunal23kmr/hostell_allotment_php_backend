<?php

require_once("db.php");
include 'cors.php';

session_start();

if(!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    // If the user is not authenticated, redirect them to the login page
    header('Location: signin.php');
    exit();
}
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <title>Upload Documents</title>
    
     <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>
</head>
<body>
    <div class="container mt-5">
     <center>   <h2>Please Upload the required documents:</h2></center>
        <form action="docupload.php" method="POST" enctype="multipart/form-data">
            <div class="col-md-6 offset-md-3 mb-3">
                <label for="hostel-receipt"><b>1. Institute Fee  Receipt (Hosteler - July to Dec-2023):</b></label>
                <input type="file" class="form-control" id="hostel-receipt" name="hostel-receipt" accept=".pdf" required>
                <small class="text-muted">Note: Receipt should be in PDF format only, size not more than 1MB.</small>
            </div>
            <div class="col-md-6 offset-md-3 mb-3">
                <label for="mess-receipt"><b>2. Mess Advance Receipt (July to Dec-2023):</b></label>
                <input type="file" class="form-control" id="mess-receipt" name="mess-receipt" accept=".pdf" required>
                <small class="text-muted">Note: Receipt should be in PDF format only, size not more than 1MB.</small>
            </div>
            <div class="col-md-6 offset-md-3 mb-3">
                <label for="aadhar-card"><b>3. Student's Aadhar Card (Self attested):</b></label>
                <input type="file" class="form-control" id="aadhar-card" name="aadhar-card" accept=".pdf"  required>
                <small class="text-muted">Note: Receipt should be in PDF format only, size not more than 1MB.</small>
            </div>
            <div class="col-md-6 offset-md-3 mb-3">
                <label for="passport-photo"><b>4. Student's Passport Size photo:</b></label>
                <input type="file" class="form-control" id="passport-photo" name="passport-photo" accept="image/*" required>
                <small class="text-muted">Note:Photo should be in JPEG format and  not more than 300KB.</small>
            </div>
            <center><button type="submit" class="btn btn-primary" name="submit" id="submit">Save & Proceed</button></center>
        </form>
    </div>
</body>
</html>