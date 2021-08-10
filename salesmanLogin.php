<?php include "./layouts/navbar.php" ?>


<!-- Start your project here-->
<div class="container">
    <div class="row">
        <div class="col-md-12 " style="padding:10% 30%">
        <h4 class="text-center border-bottom mb-5">Salesman Login</h4>
            <form action="./function.php" method="post">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" name="name" id="name" class="form-control" />
                    <label class="form-label" for="name">username</label>
                </div>

        
                     <!-- Password input -->
                     <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" class="form-control" />
                    <label class="form-label" for="form2Example2">Password</label>
                </div>
                
                <!-- 2 column grid layout for inline styling -->

                <!-- Submit button -->
                <button type="submit" name="sales_log_in" class="btn btn-primary btn-block mb-4">Sign in</button>

                
            </form>
            <a href="./salesmanLogin.php">-->go to Salesman</a><br>
            <a href="./StoreManagerLogin.php">-->go to store Manager</a><br>
            <a href="./citymanagerLogin.php">-->go to city Manager</a>
        </div>
    </div>
</div>

<!-- End your project here-->
<?php include "./layouts/footer.php" ?>