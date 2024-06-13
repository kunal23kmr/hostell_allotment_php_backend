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


$sql_gh2="select sum(vacant_seats) from gh2details where vacant_seats='gh2'";
$result_gh2=mysqli_query($con,$sql_gh2);
$data_gh2=mysqli_fetch_array($result_gh2);

?>


<?php
 require_once("db.php");
 
session_start();

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
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="css/rase.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/dropdown.css" rel="stylesheet" type="text/css" media="all" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />

<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="-1" />

 <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>
    
</head>
<body>
    <h3 class="text-center mb-4">Girls Hostel 1:</h3>
    <h7> Select Your Room  from the following:  </h7>
    
    
        
 <form action="gh2update.php" method="post">
    
   
   <div class="container">
  <div class="row align-items-start">
    <div class="col">
        
      Ground Floor<br>
     <?php
     if($data_gh2['sum(vacant_seats)']>1)
     {
      $sql="select * from gh2details where floor_no=1 and vacant_seats>0";
      $result=mysqli_query($con,$sql);
       if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_array($result))
        { echo '<input type="radio" id="' . $row["room_no"] . '" name="room_no" value="'.$row["room_no"].'" required>';
           echo '<label for="' . $row["room_no"] . '">' . $row["room_no"] . '(Available Seats:'.$row["vacant_seats"].')</label><br>';
        }
    }
     }
     
     else
     
     {
         $sql="select * from gh1details where floor_no=1 and vacant_seats>0";
      $result=mysqli_query($con,$sql);
       if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_array($result))
        { echo '<input type="radio" id="' . $row["room_no"] . '" name="room_no" value="'.$row["room_no"].'" required>';
           echo '<label for="' . $row["room_no"] . '">' . $row["room_no"] . '(Available Seats:'.$row["vacant_seats"].')</label><br>';
        }
    }
     }
     
     
     ?>
    </div>
    <div class="col">
      First Floor<br>
      <?php
      if($data_gh2['sum(vacant_seats)']>1)
      {
      $sql="select * from gh2details where floor_no=2 and vacant_seats>0";
      $result=mysqli_query($con,$sql);
       if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_array($result))
        { echo '<input type="radio" id="' . $row["room_no"] . '" name="room_no" value="'.$row["room_no"].'" required>';
           echo '<label for="' . $row["room_no"] . '">' . $row["room_no"] . '(Available Seats:'.$row["vacant_seats"].')</label><br>';
        }
    }
    }
    
    else
     
     {
         $sql="select * from gh1details where floor_no=2 and vacant_seats>0";
      $result=mysqli_query($con,$sql);
       if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_array($result))
        { echo '<input type="radio" id="' . $row["room_no"] . '" name="room_no" value="'.$row["room_no"].'" required>';
           echo '<label for="' . $row["room_no"] . '">' . $row["room_no"] . '(Available Seats:'.$row["vacant_seats"].')</label><br>';
        }
    }
     }
     ?>
    </div>
    <div class="col">
      Second Floor<br>
      
      <?php
      if($data_gh2['sum(vacant_seats)']>1)
      {
      $sql="select * from gh2details where floor_no=3 and vacant_seats>0";
      $result=mysqli_query($con,$sql);
       if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_array($result))
        { echo '<input type="radio" id="' . $row["room_no"] . '" name="room_no" value="'.$row["room_no"].'" required>';
           echo '<label for="' . $row["room_no"] . '">' . $row["room_no"] . '(Available Seats:'.$row["vacant_seats"].')</label><br>';
        }
    }
      }
     ?>
    </div>
  </div>
  </div>
  
 <center> 
 <div class="form-group">
      <label>Captcha Code</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="captchagh2.php" alt="PHP Captcha"><br><br>
<br><br<br>
<label>Enter Captcha</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input type="text" class="form-control"  name="captcha" id="captcha" required><br><br>
  </div>
  
 <div class="form-group">
 <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary"></center>
</div>    
       
    
    </form>
    </table>
    
</body>