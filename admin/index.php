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
        <div class="col-xl-6 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="card-body d-flex" style="justify-content: space-around;">
            <span class='fa fa-user'> </span> <h5 class="card-title">salesman </h5>
              <p class="card-text">
                  <?php
                  $sql="SELECT count(*) as total from sales_manager";
                  $result= $connect->query($sql);
                  $data=mysqli_fetch_assoc($result);
                  echo "<b> ". $data['total']." </b>";
                  ?>
              </p>

            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="card-body d-flex" style="justify-content: space-around;">
            <span class='fa fa-user'> </span> <h5 class="card-title">store manager </h5>
              <p class="card-text">
                  <?php
                  $sql="SELECT count(*) as total from store_manager";
                  $result= $connect->query($sql);
                  $data=mysqli_fetch_assoc($result);
                  echo "<b> ". $data['total']." </b>";
                  ?>
              </p>

            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="card-body d-flex" style="justify-content: space-around;">
            <span class='fa fa-user'> </span> <h5 class="card-title">city manager </h5>
              <p class="card-text">
                  <?php
                  $sql="SELECT count(*) as total from city_manager";
                  $result= $connect->query($sql);
                  $data=mysqli_fetch_assoc($result);
                  echo "<b> ". $data['total']." </b>";
                  ?>
              </p>

            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="card-body d-flex" style="justify-content: space-around;">
            <span class='fa fa-wallet'> </span> <h5 class="card-title">Total profit </h5>
              <p class="card-text">
                  <?php
               $result = mysqli_query($connect, 'SELECT SUM(m_sale_price) AS value_sum FROM medicine'); 
               $row = mysqli_fetch_assoc($result); 
               $m_sale_price_sum = $row['value_sum'];
               $result = mysqli_query($connect, 'SELECT SUM(m_price) AS value_sum FROM medicine'); 
               $row = mysqli_fetch_assoc($result); 
               $m_price_sum = $row['value_sum'];
               echo   $m_sale_price_sum- $m_price_sum;
                  ?>
              </p>

            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="card-body d-flex" style="justify-content: space-around;">
            <span class='fa fa-medkit '> </span> <h5 class="card-title">total medicine</h5>
              <p class="card-text">
                  <?php
                  $sql="SELECT count(*) as total from medicine";
                  $result= $connect->query($sql);
                  $data=mysqli_fetch_assoc($result);
                  echo "<b> ". $data['total']." </b>";
                  ?>
              </p>

            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="card-body d-flex" style="justify-content: space-around;">
            <span class='fa fa-wallet'> </span> <h5 class="card-title">total sale price</h5>
              <p class="card-text">
              <?php
               $result = mysqli_query($connect, 'SELECT SUM(sm_price) AS value_sum FROM sales_medicine'); 
               $row = mysqli_fetch_assoc($result); 
               echo $sum = $row['value_sum'];
                  ?>
              </p>

            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="card-body d-flex" style="justify-content: space-around;">
            <span class='fa fa-undo fa-fw'> </span> <h5 class="card-title">total return price</h5>
              <p class="card-text">
              <?php
               $result = mysqli_query($connect, 'SELECT SUM(rm_price) AS value_sum FROM sales_m_return'); 
               $row = mysqli_fetch_assoc($result); 
               echo $sum = $row['value_sum'];
                  ?>
              </p>

            </div>
          </div>
        </div>
      </div>

    </section>
    <!--Section: Minimal statistics cards-->

  </div>
</main>
<?php
include "./layouts/footer.php";


?>