<?php

include "./db.php";
// salesman lohin 
if(isset($_POST['sales_log_in'])){
    $name=$_POST['name'];
    $password=md5($_POST['password']);
    $sql="SELECT * FROM sales_manager WHERE name='$name' AND password='$password'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
         // output data of each row
     
         while ($row = $result->fetch_assoc()) {
           
            session_start();

            // Add values to the session.
            $_SESSION['name'] = $name; // string
            $_SESSION['id'] = $row['id']; // string
            echo '<script language="javascript"> alert("Welcome TO Store")</script>';
            echo '<script language="javascript">    window.location.href = "./salesman/index.php";;</script>';
          
        }
    }else {
    
        echo '<script language="javascript">  alert("invalid Credientials");</script>';
        echo '<script language="javascript">       window.location.href = "./salesmanLogin.php";</script>';
      
        
    }
}
// salesman lohin 
if(isset($_POST['store_log_in'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql="SELECT * FROM store_manager WHERE email='$email' AND password='$password'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
         // output data of each row
     
         while ($row = $result->fetch_assoc()) {
           
            session_start();

            // Add values to the session.
            $_SESSION['email'] = $email; // string
            $_SESSION['id'] = $row['id']; // string
            echo '<script language="javascript"> alert("Welcome TO Store")</script>';
            echo '<script language="javascript">    window.location.href = "./Store_manager/index.php";;</script>';
          
        }
    }else {
    
        echo '<script language="javascript">  alert("invalid Credientials");</script>';
        echo '<script language="javascript">       window.location.href = "./StoreManagerLogin.php";</script>';
      
        
    }
}
// salesman lohin 
if(isset($_POST['city_manager_log_in'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql="SELECT * FROM city_manager WHERE email='$email' AND password='$password'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
         // output data of each row
     
         while ($row = $result->fetch_assoc()) {
           
            session_start();

            // Add values to the session.
            $_SESSION['email'] = $email; // string
            $_SESSION['id'] = $row['id']; // string
<<<<<<< HEAD
=======
            $_SESSION['city'] = $row['city']; // string
>>>>>>> b123a1b0dd55e65c089a6f336be80c35bb9a7487
            echo '<script language="javascript"> alert("Welcome TO Store")</script>';
            echo '<script language="javascript">    window.location.href = "./city_manager/index.php";;</script>';
          
        }
    }else {
    
        echo '<script language="javascript">  alert("invalid Credientials");</script>';
        echo '<script language="javascript">       window.location.href = "./citymanagerLogin.php";</script>';
      
        
    }
}
?>