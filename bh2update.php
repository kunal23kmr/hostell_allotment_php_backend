<?php
require_once("db.php");
include 'cors.php';


session_start();



if(isset($_POST['submit']))
{
    $room_no=mysqli_real_escape_string($con,$_POST["room_no"]);
    var_dump($room_no);
    $appid=$_SESSION['appid'];
    var_dump($appid);
    
    //$hostel_sql="select hostel_no from student_data where application_id='$appid'";
   // $result=mysqli_query($con,$hostel_sql);
 //   $row=mysqli_fetch_array($result);
    
    $hostel_no="2";
     if($hostel_no=="2")
    {
          $seat_update_sql="update bh2details set vacant_seats=vacant_seats-1, filled_seats=filled_seats+1 where room_no='$room_no'";
         if(mysqli_query($con,$seat_update_sql))
         {
             $booking_sql="insert into booking (application_id, room_no,hostel_no, alloted) values ( '$appid','$room_no','$hostel_no',1)";
             
             if(mysqli_query($con,$booking_sql))
    {
         echo '<script type=\'text/javascript\'> alert("You have completed your hostel  room allocation process"); location="alloted.php";</script>';
    }
         }
  }

    
    
}

?>
