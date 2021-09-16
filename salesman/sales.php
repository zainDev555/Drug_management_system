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
            Add sale
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-body">


                  <form action="./function.php" method="post">
                    <div class="form-group">
                   
                      <input type="hidden" class="form-control" required name="salesman_id" value=" <?php echo $_SESSION['id']; ?>">

                    </div>
                    <div class="form-group">
                      <label for="medicine">Medicine Name </label>
                      <select name="sm_name" id="m_ids" class="form-control" required>
                        <option selected disabled> -------------------------select medicine pleas----------------</option>
                    <?php  $sql = "SELECT m_name FROM medicine ";
                        $result = $connect->query($sql);

                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                              ?>
                              <option value="<?php echo $row['m_name'];?>"><?php echo $row['m_name'];?></option>
                              
                              <?php
                            }
                          }
?>
                      </select>

                    </div>
                    <div class="form-group">
                      <label for="medicine">Medicine ID </label>
                      <input type="text" id="sm_id" name="sm_id" class="form-control" required  >
                     
                    </div>
                    <div class="form-group">
                      <label for="medicine">Medicine QTY </label>
                      <input type="number" class="form-control" required name="sm_qty" id="sm_qty">

                    </div>
                    <div class="form-group">
                      <label for="medicine">Medicine price </label>
                      <input type="text" id="sm_price" name="sm_price" class="form-control" required  >
                      
                    </div>
                 
                    <div class="form-group">
                      <button class="btn btn-info" type="submit" name="sale_medicine"> save</button>

                    </div>

                  </form>
                </div>

              </div>
            </div>
          </div>
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
              

                        $sql = "SELECT * FROM sales_medicine where salesman_id='$_SESSION[id]'";
                        $result = $connect->query($sql);

                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                            ?>

                                <tr>
                                    <th scope="row"><?php echo $row['id']; ?></th>
                                    <th scope="row"><?php echo $row['sm_id']; ?></th>
                                    <td><?php echo $row['sm_name']; ?></td>
                                    <td><?php echo $row['sm_qty']; ?></td>
                                    <td><?php echo $row['sm_price']; ?></td>
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
    // $("#sm_qty").val(1) 
     $('#sm_qty').on("change",function(){
      $.ajax({
        url:'./function.php',
        type:'post',
        data:{set_qty:$("#sm_id").val()},
        success:function(res)
        {
          const  data = JSON.parse(res)
         
     
              
           let final_price = $("#sm_qty").val() * data[1];
            if(final_price < 0){
              alert("wrong input")
            }else{

              $("#sm_price").val(final_price);
            }
          }
      });
    

         })
    $('#m_ids').on("change",function(){
      
      $.ajax({
        url:'./function.php',
        type:'post',
        data:{get_medicine_data_id:$("#m_ids").val()},
        success:function(res)
        {
          const  data = JSON.parse(res)
          const just_one=1;
            $("#sm_id").val(data.m_id);
            $("#sm_price").val(data[1]);
            
           
          }
      });
     

    });
  </script>
</main>
<?php
include "./layouts/footer.php";


?>