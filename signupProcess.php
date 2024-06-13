<?php
require_once("db.php");
include 'cors.php';

session_start();

$appid=mysqli_real_escape_string($con,$_POST['appid']);
$name=mysqli_real_escape_string($con,$_POST['name']);
$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
$hostel_option=mysqli_real_escape_string($con,$_POST['hostel']);

$randomNumber = mt_rand(100000, 999999);

$_SESSION["otp"]=$randomNumber;


$_SESSION["mobile"]=$mobile;
$_SESSION["appid"]=$appid;
$_SESSION["hostel"]=$hostel_option;


$signup_check="select * from signup where application_id='$appid'";
$result_signup=mysqli_query($con,$signup_check);
$data_signup=mysqli_fetch_array($result_signup);

if($data_signup['mobile_flag']==0)
{
    $fields = array(
    "variables_values" => $randomNumber,
    "route" => "otp",
    "numbers" => "$mobile",
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: v1mMoOEYaGRkIxC60ydu84tWBHDFK3S2zpLirnqfjPhgUbXQs7yPY4hTgf2uILp97d5EGXQO3e1ZrRkN",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
   $response;
}



}

else
{   
    header('Location: signin.php');
}

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
 <!--   <link href="font-awesome.css" rel="stylesheet" type="text/css" media="all" />-->
<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->

<style>
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin-top: 100px;
        }
    </style>
</head>


<body><br>
<br>
<br><br><br><br>
    <center>
        <h1>Hostel Allocation</h1>
        
      
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 login-container">
                <h2 class="mb-3">Sign Up </h2>
               <form action="otp.php" method="POST">
                    <div class="form-group">
                        <label for="Phone">Enter the OTP: </label>
                        <input type="number" class="form-control" id="otp" name="otp" pattern=[0-9]{6} placeholder="Enter Six Digit OTP" required>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" name="signup" id="signup" value="SignUp">
                </form>
            </div>
        </div>
    </div>
    
    
   
    
    
</body>