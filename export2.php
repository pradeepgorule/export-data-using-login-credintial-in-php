 <?php
session_start();
?>
 <div class = "container form-signin">
         
         <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
        
               if ($_POST['username'] == 'tutorialspoint' && 
                  $_POST['password'] == '1234') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'tutorialspoint';
                  
                  echo 'You have entered valid use name and password';
               }else {
                  $msg = 'Wrong username or password';
               }
            }
         ?>
<?php
$connect = mysqli_connect("localhost", "root", "", "thanks");
$sql = "SELECT * FROM data";  
$result = mysqli_query($connect, $sql);
?>
<html>  
 <head>  
  <title>Export MySQL data to Excel in PHP</title>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 </head>  
 <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   <div class="table-responsive">  
    <h2 align="center">Export MySQL data to Excel in PHP</h2><br /> 
    <table class="table table-bordered" id="tables">
     <tr>  
                         <th>Name</th>  
                         <th>Last Name</th>  
                         <th>Email</th>  
       <th>Company</th>
       <th>Job title</th>
       <th>City</th>
       <th>telly</th>
       <th>phone</th>
       <th>Profession</th>
                    </tr>
     <?php
     while($row = mysqli_fetch_array($result))  
     {  
        echo '  
       <tr>  
         <td>'.$row["firstname"].'</td>  
                         <td>'.$row["lname"].'</td>  
                         <td>'.$row["email"].'</td>  
             <td>'.$row["cname"].'</td>
             <td>'.$row["jobtitle"].'</td>
             <td>'.$row["city"].'</td>  
                         <td>'.$row["telly"].'</td>  
             <td>'.$row["phone"].'</td>
              
             <td>'.$row["check_list"].'</td>
       </tr>  
        ';  
     }
     ?>
    </table>
    <br />
    <form method="post" action="export21.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
   </div>  
<?php

if($_SESSION["user_login"]) {
?>
Welcome <?php echo $_SESSION["user_login"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.
<?php
}else
 echo "<h1>Please login first .</h1>";


?>
 </body>  
</html>
