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


                  <form action="./function.php" method="post">
                    <div class="form-group">
                   
                      <input type="hidden" class="form-control" name="salesman_id" value=" <?php echo $_SESSION['id']; ?>">

                    </div>
                    <div class="form-group">
                      <label for="medicine">Medicine Name </label>
                      <input type="text" class="form-control" name="m_name">

                    </div>
                    <div class="form-group">
                      <label for="medicine">Medicine ID </label>
                      <input type="text" class="form-control" name="m_id">

                    </div>
                    <div class="form-group">
                      <label for="medicine">Medicine QTY </label>
                      <input type="number" class="form-control" name="m_qty">

                    </div>
                    <div class="form-group">
                      <label for="medicine">Medicine per qty price </label>
                      <input type="number" class="form-control" name="m_price">

                    </div>
                    <div class="form-group">
                      <label for="medicine">Medicine per qty sale price </label>
                      <input type="number" class="form-control" name="m_sale_price">

                    </div>
                 
                    <div class="form-group">
                      <button class="btn btn-info" type="submit" name="save_medicine"> save</button>

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
                <th scope="col">single price</th>
                <th scope="col">Medicine Total price</th>
                <th scope="col"> single sale price</th>
              </tr>
            </thead>
            <tbody>
            <?php
              

                        $sql = "SELECT * FROM medicine ";
                        $result = $connect->query($sql);

                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                            ?>

                                <tr>
                                    <th scope="row"><?php echo $row['m_id']; ?></th>
                                    <td><?php echo $row['m_name']; ?></td>
                                    <td><?php echo $row['m_qty']; ?></td>
                                    <td><?php echo $row['m_price']; ?></td>
                                    <td><?php echo $row['m_total_price']; ?></td>
                                    <td><?php echo $row['m_sale_price']; ?></td>
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
<?php
include "./layouts/footer.php";


?>