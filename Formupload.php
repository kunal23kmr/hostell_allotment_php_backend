<?php
require_once("db.php");
include 'cors.php';

session_start();



 if(isset($_POST["submit"]))
 {
     $name=mysqli_real_escape_string($con,$_POST["name"]);
     $regno=mysqli_real_escape_string($con,$_POST["rno"]);
     $father=mysqli_real_escape_string($con,$_POST["father"]);
     $mother=mysqli_real_escape_string($con,$_POST["mother"]);
     $branch=mysqli_real_escape_string($con,$_POST["branch"]);
     $selfno=mysqli_real_escape_string($con,$_POST["mnumber"]);
     $fatherno=mysqli_real_escape_string($con,$_POST["fmnumber"]);
     $motherno=mysqli_real_escape_string($con,$_POST["mmnumber"]);
     $email=mysqli_real_escape_string($con,$_POST["email"]);
     $lguardian=mysqli_real_escape_string($con,$_POST["laddress"]);
     $siblingmobile=mysqli_real_escape_string($con,$_POST["smobile"]);
     $address=mysqli_real_escape_string($con,$_POST["address"]);
     $state=mysqli_real_escape_string($con,$_POST["state"]);
     $phandicap=mysqli_real_escape_string($con,$_POST["ph"]);
     $gender=mysqli_real_escape_string($con,$_POST["gender"]);
     $hostel_no=mysqli_real_escape_string($con,$_POST["hostel_no"]);
     $blood_group=mysqli_real_escape_string($con,$_POST["blood_group"]);
     $filled=1;
     
      $sql="Insert into student_data (name,application_id, father_name,branch,self_mobile,father_mobile,mother_name,mother_mobile,address,state,ph,gender,filled,hostel_no,local_guardian,email,smobile,blood_group) values ('$name','$regno','$father','$branch','$selfno','$fatherno','$mother','$motherno','$address','$state','$phandicap','$gender','$filled','$hostel_no','$lguardian','$email','$siblingmobile','$blood_group')";
    
     
     
     if( $gender=="Female")
     {
         
         
        if(mysqli_query($con,$sql))
             {
                 echo '<script type=\'text/javascript\'> alert("Your Information Has Been Saved Successfully"); location="gh2.php";</script>';
                 
             }
             
             else
             {  
                 echo '<script type=\'text/javascript\'> alert("Error! Please fill the form again! "); location=Form.php";</script>';}
         }
     
     
     
     
     
     
 }
 

?>