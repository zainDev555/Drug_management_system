h<?php
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
            <span class='fa fa-medkit '> </span> <h5 class="card-title">Our city storemanager</h5>
              <p class="card-text">
                  <?php
                  $sql="SELECT count(*) as total from store_manager where city='$_SESSION[city]'";
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
            <span class='fa fa-home '> </span> <h5 class="card-title">my city</h5>
              <p class="card-text">
                  <?php
                
                  echo $_SESSION['city'];
                  ?>
              </p>

            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="card-body d-flex" style="justify-content: space-around;">
            <span class='fa fa-home '> </span> <h5 class="card-title">our city salesman</h5>
              <p class="card-text">
              <?php
                  $sql="SELECT count(*) as total from sales_manager where city='$_SESSION[city]'";
                  $result= $connect->query($sql);
                  $data=mysqli_fetch_assoc($result);
                  echo "<b> ". $data['total']." </b>";
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