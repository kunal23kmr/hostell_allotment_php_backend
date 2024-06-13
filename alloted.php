<?php
session_start();
require_once("db.php");
include 'cors.php';


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
<style>
  .allotment-container {
    background: #f8f9fa;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
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
  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3 allotment-container">
                <?php
                $appid = $_SESSION['appid'];
                $booking_sql = "select *  from booking where application_id='$appid'";
                $result_booking = mysqli_query($con, $booking_sql);
                $row_booking = mysqli_fetch_array($result_booking);
                $alloted = $row_booking['alloted'];
                $hostel_no = $row_booking['hostel_no'];
                $room_no = $row_booking['room_no'];
                echo "<h4>Application ID: " . $appid . "</h4>";
                if ($alloted == 1) {
                    echo "<p><b>You have been alloted Room No " . $room_no . " in Hostel No: " . $hostel_no . "</b></p>";
                }
                
                $data_sql="select * from student_data where application_id='$appid'";
                $result_data=mysqli_query($con,$data_sql);
                $data=mysqli_fetch_array($result_data);
                
                $files_sql="select * from docs where application_id='$appid'";
                $result_files=mysqli_query($con,$files_sql);
                $files=mysqli_fetch_array($result_files);
                
               
                
            
                echo'<p style="color:red">Download the following and bring hard copy along with you.</p>';
           echo'  <a href="hostel_form_1.php" class="btn btn-info" target="_blank">Download  Hostel Performa and Undertakings </a><br><br>';
           
            
               echo ' <a href="logout.php" class="btn btn-danger">Logout</a>';
               
                
                ?>
                  
                
                
             
         </div>
            
            
           </div>
    </div>
    <center>
        <div class="row justify-content-center">
    <div class="col-auto">
      <table class="table table-responsive">
        <th></th>
        <th></th>
                    <tr>
                        <td><img src="<?php echo $files[photo] ?>"></td>
                    </tr>
                    <tr>
                        <td>Name:</td>
                        <td><?php echo $data['name']; ?></td>
                    </tr>
                    <tr>
                        <td>Father Name:</td>
                        <td><?php echo $data['father_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Mother Name:</td>
                        <td><?php echo  $data['mother_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Father' Mobile Number:</td>
                        <td><?php echo  $data['father_mobile']; ?></td>
                    </tr>
                    <tr>
                        <td>Mother's Mobile Number:</td>
                        <td><?php echo $data['mother_mobile']; ?></td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td><?php echo $data['gender']; ?></td>
                    </tr>
                     <tr>
                        <td>Branch:</td>
                        <td><?php echo $data['branch']; ?></td>
                    </tr>
                     <tr>
                        <td>Address</td>
                        <td><?php echo $data['address']; ?></td>
                    </tr>
                    <tr>
                        <td>State:</td>
                        <td><?php echo $data['state']; ?></td>
                    </tr>
                    <tr>
                        <td>Local Guardian Address: </td>
                        <td><?php echo $data['address']; ?></td>
                    </tr>
                    
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $data['address']; ?></td>
                    </tr>
                    <tr>
                        <td>Rent Receipt</td>
                        <td><a href="<?php echo $files[rent_receipt] ?>" class="btn btn-info">Rent Receipt</a></td>
                    </tr>
                    <tr>
                        <td>Mess Advance</td>
                        <td><a href="<?php echo $files[mess_advance] ?>" class="btn btn-info">Mess Advance Receipt</a></td>
                    </tr>
                    <tr>
                        <td>Aadhaar</td>
                        <td><a href="<?php echo $files[aadhaar] ?>" class="btn btn-info">Aadhaar Receipt</a></td>
                    </tr>
                </table>  
               </div>
               </div>
               </center>
</body>
</html>