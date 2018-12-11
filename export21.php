<?php  
//export.php  

   

if(isset($_POST['submit'])){
  $pass = "@n!LW@nA@r!";
 $pwd = $_POST['download'];
 if(empty($pwd)||$pwd!=$pass){
   die("Enter correct password to download the password<br> press enter");
 }
}
$connect = mysqli_connect("localhost", "root", "", "thanks");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM data";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {

  $output .= '
   <table class="table" bordered="1">  
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
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
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
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}

?>
<form method="POST" action="export2.php">
 <input type="password" name="download">
 <input type="submit" name="submit"value="Download">
</form>
