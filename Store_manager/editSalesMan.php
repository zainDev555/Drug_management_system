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
            <div class="card">

                <div class="card-body">

                <h4>update salesman</h4>
                 
  <?php 
       $sql = "SELECT * FROM sales_manager where id='$_GET[id]'";
       $result = $connect->query($sql);

       if ($result->num_rows > 0) {

           while ($row = $result->fetch_assoc()) {
           ?>

                  <form action="./function.php" method="post">
   
                    <div class="form-group">
                      <label for="medicine">Salesman Name </label>
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                      <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>">

                    </div>
                  
                    <div class="form-group">
                      <label for="medicine">salesman Cnic</label>
                      <input type="text" class="form-control" name="cnic" id="cnic" value="<?php echo $row['cnic']; ?>">

                    </div>
                    <div class="form-group">
                      <label for="medicine">phone no</label>
                      <input type="text" class="form-control" name="phone" id="phone"  value="<?php echo $row['phone']; ?>" >

                    </div>
                    <div class="form-group">
                      <label for="medicine">country</label>
                      <input type="text" class="form-control" name="country" id="country"  value="<?php echo $row['country']; ?>">

                    </div>
                    <div class="form-group">
                      <label for="medicine">city</label>
                      <input type="text" class="form-control" name="city" id="city"  value="<?php echo $row['city']; ?>">

                    </div>
                    <div class="form-group">
                      <label for="medicine">branch__name</label>
                      <input type="text" class="form-control" name="branch_name" id="branch_name"  value="<?php echo $row['branch_name']; ?>">

                    </div>
                    <div class="form-group">
                      <label for="medicine">password</label>
                      <input type="text" class="form-control" name="password" id="password"  >

                    </div>

      
                    <div class="form-group">
                      <button class="btn btn-info" type="submit" name="updateSalesman"> save</button>

                    </div>

                  </form>
                  <?php
                  
           }
           }?>
                </div>

              </div>
</div>
</div>
</section>

</div>
</main>