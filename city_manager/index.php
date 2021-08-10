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

                
                 
                    
                    <input type="text" class="form-control" name="salesman_cnic" id="salesman_cnic" placeholder="Enter storemanager CNIC  Like 25411-1456987-2 except space">
                    <button class="btn btn-success" id="store_manager_find">search</button>
                  
                  <form action="./function.php" method="post">
                    <div class="form-group">
                   
                      <input type="hidden" class="form-control" name="city_manager_id" value=" <?php echo $_SESSION['id']; ?>">
                      <input type="hidden" class="form-control" name="store_manager_cnic" id="store_manager_cnic_store"  />
                      <input type="hidden" class="form-control" name="store_mananger_id" id="store_mananger_id"  />

                    </div>
                    <div class="form-group">
                      <label for="medicine">store manager Name </label>
                      <input type="text" class="form-control" name="c_m_name" id="c_m_name">

                    </div>
                    <div class="form-group">
                      <label for="medicine">Today salesman sale</label>
                      <input type="text" class="form-control" name="c_m_day_sale" id="salesman_day_sale">
                    </div>
                   
                    <div class="form-group">
                      <button class="btn btn-info" type="submit" name="save_daily_sales_by_city_manager"> save</button>

                    </div>

                  </form>
                </div>

              </div>
            </div>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Storeanager Name</th>
                <th scope="col">Storeanager CNIC</th>
                <th scope="col">Storeanager Daily sale</th>
               
                <th scope="col">store date</th>
              </tr>
            </thead>
            <tbody>
            <?php
              

                        $sql = "SELECT * FROM s_manager_daily_record";
                        $result = $connect->query($sql);

                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                            ?>

                                <tr>
                                  <td><?php echo $row['salesman_name']; ?></td>
                                    <th scope="row"><?php echo $row['salesman_cnic']; ?></th>
                                    <td><?php echo $row['salesman_day_Sale']; ?></td>
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
    $('#store_manager_find').on("click",function(){
      
      $.ajax({
        url:'./function.php',
        type:'post',
        data:{get_storemanager_daily_sales:$("#salesman_cnic").val()},
        success:function(res){
          const myObj = JSON.parse(res);
          console.log(myObj);
          var s_cnic=$.trim(myObj.stormanager_cnic)
              if (myObj.storemanager_day_sale==null || myObj.storemanager_day_sale==" " ) 
              {
                
              $("#c_m_day_sale").val(" data not available ")
                }
                else
                {
               $("#c_m_day_sale").val(myObj.storemanager_day_sale)
                }
               $("#c_m_name").val(myObj.stormanager_name)
               $("#store_manager_cnic").val(s_cnic)
               $("#storemananger_id").val(myObj.storemananger_id)
                
             
      
     
        
          
        }
      });
      

    });
  </script>
<?php
include "./layouts/footer.php";


?>