<?php include "../db.php"; ?>
<?php

if (isset($_POST['reg_now'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    if ($password == $c_password) {
        $hash = md5($password);
        $sql = "INSERT INTO users (email, name, password)  VALUES ('$email', '$name', '$hash')";
        if ($connect->query($sql) === TRUE) {
            echo "New record created successfully";
            header("location:../CustomerLogin.php");
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    } else {
        echo "pleas correct the errors";
        header("location:../CustomerRegister.php");
    }
}
// log_now
if (isset($_POST['log_now'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = md5($password);

    $sql = "SELECT email,password from users where email='$email' AND password='$hash' AND status='1'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
     
        while ($row = $result->fetch_assoc()) {
           
            session_start();

            // Add values to the session.
            $_SESSION['email'] = $email; // string
            echo '<script language="javascript"> alert("Welcome TO Store")</script>';
            echo '<script language="javascript">    window.location.href = "../Customer/index.php";;</script>';
          
        }
    }else {
    
        echo '<script language="javascript">  alert("invalid Credientials");</script>';
        echo '<script language="javascript">       window.location.href = "../CustomerLogin.php";</script>';
      
        
    }
}
if (isset($_POST['Alog_now'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = md5($password);

    $sql = "SELECT email,password from admin where email='$email' AND password='$hash'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
     
        while ($row = $result->fetch_assoc()) {
           
            session_start();

            // Add values to the session.
            $_SESSION['email'] = $email; // string
            echo '<script language="javascript">
            alert("Welcome Admin");
            window.location.href = "../Admin/index.php";
            </script>';
          
        }
    } else {
        echo '<script language="javascript">
        alert("invalid Credientials");
        window.location.href = "../AdminLogin.php";
        </script>';
        
    }
}

?>