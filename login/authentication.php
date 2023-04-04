<?php 
// This PHP code is used to connect to the database 
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "db_users";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?> 

<?php      


    $username = $_POST['user'];  
    $password = $_POST['pass'];  
          
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
        
          //This PHP code is used to check for the login input if true it will log in if not it will show an error

        $sql = "select *from login where username = '$username' and pass = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            header ("Location: ../Logedin/index.html");  
        }  
        else if ($count != 1){  
            header ("Location: failed.html");  

        }     
        else{
            echo "erorr";
        }
?>  