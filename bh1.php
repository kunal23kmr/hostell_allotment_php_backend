<?php
require_once("db.php");
include 'cors.php';


session_start();

$appid=$_SESSION['appid'];
if(!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    // If the user is not authenticated, redirect them to the login page
    header('Location: signin.php');
    exit();
}
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");



?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="1000">
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hostel Allotment Portal | NITJ</title>
<meta name="keywords" content="NITJ Hostel Allotment" />
<meta name="description" content="Joint Conference" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/rase.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/dropdown.css" rel="stylesheet" type="text/css" media="all" />

<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="-1" />

<style>
  body {
    padding: 30px;
  }

  .floor {
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 10px;
  }

  .floor h5 {
    text-align: center;
  }
</style>


<script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>

    

</head>
<body>
    <h3 class="text-center mb-4">Hostel No 1:</h3>
<h3 class="text-center mb-4">Select Your Room from the following:</h3>

<form action="bh1update.php" method="post">
  <div class="container">
    <div class="row align-items-start">
      <div class="col floor">
        <h5>Ground Floor</h5>
        <?php
        $sql = "select * from bh1details where floor_no=1 and vacant_seats>0";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
            echo '<input type="radio" id="' . $row["room_no"] . '" name="room_no" value="' . $row["room_no"] . '" required>';
            echo '<label for="' . $row["room_no"] . '">' . $row["room_no"] . ' (Available Seats:' . $row["vacant_seats"] . ')</label><br>';
          }
        }
        ?>
      </div>
      
      <div class="col floor">
        <h5>First Floor</h5>
        <?php
        $sql = "select * from bh1details where floor_no=2 and vacant_seats>0";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
            echo '<input type="radio" id="' . $row["room_no"] . '" name="room_no" value="' . $row["room_no"] . '" required>';
            echo '<label for="' . $row["room_no"] . '">' . $row["room_no"] . ' (Available Seats:' . $row["vacant_seats"] . ')</label><br>';
          }
        }
        ?>
      </div>
      
      <div class="col floor">
        <h5>Second Floor</h5>
        <?php
        $sql = "select * from bh1details where floor_no=3 and vacant_seats>0";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
            echo '<input type="radio" id="' . $row["room_no"] . '" name="room_no" value="' . $row["room_no"] . '" required>';
            echo '<label for="' . $row["room_no"] . '">' . $row["room_no"] . ' (Available Seats:' . $row["vacant_seats"] . ')</label><br>';
          }
        }
        ?>
      </div>
      
      
      <!-- Add other floor sections here -->
    </div>
  </div>

  <div class="form-group text-center mt-4">
    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">
  </div>       
</form>
</body>
</html>