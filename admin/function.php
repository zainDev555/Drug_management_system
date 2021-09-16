
<?php
include "../db.php";
if (isset($_POST['save_medicine'])) {

  $salesman_id = $_POST['salesman_id'];
  $m_name = $_POST['m_name'];
  $m_id = $_POST['m_id'];
  $m_qty = $_POST['m_qty'];
  $m_price = $_POST['m_price'];
  $m_sale_price = $_POST['m_sale_price'];
  $m_total_price =  $m_qty * $m_price;


  $sql = "INSERT INTO medicine (salesman_id, m_name, m_id,m_qty,m_price,m_total_price,m_sale_price)
    VALUES ('$salesman_id', '$m_name', '$m_id','$m_qty','$m_price','$m_total_price','$m_sale_price')";

  if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Medicine Addedd")
        window.location.href="./add_medicin.php"
        </script>';
  } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
  }
}

//sales portion
//return portion
if (isset($_POST['get_medicine_data_id_for_return'])) {


    $sql = "SELECT * FROM sales_medicine WHERE id='$_POST[get_medicine_data_id_for_return]' ";
    $result = $connect->query($sql);
  
    if ($result->num_rows > 0) {
  
      while ($row = $result->fetch_assoc()) {
        $res = [ "id" => "$row[id]","sm_name" => "$row[sm_name]","sm_price" => "$row[sm_price]"
        ,"sm_id" => "$row[sm_id]","sm_qty" => "$row[sm_qty]" ];
        echo json_encode($res);
      }
    }
  }
  //del  city_manager
  if(isset($_POST['delcitymanagernow'])){

  
    $sql = "DELETE FROM city_manager where id='$_POST[id]' ";
  
      if ($connect->query($sql) === TRUE) {
      echo '<script type="text/javascript">alert("City Manager deleted successfully..!")
      window.location.href="./citymanager.php"
      </script>';
      } else {
      echo "Error: " . $sql . "<br>" . $connect->error;
      }
  }
  //save city_manager
if(isset($_POST['save_city_manager'])){

  $password=md5($_POST["password"]);
  $sql = "INSERT INTO city_manager (name,email, cnic,password,country,city,phone)
  VALUES ('$_POST[name]', '$_POST[email]','$_POST[cnic]','$password','$_POST[country]','$_POST[city]','$_POST[phone]')";

    if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("City Manager add successfully..!")
    window.location.href="./citymanager.php"
    </script>';
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//edit city_manager
if(isset($_POST['updatecity_manager'])){

  $password=md5($_POST["password"]);
  $sql = "update  city_manager set name='$_POST[name]',email='$_POST[email]',cnic='$_POST[cnic]',
  password='$password',country='$_POST[country]',city='$_POST[city]'
  ,phone='$_POST[phone]' where id='$_POST[id]'";

    if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("city Manager Updated successfully..!")
    window.location.href="./citymanager.php"
    </script>';
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }
}

//save Salesman
if(isset($_POST['saveSalesman'])){

  $password=md5($_POST["password"]);
  $sql = "INSERT INTO sales_manager (name, cnic,password,country,city,branch_name,phone)
  VALUES ('$_POST[name]', '$_POST[cnic]','$password','$_POST[country]','$_POST[city]','$_POST[branch_name]','$_POST[phone]')";

    if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Salesman add successfully..!")
    window.location.href="./salesman.php"
    </script>';
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//edit Salesman
if(isset($_POST['updateSalesman'])){

  $password=md5($_POST["password"]);
  $sql = "update  sales_manager set name='$_POST[name]',cnic='$_POST[cnic]',
  password='$password',country='$_POST[country]',city='$_POST[city]'
  ,branch_name='$_POST[branch_name]',phone='$_POST[phone]' where id='$_POST[id]'";

    if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Salesman Updated successfully..!")
    window.location.href="./salesman.php"
    </script>';
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//del salesman
if(isset($_POST['delsalesmannow'])){

  
  $sql = "DELETE FROM sales_manager where id='$_POST[id]' ";

    if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Salesman deleted successfully..!")
    window.location.href="./salesman.php"
    </script>';
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//save Store_manager
if(isset($_POST['saveStore_manager'])){

  $password=md5($_POST["password"]);
  $sql = "INSERT INTO store_manager (name,email, cnic,password,country,city,branch_name,phone)
  VALUES ('$_POST[name]', '$_POST[email]','$_POST[cnic]','$password','$_POST[country]','$_POST[city]','$_POST[branch_name]','$_POST[phone]')";

    if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Store Manager add successfully..!")
    window.location.href="./storemanager.php"
    </script>';
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//edit Store_manager
if(isset($_POST['updateStore_manager'])){

  $password=md5($_POST["password"]);
  $sql = "update  store_manager set name='$_POST[name]',email='$_POST[email]',cnic='$_POST[cnic]',
  password='$password',country='$_POST[country]',city='$_POST[city]'
  ,branch_name='$_POST[branch_name]',phone='$_POST[phone]' where id='$_POST[id]'";

    if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Store Manager Updated successfully..!")
    window.location.href="./storemanager.php"
    </script>';
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//del Store_manager
if(isset($_POST['delstoremanagernow'])){

  
  $sql = "DELETE FROM store_manager where id='$_POST[id]' ";

    if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Store Manager deleted successfully..!")
    window.location.href="./storemanager.php"
    </script>';
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//save country_manager
if(isset($_POST['save_country_manager'])){

  $password=md5($_POST["password"]);
  $sql = "INSERT INTO country_manager (name,email, cnic,password,phone)
  VALUES ('$_POST[name]', '$_POST[email]','$_POST[cnic]','$password','$_POST[phone]')";

    if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("country Manager add successfully..!")
    window.location.href="./countrymanager.php"
    </script>';
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//edit country_manager
if(isset($_POST['updatecountry_manager'])){

  $password=md5($_POST["password"]);
  $sql = "update  country_manager set name='$_POST[name]',email='$_POST[email]',cnic='$_POST[cnic]',
  password='$password'
  ,phone='$_POST[phone]' where id='$_POST[id]'";

    if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("country Manager Updated successfully..!")
    window.location.href="./countrymanager.php"
    </script>';
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//del country_manager
if(isset($_POST['delcountry_manager'])){

  
  $sql = "DELETE FROM country_manager where id='$_POST[id]' ";

    if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Store Manager deleted successfully..!")
    window.location.href="./countrymanager.php"
    </script>';
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }
}


//save ceo
if(isset($_POST['save_ceo'])){

  $password=md5($_POST["password"]);
  $sql = "INSERT INTO ceo (name,email, cnic,password,phone,country)
  VALUES ('$_POST[name]', '$_POST[email]','$_POST[cnic]','$password','$_POST[phone]','$_POST[country]')";

    if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("ceo add successfully..!")
    window.location.href="./ceo.php"
    </script>';
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//edit ceo
if(isset($_POST['updateceo'])){

  $password=md5($_POST["password"]);
  $sql = "update  ceo set name='$_POST[name]',email='$_POST[email]',cnic='$_POST[cnic]',
  password='$password',country='$_POST[country]'
  ,phone='$_POST[phone]' where id='$_POST[id]'";

    if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("ceo Updated successfully..!")
    window.location.href="./ceo.php"
    </script>';
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//del ceo
if(isset($_POST['delceo'])){

  
  $sql = "DELETE FROM ceo where id='$_POST[id]' ";

    if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("ceo deleted successfully..!")
    window.location.href="./ceo.php"
    </script>';
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
?>