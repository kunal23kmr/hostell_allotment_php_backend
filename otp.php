 
 
 <?php
require_once("db.php");
include 'cors.php';

session_start();



$hostel=$_SESSION['hostel'];
$randomNumber=$_SESSION['otp'];
 $otp = $_POST['otp'];
 $otp=(int)$otp;
$hostel=(int)$hostel;
 


echo '<br><br>';
$mobile=$_SESSION['mobile'];

echo '<br><br>';
$appid=$_SESSION['appid'];

;



    if($otp==$randomNumber)
    {
       
        
        $sql="update signup set mobile_number='$mobile',hosteler='$hostel', mobile_flag=1 where application_id='$appid'";
        
        if(mysqli_query($con,$sql))
        {
            
            echo '<script type=\'text/javascript\'> alert(" Your Mobile Number Has Been Verified Proceed to Sign In !"); location="Form.php";</script>';
            
        header('Location: signin.php');
        
        }
    }
    
    else
    {    echo '<script type=\'text/javascript\'> alert("Wrong OTP entered! Please SignUp Again!"); location="Form.php";</script>';
       
        header('Location: index.php');
    } 

?>