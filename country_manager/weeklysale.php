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
                <input type="text" class="form-control" name="city_manager_cnic" id="city_manager_cnic" placeholder="city manager CNIC  Like 25411-1456987-2 except space">
                <input type="hidden" class="form-control" required name="country" id="country" value="pakistan" >
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
                      <input type="hidden" class="form-control" required name="city_manager_cnic" id="city_manager_cnic_store"  />
                      <input type="hidden" class="form-control" required name="city_manager_id" id="city_manager_id"  />
                      <input type="hidden" class="form-control" name="city" id="city"  />
                      <input type="hidden" class="form-control" name="date_1" id="date_1_store"  />
                      <input type="hidden" class="form-control" name="date_2" id="date_2_store"  />
                    </div>
                    <div class="form-group">
                      <label for="medicine">Salesman Name </label>
                      <input type="text" class="form-control" name="city_m_name" id="city_m_name">

                    </div>
                  
                    <div class="form-group">
                      <label for="medicine">selected week salesman sale </label>
                      <input type="text" class="form-control" name="city_manager_weekly_sale" id="city_manager_weekly_sale">

                    </div>
      
                    <div class="form-group">
                      <button class="btn btn-info" type="submit" name="save_weekly_sales_by_city_manager"> save</button>

                    </div>

                  </form>
                </div>

              </div>
            </div>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">City  Manager Name</th>
                <th scope="col">City  Manager CNIC</th>
                
                <th scope="col">City  Manager weekly sale</th>
                <th scope="col">City</th>
                <th scope="col">From</th>
                <th scope="col">TO </th>
                <th scope="col">Save AT</th>
              </tr>
            </thead>
            <tbody>
            <?php
              

                        $sql = "SELECT * FROM country_manager_weekly_reord where city_manager_id='$_SESSION[id]'";
                        $result = $connect->query($sql);

                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                            ?>

                                <tr>
                                  <td><?php echo $row['city_m_name']; ?></td>
                                  <th scope="row"><?php echo $row['city_manager_cnic']; ?></th>
                                  
                                  <td><?php echo $row['city_manager_weekly_sale']; ?></td>
                                  <td><?php echo $row['city']; ?></td>
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
        data:{ get_city_manager_sales_weekly:{
          city_manager_cnic:$("#city_manager_cnic").val(),
          country:$("#country").val(),
          date_1:$("#date_1").val(),
          date_2:$("#date_2").val(),

        },
        },
        success:function(res){
        
          const myObj = JSON.parse(res);
          console.log(res);
      
        var s_cnic=$.trim(myObj.city_manager_cnic)
        if(myObj.city_manager_weekly_Sale==""){
          alert("no sales record found for you search")
          $("#city_manager_weekly_sale").val(myObj.city_manager_weekly_Sale)

          }
          else
          {
          $("#city_manager_weekly_sale").val(myObj.city_manager_weekly_Sale) 
        }
        $("#city_m_name").val(myObj.city_manager_name)
        $("#city").val(myObj.city)
        $("#city_manager_cnic_store").val(s_cnic)
        $("#city_manager_id").val(myObj.city_manager_id)
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