
<?php
include "../db.php";

//start of get daily date data
if (isset($_POST['get_citymanager_daily_sales'])) {
  $get_citymanager_daily_sales = trim($_POST['get_citymanager_daily_sales']['cnic'], ' ');
  $get_citymanager_country = trim($_POST['get_citymanager_daily_sales']['country'], ' ');
  $sql = "SELECT * FROM city_manager
  WHERE cnic='$get_citymanager_daily_sales' AND country='$get_citymanager_country'";
  $result = $connect->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
     
      $city_manger_id = $row['id'];

      $sql1 = "SELECT * FROM city_manager_record
      WHERE city_m_id='$city_manger_id'";
      $result = $connect->query($sql1);
      if ($result->num_rows > 0) {

        while ($row_sec = $result->fetch_assoc()) {
          $date = date('y-m-d');
          $latest_date = date('y-m-d', strtotime($date . '  + 1 days'));
          $sql2 = "SELECT sum(s_m_daily_sale) as day_sum FROM city_manager_record
           WHERE city_m_id='$row[id]' AND created_at='$latest_date'";
          $result = $connect->query($sql2);

          if ($result->num_rows > 0) {

            while ($sum_of_current_day = $result->fetch_assoc()) {
              $sum_daily = $sum_of_current_day['day_sum'];
            }
          }


          $res = [
            "citymanager_name" => "$row[name]","city" => "$row[city]", "citymanager_day_sale" => "$sum_daily", "citymanager_cnic" => "$row[cnic]", "citymanager_id" => "$row[id]",
          ];
          echo json_encode($res);
        }
      }
    }
  } else {
    $res = [
      "citymanager_name" => "", "city" => "","citymanager_day_sale" => "", "citymanager_cnic" => "", "citymanager_id" => "",

   
    ];
    echo json_encode($res);
  }
}
//end of get daily date data
//daily sale start
if (isset($_POST['save_daily_sales_by_country_manager'])) {

  $city_manager_id = $_POST['city_manager_id'];
  $c_m_name = $_POST['c_m_name'];
  $city_m_daily_sale = $_POST['city_m_daily_sale'];
  $citymanager_cnic = $_POST['citymanager_cnic'];
  $city = $_POST['city'];

  $sql = "INSERT INTO country_manager_daily_reord (c_m_name,city, citymanager_cnic,city_m_daily_sale,city_manager_id)
        VALUES ('$c_m_name','$city' ,'$citymanager_cnic', '$city_m_daily_sale','$city_manager_id')";

  if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Daily sale Add now..!")
    window.location.href="./country_daily_sale.php"
    </script>';
  } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
  }
}
//daily sale end
//start of get weekly date data
if (isset($_POST['get_city_manager_sales_weekly'])) {
 
  $city_manager_cnic =  $_POST['get_city_manager_sales_weekly']["city_manager_cnic"];
  $country =  $_POST['get_city_manager_sales_weekly']["country"];
  $date_1 =  date('y-m-d',strtotime($_POST['get_city_manager_sales_weekly']["date_1"]));
  $date_2 = date('y-m-d', strtotime($_POST['get_city_manager_sales_weekly']["date_2"]));




  $sql = "SELECT * FROM city_manager
  WHERE cnic='$city_manager_cnic' AND country='$country'";
  $result = $connect->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $city_manager_id = $row['id'];

      $sql1 = "SELECT * FROM city_manager_record
      WHERE city_m_id='$city_manager_id'";
      $result = $connect->query($sql1);
      if ($result->num_rows > 0) {

        while ($row_sec = $result->fetch_assoc()) {

          // salesman_weekly_sale


          $sql3 = "SELECT sum(s_m_daily_sale) as weekly_sum FROM city_manager_record
      WHERE city_m_id='$row[id]' AND created_at BETWEEN '$date_1' AND '$date_2'";

          $result = $connect->query($sql3);

          if ($result->num_rows > 0) {

            while ($sum_of_current_week = $result->fetch_assoc()) {
              $sum_week = $sum_of_current_week['weekly_sum'];
            }
          }

          $res = [
            "city_manager_name" => "$row[name]","city" => "$row[city]", "city_manager_weekly_Sale" => "$sum_week",
            "date_1" => "$date_1", "date_2" => "$date_2", "city_manager_cnic" => "$row[cnic]", "city_manager_id" => "$row[id]",
          ];
          echo json_encode($res);
        }
      }
    }
  } else {
    $res = [
      "city_manager_name" => "","city" => "", "city_manager_weekly_Sale" => "",
      "date_1" => "", "date_2" => "", "city_manager_cnic" => "", "city_manager_id" => "",
    ];
    echo json_encode($res);
  }
}
//end of get weekly date data
//start of store weekly  data by manager

if (isset($_POST['save_weekly_sales_by_city_manager'])) {

// var_dump($_REQUEST);die();
 
$city_m_name = $_POST['city_m_name'];
$city = $_POST['city'];
$city_manager_weekly_sale = $_POST['city_manager_weekly_sale'];
// $salesman_mounthly_sale=$_POST['salesman_mounthly_sale']; 
$city_manager_cnic = $_POST['city_manager_cnic'];
$city_manager_id = $_POST['city_manager_id'];
$date_1 = $_POST['date_1'];
$date_2 = $_POST['date_2'];


  $sql = "INSERT INTO country_manager_weekly_reord (city_m_name,city, city_manager_cnic,city_manager_weekly_sale,city_manager_id,date_1,date_2)
        VALUES ('$city_m_name','$city', '$city_manager_cnic', '$city_manager_weekly_sale','$city_manager_id','$date_1','$date_2')";

  if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("weekly record save ..!")
    window.location.href="./weeklysale.php"
    </script>';
  } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
  }
}
//end of store weekly  data by manager
//start of get monthly data by manager
if (isset($_POST['get_city_sales_monthly'])) {

  $city_manager_cnic =  trim($_POST['get_city_sales_monthly']["city_manager_cnic"]," ");
  $date_1 =  $_POST['get_city_sales_monthly']["date_1"];
  $date_2 =  $_POST['get_city_sales_monthly']["date_2"];




  $sql = "SELECT * FROM city_manager
   WHERE cnic='$city_manager_cnic'";
  $result = $connect->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $city_m_id = $row['id'];

      $sql1 = "SELECT * FROM country_manager_daily_reord
       WHERE city_manager_id='$city_m_id'";
      $result = $connect->query($sql1);
      if ($result->num_rows > 0) {

        while ($row_sec = $result->fetch_assoc()) {


          // salesman_mounthly_sale

          $sql4 = "SELECT sum(city_m_daily_sale) as month_sum FROM country_manager_daily_reord
          WHERE city_manager_id='$row[id]' AND created_at BETWEEN '$date_1' AND '$date_2'";

          $result = $connect->query($sql4);

          if ($result->num_rows > 0) {

            while ($sum_of_current_month = $result->fetch_assoc()) {
              $sum_mounth = $sum_of_current_month['month_sum'];
            }
          }
          // salesman_mounthly_sale

          $res = [
            "city_manager_name" => "$row[name]","city" => "$row[city]", "city_manager_month_Sale" => "$sum_mounth",
            "city_manager_cnic" => "$row[cnic]", "city_manager_id" => "$row[id]",
            "date_1" => "$date_1", "date_2" => "$date_2",
          ];
          echo json_encode($res);
        }
      }
    }
  } else {
    $res = [
      "city_manager_name" => "","city" => "", "city_manager_month_Sale" => "", "city_manager_cnic" => "",
      "date_1" => "", "date_2" => "", "city_manager_id" => "",
    ];
    echo json_encode($res);
  }
}
//end of get monthly data by manager
//start of store monthly data by manager
if (isset($_POST['save_mounthly_sales_by_country_m'])) {

// var_dump($_REQUEST);die();
  $city_manager_id = $_POST['city_manager_id'];
  $city_manager_cnic = $_POST['city_manager_cnic'];
  $city = $_POST['city'];
  $city_manager_name = $_POST['city_manager_name'];
  $city_manager_month_Sale = $_POST['city_manager_month_Sale'];
  $date_1 = $_POST['date_1'];
  $date_2 = $_POST['date_2'];

  $sql = "INSERT INTO country_manager_monthly_reord (city_manager_name,city, city_manager_cnic,city_manager_month_Sale,city_manager_id,date_1,date_2)
        VALUES ('$city_manager_name','$city', '$city_manager_cnic', '$city_manager_month_Sale','$city_manager_id','$date_1','$date_2')";

  if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("mounthly record save ..!")
    window.location.href="./monthlysale.php"
    </script>';
  } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
  }
}
//end of store monthly data by manager

//get salesman sales
if (isset($_POST['get_salesman_return'])) {
  $get_salesman_sales = trim($_POST['get_salesman_return'], ' ');
  $sql = "SELECT * FROM sales_manager
  WHERE cnic='$get_salesman_sales'";
  $result = $connect->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $salesmas_id = $row['id'];

      $sql1 = "SELECT * FROM sales_m_return
      WHERE salesman_id='$salesmas_id'";
      $result = $connect->query($sql1);
      if ($result->num_rows > 0) {

        while ($row_sec = $result->fetch_assoc()) {
          // salesman_day_sale
          $date = date('y-m-d');
          $latest_date = date('y-m-d', strtotime($date . '  - 1 days'));
          $sql2 = "SELECT sum(rm_price) as day_sum FROM sales_m_return
           WHERE salesman_id='$row[id]' AND created_at='$latest_date'";
          $result = $connect->query($sql2);

          if ($result->num_rows > 0) {

            while ($sum_of_current_day = $result->fetch_assoc()) {
              $sum_daily = $sum_of_current_day['day_sum'];
            }
          }
          // salesman_day_sale
          // salesman_weekly_sale

          $date = date('y-m-d', strtotime($latest_date . ' - 1 days'));
          $latest_week_date = date('y-m-d', strtotime($date . ' + 7 days'));
          $sql3 = "SELECT sum(rm_price) as weekly_sum FROM sales_m_return
          WHERE salesman_id='$row[id]' AND created_at BETWEEN '$date' AND '$latest_week_date'";

          $result = $connect->query($sql3);

          if ($result->num_rows > 0) {

            while ($sum_of_current_week = $result->fetch_assoc()) {
              $sum_week = $sum_of_current_week['weekly_sum'];
            }
          }
          // salesman_weekly_sale
          // salesman_mounthly_sale
          $date = date('y-m-d', strtotime($latest_date . ' - 1 days'));
          $latest_monthly_date = date('y-m-d', strtotime($date . ' + 30 days'));
          $sql4 = "SELECT sum(rm_price) as month_sum FROM sales_m_return
         WHERE salesman_id='$row[id]' AND created_at BETWEEN '$date' AND '$latest_monthly_date'";

          $result = $connect->query($sql4);

          if ($result->num_rows > 0) {

            while ($sum_of_current_month = $result->fetch_assoc()) {
              $sum_mounth = $sum_of_current_month['month_sum'];
            }
          }
          // salesman_mounthly_sale

          $res = [
            "salesman_name" => "$row[name]", "saleman_day_return" => "$sum_daily",
            "saleman_weekly_return" => "$sum_week", "saleman_mounthly_return" => "$sum_mounth", "salesman_cnic" => "$row[cnic]", "salesman_id" => "$row[id]",
          ];
          echo json_encode($res);
        }
      }
    }
  }
}
//get return array 
//start to  get record of return 

if (isset($_POST['get_salesman_returns'])) {

  $salesman_cnic =  $_POST['get_salesman_returns']["salesman_cnic"];
  $date_1 =  $_POST['get_salesman_returns']["date_1"];
  $date_2 =  $_POST['get_salesman_returns']["date_2"];




  $sql = "SELECT * FROM sales_manager
   WHERE cnic='$salesman_cnic'";
  $result = $connect->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $salesmas_id = $row['id'];

      $sql1 = "SELECT * FROM sales_m_return
       WHERE salesman_id='$salesmas_id'";
      $result = $connect->query($sql1);
      if ($result->num_rows > 0) {

        while ($row_sec = $result->fetch_assoc()) {


          // salesman_mounthly_sale

          $sql4 = "SELECT sum(rm_price) as M_sum FROM sales_m_return
          WHERE salesman_id='$row[id]' AND created_at BETWEEN '$date_1' AND '$date_2'";

          $result = $connect->query($sql4);

          if ($result->num_rows > 0) {

            while ($sum_of_current_month = $result->fetch_assoc()) {
              $sum_mounth = $sum_of_current_month['M_sum'];
            }
          }
          // salesman_mounthly_sale

          $res = [
            "salesman_name" => "$row[name]", "salesman_return_amount" => "$sum_mounth",
            "salesman_cnic" => "$row[cnic]", "salesman_id" => "$row[id]",
            "date_1" => "$date_1", "date_2" => "$date_2",
          ];
          echo json_encode($res);
        }
      }
    }
  } else {
    $res = [
      "salesman_name" => "", "salesman_return_amount" => "", "salesman_cnic" => "",
      "date_1" => "", "date_2" => "", "salesman_id" => "",
    ];
    echo json_encode($res);
  }
}
//end to get record of return
//save return 
if (isset($_POST['save_return_by_manager'])) {
  $r_manager_id = $_POST['r_manager_id'];
  $salesman_name = $_POST['salesman_name'];
  $amount = $_POST['amount'];
  $r_manager_id = $_POST['r_manager_id'];
  $salesman_id = $_POST['salesman_id'];
  $salesman_cnic = $_POST['salesman_cnic'];
  $date_1 = $_POST['date_1'];
  $date_2 = $_POST['date_2'];

  $sql = "INSERT INTO s_manager_return_record (salesman_name, salesman_cnic,amount,salesman_id,r_manager_id,date_1,date_2)
        VALUES ('$salesman_name', '$salesman_cnic','$amount','$salesman_id','$r_manager_id','$date_1','$date_2')";

  if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("return record save successfully..!")
    window.location.href="./salesreturn.php"
    </script>';
  } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
  }
}
//save Salesman
if(isset($_POST['save_city_manager'])){

  $password=md5($_POST["password"]);
  $sql = "INSERT INTO city_manager (name,email, cnic,password,country,city,phone)
  VALUES ('$_POST[name]', '$_POST[email]','$_POST[cnic]','$password','$_POST[country]','$_POST[city]','$_POST[phone]')";

    if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("City Manager add successfully..!")
    window.location.href="./cityManager_add.php"
    </script>';
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//edit Salesman
if(isset($_POST['updatecity_manager'])){

  $password=md5($_POST["password"]);
  $sql = "update  city_manager set name='$_POST[name]',email='$_POST[email]',cnic='$_POST[cnic]',
  password='$password',country='$_POST[country]',city='$_POST[city]'
  ,phone='$_POST[phone]' where id='$_POST[id]'";

    if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("city Manager Updated successfully..!")
    window.location.href="./cityManager_add.php"
    </script>';
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//del salesman
if(isset($_POST['delcitymanagernow'])){

  
  $sql = "DELETE FROM city_manager where id='$_POST[id]' ";

    if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("City Manager deleted successfully..!")
    window.location.href="./cityManager_add.php"
    </script>';
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
if (isset($_POST['date_1'])) {
  $date=$_POST['date_1'];
   $date_1=date('Y-m-d', strtotime($date. ' + 0 days')); 
  
  echo date('m/d/Y', strtotime($date_1. ' + 07 days')); 
}
?>