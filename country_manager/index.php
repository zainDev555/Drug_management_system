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
                    <input type="text" class="form-control" required name="city_manager_cnic" id="city_manager_cnic" placeholder="Enter citymanager CNIC  Like 25411-1456987-2 except space">
                    <input type="hidden" class="form-control" required name="country" id="country" value="pakistan" >
                    <button class="btn btn-success" id="city_manager_find">search</button>
                  <h4>Today <b>"<?php $date= date("y-m-d");echo  date('y-m-d', strtotime($date . '  + 1 days'))?>"</b> search</h4>
                  <form action="./function.php" method="post">
                    <div class="form-group">
                   
                      <input type="hidden" class="form-control" required name="city_manager_id" value=" <?php echo $_SESSION['id']; ?>">
                      <input type="hidden" class="form-control" required name="citymanager_cnic" id="citymanager_cnic"  />
                      <input type="hidden" class="form-control" required name="citymanager_id" id="citymanager_id"  />

                    </div>
                    <div class="form-group">
                      <label for="medicine">store manager Name </label>
                      <input type="text" class="form-control" required name="c_m_name" id="c_m_name">

                    </div>
                    <div class="form-group">
                      <label for="medicine">Today city manager sale</label>
                      <input type="text" class="form-control" required name="city_m_daily_sale" id="city_m_daily_sale">
                    </div>
                   
                    <div class="form-group">
                      <button class="btn btn-info" type="submit" name="save_daily_sales_by_country_manager"> save</button>

                    </div>

                  </form>
                </div>

              </div>
            </div>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">city Manager Name</th>
                <th scope="col">city Manager CNIC</th>
                <th scope="col">city Manager Daily sale</th>
               
                <th scope="col">store date</th>
              </tr>
            </thead>
            <tbody>
            <?php
              

                        $sql = "SELECT * FROM country_manager_daily_reord where city_manager_id='$_SESSION[id]'";
                        $result = $connect->query($sql);

                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                            ?>

                                <tr>
                                  <td><?php echo $row['c_m_name']; ?></td>
                                    <th scope="row"><?php echo $row['citymanager_cnic']; ?></th>
                                    <td><?php echo $row['city_m_daily_sale']; ?></td>
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
    $('#city_manager_find').on("click",function(){
      
      $.ajax({
        url:'./function.php',
        type:'post',
        data:{get_citymanager_daily_sales:{cnic:$("#city_manager_cnic").val(),country:$("#country").val(),}},
        success:function(res){
          const myObj = JSON.parse(res);
          console.log(myObj);
          var s_cnic=$.trim(myObj.citymanager_cnic)
              if (myObj.citymanager_day_sale=="" ) 
              {
             alert("no sale record found for this search")
             $("#city_m_daily_sale").val(myObj.citymanager_day_sale)  

                }
                else
                {
               $("#city_m_daily_sale").val(myObj.citymanager_day_sale) 
              //  2021-07-27
                }
               $("#c_m_name").val(myObj.citymanager_name)
               $("#citymanager_cnic").val(s_cnic)
               $("#citymanager_id").val(myObj.citymanager_id)
                
             
      
     
        
          
        }
      });
      

    });
  </script>
<?php
include "./layouts/footer.php";


?>