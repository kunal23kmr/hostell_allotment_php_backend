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


    
</head>
<body>
  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3 allotment-container">
                <?php
                $appid = $_SESSION['appid'];
                
                $data_sql="select * from student_data where application_id='$appid'";
                $result_data=mysqli_query($con,$data_sql);
                $data=mysqli_fetch_array($result_data);
                
                
                
            
            echo'<p style="color:red">Download the following Undertaking Forms and bring hard copy along with you.</p>';    
           echo'  <a href="undertaking_day.php" class="btn btn-info" target="_blank"> Download  Undertaking Forms </a><br><br>';
           
            
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
                    
                </table>  
               </div>
               </div>
               </center>
</body>
</html>