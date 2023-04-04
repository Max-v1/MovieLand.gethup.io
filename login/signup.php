
<?php
   // This PHP code is used to connect to the database 

    $servername = "localhost"; 
    $username = "root"; 
    $password = "";
   
    $database = "db_users";
        $conn = mysqli_connect($servername,$username, $password, $database); 
    if($conn) {
    } 
    else {
        die("Error". mysqli_connect_error()); 
  
      } 

      
?>
<?php 
$user = $_POST["username"];
$pass = $_POST["password"];

?>
<?php
//This PHP code is used to add a user to the database and check if the user already exists it will show an error message

$stmt = $conn->prepare("INSERT INTO login (username, pass ) VALUES (?, ?)");
$stmt->bind_param("ss", $user, $pass);

$sql = "SELECT * FROM login WHERE username = '$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  header ("Location: signup failed .html");  
  $conn->close();
  }
else{
$stmt->execute();
header ("Location: ../Logedin/indexin.html");  

}





?>


  </body>
</html>
