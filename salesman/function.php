
<?php
include "../db.php";

//sales portion
if (isset($_POST['get_medicine_data_id'])) {

  $sql = "SELECT * FROM medicine WHERE m_name='$_POST[get_medicine_data_id]'";
  $result = $connect->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
     $res =["m_id"=>$row['m_id'],"m_sale_price",$row['m_sale_price']];
      echo json_encode($res);
    }
  }
}
//set qty
if (isset($_POST['set_qty'])) {

  $sql = "SELECT * FROM medicine WHERE m_id='$_POST[set_qty]'";
  $result = $connect->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
     $res =["m_sale_price",$row['m_sale_price']];
      echo json_encode($res);
    }
  }
}
if (isset($_POST['sale_medicine'])) {

  $salesman_id = $_POST['salesman_id'];
  $sm_name = $_POST['sm_name'];
  $sm_id = $_POST['sm_id'];
  $sm_qty = $_POST['sm_qty'];
  $sm_price = $_POST['sm_price'];



  $sql = "INSERT INTO sales_medicine (salesman_id, sm_name, sm_id,sm_qty,sm_price)
    VALUES ('$salesman_id', '$sm_name', '$sm_id','$sm_qty','$sm_price')";

  if ($connect->query($sql) === TRUE) {
    $sql = "SELECT * FROM medicine where m_id='$sm_id'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
        $after_sale_qty=  $row['m_qty'] - $sm_qty;
        $m_total_price =  $after_sale_qty * $row['m_price'];
        $sql2 = "UPDATE medicine
        SET m_qty = '$after_sale_qty',
           m_total_price = '$m_total_price'
        WHERE m_id = '$sm_id'";
       ;
         if ($connect->query($sql2)) {
                echo '<script type="text/javascript">alert("Medicine record save")
                window.location.href="./sales.php"
                </script>';
      }
    }
    }
  } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
  }
}
//sales portion
//return portion
if (isset($_POST['get_medicine_data_id_for_return'])) {

  $f= $_POST['get_medicine_data_id_for_return']["sm_id"];
  $g= $_POST['get_medicine_data_id_for_return']["sm_name"];
  $e= $_POST['get_medicine_data_id_for_return']["sm_qty"];

    $sql = "SELECT * FROM sales_medicine WHERE sm_id='$f' and sm_name='$g'  and sm_qty='$e' ";
    $result = $connect->query($sql);
  
    if ($result->num_rows > 0) {
  
      while ($row = $result->fetch_assoc()) {
        $res = [ "id" => "$row[id]","sm_name" => "$row[sm_name]","sm_price" => "$row[sm_price]"
        ,"sm_id" => "$row[sm_id]","sm_qty" => "$row[sm_qty]" ];
      }
      echo json_encode($res);
    }
  }
  if (isset($_POST['return_medicine'])) {

    $salesman_id = $_POST['salesman_id'];
    $s_table_r_id = $_POST['id'];
    $rm_name = $_POST['rm_name'];
    $rm_id = $_POST['rm_id'];
    $rm_qty = $_POST['rm_qty'];
    $rm_price = $_POST['rm_price'];
    $sql = "INSERT INTO sales_m_return (salesman_id, rm_name, rm_qty,rm_id,rm_price,s_table_r_id)
    VALUES ('$salesman_id', '$rm_name', '$rm_qty','$rm_id','$rm_price','$s_table_r_id')";

  if ($connect->query($sql) === TRUE) {
    $sql = "SELECT * FROM medicine where m_id='$rm_id'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
        $after_sale_qty=  $row['m_qty'] + $rm_qty;
        $m_total_price =  $after_sale_qty * $row['m_price'];
        $sql2 = "UPDATE medicine
        SET m_qty = '$after_sale_qty',
           m_total_price = '$m_total_price'
        WHERE m_id = '$rm_id'";
       
         if ($connect->query($sql2)) {
           //dd
           $sql1 = "SELECT * FROM sales_medicine where id='$s_table_r_id'";
           $result = $connect->query($sql1);
       
           if ($result->num_rows > 0) {
       
             while ($rowsec = $result->fetch_assoc()) {
              
               $after_sale_qty=  $rowsec['sm_qty'] - $rm_qty;
               $m_total_price =  $after_sale_qty * $row['m_price'];
               $sql2 = "UPDATE sales_medicine
               SET sm_qty = '$after_sale_qty',
                  sm_price = '$m_total_price'
               WHERE id = '$s_table_r_id'";
              
                if ($connect->query($sql2)) {

                  echo '<script type="text/javascript">alert("Medicine record save")
                  window.location.href="./return.php"
                  </script>';
                }
              }
            }
        
           
      }
    }
    
  }
  // cut for sales
  
}
echo '<script type="text/javascript">alert("Medicine record save")
window.location.href="./return.php"
</script>';
  }
//return portion
?>