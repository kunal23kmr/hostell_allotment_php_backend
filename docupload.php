<?php
require_once("db.php");
include 'cors.php';

session_start();

$appid=$_SESSION['appid'];

$gender_sql="select gender from signup where application_id='$appid'";
$result_gender=mysqli_query($con,$gender_sql);
$gender=mysqli_fetch_array($result_gender);

//$gender=$_SESSION['gender'];





$timestamp=date("Ymdhis");
 
 date_default_timezone_set('Asia/Calcutta');


if(isset($_POST['submit']))

{
    $hostel_rent_directory="rent/";  
    $filetype=".pdf";
    $photo_filetype=".jpg";
    $hostel_rent_filepath=$hostel_rent_directory.$appid.$timestamp.$filetype;
    $mess_advance_directory="mess/";
    $mess_advance_filepath=$mess_advance_directory.$appid.$timestamp.$filetype;
    $aadhaar_directory="aadhaar/";
    $aadhaar_filepath=$aadhaar_directory.$appid.$timestamp.$filetype;
    $photo_directory="photos/";
    $photo_filepath=$photo_directory.$appid.$photo_filetype;
    
    $sql="insert into docs (application_id, rent_receipt, mess_advance,aadhaar,photo,uploaded) values ('$appid','$hostel_rent_filepath','$mess_advance_filepath','$aadhaar_filepath','$photo_filepath',1)";
    
    if($_FILES["hostel-receipt"]["type"]=="application/pdf" && $_FILES["mess-receipt"]["type"]=="application/pdf" && $_FILES["aadhar-card"]["type"]=="application/pdf") // && $_FILES["passport-photo"]["type"]=="images/jpeg")
    {       
       
        if($_FILES["hostel-receipt"]["size"]<=1048576 && $_FILES["mess-receipt"]["size"]<=1048576 && $_FILES["aadhar-card"]["size"]<=1048576)
        {  
           if($_FILES["passport-photo"]["size"]<=314573)
           {
              
               
                if(move_uploaded_file($_FILES["hostel-receipt"]["tmp_name"], $hostel_rent_filepath)
                && move_uploaded_file($_FILES["mess-receipt"]["tmp_name"], $mess_advance_filepath)
                && move_uploaded_file($_FILES["aadhar-card"]["tmp_name"], $aadhaar_filepath)
                && move_uploaded_file($_FILES["passport-photo"]["tmp_name"], $photo_filepath) )
                
                {   
                    
                    if($gender['gender']=="Male")
                    {
                        
                    if(mysqli_query($con,$sql))
                    {
                         
                        echo '<script type=\'text/javascript\'> alert("Your Documents Have Been Uploaded Successfully"); location="form.php";</script>';
                    }
                    }
                    elseif($gender['gender']=="Female")
                    {   
                        if(mysqli_query($con,$sql))
                        
                        { 
                         echo '<script type=\'text/javascript\'> alert("Your Documents Have Been Uploaded Successfully"); location="Form.php";</script>';
                         }
                        
                    }
                }
                
                else{
                    echo '<script type=\'text/javascript\'> alert("Document Upload Not Successful Please Try Again!!"); location="doc.php";</script>';
                }
           }
           
           else{
               echo '<script type=\'text/javascript\'> alert("Please Upload the Passport Size Photo Less Than 300 KB"); location="doc.php";</script>';
           }
        }
        
        else
        {
            echo '<script type=\'text/javascript\'> alert("Please Upload PDF Files of Size Less Than 1 MB Each"); location="doc.php";</script>';
        }
    }
    
    else{
        echo '<script type=\'text/javascript\'> alert("Please Upload Files In PDF and Photograph in JPG Format Only"); location="doc.php";</script>';
    }
        
    }






?>