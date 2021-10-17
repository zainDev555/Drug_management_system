<?php include "./layouts/navbar.php" ?>


<!-- Start your project here-->
<div class="container">
    <div class="row">
        <a href="./index.php" class="text-dark"> <- Home</a>
    <div class="col-md-12 " style="padding:10% 10%">
        <div class="card p-3" >
        <h4 class="text-center border-bottom mb-5">Store Manager Login</h4>
            <form action="./function.php" method="post">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" name="email" id="email" class="form-control" />
                    <label class="form-label" for="email">Email address</label>
                </div>

        
                     <!-- Password input -->
                     <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" class="form-control" />
                    <label class="form-label" for="form2Example2">Password</label>
                </div>
                
                <!-- 2 column grid layout for inline styling -->

                <!-- Submit button -->
                <button type="submit" name="store_log_in" class="btn btn-primary btn-block mb-4">Sign in</button>

              
            </form>
            <h5>system Login ?</h5>
            <div class="d-flex">

                <a href="./salesmanLogin.php">Salesman</a>,&nbsp;&nbsp;
                <a href="./StoreManagerLogin.php">store Manager</a>,&nbsp;&nbsp;
                <a href="./citymanagerLogin.php"> city Manager</a>,&nbsp;&nbsp;
                <a href="./country_manager_login.php">country Manager</a>,&nbsp;&nbsp;
                <a href="./ceoLogin.php">Ceo</a>&nbsp;&nbsp;
            </div>
        </div>
        </div>
    </div>
</div>


<!-- End your project here-->
<?php include "./layouts/footer.php" ?>