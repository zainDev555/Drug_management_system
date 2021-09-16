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
            Add Return
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-body">


                
                    <input type="number" name="sm_id" id="sm_id"placeholder="Enter order ID  " require>
                    <input type="text"  id="sm_name" placeholder="Enter medicine name " require>
                    <input type="number"  id="sm_qty" placeholder="Enter medicine qty " require>
                    <button class="btn btn-success"  id="sm_ids" type="button">search</button>
               
                  <form action="./function.php" method="post">
                    <div class="form-group">
                   
                    <input type="hidden" class="form-control" required name="salesman_id" id="salesman_id" value=" <?php echo $_SESSION['id']; ?>">
                      <input type="hidden" class="form-control" required name="id" id="id">

                    </div>
                    <div class="form-group">
                      <label for="medicine">Medicine Name </label>
                      <input name="rm_name" id="rm_name" class="form-control" required />
           
                    

                    </div>
                    <div class="form-group">
                      <label for="medicine">Medicine ID </label>
                      <input type="text" id="rm_id" name="rm_id" class="form-control" required  >

                    </div>
                    <div class="form-group">
                      <label for="medicine">Medicine QTY </label>
                      <input type="number" name="rm_qty" id="rm_qty"class="form-control" required >

                    </div>
                    <div class="form-group">
                      <label for="medicine">Medicine price </label>
                      <input type="number"name="rm_price" id="rm_price" class="form-control" required >

                    </div>
                 
                    <div class="form-group">
                      <button class="btn btn-info" type="submit" name="return_medicine"> save</button>

                    </div>

                  </form>
                </div>

              </div>
            </div>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">medicine_id</th>
                <th scope="col">Medicine Name</th>
                <th scope="col">Medicine quantity</th>
                <th scope="col">price</th>
                <th scope="col">return date</th>
              
              </tr>
            </thead>
            <tbody>
            <?php
              

                        $sql = "SELECT * FROM sales_m_return";
                        $result = $connect->query($sql);

                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                            ?>

                                <tr>
                                    <th scope="row"><?php echo $row['rm_id']; ?></th>
                                    <td><?php echo $row['rm_name']; ?></td>
                                    <td><?php echo $row['rm_qty']; ?></td>
                                    <td><?php echo $row['rm_price']; ?></td>
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
  <script>
    $('#sm_ids').on("click",function(){
      
      $.ajax({
        url:'./function.php',
        type:'post',
        data:{get_medicine_data_id_for_return:{
         sm_id: $("#sm_id").val(),
         sm_name: $("#sm_name").val(),
         sm_name: $("#sm_name").val(),
         sm_qty: $("#sm_qty").val(),
        }
      },
        success:function(res){
          console.log(JSON.parse(res))
          const  data = JSON.parse(res)
          console.log(res)
          if(data.id){

            $("#id").val(data.id);
            $("#rm_name").val(data.sm_name);
            $("#rm_id").val(data.sm_id);
            $("#rm_price").val(data.sm_price);
            $("#rm_qty").val(data.sm_qty);
          }else{
            alert("no data found ")
          }
        
          
        }
      });
      

    });
  </script>
</main>
<?php
include "./layouts/footer.php";


?>