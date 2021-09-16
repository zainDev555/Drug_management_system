<?php
include "./layouts/header.php";
include "./layouts/navbar.php";

?>

<!--Main layout-->
<main style="margin-top: 58px">
<div class="container " >
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div class="row mt-10px">
    <div class="col-md-5 " >
    <label for="">From: </label>
        <input type="date" name="date_1" class="form-control "   />
    </div>
    <div class="col-md-5">

        <label for="">To:</label>
        <input type="date" name="date_2" class="form-control"  />
    </div>
    <div class="col-md-1">

        <button type="submit" class="btn btn-success mt-4" name="btnseach" style="width: fit-content;margin-top:20px">search</button>
    </div>
    
    
    </form>
</div>
  <div class="container pt-4">

    <!--Section: Minimal statistics cards-->
    <section>
      <div class="row">
        <div class="col-xl-12 col-sm-10 col-12 mb-4">
        <span  class='badge badge-primary bg-info' >In this session you will be find return of store medicines  between start date to last date  </span>          
        <table class="table">
            <thead>
              <tr>
                <th scope="col">order_id</th>
                <th scope="col">medicine_id</th>
                <th scope="col">Medicine Name</th>
                <th scope="col">Medicine quantity</th>
                <th scope="col">price</th>
                <th scope="col">sales date</th>
              
              </tr>
            </thead>
            <tbody>
            <?php
              if(isset($_POST['btnseach'])){       
                $date_1=$_POST["date_1"];
                $date_2=$_POST["date_2"];
 
                $sql = "SELECT * FROM sales_m_return   where created_at between   '$date_1'  AND   '$date_2'";
            }else{
 
                $sql = "SELECT * FROM sales_m_return ";
            }

                     
                        $result = $connect->query($sql);

                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                            ?>

                                <tr>
                                    <th scope="row"><?php echo $row['s_table_r_id']; ?></th>
                                    <th scope="row"><?php echo $row['rm_id']; ?></th>
                                    <td><?php echo $row['rm_name']; ?></td>
                                    <td><?php if($row['rm_qty']==0){
                                      echo "<span class='badge badge-primary bg-info'>Order return</span>";
                                    }else{
                                        echo $row['rm_qty'];
                                        } ?></td>
                                    <td><?php echo $row['rm_price']; ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                               
                                </tr>
                    <?php
                            }
                        }else{
                          echo" <td >no result found according to this search</td>";
                        }
                

                    ?>
            </tbody>
          </table>
        </div>

      </div>

    </section>
    <!--Section: Minimal statistics cards-->

  </div>

</main>
<?php
include "./layouts/footer.php";


?>