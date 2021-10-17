<?php include "./layouts/navbar.php" ?>


<!-- Start your project here-->
<div class="container">
    <div class="row">
    <a href="./index.php" class="text-dark"> <- Home</a>
    <div class="col-md-12 " style="padding:10% 10%">
        <div class="card p-3" >
        <h4 class="text-center border-bottom mb-5">Admin Login</h4>
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
                <button type="submit" name="admin_log_in" class="btn btn-primary btn-block mb-4">Sign in</button>

              
            </form>
            <a href="./index.php"> Home</a>
        </div>
        </div>
    </div>
</div>


<!-- End your project here-->
<?php include "./layouts/footer.php" ?>