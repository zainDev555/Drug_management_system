<?php include "./layouts/navbar.php" ?>
<style>
    .home-img{
        height: 100%;
        width: 100%;
    }
    .carde_img{
        height: 100px;
        width: 100px;
    }
    
</style>
<!-- Start your project here-->
<div class="container">
    <div class="row">
    <div class="col-md-12 " >
       <img src="./assets/img/home.jpg" alt="" class="home-img">
    </div>
    <div class="col-md-6 text-center">
        <div class="card " style="display: flex;">
            <a href="salesmanLogin.php">  
            <div><img src="./assets/img/users.jpg" class="carde_img">
        </div>
        <p >  Click to users Login</p>
    </a>
        </div>
    </div>

    <div class="col-md-6 text-center">
        <a href="./admin_login.php">

            <div class="card " style="display: flex;">
                <div><img src="./assets/img/admin.jpg" class="carde_img">
            </div><p >  Click to Admin Login</p>
        </div>
    </a>
    </div>
    </div>
</div>

<!-- End your project here-->
<?php include "./layouts/footer.php" ?>