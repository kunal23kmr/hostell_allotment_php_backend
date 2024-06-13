<?php

require_once("db.php");
include 'cors.php';


session_start();
$email=$_SESSION['user'];


// Check if the user is authenticated
if(!isset($_SESSION['doccheck']) || !$_SESSION['doccheck']) {
    // If the user is not authenticated, redirect them to the login page
    header('Location: praveshnitj.php');
    exit();
}

header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        
        
        <style>
            table
            {
                width:50%;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
            <li class="nav-item">
        <a class="nav-link" href="doccheck.php">Documents Check</a>
      </li>
      <li class="nav-item">
        
      </li>
      <li class="nav-item">
        
      </li>
      <li class="nav-item">
        
      </li>
      <li class="nav-item">
        <a class="nav-link" href="praveshlogout.php">Logout</a>
      </li>
     
    </ul>
  </div>
</nav>
        
    <h2><center>Document Check</center></h2>
    
<?php
        
       if($email=='hwb1@nitj.ac.in') 
    {
    
    $sql_name="select d.application_id , s.name, b.hostel_no, b.room_no, d.rent_receipt, d.mess_advance,d.aadhaar, d.photo from docs d, booking b, student_data s where b.application_id=d.application_id and s.application_id=b.application_id and b.hostel_no=1";
    
    
    
    
    }
    
    if($email=='hwb2@nitj.ac.in')
    
    {
        $sql_name="select d.application_id , s.name, b.hostel_no, b.room_no, d.rent_receipt, d.mess_advance,d.aadhaar, d.photo from docs d, booking b, student_data s where b.application_id=d.application_id and s.application_id=b.application_id and b.hostel_no=2";
        
        
        
    }
    
 if ($email=='hwb5@nitj.ac.in')
    {
        $sql_name="select d.application_id , s.name, b.hostel_no, b.room_no, d.rent_receipt, d.mess_advance,d.aadhaar, d.photo from docs d, booking b, student_data s where b.application_id=d.application_id and s.application_id=b.application_id and b.hostel_no=5";
        
       
    }
    
    if ($email=='ohwgh2@nitj.ac.in')
    {
        $sql_name="select d.application_id , s.name, b.hostel_no, b.room_no, d.rent_receipt, d.mess_advance,d.aadhaar, d.photo from docs d, booking b, student_data s where b.application_id=d.application_id and s.application_id=b.application_id and b.hostel_no='gh2'";
        
      
    }
    
    if($email=='samays@nitj.ac.in')
    {
         $sql_name="select d.application_id , s.name, b.hostel_no, b.room_no, d.rent_receipt, d.mess_advance,d.aadhaar, d.photo from docs d, booking b, student_data s where b.application_id=d.application_id and s.application_id=b.application_id ORDER BY b.hostel_no";
         
      
    } 
    
/*         $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
  {
        $row=mysqli_fetch_array($result);
        
       var_dump($row);
   }*/
  
       $serialno=1;
    echo '<center><table class="table table-hover">
    <tr>
    <th>S.No</th>
    <th>Application ID</th>
    <th> Name </th>
    <th> Hostel No </th>
    <th> Room No </th>
    <th>Rent Receipt</th>
    <th>Mess Advance</th>
    <th>Aadhaar</th>
    <th>Photo</th>
    </tr>
    <tbody>';
    
    
    
    $result=mysqli_query($con,$sql_name);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_array($result))
        {    ?>
            
            <tr>
                <td><?php echo $serialno; ?></td>
            
        
                <td><?php echo $row['application_id']; ?></td>
                
                <td><?php echo $row['name']; ?></td>
                
                    <td><?php echo $row['hostel_no']; ?></td>
                  
                  <td><?php echo $row['room_no']; ?></td>
            
        
                <td><a href="<?php echo $row['rent_receipt']; ?>">Rent Receipt</a></td>
            

                <td><a href="<?php echo $row['mess_advance']; ?>">Mess Advance</a></td>
    
    
                <td><a href="<?php echo $row['aadhaar']; ?>">Aadhaar</a></td>
        
                <td><a href="<?php echo $row['photo']; ?>">Photo</a></td>
            </tr>
            
            
          <?php  
        }
       
    }
    
?>
    </body>
</html>