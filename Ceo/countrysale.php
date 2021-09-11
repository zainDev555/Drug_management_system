<?php

include "./layouts/header.php";
include "./layouts/navbar.php";

?>

<!--Main layout-->
<main style="margin-top: 58px">
  <div class="container pt-4">

    <!--Section: Minimal statistics cards-->
    <section>
      <div class="row">
      <div class="col-xl-12 col-sm-10 col-12 mb-4">
        <div class="col-xl-12 col-sm-10 col-12 mb-4">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div class="row mt-10px">
    <div class="col-md-3 " >
    <label for="">From: </label>
        <input type="date" name="date_1" class="form-control "   />
    </div>
    <div class="col-md-3">

<label for="">To:</label>
<input type="date" name="date_2" class="form-control"  />
</div>

    <div class="col-md-3">

        <button type="submit" class="btn btn-info mt-4" name="btnseach" style="width: fit-content;margin-top:20px">search</button>
    </div>
    
    
    </form>
          </div>
        </div>

         
          <table class="table">
            <thead>
              <tr>
                <th scope="col">sr#</th>
                <th scope="col">salesman Name </th>
                <th scope="col">sale</th>
                <th scope="col">CNIC</th>
                <th scope="col">brach name</th>
                <th scope="col">city</th>
                <th scope="col">country</th>
                <th scope="col">store date</th>
              </tr>
            </thead>
            <tbody>
            <?php
    $index=0;
  $result_per_page = 5;
        $sql = "SELECT * FROM sales_medicine ";
        $result = $connect->query($sql);
        $number_of_rows = mysqli_num_rows($result);

        if ($result->num_rows > 0) {


            $number_of_f_p = ceil($number_of_rows / $result_per_page);
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

            $this_page_f_result = ($page - 1) * $result_per_page;
           if(isset($_POST['btnseach'])){       
               $date_1=$_POST["date_1"];
               $date_2=$_POST["date_2"];
              

               $sql = "SELECT * from sales_medicine a, sales_manager b  where created_at between   '$date_1'  AND   '$date_2'   LIMIT " . $this_page_f_result . ',' . $result_per_page;
           }else{

               $sql = "SELECT * from sales_medicine a, sales_manager b LIMIT " . $this_page_f_result . ',' . $result_per_page;
           }
            
            $result = $connect->query($sql);
           
            while ($row = $result->fetch_assoc()) {
              
        ?>
                                <tr>
                                  <td><?php echo ++$index; ?></td>
                                  <td><?php echo $row['name']; ?></td>
                                  <td><?php 
                                  if($row['sm_price']==0){
                                    echo "<span class='badge bg-primary' > return</span>";
                                  }else{

                                    echo $row['sm_price']; 
                                  }
                                  ?></td>
                                    <th scope="row"><?php echo $row['cnic']; ?></th>
                                    <th scope="row"><?php echo $row['branch_name']; ?></th>
                                    <th scope="row"><?php echo $row['city']; ?></th>
                                    <th scope="row"><?php echo $row['country']; ?></th>
                                    <td><?php echo $row['created_at']; ?></td>
                                </tr>
                    <?php
                            }
                        }
                

                    ?>
            </tbody>
          </table>
        </div>
        <div class="set_pagination">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">

            <li class="page-item">
                <a class="page-link" href="index.php?page=<?php echo $page ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php
            for ($page = 1; $page <= $number_of_f_p; $page++) {
            ?>
                <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>
            <?php
            }
            ?>
            <li class="page-item">
                <a class="page-link" href="index.php?page=<?php echo $page - 1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>

</div>
      </div>

    </section>
    <!--Section: Minimal statistics cards-->

  </div>
</main>
<?php
include "./layouts/footer.php";


?>