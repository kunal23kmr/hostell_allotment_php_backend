<?php
require_once("db.php");
include 'cors.php';

session_start();

$appid=$_SESSION['appid'];



require_once("db.php");



if(isset($_POST['submit']))
{
    $room_no=mysqli_real_escape_string($con,$_POST["room_no"]);
    $appid=$_SESSION['appid'];
    $captcha=mysqli_real_escape_string($con,$_POST['captcha']);
    
    //$hostel_sql="select hostel_no from student_data where application_id='$appid'";
   // $result=mysqli_query($con,$hostel_sql);
 //   $row=mysqli_fetch_array($result);
    if($_SESSION['CAPTCHA_CODEBH5']==$captcha)
    {
    $hostel_no="5";
    if($hostel_no=="5")
    {   $checksql="select vacant_seats from bh5details where room_no='$room_no'";
        $checkresult=mysqli_query($con,$checksql);
        $checkdata=mysqli_fetch_array($checkresult);
        
        if($checkdata['vacant_seats']>0)
        {
          $seat_update_sql="update bh5details set vacant_seats=vacant_seats-1, filled_seats=filled_seats+1 where room_no='$room_no'";
          
         if(mysqli_query($con,$seat_update_sql))
         {
             $booking_sql="insert into booking (application_id, room_no,hostel_no, alloted) values ( '$appid','$room_no','$hostel_no',1)";
             
             if(mysqli_query($con,$booking_sql))
    {
         echo '<script type=\'text/javascript\'> alert("You have completed your hostel  room allocation process"); location="alloted.php";</script>';
    }
         }
  }
  
  else
  {
      echo '<script type=\'text/javascript\'> alert("No Vacant Rooms In the Room! Please Try Again!"); location="bh5.php";</script>';
  }
    
    
}
}

else
{
    echo '<script type=\'text/javascript\'> alert("Wrong Captcha Code Please Select a Seat Again!"); location="bh5.php";</script>';
}


}

?>
