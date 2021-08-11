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
                      <label for="medicine">Store Manger Name </label>
                      <input type="text" class="form-control" required name="name" id="name">

                    </div>
                  
                    <div class="form-group">
                      <label for="medicine">Store Manger email</label>
                      <input type="text" class="form-control" required name="email" id="email">

                    </div>
                    <div class="form-group">
                      <label for="medicine">Store Manger Cnic</label>
                      <input type="text" class="form-control" required name="cnic" id="cnic">

                    </div>
                    <div class="form-group">
                      <label for="medicine">phone no</label>
                      <input type="text" class="form-control" required name="phone" id="phone">

                    </div>
                    <div class="form-group">
                      <label for="medicine">country</label>
                      <input type="text" class="form-control" required name="country" id="country">

                      <input type="hidden" class="form-control" required name="city" id="city"    value="<?php echo $_SESSION['city'];?>">
                    </div>
                

                    <div class="form-group">
                      <label for="medicine">branch__name</label>
                      <input type="text" class="form-control" required name="branch_name" id="branch_name">

                    </div>
                    <div class="form-group">
                      <label for="medicine">password</label>
                      <input type="text" class="form-control" required name="password" id="password">

                    </div>

      
                    <div class="form-group">
                      <button class="btn btn-info" type="submit" name="saveStore_manager"> save</button>

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
                <th scope="col">Store Manager Email</th>
                <th scope="col">Store Manager CNIC</th>
                <th scope="col">phone</th>
                <th scope="col">country</th>
                <th scope="col">city</th>
                <th scope="col">branch__name</th>
                <th scope="col">controls</th>
              </tr>
            </thead>
            <tbody>
            <?php
              

                        $sql = "SELECT * FROM store_manager where city='$_SESSION[city]'";
                        $result = $connect->query($sql);

                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                            ?>

                                <tr>
                                  <td><?php echo $row['name']; ?></td>
                                  <td><?php echo $row['email']; ?></td>
                                    <th scope="row"><?php echo $row['cnic']; ?></th>
                          
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['country']; ?></td>
                                    <td><?php echo $row['city']; ?></td>
                                    <td><?php echo $row['branch_name']; ?></td>
                                    <td>
                                  
                                
                                   <a  class="btn btn-sm     btn-info text-white" href="./editSstoreManager.php?id=<?php echo $row['id'] ?>" ><span class="fa fa-pen " ></span></a>
                                   <form action="./function.php" method="post">
                                       <input type="hidden" name="id" value="<?php echo $row['id']?>" >
                                       <button type="submit" class="btn btn-sm btn-danger" name="delstoremanagernow"><span class="fa fa-trash "></span> </button>
                                   </form>
                                    </td>
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