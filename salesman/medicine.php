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
         <h4>Store medicine</h4>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">medicine_id</th>
                <th scope="col">Medicine Name</th>
                <th scope="col">Medicine quantity</th>
                <th scope="col">single price</th>
                <th scope="col">Medicine Total price</th>
              </tr>
            </thead>
            <tbody>
            <?php
              

                        $sql = "SELECT * FROM medicine";
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