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

                
                 
                    
                <input type="text" class="form-control" name="storemanager_cnic" id="storemanager_cnic" placeholder="storemanager CNIC  Like 25411-1456987-2 except space">
                <input type="hidden" class="form-control" required name="city" id="city" value="<?php echo $_SESSION['city']; ?>" >
                    <label for=""> week start from</label>
                     <input type="date" class="form-control " name="date_1" id="date_1"  
        placeholder="dd-mm-yyyy" 
        min="1997-01-01" max="2030-12-31" >
                     <label for=""> TO end</label>
                     <input type="text" class="form-control mb-2" name="date_2" id="date_2"  >
                    <button class="btn btn-success" id="salesman_find_by_week">search</button>
                  
                  <form action="./function.php" method="post">
                    <div class="form-group">
                   
                    <input type="hidden" class="form-control" required name="city_manager_id" value=" <?php echo $_SESSION['id']; ?>">
                      <input type="hidden" class="form-control" required name="s_m_cnic" id="stor_storemanager_cnic"  />
                      <input type="hidden" class="form-control" required name="storemananger_id" id="storemananger_id"  />
                      <input type="hidden" class="form-control" name="date_1" id="date_1_store"  />
                      <input type="hidden" class="form-control" name="date_2" id="date_2_store"  />
                    </div>
                    <div class="form-group">
                      <label for="medicine">Salesman Name </label>
                      <input type="text" class="form-control" name="s_m_name" id="s_m_name">

                    </div>
                  
                    <div class="form-group">
                      <label for="medicine">selected week salesman sale </label>
                      <input type="text" class="form-control" name="storemanager_weekly_sale" id="salesman_weekly_sale">

                    </div>
      
                    <div class="form-group">
                      <button class="btn btn-info" type="submit" name="save_weekly_sales_by_store_manager"> save</button>

                    </div>

                  </form>
                </div>

              </div>
            </div>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Store Manager Name</th>
                <th scope="col">Store Manager CNIC</th>
                
                <th scope="col">Store Manager weekly sale</th>
                <th scope="col">From</th>
                <th scope="col">TO </th>
                <th scope="col">Save AT</th>
              </tr>
            </thead>
            <tbody>
            <?php
              

                        $sql = "SELECT * FROM city_manager_weekly_record where city_manager_id='$_SESSION[id]'";
                        $result = $connect->query($sql);

                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                            ?>

                                <tr>
                                  <td><?php echo $row['s_m_name']; ?></td>
                                    <th scope="row"><?php echo $row['s_m_cnic']; ?></th>
                          
                                    <td><?php echo $row['s_m_weekly_sale']; ?></td>
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
    $('#salesman_find_by_week').on("click",function(){
      
      $.ajax({
        url:'./function.php',
        type:'post',
        data:{ get_storemanager_sales_weekly:{
          storemanager_cnic:$("#storemanager_cnic").val(),
          city:$("#city").val(),
          date_1:$("#date_1").val(),
          date_2:$("#date_2").val(),

        },
        },
        success:function(res){
        
          const myObj = JSON.parse(res);
          console.log(myObj);
      
        var s_cnic=$.trim(myObj.storemanager_cnic)
        if(myObj.storemanager_weekly_Sale==""){
          alert("no sales record found for you search")
          $("#salesman_weekly_sale").val(myObj.storemanager_weekly_Sale)

          }
          else
          {
          $("#salesman_weekly_sale").val(myObj.storemanager_weekly_Sale) 
        }
        $("#s_m_name").val(myObj.storemanager_name)
        $("#stor_storemanager_cnic").val(s_cnic)
        $("#storemananger_id").val(myObj.storemanager_id)
        $("#date_1_store").val(myObj.date_1)
        $("#date_2_store").val(myObj.date_2)
        
          
        }
      });
      

    });
    $('#date_1').on("change",function(){
   
      $.ajax({
        url:'./function.php',
        type:'post',
        data:{date_1 :$("#date_1").val()},      
        success:function(res){
          console.log(res)
          $("#date_2").val(res)
        } 
    
    });
  });
  </script>
<?php
include "./layouts/footer.php";


?>