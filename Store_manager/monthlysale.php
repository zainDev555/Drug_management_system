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
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
            Add
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-body">

                
                 
                    
                     <input type="text" class="form-control" name="salesman_cnic" id="salesman_cnic" placeholder="Enter salesman CNIC  Like 25411-1456987-2 except space">
                    <label for=""> Month start from</label>
                     <input type="date" class="form-control" name="date_1" id="date_1" placeholder="Month start day">
                     <label for=""> TO</label>
                     <input type="date" class="form-control mb-2" name="date_2" id="date_2" placeholder="Month end date">
                    <button class="btn btn-success" id="salesman_find_by_month">search</button>
                  
                  <form action="./function.php" method="post">
                    <div class="form-group">
                   
                      <input type="hidden" class="form-control" name="s_manager_id" value=" <?php echo $_SESSION['id']; ?>">
                      <input type="hidden" class="form-control" name="salesman_cnic" id="salesman_cnic_store"  />
                      <input type="hidden" class="form-control" name="salesman_id" id="salesman_id"  />
                      <input type="hidden" class="form-control" name="date_1" id="date_1_store"  />
                      <input type="hidden" class="form-control" name="date_2" id="date_2_store"  />
                    </div>
                    <div class="form-group">
                      <label for="medicine">Salesman Name </label>
                      <input type="text" class="form-control" name="salesman_name" id="salesman_name">

                    </div>
                  
                    <div class="form-group">
                      <label for="medicine">selected monthly salesman sale </label>
                      <input type="text" class="form-control" name="salesman_monthly_sale" id="salesman_monthly_sale">

                    </div>
      
                    <div class="form-group">
                      <button class="btn btn-info" type="submit" name="save_mounthly_sales_by_manager"> save</button>

                    </div>

                  </form>
                </div>

              </div>
            </div>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">salesman Name</th>
                <th scope="col">salesman CNIC</th>
                
                <th scope="col">salesman weekly sale</th>
                <th scope="col">From</th>
                <th scope="col">TO </th>
                <th scope="col">Save date</th>
              </tr>
            </thead>
            <tbody>
            <?php
              

                        $sql = "SELECT * FROM s_manager_monthly_record";
                        $result = $connect->query($sql);

                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                            ?>

                                <tr>
                                  <td><?php echo $row['salesman_name']; ?></td>
                                    <th scope="row"><?php echo $row['salesman_cnic']; ?></th>
                          
                                    <td><?php echo $row['salesman_month_sale']; ?></td>
                                    <td><?php echo $row['date_1']; ?></td>
                                    <td><?php echo $row['date_2']; ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                </tr>
                    <?php
                            }
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
<script>
    $('#salesman_find_by_month').on("click",function(){
      
      $.ajax({
        url:'./function.php',
        type:'post',
        data:{ get_salesman_sales_monthly:{
            salesman_cnic:$("#salesman_cnic").val(),
            date_1:$("#date_1").val(),
            date_2:$("#date_2").val(),

        },
        },
        success:function(res){
          const myObj = JSON.parse(res);
          console.log(res);
      
        var s_cnic=$.trim(myObj.salesman_cnic)
        $("#salesman_name").val(myObj.salesman_name)
        $("#salesman_monthly_sale").val(myObj.salesman_month_Sale)
        $("#salesman_cnic_store").val(s_cnic)
        $("#salesman_id").val(myObj.salesman_id)
        $("#date_1_store").val(myObj.date_1)
      $("#date_2_store").val(myObj.date_2)
        
          
        }
      });
      

    });
  </script>
<?php
include "./layouts/footer.php";


?>